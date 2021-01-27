<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class program extends CI_Controller {


	function __construct(){
        	parent:: __construct();
        	$this->load->model('M_program');
	}  

	public function index(){
			$data['title'] = "program";
            $data['content'] = 'front/program';

            $data['program'] = $this->M_program->get_all();
                
            $this->load->view('template/front/view_index', $data);

        }

    function selanjutnya()
    {
        $data['title'] = "Program";
        $id=$this->uri->segment(3);
        $data['content'] = 'front/program_detail';
        $data['program']=$this->M_program->per_id($id);

        $this->load->view('template/front/view_index', $data);        
    }
    

}
