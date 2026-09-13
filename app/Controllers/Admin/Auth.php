<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function loginForm(): string
    {
        return view('layouts/site', [
            'title' => 'Admin login | DLI Edu Venture',
            'content' => view('admin/login'),
        ]);
    }

    public function login()
    {
        if (! $this->validate(['email' => 'required|valid_email', 'password' => 'required'])) {
            return redirect()->back()->withInput()->with('formErrors', $this->validator->getErrors());
        }

        $db = db_connect();
        $email = mb_strtolower(trim((string) $this->request->getPost('email')));
        $password = (string) $this->request->getPost('password');
        $admin = $db->table('tbl_admin')->where('email', $email)->get(1)->getRowArray();
        if ($admin === null || ! $this->verifyPassword((string) $admin['password'], $password)) {
            return redirect()->back()->withInput()->with('formError', 'Email atau kata sandi admin tidak cocok.');
        }

        if (! password_get_info((string) $admin['password'])['algo']) {
            $db->table('tbl_admin')->where('id', $admin['id'])->update([
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        }

        $this->session->regenerate(true);
        $this->session->set([
            'admin_id' => (int) $admin['id'],
            'admin_email' => $admin['email'],
        ]);
        return redirect()->to(base_url('admin/dashboard'));
    }

    public function logout()
    {
        $this->session->remove(['admin_id', 'admin_email']);
        return redirect()->to(base_url('admin/login'));
    }

    private function verifyPassword(string $stored, string $password): bool
    {
        return password_verify($password, $stored)
            || (preg_match('/^[a-f0-9]{32}$/i', $stored) === 1 && hash_equals(strtolower($stored), md5($password)))
            || hash_equals($stored, $password);
    }
}
