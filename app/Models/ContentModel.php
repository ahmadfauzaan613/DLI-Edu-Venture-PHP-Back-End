<?php

namespace App\Models;

use InvalidArgumentException;

class ContentModel
{
    protected $db;

    /** @var array<string, array{table:string,id:string,title:string,view:string,hasBody:bool}> */
    public const TYPES = [
        'program' => ['table' => 'tbl_program', 'id' => 'id_program', 'title' => 'judul_program', 'view' => 'program', 'hasBody' => true],
        'startup' => ['table' => 'tbl_startup', 'id' => 'id_startup', 'title' => 'judul_startup', 'view' => 'startup', 'hasBody' => true],
        'news' => ['table' => 'tbl_news', 'id' => 'id_news', 'title' => 'judul_news', 'view' => 'news', 'hasBody' => true],
        'event' => ['table' => 'tbl_event', 'id' => 'id_event', 'title' => 'judul_event', 'view' => 'event', 'hasBody' => true],
        'blog' => ['table' => 'tbl_blog', 'id' => 'id_blog', 'title' => 'judul_blog', 'view' => 'blog', 'hasBody' => true],
        'gallery' => ['table' => 'tbl_gallery', 'id' => 'id_gallery', 'title' => 'judul_gallery', 'view' => 'gallery', 'hasBody' => false],
    ];

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function definition(string $type): array
    {
        if (! isset(self::TYPES[$type])) {
            throw new InvalidArgumentException('Jenis konten tidak dikenal.');
        }

        return self::TYPES[$type];
    }

    /** @return list<object> */
    public function all(string $type, int $limit = 100): array
    {
        $definition = $this->definition($type);

        return $this->db->table($definition['table'])
            ->orderBy($definition['id'], 'DESC')
            ->get(max(1, min($limit, 500)))
            ->getResult();
    }

    public function find(string $type, int $id): ?object
    {
        $definition = $this->definition($type);

        return $this->db->table($definition['table'])
            ->where($definition['id'], $id)
            ->get(1)
            ->getRow();
    }

    /** @return list<object> */
    public function latest(string $type, int $limit = 4): array
    {
        return $this->all($type, $limit);
    }

    /** @return list<object> */
    public function search(string $type, string $keyword, int $limit = 20): array
    {
        $definition = $this->definition($type);
        $builder = $this->db->table($definition['table'])
            ->groupStart()
            ->like($definition['title'], $keyword);

        if ($definition['hasBody']) {
            $builder->orLike('isi', $keyword);
        }

        return $builder->groupEnd()
            ->orderBy($definition['id'], 'DESC')
            ->get(max(1, min($limit, 100)))
            ->getResult();
    }

    /** @return array<string, mixed> */
    public function fields(string $type): array
    {
        $definition = $this->definition($type);
        $fields = [
            $definition['title'] => 'Judul',
            'foto' => 'Nama file gambar (tanpa ekstensi)',
            'foto_type' => 'Ekstensi gambar, misalnya .png',
        ];

        if ($type !== 'gallery') {
            $fields['isi'] = 'Isi';
        }
        if ($type === 'event') {
            $fields['jadwal_tgl'] = 'Tanggal acara';
            $fields['jadwal_time'] = 'Waktu acara';
        }
        if ($type === 'startup') {
            foreach (['spesifikasi' => 'Spesifikasi', 'keunggulan' => 'Keunggulan', 'pencapaian' => 'Pencapaian', 'kategori' => 'Kategori', 'teknologi' => 'Teknologi', 'web' => 'Website', 'fb' => 'Facebook', 'ig' => 'Instagram'] as $key => $label) {
                $fields[$key] = $label;
            }
        }

        return $fields;
    }

    /** @param array<string, mixed> $input */
    public function save(string $type, array $input, int $adminId, ?int $id = null): bool
    {
        $definition = $this->definition($type);
        $titleField = $definition['title'];
        $title = trim((string) ($input[$titleField] ?? ''));
        if ($title === '') {
            return false;
        }

        $data = [];
        foreach ($this->fields($type) as $field => $_label) {
            $data[$field] = trim((string) ($input[$field] ?? ''));
        }
        $data[$titleField] = mb_substr($title, 0, 100);
        $slug = mb_strtolower(trim((string) preg_replace('/[^\pL\pN]+/u', '-', $title), '-'));
        $data['slug_' . substr($titleField, strlen('judul_'))] = mb_substr($slug, 0, 100);
        $data['updater'] = $adminId;

        if ($type === 'event') {
            $data['jadwal_tgl'] = $input['jadwal_tgl'] ?: date('Y-m-d');
            $data['jadwal_time'] = $input['jadwal_time'] ?: '00:00:00';
        }
        if ($id === null) {
            $data['uploader'] = $adminId;
            $data['created'] = date('Y-m-d H:i:s');
            $data['modified'] = null;
            return $this->db->table($definition['table'])->insert($data);
        }

        return $this->db->table($definition['table'])
            ->where($definition['id'], $id)
            ->update($data);
    }

    public function delete(string $type, int $id): bool
    {
        $definition = $this->definition($type);

        return $this->db->table($definition['table'])
            ->where($definition['id'], $id)
            ->delete();
    }
}
