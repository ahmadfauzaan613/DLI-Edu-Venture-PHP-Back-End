<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gallery extends CI_Controller {


	function __construct(){
        	parent:: __construct();
        	$this->load->model('M_gallery');
	}  

	public function index(){
			$data['title'] = "gallery";
            $data['content'] = 'front/gallery';

            $data['gallery'] = $this->M_gallery->get_all();
                
            $this->load->view('template/front/view_index', $data);

        }

    function selanjutnya()
    {
        $data['title'] = "gallery";
        $id=$this->uri->segment(3);
        $data['content'] = 'front/gallery_detail';
        $data['gallery']=$this->M_gallery->per_id($id);

        $this->load->view('template/front/view_index', $data);        
    }
    

}
