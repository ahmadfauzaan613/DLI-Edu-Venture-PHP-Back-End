<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        $memberId = (int) $this->session->get('member_id');
        if ($memberId < 1) {
            return view('layouts/site', [
                'title' => 'Profil | DLI Edu Venture',
                'content' => view('profile/guest'),
            ]);
        }

        $user = db_connect()->table('users')->where('id', $memberId)->get(1)->getRowArray();
        if ($user === null) {
            $this->session->destroy();
            return redirect()->to(base_url('user/login'));
        }

        return view('layouts/site', [
            'title' => 'Profil | DLI Edu Venture',
            'content' => view('profile/index', ['user' => $user]),
        ]);
    }

    public function update()
    {
        $memberId = (int) $this->session->get('member_id');
        if ($memberId < 1) {
            return redirect()->to(base_url('user/login'));
        }
        if (! $this->validate([
            'name' => 'required|min_length[2]|max_length[100]',
            'phone' => 'permit_empty|max_length[30]',
            'address' => 'permit_empty|max_length[2000]',
            'bio' => 'permit_empty|max_length[2000]',
        ])) {
            return redirect()->to(base_url('profile'))->withInput()->with('formErrors', $this->validator->getErrors());
        }

        db_connect()->table('users')->where('id', $memberId)->update([
            'name' => trim((string) $this->request->getPost('name')),
            'phone' => trim((string) $this->request->getPost('phone')) ?: null,
            'address' => trim((string) $this->request->getPost('address')) ?: null,
            'bio' => trim((string) $this->request->getPost('bio')) ?: null,
        ]);
        return redirect()->to(base_url('profile'))->with('profileSuccess', 'Profil tersimpan.');
    }
}
