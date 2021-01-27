<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class startup extends CI_Controller {


	function __construct(){
        	parent:: __construct();
        	$this->load->model('M_startup');
	}  

	public function index(){
			$data['title'] = "startup";
            $data['content'] = 'front/startup';

            $data['startup'] = $this->M_startup->get_all();
                
            $this->load->view('template/front/view_index', $data);

        }

    function selanjutnya()
    {
        $data['title'] = "startup";
        $id=$this->uri->segment(3);
        $data['content'] = 'front/startup_detail';
        $data['startup']=$this->M_startup->per_id($id);

        $this->load->view('template/front/view_index', $data);        
    }
    

}
