<?php

namespace App\Controllers;

class Events extends BaseController
{
    public function join(int $eventId)
    {
        $memberId = (int) $this->session->get('member_id');
        if ($memberId < 1) {
            return redirect()->to(base_url('user/login'))->with('redirectAfterLogin', base_url('event/selanjutnya/' . $eventId));
        }

        $db = db_connect();
        $event = $db->table('tbl_event')->where('id_event', $eventId)->get(1)->getRowArray();
        $user = $db->table('users')->where('id', $memberId)->get(1)->getRowArray();
        if ($event === null || $user === null) {
            return redirect()->to(base_url('event'))->with('eventMessage', 'Acara tidak ditemukan.');
        }

        $alreadyJoined = $db->table('event_join')
            ->where('member', $user['email'])
            ->where('id_event', (string) $eventId)
            ->countAllResults() > 0;
        if (! $alreadyJoined) {
            $db->table('event_join')->insert([
                'member' => $user['email'],
                'id_event' => (string) $eventId,
                'judul_event' => $event['judul_event'],
                'jadwal_tgl' => (string) $event['jadwal_tgl'],
                'jadwal_time' => (string) $event['jadwal_time'],
            ]);
        }

        return redirect()->to(base_url('event/selanjutnya/' . $eventId))
            ->with('eventMessage', $alreadyJoined ? 'Anda sudah terdaftar di acara ini.' : 'Pendaftaran acara berhasil.');
    }
}
