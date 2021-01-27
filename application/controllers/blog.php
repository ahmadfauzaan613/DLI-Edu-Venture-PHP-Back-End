<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {


	function __construct(){
        	parent:: __construct();
        	$this->load->model('M_blog');
	}  

	public function index(){
			$data['title'] = "blog";
            $data['content'] = 'front/blog';

            $data['blog'] = $this->M_blog->get_all();
                
            $this->load->view('template/front/view_index', $data);

        }

    function selanjutnya()
    {
        $data['title'] = "blog";
        $id=$this->uri->segment(3);
        $data['content'] = 'front/blog_detail';
        $data['blog']=$this->M_blog->per_id($id);

        $this->load->view('template/front/view_index', $data);        
    }
    

}
