<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    public function loginForm(): string
    {
        return $this->renderForm('login');
    }

    public function registerForm(): string
    {
        return $this->renderForm('register');
    }

    public function login()
    {
        if (! $this->validate(['email' => 'required|valid_email', 'password' => 'required'])) {
            return redirect()->back()->withInput()->with('formErrors', $this->validator->getErrors());
        }

        $email = mb_strtolower(trim((string) $this->request->getPost('email')));
        $password = (string) $this->request->getPost('password');
        $db = db_connect();
        $user = $db->table('users')->where('email', $email)->get(1)->getRowArray();
        if ($user === null || ! $this->verifyAndUpgradePassword($db, $user, $password, 'users')) {
            return redirect()->back()->withInput()->with('formError', 'Email atau kata sandi tidak cocok.');
        }
        if ((int) ($user['active'] ?? 0) === 0) {
            return redirect()->back()->withInput()->with('formError', 'Akun belum aktif. Hubungi pengelola untuk bantuan.');
        }

        $this->session->regenerate(true);
        $this->session->set([
            'member_id' => (int) $user['id'],
            'member_email' => $user['email'],
            'email' => $user['email'],
            'status' => 'login',
        ]);
        $redirectTarget = $this->session->get('redirectAfterLogin');
        $this->session->remove('redirectAfterLogin');
        if (is_string($redirectTarget) && $redirectTarget !== '') {
            return redirect()->to($redirectTarget);
        }
        return redirect()->to(base_url('profile'));
    }

    public function register()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'password' => 'required|min_length[10]|max_length[72]',
            'password_confirm' => 'required|matches[password]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('formErrors', $this->validator->getErrors());
        }

        $db = db_connect();
        $email = mb_strtolower(trim((string) $this->request->getPost('email')));
        if ($db->table('users')->where('email', $email)->countAllResults() > 0) {
            return redirect()->back()->withInput()->with('formError', 'Email tersebut sudah terdaftar.');
        }

        $db->table('users')->insert([
            'name' => trim((string) $this->request->getPost('name')),
            'email' => $email,
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
            'foto' => '',
            'foto_type' => '',
            'code' => bin2hex(random_bytes(16)),
            'active' => 1,
            'phone' => null,
            'address' => null,
            'bio' => null,
            'reset_password' => '',
            'usertype' => 2,
            'created' => date('Y-m-d H:i:s'),
            'modified' => null,
        ]);

        return redirect()->to(base_url('user/login'))->with('formSuccess', 'Akun berhasil dibuat. Silakan masuk.');
    }

    public function logout(): RedirectResponse
    {
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }

    private function renderForm(string $mode): string
    {
        $title = $mode === 'login' ? 'Masuk sebagai anggota' : 'Buat akun anggota';
        $content = view('auth/form', ['mode' => $mode, 'title' => $title]);
        return view('layouts/site', ['title' => $title . ' | DLI Edu Venture', 'content' => $content]);
    }

    /** @param array<string, mixed> $record */
    private function verifyAndUpgradePassword($db, array $record, string $password, string $table): bool
    {
        $stored = (string) ($record['password'] ?? '');
        $valid = password_verify($password, $stored)
            || hash_equals($stored, $password)
            || (preg_match('/^[a-f0-9]{32}$/i', $stored) === 1 && hash_equals(strtolower($stored), md5($password)));

        if ($valid && ! password_get_info($stored)['algo']) {
            $idField = $table === 'users' ? 'id' : 'id';
            $db->table($table)->where($idField, $record[$idField])->update([
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        }

        return $valid;
    }
}
