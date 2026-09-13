<?php

if (PHP_SAPI !== 'cli') {
	header('HTTP/1.1 404 Not Found');
	exit;
}

$project_root = dirname(dirname(__DIR__));
require $project_root.'/vendor/autoload.php';
(new \CodeIgniter\Config\DotEnv($project_root))->load();

/**
 * Import the repository's legacy MySQL dump into empty tables created by CI4 migrations.
 * Connection values are read from DB_HOST, DB_PORT, DB_NAME, DB_USER,
 * DB_PASSWORD, and DB_SCHEMA. No source data is copied into this script.
 */

function migration_fail($message)
{
	throw new RuntimeException($message);
}

function extract_insert_statements($sql)
{
	$statements = array();
	$offset = 0;
	$length = strlen($sql);

	while (($start = strpos($sql, 'INSERT INTO `', $offset)) !== FALSE) {
		$quoted = FALSE;
		$escaped = FALSE;
		$statement_end = FALSE;

		for ($i = $start; $i < $length; $i++) {
			$char = $sql[$i];

			if ($quoted) {
				if ($escaped) {
					$escaped = FALSE;
				}
				elseif ($char === '\\') {
					$escaped = TRUE;
				}
				elseif ($char === "'" && isset($sql[$i + 1]) && $sql[$i + 1] === "'") {
					$i++;
				}
				elseif ($char === "'") {
					$quoted = FALSE;
				}
			}
			elseif ($char === "'") {
				$quoted = TRUE;
			}
			elseif ($char === ';') {
				$statement_end = $i;
				break;
			}
		}

		if ($statement_end === FALSE) {
			migration_fail('Ada INSERT MySQL yang tidak berakhir dengan titik koma.');
		}

		$statements[] = substr($sql, $start, $statement_end - $start + 1);
		$offset = $statement_end + 1;
	}

	return $statements;
}

function decode_mysql_string($sql, &$offset)
{
	$length = strlen($sql);
	$value = '';
	$offset++; // Opening quote.

	while ($offset < $length) {
		$char = $sql[$offset];

		if ($char === '\\') {
			$offset++;
			if ($offset >= $length) {
				migration_fail('Escape MySQL terpotong di akhir nilai.');
			}

			$escaped = $sql[$offset];
			$map = array(
				'0' => "\0",
				'b' => "\x08",
				'n' => "\n",
				'r' => "\r",
				't' => "\t",
				'Z' => "\x1a",
				'\\' => '\\',
				"'" => "'",
				'"' => '"'
			);
			$value .= isset($map[$escaped]) ? $map[$escaped] : $escaped;
			$offset++;
			continue;
		}

		if ($char === "'" && isset($sql[$offset + 1]) && $sql[$offset + 1] === "'") {
			$value .= "'";
			$offset += 2;
			continue;
		}

		if ($char === "'") {
			$offset++;
			return $value;
		}

		$value .= $char;
		$offset++;
	}

	migration_fail('Literal string MySQL tidak ditutup.');
}

function parse_mysql_insert($statement)
{
	if ( ! preg_match('/^INSERT INTO `([^`]+)`\s*\((.*?)\)\s*VALUES\s*(.*);$/s', $statement, $matches)) {
		migration_fail('Format INSERT MySQL tidak dikenali.');
	}

	$table = $matches[1];
	if ( ! preg_match_all('/`([^`]+)`/', $matches[2], $column_matches)) {
		migration_fail('Daftar kolom MySQL kosong untuk tabel '.$table.'.');
	}
	$columns = $column_matches[1];
	$values_sql = $matches[3];
	$rows = array();
	$offset = 0;
	$length = strlen($values_sql);

	while ($offset < $length) {
		while ($offset < $length && (ctype_space($values_sql[$offset]) || $values_sql[$offset] === ',')) {
			$offset++;
		}
		if ($offset >= $length) {
			break;
		}
		if ($values_sql[$offset] !== '(') {
			migration_fail('Baris VALUES MySQL tidak dimulai dengan tanda kurung.');
		}
		$offset++;
		$row = array();

		while ($offset < $length) {
			while ($offset < $length && ctype_space($values_sql[$offset])) {
				$offset++;
			}
			if ($offset >= $length) {
				migration_fail('Baris VALUES MySQL tidak ditutup.');
			}

			if ($values_sql[$offset] === "'") {
				$row[] = decode_mysql_string($values_sql, $offset);
			}
			else {
				$start = $offset;
				while ($offset < $length && $values_sql[$offset] !== ',' && $values_sql[$offset] !== ')') {
					$offset++;
				}
				$literal = trim(substr($values_sql, $start, $offset - $start));
				$row[] = (strcasecmp($literal, 'NULL') === 0) ? NULL : $literal;
			}

			while ($offset < $length && ctype_space($values_sql[$offset])) {
				$offset++;
			}
			if ($offset < $length && $values_sql[$offset] === ',') {
				$offset++;
				continue;
			}
			if ($offset < $length && $values_sql[$offset] === ')') {
				$offset++;
				break;
			}
			migration_fail('Pemisah nilai MySQL tidak dikenali.');
		}

		if (count($row) !== count($columns)) {
			migration_fail('Jumlah nilai tidak cocok dengan kolom pada tabel '.$table.'.');
		}
		$rows[] = $row;
	}

	return array($table, $columns, $rows);
}

