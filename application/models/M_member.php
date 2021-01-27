<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function cek_login($table,$where){	
		// $this->db->where('active', 1);
		return $this->db->get_where($table,$where);
	}	

	public function getAllUsers(){
		$query = $this->db->get('users');
		return $query->result(); 
	}

	public function insert($user){
		$this->db->insert('users', $user);
		return $this->db->insert_id(); 
	}

	public function getUser($id){
		$query = $this->db->get_where('users',array('id'=>$id));
		return $query->row_array();
	}

	public function activate($data, $id){
		$this->db->where('users.id', $id);
		return $this->db->update('users', $data);
	}

	function get_id()
	{
		$this->db->where('email', $this->session->userdata('email'));
		// $this->db->where('active', 1);
		return $this->db->get('users')->result();
	}

	// ambil data sesuai id
	function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('users')->row();
	}

	//menghapus sesuai id
	function del_by_id($id)
	{
		$this->db->select("foto, foto_type");
		$this->db->where('id',$id);
		return $this->db->get('users')->row();
	}

	// update data / mengubah data
  function update($id, $data)
  {
    // $this->db->where('id',$id);
    
	$this->db->where('email', $this->session->userdata('email'));

    $this->db->update('users', $data);
  }

  function update_reset_key($email, $reset_key){
  	$this->db->where('email', $email);
  	$data = array('reset_password' => $reset_key);
  	$update = $this->db->update('users', $data);

	if($update){
  		return true;
  	}else{
  		return false;
  	}		

  }


  function reset_password($reset_key, $password){
  	$data = array('password' => $password);
  	$update = $this->db->where('reset_password', $reset_key)->update('users', $data);

	if($update){
  		return true;
  	}else{
  		return false;
  	}		

  }

  function check_reset_key($reset_key){

  	$result = $this->db->get_where('users', ['reset_password' => $reset_key])->result();
  	return count($result);
  }

}