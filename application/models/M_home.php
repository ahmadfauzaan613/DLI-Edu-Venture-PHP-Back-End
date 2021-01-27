<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_home extends CI_Model
{
  public $table1 = 'tbl_program';
  public $table2 = 'tbl_startup';
  public $table3 = 'tbl_news';
  public $table4 = 'tbl_event';
  public $table5 = 'tbl_blog';
  public $table6 = 'tbl_gallery';

  //ambil semua data pada tbl_blog
  function get_program()
  {
    return $this->db->get($this->table1)->result();
  }

  function get_startup()
  {
    return $this->db->get($this->table2)->result();
  }
  
  function get_news()
  {
    return $this->db->get($this->table3)->result();
  }
  
  function get_event()
  {
    return $this->db->get($this->table4)->result();
  }
  
  function get_blog()
  {
    return $this->db->get($this->table5)->result();
  }
  
  function get_gallery()
  {
    return $this->db->get($this->table6)->result();
  }


  public function get_keyword($keyword){
    $event = $this->db->like('judul_event', $keyword)->or_like('isi', $keyword)->get('tbl_event')->result();
    $program = $this->db->like('judul_program', $keyword)->or_like('isi', $keyword)->get('tbl_program')->result();
    $startup = $this->db->like('judul_startup', $keyword)->or_like('isi', $keyword)->get('tbl_startup')->result();
    $news = $this->db->like('judul_news', $keyword)->or_like('isi', $keyword)->get('tbl_news')->result();
    $blog = $this->db->like('judul_blog', $keyword)->or_like('isi', $keyword)->get('tbl_blog')->result();
    $gallery = $this->db->like('judul_gallery', $keyword)->or_like('slug_gallery', $keyword)->get('tbl_gallery')->result();

    $data['event'] = $event;
    $data['program'] = $program;
    $data['startup'] = $startup;
    $data['news'] = $news;
    $data['blog'] = $blog;
    $data['gallery'] = $startup;

    return $data;
  }

}


//I'm Dedi Nugroho , Coder from boyolali central java, if u like my code : u can contact me to 0895361435659 or nugrohodedi62@gmail.com