function load_mysql_dump($path)
{
	if ( ! is_file($path) || ! is_readable($path)) {
		migration_fail('Dump MySQL tidak ditemukan atau tidak bisa dibaca: '.$path);
	}

	$statements = extract_insert_statements(file_get_contents($path));
	$tables = array();
	foreach ($statements as $statement) {
		list($table, $columns, $rows) = parse_mysql_insert($statement);
		if (isset($tables[$table])) {
			migration_fail('Dump memiliki lebih dari satu INSERT untuk tabel '.$table.'.');
		}
		$tables[$table] = array('columns' => $columns, 'rows' => $rows);
	}

	$expected = array('event_join', 'tbl_admin', 'tbl_blog', 'tbl_event', 'tbl_gallery', 'tbl_news', 'tbl_program', 'tbl_startup', 'users');
	$missing = array_diff($expected, array_keys($tables));
	if (count($missing) > 0) {
		migration_fail('Dump tidak memuat semua tabel aplikasi: '.implode(', ', $missing));
	}

	return $tables;
}

function get_dump_path($arguments)
{
	$path = dirname(dirname(__DIR__)).'/database/legacy/mysql/cobadlieduventure.sql';
	foreach ($arguments as $argument) {
		if (strpos($argument, '--source=') === 0) {
			$source = substr($argument, strlen('--source='));
			if ($source === '') {
				migration_fail('Isi path setelah opsi --source=.');
			}
			$path = $source;
			$is_absolute = ($path[0] === DIRECTORY_SEPARATOR)
				|| (bool) preg_match('/^[A-Za-z]:[\\\\\/]/', $path)
				|| (substr($path, 0, 2) === '\\\\');
			if ( ! $is_absolute) {
				$path = getcwd().DIRECTORY_SEPARATOR.$path;
			}
			break;
		}
	}

	return $path;
}

function quote_identifier($identifier)
{
	return '"'.str_replace('"', '""', $identifier).'"';
}

function connection_value($value)
{
	return "'".str_replace(array('\\', "'"), array('\\\\', "\\'"), $value)."'";
}

