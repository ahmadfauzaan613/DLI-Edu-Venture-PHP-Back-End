<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Event_join extends CI_Controller 
{   function __construct()   {
    parent::__construct();     
    $this->load->model('M_event');

    $this->data['module'] = 'Event';

}

public function index()
{


}


public function update($id)
{
    $row = $this->M_event->get_by_id($id);
    $this->data['produk'] = $this->M_event->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Event Join';
      $this->data['action']         = site_url('event_join/update_action');
      $this->data['button_submit']  = 'Register Now';
      $this->data['content'] = 'front/event_join';
      /*$this->data['button_reset']   = 'Reset';*/

      $this->data['id_event'] = array(
        'name'  => 'id_event',
        'id'    => 'id_event',
        'type'  => 'hidden',
    );

      $this->data['judul_event'] = array(
        'name'  => 'judul_event',
        'id'    => 'judul_event',
        'readonly' => 'readonly',
        'class' => 'form-control',
    );

      $this->data['jadwal_tgl'] = array(
        'name'  => 'jadwal_tgl',
        'id'    => 'jadwal_tgl',
        'readonly' => 'readonly',
        'class' => 'form-control',
    );

      $this->data['jadwal_time'] = array(
        'name'  => 'jadwal_time',
        'id'    => 'jadwal_time',
        'readonly' => 'readonly',
        'class' => 'form-control',
    );

      $this->data['keywords'] = array(
        'name'  => 'keywords',
        'id'    => 'keywords',
        'class' => 'form-control',
    );

      $this->load->view('template/front/view_index', $this->data);

  }
  else
  {
    $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
    redirect(site_url('event_join'));
}
}

public function update_action()
{
    $this->load->helper('clean');
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->update($this->input->post('id_event'));
  }
  else
  {
   $data = array(
      'id_event'        => $this->input->post('id_event'),
      'judul_event'        => $this->input->post('judul_event'),
      'jadwal_tgl'        => $this->input->post('jadwal_tgl'),
      'jadwal_time'        => $this->input->post('jadwal_time'),
      'member'          => $this->session->userdata('email')
  );

   $this->M_event->insert_order($data);

   redirect(site_url('profile/cekevent'));
}
}


public function _rules()
{
    $this->form_validation->set_rules('judul_event', 'Judul Event', 'required|trim');
    $this->form_validation->set_rules('jadwal_tgl', 'Tanggal', 'trim|required');

    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_event', 'id_event', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert" align="left">', '</div>');
}

}
