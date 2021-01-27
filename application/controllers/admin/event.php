<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class event extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_event');

    $this->data['titleAll'] = "event";

    $this->data['module'] = 'event';

    if($this->session->userdata('status') != "login"){
      redirect(base_url("admin/login"));
    }

  }

  public function index()
  {
    $this->data['title'] = "Data event";
    $this->data['produk_data'] = $this->M_event->get_all();

    $this->data['content'] = 'admin/event/event_tampil';

    $this->load->view('template/back/view_index_sidebar',$this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah event Baru';
    $this->data['action']         = site_url('admin/event/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['judul_event'] = array(
      'name'  => 'judul_event',
      'id'    => 'judul_event',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('judul_event'),
    );

    $this->data['isi'] = array(
      'name'  => 'isi',
      'id'    => 'isi',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('isi'),
    );

    $this->data['jadwal_tgl'] = array(
      'name'  => 'jadwal_tgl',
      'type'  => 'date',
      'id'    => 'jadwal_tgl',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('jadwal_tgl'),
    );

    $this->data['jadwal_time'] = array(
      'name'  => 'jadwal_time',
      'type'  => 'time',
      'id'    => 'jadwal_time',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('jadwal_time'),
    );


    $this->data['content'] = 'admin/event/event_tambah';

    $this->load->view('template/back/view_index_add_update',$this->data);

  }

  public function create_action()
  {
    $this->load->helper('clean');
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->create();
    }
      else
      {
        /* 4 adalah menyatakan tidak ada file yang diupload*/
        if ($_FILES['foto']['error'] <> 4)
        {
          $nmfile = strtolower(url_title($this->input->post('judul_event'))).date('YmdHis');

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/images/event/';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);

          if (!$this->upload->do_upload('foto'))
          {
            //file gagal diupload -> kembali ke form tambah
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert">'.$error['error'].'</div>');

            $this->create();
          }
            //file berhasil diupload -> lanjutkan ke query INSERT
            else
            {
              $foto = $this->upload->data();
              $thumbnail                = $config['file_name'];
              // library yang disediakan codeigniter
              $config['image_library']  = 'gd2';
              // gambar yang akan dibuat thumbnail
              $config['source_image']   = './assets/images/event/'.$foto['file_name'].'';
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
                'judul_event'      => $this->input->post('judul_event'),
                'slug_event'       => strtolower(url_title($this->input->post('judul_event'))),
                'isi'             => $this->input->post('isi', FALSE),
                'foto'            => $nmfile,
                'foto_type'       => $foto['file_ext'],
                'jadwal_tgl'      => $this->input->post('jadwal_tgl'),
                'jadwal_time'      => $this->input->post('jadwal_time')
              );

              // eksekusi query INSERT
              $this->M_event->insert($data);
              // set pesan data berhasil dibuat
              $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i>Data berhasil dibuat</div>');
              redirect(site_url('admin/event'));
            }
        }
        else // Jika file upload kosong
        {
          $data = array(
            'judul_event'    => $this->input->post('judul_event'),
            'slug_event'     => strtolower(url_title($this->input->post('judul_event'))),
            'isi'       => $this->input->post('isi', FALSE),
            'jadwal_tgl'      => $this->input->post('jadwal_tgl'),
            'jadwal_time'      => $this->input->post('jadwal_time')
          );

          // eksekusi query INSERT
          $this->M_event->insert($data);
          // set pesan data berhasil dibuat
          $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i>Data berhasil dibuat</div>');
          redirect(site_url('admin/event'));
        }
      }
  }

  public function update($id)
  {
    $row = $this->M_event->get_by_id($id);
    $this->data['produk'] = $this->M_event->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update event';
      $this->data['action']         = site_url('admin/event/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_event'] = array(
        'name'  => 'id_event',
        'id'    => 'id_event',
        'type'=> 'hidden',
      );

      $this->data['judul_event'] = array(
        'name'  => 'judul_event',
        'id'    => 'judul_event',
        'class' => 'form-control',
      );

      $this->data['isi'] = array(
        'name'  => 'isi',
        'id'    => 'isi',
        'class' => 'form-control',
      );


      $this->data['jadwal_tgl'] = array(
        'name'  => 'jadwal_tgl',
        'type'  => 'date',
        'id'    => 'jadwal_tgl',
        'class' => 'form-control',
      );

      $this->data['jadwal_time'] = array(
        'name'  => 'jadwal_time',
        'type'  => 'time',
        'id'    => 'jadwal_time',
        'class' => 'form-control',
      );

      $this->data['keywords'] = array(
        'name'  => 'keywords',
        'id'    => 'keywords',
        'class' => 'form-control',
      );


    $this->data['content'] = 'admin/event/event_edit';

    $this->load->view('template/back/view_index_add_update',$this->data);

    }
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
        redirect(site_url('admin/event'));
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
        /* Jika file upload diisi */
        if($_FILES['foto']['error'] <> 4)
        {
          $delete = $this->M_event->del_by_id($this->input->post('id_event'));

          // menyimpan lokasi gambar dalam variable
          $dir = "assets/images/event/".$delete->foto.$delete->foto_type;
          $dir_thumb = "assets/images/event/".$delete->foto.'_thumb'.$delete->foto_type;

          // Hapus foto dan thumbnail
          unlink($dir);
          unlink($dir_thumb);
        
          $nmfile = strtolower(url_title($this->input->post('judul_event'))).date('YmdHis');

          //load uploading file library
          $config['upload_path']      = './assets/images/event/';
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

            $this->update($this->input->post('id_event'));
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
              $config['source_image']   = './assets/images/event/'.$foto['file_name'].'';
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
                'judul_event'    => $this->input->post('judul_event'),
                'slug_event'     => strtolower(url_title($this->input->post('judul_event'))),
                'isi'            => $this->input->post('isi', FALSE),
                'foto'           => $nmfile,
                'foto_type'      => $foto['file_ext'],
                'jadwal_tgl'     => $this->input->post('jadwal_tgl'),
                'jadwal_time'    => $this->input->post('jadwal_time'),
                'updater'        => $this->session->userdata('user_id')
              );

              $this->M_event->update($this->input->post('id_event'), $data);
              $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i>Edit Data Berhasil</div>');
              redirect(site_url('admin/event'));
            }
        }
          // Jika file upload kosong
          else
          {
            $data = array(
              'judul_event'    => $this->input->post('judul_event'),
              'slug_event'     => strtolower(url_title($this->input->post('judul_event'))),
              'isi'       => $this->input->post('isi'),
              'jadwal_tgl'       => $this->input->post('jadwal_tgl'),
              'jadwal_time'       => $this->input->post('jadwal_time'),
              'updater'        => $this->session->userdata('user_id')
            );

            $this->M_event->update($this->input->post('id_event'), $data);
            $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i>Edit Data Berhasil</div>');
            redirect(site_url('admin/event'));
          }
      }
  }

  public function delete($id)
  {
    $delete = $this->M_event->del_by_id($id);

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/images/event/".$delete->foto.$delete->foto_type;
    $dir_thumb = "assets/images/event/".$delete->foto.'_thumb'.$delete->foto_type;

    // Hapus foto
    unlink($dir);
    unlink($dir_thumb);

    // Jika data ditemukan, maka hapus foto dan record nya
    if($delete)
    {
      $this->M_event->delete($id);

      $this->session->set_flashdata('message', '
      <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil dihapus
      </div>');
      redirect(site_url('admin/event'));
    }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                    <i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/event'));
      }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('judul_event', 'Judul Produk', 'trim|required');
    $this->form_validation->set_rules('isi', 'Isi Produk', 'trim|required');

    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_event', 'id_event', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert" align="left">', '</div>');
  }

}

//I'm Dedi Nugroho , Coder from boyolali central java, if u like my code : u can contact me to 0895361435659 or nugrohodedi62@gmail.com