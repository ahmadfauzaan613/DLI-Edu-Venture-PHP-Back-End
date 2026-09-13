<?php

namespace App\Controllers;

use App\Models\ContentModel;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->renderHome();
    }

    public function search(): string
    {
        $keyword = trim((string) $this->request->getPost('keyword'));
        return $this->renderHome($keyword);
    }

    public function contact()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[254]',
            'subject' => 'required|min_length[3]|max_length[150]',
            'message' => 'required|min_length[5]|max_length[5000]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->to(base_url('/#contact'))->with('contactErrors', $this->validator->getErrors());
        }

        $sender = env('MAIL_FROM', '');
        $recipient = env('MAIL_TO', '');
        if ($sender === '' || $recipient === '') {
            return redirect()->to(base_url('/#contact'))->with('contactMessage', 'Form kontak belum dihubungkan ke email. Silakan hubungi dli@um.ac.id.');
        }

        $email = service('email');
        $email->setFrom($sender, 'DLI Edu Venture website');
        $email->setTo($recipient);
        $email->setReplyTo((string) $this->request->getPost('email'), (string) $this->request->getPost('name'));
        $email->setSubject((string) $this->request->getPost('subject'));
        $email->setMessage((string) $this->request->getPost('message'));

        $message = $email->send()
            ? 'Pesan berhasil dikirim.'
            : 'Pesan belum dapat dikirim. Silakan hubungi dli@um.ac.id.';
        return redirect()->to(base_url('/#contact'))->with('contactMessage', $message);
    }

    private function renderHome(string $keyword = ''): string
    {
        $contentModel = new ContentModel();
        $data = [];
        foreach (ContentModel::TYPES as $type => $_definition) {
            $data[$type] = $keyword === ''
                ? $contentModel->latest($type, 4)
                : $contentModel->search($type, $keyword, 20);
        }

        $results = [];
        if ($keyword !== '') {
            foreach (ContentModel::TYPES as $type => $definition) {
                foreach ($data[$type] as $row) {
                    $results[] = [
                        'type' => ucfirst($type),
                        'title' => $row->{$definition['title']},
                        'url' => base_url($type . '/selanjutnya/' . $row->{$definition['id']}),
                    ];
                }
            }
        }

        $body = view('legacy/front/home', $data + [
            'searchKeyword' => $keyword,
            'searchResults' => $results,
        ]);

        return view('layouts/site', [
            'title' => 'DLI Edu Venture',
            'content' => $body,
        ]);
    }
}
