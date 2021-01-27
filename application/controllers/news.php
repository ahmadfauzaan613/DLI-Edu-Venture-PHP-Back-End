<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news extends CI_Controller {


	function __construct(){
        	parent:: __construct();
        	$this->load->model('M_news');
	}  

	public function index(){
			$data['title'] = "news";
            $data['content'] = 'front/news';

            $data['news'] = $this->M_news->get_all();
                
            $this->load->view('template/front/view_index', $data);

        }

    function selanjutnya()
    {
        $data['title'] = "news";
        $id=$this->uri->segment(3);
        $data['content'] = 'front/news_detail';
        $data['news']=$this->M_news->per_id($id);

        $this->load->view('template/front/view_index', $data);        
    }
    

}
