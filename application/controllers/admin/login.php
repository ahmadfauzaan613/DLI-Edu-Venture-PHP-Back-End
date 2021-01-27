<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_admin_login');

	}

	function index(){
		$this->load->view('admin/v_login');
	}

	function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
			);
		$cek = $this->m_admin_login->cek_login("tbl_admin",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'email' => $email,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("admin/dashboard"));

		}else{
			$this->session->set_flashdata('message','

				<h4 class="alert alert-danger"><strong>Login Failed!</strong></h4>
				<p>Were sorry. Something went wrong, login <strong>failed.</strong> Please try again.</p>

				');

			redirect(base_url("admin/login"));
			
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}
}