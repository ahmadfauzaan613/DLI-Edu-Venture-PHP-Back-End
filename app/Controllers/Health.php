<?php

namespace App\Controllers;

use Throwable;

class Health extends BaseController
{
    public function index()
    {
        try {
            db_connect()->query('SELECT 1');
            return $this->response->setJSON(['status' => 'ok', 'database' => 'connected']);
        } catch (Throwable) {
            return $this->response->setStatusCode(503)->setJSON(['status' => 'error', 'database' => 'unavailable']);
        }
    }
}
