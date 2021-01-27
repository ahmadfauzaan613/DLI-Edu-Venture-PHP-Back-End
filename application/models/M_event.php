<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_event extends CI_Model
{
  public $table = 'tbl_event';
  public $id    = 'id_event';
  public $order = 'DESC';

  //ambil semua data pada tbl_event
  function get_all()
  {
    return $this->db->get($this->table)->result();
  }

  // insert data / memasukkan data
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  function insert_order($data)
  {
   $this->db->insert('event_join', $data); 
  }


  // ambil data sesuai id
  function get_by_id($id)
  {
    $this->db->where('id_event', $id);
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
  function tampilevent($limit, $start){
        $query = $this->db->get('tbl_event', $limit, $start);
        return $query;
    }

  //menampilkan data event detail sesuai id di hal front end
 function per_id($id)
    {

    $this->db->where('id_event',$id);
    $query=$this->db->get('tbl_event');
    return $query->result();
    }

  function get_all_cek_gaduh()
  {
    // $this->db->join('users', 'event_join.member = users.id', 'left');
    $this->db->where('member', $this->session->userdata('email'));
    $this->db->order_by($this->id,$this->order);
    return $this->db->get('event_join')->result();
  }

}


//I'm Dedi Nugroho , Coder from boyolali central java, if u like my code : u can contact me to 0895361435659 or nugrohodedi62@gmail.com
