<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContentModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Content extends BaseController
{
    public function index(string $type)
    {
        if (! $this->requireAdmin()) {
            return redirect()->to(base_url('admin/login'));
        }

        $model = new ContentModel();
        $definition = $model->definition($type);
        $content = view('admin/content_list', [
            'type' => $type,
            'definition' => $definition,
            'rows' => $model->all($type, 500),
        ]);
        return view('layouts/site', ['title' => 'Kelola ' . ucfirst($type), 'content' => $content]);
    }

    public function createForm(string $type)
    {
        if (! $this->requireAdmin()) {
            return redirect()->to(base_url('admin/login'));
        }
        return $this->renderForm($type, null);
    }

    public function create(string $type)
    {
        if (! $this->requireAdmin()) {
            return redirect()->to(base_url('admin/login'));
        }
        $model = new ContentModel();
        if (! $this->validate($this->rules($model->definition($type)['title']))) {
            return redirect()->back()->withInput()->with('formErrors', $this->validator->getErrors());
        }
        $input = $this->prepareInput($type);
        if ($input === null) {
            return redirect()->back()->withInput()->with('formErrors', $this->validator->getErrors());
        }
        if (! $model->save($type, $input, (int) $this->session->get('admin_id'))) {
            return redirect()->back()->withInput()->with('formError', 'Konten tidak dapat disimpan.');
        }
        return redirect()->to(base_url('admin/content/' . $type))->with('adminMessage', 'Konten berhasil ditambahkan.');
    }

    public function edit(string $type, int $id)
    {
        if (! $this->requireAdmin()) {
            return redirect()->to(base_url('admin/login'));
        }
        $model = new ContentModel();
        $row = $model->find($type, $id);
        if ($row === null) {
            throw PageNotFoundException::forPageNotFound();
        }
        return $this->renderForm($type, $row);
    }

    public function update(string $type, int $id)
    {
        if (! $this->requireAdmin()) {
            return redirect()->to(base_url('admin/login'));
        }
        $model = new ContentModel();
        if ($model->find($type, $id) === null) {
            throw PageNotFoundException::forPageNotFound();
        }
        if (! $this->validate($this->rules($model->definition($type)['title']))) {
            return redirect()->back()->withInput()->with('formErrors', $this->validator->getErrors());
        }
        $input = $this->prepareInput($type);
        if ($input === null) {
            return redirect()->back()->withInput()->with('formErrors', $this->validator->getErrors());
        }
        if (! $model->save($type, $input, (int) $this->session->get('admin_id'), $id)) {
            return redirect()->back()->withInput()->with('formError', 'Perubahan tidak dapat disimpan.');
        }
        return redirect()->to(base_url('admin/content/' . $type))->with('adminMessage', 'Konten berhasil diperbarui.');
    }

    public function delete(string $type, int $id)
    {
        if (! $this->requireAdmin()) {
            return redirect()->to(base_url('admin/login'));
        }
        (new ContentModel())->delete($type, $id);
        return redirect()->to(base_url('admin/content/' . $type))->with('adminMessage', 'Konten dihapus.');
    }

    private function renderForm(string $type, ?object $row)
    {
        $model = new ContentModel();
        $definition = $model->definition($type);
        $content = view('admin/content_form', [
            'type' => $type,
            'row' => $row,
            'fields' => $model->fields($type),
            'definition' => $definition,
        ]);
        return view('layouts/site', [
            'title' => ($row === null ? 'Tambah ' : 'Edit ') . ucfirst($type),
            'content' => $content,
        ]);
    }

    private function requireAdmin(): bool
    {
        return (int) $this->session->get('admin_id') > 0;
    }

    /** @return array<string, mixed>|null */
    private function prepareInput(string $type): ?array
    {
        $input = $this->request->getPost();
        $image = $this->request->getFile('image');
        if ($image === null || $image->getError() === UPLOAD_ERR_NO_FILE) {
            return $input;
        }

        if (! $this->validate([
            'image' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpeg,image/png,image/gif,image/webp]|max_size[image,5120]',
        ])) {
            return null;
        }

        $directory = FCPATH . 'assets/images/' . $type;
        if (! is_dir($directory) && ! mkdir($directory, 0755, true) && ! is_dir($directory)) {
            $this->validator->setError('image', 'Folder gambar tidak dapat dibuat.');
            return null;
        }

        $extensions = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
        ];
        $extension = $extensions[$image->getMimeType()] ?? null;
        if ($extension === null) {
            $this->validator->setError('image', 'Format gambar tidak didukung.');
            return null;
        }
        $filename = bin2hex(random_bytes(16)) . '.' . $extension;
        if (! $image->move($directory, $filename)) {
            $this->validator->setError('image', 'Gambar tidak dapat disimpan.');
            return null;
        }
        $photoName = pathinfo($filename, PATHINFO_FILENAME);
        if (! copy($directory . '/' . $filename, $directory . '/' . $photoName . '_thumb.' . $extension)) {
            unlink($directory . '/' . $filename);
            $this->validator->setError('image', 'Thumbnail gambar tidak dapat disimpan.');
            return null;
        }

        $input['foto'] = $photoName;
        $input['foto_type'] = '.' . $extension;
        return $input;
    }

    /** @return array<string, string> */
    private function rules(string $titleField): array
    {
        return [$titleField => 'required|min_length[2]|max_length[100]'];
    }
}
