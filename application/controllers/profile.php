<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	function __construct(){
     parent:: __construct();


     $this->load->model('M_event');
     $this->load->model('M_member');

     if($this->session->userdata('status') != "login"){
        redirect(base_url("user/login"));
    }
}  

public function index(){
   $data['title'] = "member";
   $data['prof'] = $this->M_member->get_id();

   $this->load->view('member/dashboard', $data);

}

public function detail(){

    $this->data['profil'] = $this->M_member->get_id();

    $this->load->view('member/profile_detail', $this->data);

}

public function update($id)
{
    $this->data['profil'] = $this->M_member->get_id();
    $row = $this->M_member->get_by_id($id);
    $this->data['produk'] = $this->M_member->get_by_id($id);

    if ($row)
    {
        $this->data['title']          = 'Update Profile';
        $this->data['action']         = site_url('profile/update_action');
        $this->data['button_submit']  = 'Update';
        $this->data['button_reset']   = 'Reset';

        $this->data['id'] = array(
          'name'  => 'id',
          'id'    => 'id',
          'type'=> 'hidden',
      );

        $this->data['name'] = array(
          'name'  => 'name',
          'id'    => 'name',
          'class' => 'form-control',
      );

        $this->data['email'] = array(
          'name'  => 'email',
          'id'    => 'email',
          'class' => 'form-control',
      );

        $this->data['password'] = array(
          'name'  => 'password',
          'id'    => 'password',
          'class' => 'form-control',
      );

        $this->data['phone'] = array(
          'name'  => 'phone',
          'id'    => 'phone',
          'class' => 'form-control',
      );

        $this->data['address'] = array(
          'name'  => 'address',
          'id'    => 'address',
          'class' => 'form-control',
      );

        $this->data['bio'] = array(
          'name'  => 'bio',
          'id'    => 'bio',
          'class' => 'form-control',
      );

        $this->data['keywords'] = array(
          'name'  => 'keywords',
          'id'    => 'keywords',
          'class' => 'form-control',
      );

        $this->load->view('member/profile_update',$this->data);

    }
    else
    {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
        redirect(site_url('profile'));
    }
}

public function update_action()
{
  $this->load->helper('clean');
  $this->_rules();

  if ($this->form_validation->run() == FALSE)
  {
    $this->update($this->input->post('id'));
}
else
{
    /* Jika file upload diisi */
    if($_FILES['foto']['error'] <> 4)
    {
        $delete = $this->M_member->del_by_id($this->input->post('id'));

          // menyimpan lokasi gambar dalam variable
        $dir = "assets/images/member/".$delete->foto.$delete->foto_type;
        $dir_thumb = "assets/images/member/".$delete->foto.'_thumb'.$delete->foto_type;

          // Hapus foto dan thumbnail
        unlink($dir);
        unlink($dir_thumb);

        $nmfile = strtolower(url_title($this->input->post('name'))).date('YmdHis');

          //load uploading file library
        $config['upload_path']      = './assets/images/member/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
        $config['max_size']         = '2048'; // 2 MB
        $config['file_name']        = $nmfile; //nama yang terupload nantinya

        $this->load->library('upload', $config);

          // Jika file gagal diupload -> kembali ke form update
        if (!$this->upload->do_upload('foto'))
        {
            //file gagal diupload -> kembali ke form tambah
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert">'.$error['error'].'</div>');

            $this->update($this->input->post('id'));
        }
            // Jika file berhasil diupload -> lanjutkan ke query INSERT
        else
        {
            $foto = $this->upload->data();
              // library yang disediakan codeigniter
            $thumbnail                = $config['file_name'];
              //nama yang terupload nantinya
            $config['image_library']  = 'gd2';
              // gambar yang akan dibuat thumbnail
            $config['source_image']   = './assets/images/member/'.$foto['file_name'].'';
              // membuat thumbnail
            $config['create_thumb']   = TRUE;
              // rasio resolusi
            $config['maintain_ratio'] = FALSE;
              // lebar
            $config['width']          = 250;
              // tinggi
            $config['height']         = 250;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $data = array(
              'name'    => $this->input->post('name'),
              'email'    => $this->input->post('email'),
              'password'    => $this->input->post('password'),
              'phone'    => $this->input->post('phone'),
              'address'    => $this->input->post('address'),
              'bio'    => $this->input->post('bio'),

              'foto'            => $nmfile,
              'foto_type'       => $foto['file_ext']
          );

            $this->M_member->update($this->input->post('id'), $data);
            $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
              <i class="ace-icon fa fa-bullhorn green"></i>Edit Data Berhasil</div>');
            redirect(site_url('profile/detail'));
        }
    }
          // Jika file upload kosong
    else
    {
      $data = array(
        'name'    => $this->input->post('name'),
        'email'    => $this->input->post('email'),
        'password'    => $this->input->post('password'),
        'phone'    => $this->input->post('phone'),
        'address'    => $this->input->post('address'),
        'bio'    => $this->input->post('bio')
    );

      $this->M_member->update($this->input->post('id'), $data);
      $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i>Edit Data Berhasil</div>');
      redirect(site_url('profile/detail'));
  }
}
}

public function _rules()
    {
      $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      $this->form_validation->set_rules('phone', 'phone', 'trim|required');
      $this->form_validation->set_rules('address', 'address', 'trim|required');
      $this->form_validation->set_rules('bio', 'bio', 'trim|required');

    // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id', 'id', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert" align="left">', '</div>');
    }


public function cekevent(){

    $this->data['profil'] = $this->M_member->get_id();

    $this->data['event'] = $this->M_event->get_all_cek_gaduh();

    $this->load->view('member/join_event', $this->data);
}
}
