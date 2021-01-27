<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function __construct(){
        parent:: __construct();
        
        if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/login"));
		}

	}  

	public function index(){
		$data['title'] = "dashboard";
        $data['content'] = 'admin/dashboard';

		$this->load->view('template/back/view_index',$data);
		

	}
}
