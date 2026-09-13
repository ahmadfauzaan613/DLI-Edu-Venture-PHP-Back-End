<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContentModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (! $this->session->get('admin_id')) {
            return redirect()->to(base_url('admin/login'));
        }

        $counts = [];
        $db = db_connect();
        foreach (ContentModel::TYPES as $type => $definition) {
            $counts[$type] = $db->table($definition['table'])->countAllResults();
        }

        $content = view('admin/dashboard', ['counts' => $counts]);
        return view('layouts/site', ['title' => 'Admin | DLI Edu Venture', 'content' => $content]);
    }
}
