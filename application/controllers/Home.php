<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct(){
        	parent:: __construct();
        	$this->load->model('M_home');
	}  

	public function index(){
			$data['title'] = "home";
            $data['content'] = 'front/home';

            $data['program'] = $this->M_home->get_program();

            $data['startup'] = $this->M_home->get_startup();

            $data['news'] = $this->M_home->get_news();

            $data['event'] = $this->M_home->get_event();

            $data['blog'] = $this->M_home->get_blog();

            $data['gallery'] = $this->M_home->get_gallery();
                
            $this->load->view('template/front/view_index', $data);

        }


    function search(){
            $keyword = $this->input->post('keyword');
            $data =$this->M_home->get_keyword($keyword);
            $data['content'] = 'front/home';

            $this->load->view('template/front/view_index', $data);
    }


    public function contact(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

            $config = array(
                'protocol' => 'smtp',
                'charset'   => 'utf-8',
                'smtp_host' => 'smtp.googlemail.com',
                'smtp_port' => 587,
                'smtp_user' => 'gamebosku1@gmail.com', // change it to yours gamebosku1@gmail.com
                'smtp_pass' => 'gamebosku1234', // change it to yours
                // 'smtp_timeout' => 10,
                'mailtype' => 'html',
                'smtp_crypto' => 'tls',
                'wordwrap' => TRUE
            );

            $message =  "
            <html>
            <head>
            <title>Verification Code</title>
            </head>
            <body>
            <h2>Message From ".$name."</h2>
            <br>
            <p>".$message."</p>
            </body>
            </html>
            ";

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);

            if($this->email->send()){
                return true;
            }else{
                return false;
            }
    }
}

