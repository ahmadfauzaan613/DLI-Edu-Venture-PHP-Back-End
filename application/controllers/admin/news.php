<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class news extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_news');

    $this->data['titleAll'] = "news";

    $this->data['module'] = 'news';

    if($this->session->userdata('status') != "login"){
      redirect(base_url("admin/login"));
    }

  }

  public function index()
  {
    $this->data['title'] = "Data news";
    $this->data['produk_data'] = $this->M_news->get_all();

    $this->data['content'] = 'admin/news/news_tampil';

    $this->load->view('template/back/view_index_sidebar',$this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah news Baru';
    $this->data['action']         = site_url('admin/news/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['judul_news'] = array(
      'name'  => 'judul_news',
      'id'    => 'judul_news',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('judul_news'),
    );

    $this->data['isi'] = array(
      'name'  => 'isi',
      'id'    => 'isi',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('isi'),
    );


    $this->data['content'] = 'admin/news/news_tambah';

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
          $nmfile = strtolower(url_title($this->input->post('judul_news'))).date('YmdHis');

          /* memanggil library upload ci */
          $config['upload_path']      = './assets/images/news/';
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
              $config['source_image']   = './assets/images/news/'.$foto['file_name'].'';
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
                'judul_news'      => $this->input->post('judul_news'),
                'slug_news'       => strtolower(url_title($this->input->post('judul_news'))),
                'isi'             => $this->input->post('isi', FALSE),
                'foto'            => $nmfile,
                'foto_type'       => $foto['file_ext']
              );

              // eksekusi query INSERT
              $this->M_news->insert($data);
              // set pesan data berhasil dibuat
              $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i>Data berhasil dibuat</div>');
              redirect(site_url('admin/news'));
            }
        }
        else // Jika file upload kosong
        {
          $data = array(
            'judul_news'    => $this->input->post('judul_news'),
            'slug_news'     => strtolower(url_title($this->input->post('judul_news'))),
            'isi'       => $this->input->post('isi', FALSE)
          );

          // eksekusi query INSERT
          $this->M_news->insert($data);
          // set pesan data berhasil dibuat
          $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i>Data berhasil dibuat</div>');
          redirect(site_url('admin/news'));
        }
      }
  }

  public function update($id)
  {
    $row = $this->M_news->get_by_id($id);
    $this->data['produk'] = $this->M_news->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Update news';
      $this->data['action']         = site_url('admin/news/update_action');
      $this->data['button_submit']  = 'Update';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_news'] = array(
        'name'  => 'id_news',
        'id'    => 'id_news',
        'type'=> 'hidden',
      );

      $this->data['judul_news'] = array(
        'name'  => 'judul_news',
        'id'    => 'judul_news',
        'class' => 'form-control',
      );

      $this->data['isi'] = array(
        'name'  => 'isi',
        'id'    => 'isi',
        'class' => 'form-control',
      );

      $this->data['keywords'] = array(
        'name'  => 'keywords',
        'id'    => 'keywords',
        'class' => 'form-control',
      );


    $this->data['content'] = 'admin/news/news_edit';

    $this->load->view('template/back/view_index_add_update',$this->data);

    }
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
        redirect(site_url('admin/news'));
      }
  }

  public function update_action()
  {
    $this->load->helper('clean');
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->update($this->input->post('id_news'));
    }
      else
      {
        /* Jika file upload diisi */
        if($_FILES['foto']['error'] <> 4)
        {
          $delete = $this->M_news->del_by_id($this->input->post('id_news'));

          // menyimpan lokasi gambar dalam variable
          $dir = "assets/images/news/".$delete->foto.$delete->foto_type;
          $dir_thumb = "assets/images/news/".$delete->foto.'_thumb'.$delete->foto_type;

          // Hapus foto dan thumbnail
          unlink($dir);
          unlink($dir_thumb);
        
          $nmfile = strtolower(url_title($this->input->post('judul_news'))).date('YmdHis');

          //load uploading file library
          $config['upload_path']      = './assets/images/news/';
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

            $this->update($this->input->post('id_news'));
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
              $config['source_image']   = './assets/images/news/'.$foto['file_name'].'';
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
                'judul_news'    => $this->input->post('judul_news'),
                'slug_news'     => strtolower(url_title($this->input->post('judul_news'))),
                'isi'       => $this->input->post('isi', FALSE),
                'foto'            => $nmfile,
                'foto_type'       => $foto['file_ext'],
                'updater'         => $this->session->userdata('user_id')
              );

              $this->M_news->update($this->input->post('id_news'), $data);
              $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i>Edit Data Berhasil</div>');
              redirect(site_url('admin/news'));
            }
        }
          // Jika file upload kosong
          else
          {
            $data = array(
              'judul_news'    => $this->input->post('judul_news'),
              'slug_news'     => strtolower(url_title($this->input->post('judul_news'))),
              'isi'       => $this->input->post('isi'),
              'updater'        => $this->session->userdata('user_id')
            );

            $this->M_news->update($this->input->post('id_news'), $data);
            $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i>Edit Data Berhasil</div>');
            redirect(site_url('admin/news'));
          }
      }
  }

  public function delete($id)
  {
    $delete = $this->M_news->del_by_id($id);

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/images/news/".$delete->foto.$delete->foto_type;
    $dir_thumb = "assets/images/news/".$delete->foto.'_thumb'.$delete->foto_type;

    // Hapus foto
    unlink($dir);
    unlink($dir_thumb);

    // Jika data ditemukan, maka hapus foto dan record nya
    if($delete)
    {
      $this->M_news->delete($id);

      $this->session->set_flashdata('message', '
      <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil dihapus
      </div>');
      redirect(site_url('admin/news'));
    }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                    <i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/news'));
      }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('judul_news', 'Judul Produk', 'trim|required');
    $this->form_validation->set_rules('isi', 'Isi Produk', 'trim|required');

    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_news', 'id_news', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert" align="left">', '</div>');
  }

}

//I'm Dedi Nugroho , Coder from boyolali central java, if u like my code : u can contact me to 0895361435659 or nugrohodedi62@gmail.com