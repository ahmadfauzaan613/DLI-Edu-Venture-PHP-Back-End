<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class blog extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_blog');

    $this->data['titleAll'] = "blog";

    $this->data['module'] = 'blog';

    if($this->session->userdata('status') != "login"){
      redirect(base_url("admin/login"));
    }

  }

  public function index()
  {
    $this->data['title'] = "Data blog";
    $this->data['produk_data'] = $this->M_blog->get_all();

    $this->data['content'] = 'admin/blog/blog_tampil';

    $this->load->view('template/back/view_index_sidebar',$this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah Blog Baru';
    $this->data['action']         = site_url('admin/blog/create_action');
    $this->data['button_submit']  = 'Submit';
    $this->data['button_reset']   = 'Reset';

    $this->data['judul_blog'] = array(
      'name'  => 'judul_blog',
      'id'    => 'judul_blog',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('judul_blog'),
    );

    $this->data['isi'] = array(
      'name'  => 'isi',
      'id'    => 'isi',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('isi'),
    );


    $this->data['content'] = 'admin/blog/blog_tambah';

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
        $nmfile = strtolower(url_title($this->input->post('judul_blog'))).date('YmdHis');

        /* memanggil library upload ci */
        $config['upload_path']      = './assets/images/blog/';
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
            $config['source_image']   = './assets/images/blog/'.$foto['file_name'].'';
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
              'judul_blog'      => $this->input->post('judul_blog'),
              'slug_blog'       => strtolower(url_title($this->input->post('judul_blog'))),
              'isi'             => $this->input->post('isi', FALSE),
              'foto'            => $nmfile,
              'foto_type'       => $foto['file_ext']
            );

              // eksekusi query INSERT
            $this->M_blog->insert($data);
              // set pesan data berhasil dibuat
            $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
              <i class="ace-icon fa fa-bullhorn green"></i>Data berhasil dibuat</div>');
            redirect(site_url('admin/blog'));
          }
        }
        else // Jika file upload kosong
        {
          $data = array(
            'judul_blog'    => $this->input->post('judul_blog'),
            'slug_blog'     => strtolower(url_title($this->input->post('judul_blog'))),
            'isi'       => $this->input->post('isi', FALSE)
          );

          // eksekusi query INSERT
          $this->M_blog->insert($data);
          // set pesan data berhasil dibuat
          $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <i class="ace-icon fa fa-bullhorn green"></i>Data berhasil dibuat</div>');
          redirect(site_url('admin/blog'));
        }
      }
    }

    public function update($id)
    {
      $row = $this->M_blog->get_by_id($id);
      $this->data['produk'] = $this->M_blog->get_by_id($id);

      if ($row)
      {
        $this->data['title']          = 'Update blog';
        $this->data['action']         = site_url('admin/blog/update_action');
        $this->data['button_submit']  = 'Update';
        $this->data['button_reset']   = 'Reset';

        $this->data['id_blog'] = array(
          'name'  => 'id_blog',
          'id'    => 'id_blog',
          'type'=> 'hidden',
        );

        $this->data['judul_blog'] = array(
          'name'  => 'judul_blog',
          'id'    => 'judul_blog',
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


        $this->data['content'] = 'admin/blog/blog_edit';

        $this->load->view('template/back/view_index_add_update',$this->data);

      }
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
        redirect(site_url('admin/blog'));
      }
    }

    public function update_action()
    {
      $this->load->helper('clean');
      $this->_rules();

      if ($this->form_validation->run() == FALSE)
      {
        $this->update($this->input->post('id_blog'));
      }
      else
      {
        /* Jika file upload diisi */
        if($_FILES['foto']['error'] <> 4)
        {
          $delete = $this->M_blog->del_by_id($this->input->post('id_blog'));

          // menyimpan lokasi gambar dalam variable
          $dir = "assets/images/blog/".$delete->foto.$delete->foto_type;
          $dir_thumb = "assets/images/blog/".$delete->foto.'_thumb'.$delete->foto_type;

          // Hapus foto dan thumbnail
          unlink($dir);
          unlink($dir_thumb);

          $nmfile = strtolower(url_title($this->input->post('judul_blog'))).date('YmdHis');

          //load uploading file library
          $config['upload_path']      = './assets/images/blog/';
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

            $this->update($this->input->post('id_blog'));
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
            $config['source_image']   = './assets/images/blog/'.$foto['file_name'].'';
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
              'judul_blog'    => $this->input->post('judul_blog'),
              'slug_blog'     => strtolower(url_title($this->input->post('judul_blog'))),
              'isi'       => $this->input->post('isi', FALSE),
              'foto'            => $nmfile,
              'foto_type'       => $foto['file_ext'],
              'updater'         => $this->session->userdata('user_id')
            );

            $this->M_blog->update($this->input->post('id_blog'), $data);
            $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
              <i class="ace-icon fa fa-bullhorn green"></i>Edit Data Berhasil</div>');
            redirect(site_url('admin/blog'));
          }
        }
          // Jika file upload kosong
        else
        {
          $data = array(
            'judul_blog'    => $this->input->post('judul_blog'),
            'slug_blog'     => strtolower(url_title($this->input->post('judul_blog'))),
            'isi'       => $this->input->post('isi'),
            'updater'        => $this->session->userdata('user_id')
          );

          $this->M_blog->update($this->input->post('id_blog'), $data);
          $this->session->set_flashdata('message', ' <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            <i class="ace-icon fa fa-bullhorn green"></i>Edit Data Berhasil</div>');
          redirect(site_url('admin/blog'));
        }
      }
    }

    public function delete($id)
    {
      $delete = $this->M_blog->del_by_id($id);

    // menyimpan lokasi gambar dalam variable
      $dir = "assets/images/blog/".$delete->foto.$delete->foto_type;
      $dir_thumb = "assets/images/blog/".$delete->foto.'_thumb'.$delete->foto_type;

    // Hapus foto
      unlink($dir);
      unlink($dir_thumb);

    // Jika data ditemukan, maka hapus foto dan record nya
      if($delete)
      {
        $this->M_blog->delete($id);

        $this->session->set_flashdata('message', '
          <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil dihapus
          </div>');
        redirect(site_url('admin/blog'));
      }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '
          <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
          </div>');
        redirect(site_url('admin/blog'));
      }
    }

    public function _rules()
    {
      $this->form_validation->set_rules('judul_blog', 'Judul Produk', 'trim|required');
      $this->form_validation->set_rules('isi', 'Isi Produk', 'trim|required');

    // set pesan form validasi error
      $this->form_validation->set_message('required', '{field} wajib diisi');

      $this->form_validation->set_rules('id_blog', 'id_blog', 'trim');
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert" align="left">', '</div>');
    }

  }

//I'm Dedi Nugroho , Coder from boyolali central java, if u like my code : u can contact me to 0895361435659 or nugrohodedi62@gmail.com