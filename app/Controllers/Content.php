<?php

namespace App\Controllers;

use App\Models\ContentModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Content extends BaseController
{
    public function index(string $type): string
    {
        $model = new ContentModel();
        $definition = $model->definition($type);
        $rows = $model->all($type, 100);
        $body = view('legacy/front/' . $definition['view'], [$type => $rows]);

        return view('layouts/site', ['title' => ucfirst($type) . ' | DLI Edu Venture', 'content' => $body]);
    }

    public function show(string $type, int $id)
    {
        $model = new ContentModel();
        $definition = $model->definition($type);
        if ($type === 'gallery') {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($type === 'event' && ! $this->session->has('member_id')) {
            return redirect()->to(base_url('user/login'))->with('redirectAfterLogin', current_url());
        }

        $row = $model->find($type, $id);
        if ($row === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $body = view('legacy/front/' . $definition['view'] . '_detail', [$type => [$row]]);
        return view('layouts/site', ['title' => $row->{$definition['title']} . ' | DLI Edu Venture', 'content' => $body]);
    }
}
