<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class event extends CI_Controller {


	function __construct(){
        	parent:: __construct();
        	$this->load->model('M_event');
	}  

	public function index(){
			$data['title'] = "event";
            $data['content'] = 'front/event';

            $data['event'] = $this->M_event->get_all();
                
            $this->load->view('template/front/view_index', $data);

        }

    function selanjutnya()
    {

        if($this->session->userdata('status') != "login"){
        redirect(base_url("user/login"));
        }

        $data['title'] = "event";
        $id=$this->uri->segment(3);
        $data['content'] = 'front/event_detail';
        $data['event']=$this->M_event->per_id($id);

        $this->load->view('template/front/view_index', $data);        
    }
    

}