function run_migration($tables, $schema)
{
	if ( ! function_exists('pg_connect')) {
		migration_fail('Ekstensi PHP pgsql belum aktif. Aktifkan ekstensi PostgreSQL untuk PHP CLI.');
	}

	$database = getenv('DB_NAME');
	$user = getenv('DB_USER');
	if ($database === FALSE || $database === '' || $user === FALSE || $user === '') {
		migration_fail('Atur DB_NAME dan DB_USER ke database PostgreSQL tujuan sebelum migrasi.');
	}

	$host = getenv('DB_HOST');
	$port = getenv('DB_PORT');
	$password = getenv('DB_PASSWORD');
	$host = ($host !== FALSE && $host !== '') ? $host : '127.0.0.1';
	$port = ($port !== FALSE && $port !== '') ? $port : '5432';
	$password = ($password !== FALSE) ? $password : '';
	if ( ! ctype_digit((string) $port)) {
		migration_fail('DB_PORT harus berupa angka.');
	}

	$connection_string = 'host='.connection_value($host)
		.' port='.connection_value((string) $port)
		.' dbname='.connection_value($database)
		.' user='.connection_value($user)
		.' password='.connection_value($password)
		.' connect_timeout=5';
	$connection = @pg_connect($connection_string, PGSQL_CONNECT_FORCE_NEW);
	if ($connection === FALSE) {
		migration_fail('Koneksi ke PostgreSQL gagal. Periksa DB_HOST, DB_PORT, DB_NAME, DB_USER, dan DB_PASSWORD.');
	}
	if (pg_set_client_encoding($connection, 'UTF8') !== 0) {
		pg_close($connection);
		migration_fail('PostgreSQL menolak encoding UTF8.');
	}

	if ( ! pg_query($connection, 'BEGIN')) {
		pg_close($connection);
		migration_fail('Tidak bisa memulai transaksi PostgreSQL.');
	}

	try {
		$quoted_schema = quote_identifier($schema);
		$schema_result = pg_query_params(
			$connection,
			'SELECT 1 FROM information_schema.schemata WHERE schema_name = $1',
			array($schema)
		);
		if ($schema_result === FALSE || pg_num_rows($schema_result) === 0) {
			migration_fail('Schema PostgreSQL tidak ditemukan. Jalankan migration CI4 terlebih dahulu.');
		}

		foreach ($tables as $table => $table_data) {
			$qualified_table = $quoted_schema.'.'.quote_identifier($table);
			$count_result = pg_query($connection, 'SELECT COUNT(*) FROM '.$qualified_table);
			if ($count_result === FALSE) {
				migration_fail('Tabel tujuan '.$table.' belum ada atau tidak bisa dibaca. Jalankan php spark migrate terlebih dahulu.');
			}
			if ((int) pg_fetch_result($count_result, 0, 0) > 0) {
				migration_fail('Tabel tujuan '.$table.' sudah berisi data. Migrasi dibatalkan agar data yang ada tidak tertimpa.');
			}
		}

		foreach ($tables as $table => $table_data) {
			$qualified_table = $quoted_schema.'.'.quote_identifier($table);
			$quoted_columns = array_map('quote_identifier', $table_data['columns']);
			$placeholders = array();
			for ($i = 1; $i <= count($quoted_columns); $i++) {
				$placeholders[] = '$'.$i;
			}
			$statement_name = 'import_'.$table;
			$insert_sql = 'INSERT INTO '.$qualified_table.' ('.implode(', ', $quoted_columns).') VALUES ('.implode(', ', $placeholders).')';
			if (pg_prepare($connection, $statement_name, $insert_sql) === FALSE) {
				migration_fail('Gagal menyiapkan pemindahan data tabel '.$table.'.');
			}
			foreach ($table_data['rows'] as $row) {
				if (pg_execute($connection, $statement_name, $row) === FALSE) {
					migration_fail('Gagal memindahkan data tabel '.$table.'. Transaksi akan dibatalkan.');
				}
			}
		}

		foreach (array_keys($tables) as $table) {
			$qualified_table = $quoted_schema.'.'.quote_identifier($table);
			$sequence_table = '"'.$schema.'"."'.$table.'"';
			$reset_sql = "SELECT setval(pg_get_serial_sequence('".$sequence_table."', 'id'), GREATEST(COALESCE(MAX(\"id\"), 1), 1), COUNT(*) > 0) FROM ".$qualified_table;
			if ($table !== 'event_join' && $table !== 'tbl_admin' && $table !== 'users') {
				$id_column = substr($table, 4);
				$reset_sql = "SELECT setval(pg_get_serial_sequence('".$sequence_table."', 'id_".$id_column."'), GREATEST(COALESCE(MAX(\"id_".$id_column."\"), 1), 1), COUNT(*) > 0) FROM ".$qualified_table;
			}
			if (pg_query($connection, $reset_sql) === FALSE) {
				migration_fail('Gagal menyelaraskan nomor ID tabel '.$table.'.');
			}
		}

		if (pg_query($connection, 'COMMIT') === FALSE) {
			migration_fail('Gagal menyelesaikan transaksi PostgreSQL.');
		}
	}
	catch (Exception $exception) {
		pg_query($connection, 'ROLLBACK');
		pg_close($connection);
		throw $exception;
	}

	pg_close($connection);
	$total = 0;
	foreach ($tables as $table => $table_data) {
		$count = count($table_data['rows']);
		$total += $count;
		fwrite(STDOUT, $table.': '.$count." baris\n");
	}
	fwrite(STDOUT, 'Migrasi berhasil: '.$total.' baris di '.count($tables).' tabel, schema '.$schema.".\n");
}

try {
	if (in_array('--help', $argv, TRUE)) {
		fwrite(STDOUT, "Gunakan --check untuk validasi dump tanpa koneksi.\nGunakan --source=/path/ke/dump.sql untuk memilih dump MySQL lain.\nAtur DB_HOST, DB_PORT, DB_NAME, DB_USER, DB_PASSWORD, dan DB_SCHEMA sebelum migrasi.\n");
		exit(0);
	}

	$schema = getenv('DB_SCHEMA');
	$schema = ($schema !== FALSE && $schema !== '') ? $schema : 'dlieduventure';
	if ( ! preg_match('/^[a-z_][a-z0-9_]*$/', $schema)) {
		migration_fail('DB_SCHEMA hanya boleh berisi huruf, angka, dan garis bawah, serta tidak diawali angka.');
	}

	$dump_path = get_dump_path($argv);
	$tables = load_mysql_dump($dump_path);

	if (in_array('--check', $argv, TRUE)) {
		$total = 0;
		foreach ($tables as $table => $table_data) {
			$count = count($table_data['rows']);
			$total += $count;
			fwrite(STDOUT, $table.': '.$count." baris siap dipindahkan\n");
		}
		fwrite(STDOUT, 'Pemeriksaan lolos: '.$total.' baris, '.count($tables).' tabel, schema tujuan '.$schema.". Tidak ada koneksi atau perubahan database pada mode --check.\n");
		exit(0);
	}

	run_migration($tables, $schema);
}
catch (Exception $exception) {
	fwrite(STDERR, 'Migrasi gagal: '.$exception->getMessage()."\n");
	exit(1);
}
