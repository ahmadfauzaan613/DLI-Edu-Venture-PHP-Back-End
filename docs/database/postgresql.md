# PostgreSQL setup and legacy data import

Aplikasi memakai schema PostgreSQL `dlieduventure`. Atur nilai koneksi di `.env`
root project (file ini diabaikan Git agar password tidak tersimpan di repository):

- `DB_HOST` — default `127.0.0.1`
- `DB_PORT` — default `5432`
- `DB_NAME` — nama database PostgreSQL yang berisi schema tersebut (default `postgres`)
- `DB_USER` — default `postgres`
- `DB_PASSWORD` — default kosong
- `DB_SCHEMA` — default `dlieduventure`
- `DLIEDUVENTURE_BASE_URL` — opsional; jika kosong, CodeIgniter mendeteksi URL aplikasi

Form kontak baru bisa mengirim email jika `MAIL_FROM`, `MAIL_TO`, `SMTP_HOST`,
`SMTP_USER`, dan `SMTP_PASSWORD` disetel di `.env`. Nilai email lama yang pernah
ditanam di source CI3 tidak lagi digunakan.

Migrasi memakai CodeIgniter 4 migrations untuk membuat tabel, lalu import script
memindahkan isi dump. Pastikan schema tujuan kosong. Dump lama ada di
`database/legacy/mysql/cobadlieduventure.sql`; gunakan `--source=/path/ke/dump.sql`
untuk dump MySQL yang lebih baru. Import menolak tabel yang sudah berisi data.

Salin `.env.example` menjadi `.env`, isi nama database/user/password, lalu buat
encryption key dengan `php spark key:generate`. Pastikan user PostgreSQL punya
hak `USAGE` dan `CREATE` pada schema `dlieduventure`. Kemudian jalankan:

```sh
php spark migrate
php database/scripts/import_mysql_dump.php --check
php database/scripts/import_mysql_dump.php
```

File dump bawaan adalah snapshot bertanggal Agustus 2020. Untuk memakai dump
yang lebih baru, tunjukkan path file tersebut secara eksplisit:

```sh
php database/scripts/import_mysql_dump.php --check --source=/path/ke/dump.sql
php database/scripts/import_mysql_dump.php --source=/path/ke/dump.sql
```

Jalankan web server dengan document root `public/` (minimal PHP 8.2; project ini
diuji dengan PHP 8.3). Ekstensi `intl`, `mbstring`, dan `pgsql`/`pdo_pgsql`
diperlukan. `.env` dimuat otomatis oleh CodeIgniter 4 dan tidak boleh di-commit.
