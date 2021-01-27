<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_startup extends CI_Model
{
  public $table = 'tbl_startup';
  public $id    = 'id_startup';
  public $order = 'DESC';

  //ambil semua data pada tbl_startup
  function get_all()
  {
    return $this->db->get($this->table)->result();
  }

  // insert data / memasukkan data
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }


  // ambil data sesuai id
  function get_by_id($id)
  {
    $this->db->where('id_startup', $id);
    return $this->db->get($this->table)->row();
  }

  //menghapus sesuai id
   function del_by_id($id)
  {
    $this->db->select("foto, foto_type");
    $this->db->where($this->id,$id);
    return $this->db->get($this->table)->row();
  }

  // update data / mengubah data
  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

    // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

  //untuk menampilkan data di halaman front end
  function tampilstartup($limit, $start){
        $query = $this->db->get('tbl_startup', $limit, $start);
        return $query;
    }

    //menampilkan data program detail sesuai id di hal front end
 function per_id($id)
    {
    $this->db->where('id_startup',$id);
    $query=$this->db->get('tbl_startup');
    return $query->result();
    }

}


//I'm Dedi Nugroho , Coder from boyolali central java, if u like my code : u can contact me to 0895361435659 or nugrohodedi62@gmail.com
