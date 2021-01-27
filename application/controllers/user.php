<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_member');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');

        //get all users
		$this->data['users'] = $this->M_member->getAllUsers();
	}

	public function index(){
		$this->load->view('member/register', $this->data);
	}

	public function register(){
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) { 
			$this->load->view('member/register', $this->data);
		}
		else{
			//get user inputs
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			//insert user to users table and get id
			$user['name'] = $name;
			$user['email'] = $email;
			$user['password'] = $password;
			$user['code'] = $code;
			$user['active'] = false;
			$id = $this->M_member->insert($user);

			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
		  		'smtp_user' => 'gamebosku1@gmail.com', // change it to yours
		  		'smtp_pass' => 'gamebosku1234', // change it to yours
		  		'mailtype' => 'html',
		  		'charset' => 'iso-8859-1',
		  		'wordwrap' => TRUE
		  	);

			$message = 	"
			<html>
			<head>
			<title>Verification Code</title>
			</head>
			<body>
			<h2>Thank you for Registering.</h2>
			<p>Your Account:</p>
			<p>Name: ".$name."</p>
			<p>Email: ".$email."</p>
			<p>Password: ".$password."</p>
			<p>Please click the link below to activate your account.</p>
			<h4><a href='".base_url()."user/activate/".$id."/".$code."'>Activate My Account</a></h4>
			</body>
			</html>
			";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject('Signup Verification Email');
			$this->email->message($message);

		    //sending email
			if($this->email->send()){
		    	// $this->session->set_flashdata('message','Activation code sent to email');
				$this->session->set_flashdata('message','
					<h4 class="alert-heading text-center"><strong>Registration Successful!</strong></h4>
					<p>Your account <strong>created successfully</strong>, please check your <strong>email</strong> for verification link to activate your account and complete registration.</p>
					<p>If you have not received it, please check your spam folder, then mark it as <strong>not</strong> spam.</p>
					');
			}
			else{
				$this->session->set_flashdata('message', $this->email->print_debugger());

			}

			redirect('user/register');
		}

	}

	public function activate(){
		$id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);

		//fetch user details
		$user = $this->M_member->getUser($id);

		//if code matches
		if($user['code'] == $code){
			//update user active status
			$data['active'] = true;
			$query = $this->M_member->activate($data, $id);

			if($query){
				$this->session->set_flashdata('message', 'User activated successfully, Please Login');
			}
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}

		redirect('user/login');

	}

	function login(){
		$this->load->view('member/v_login');
	}



	function aksi_login(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$where = array(
			'email' => $email,
			'password' => $password
			// 'password' => $password
		);
		$cek = $this->M_member->cek_login("users",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'name' => $name,
				'email' => $email,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("home"));

		}else{
			$this->session->set_flashdata('message','

				<h4 class="alert alert-danger"><strong>Login Failed!</strong></h4>
				<p>Were sorry. Something went wrong, login <strong>failed.</strong> Please try again.</p>

				');
			redirect(base_url('user/login'));
		}
	}

	function reset_password(){

		$this->load->view("member/v_forgot_password");

	}



	public function email_reset_password_validation(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		if($this->form_validation->run()){

			$email = $this->input->post('email');
			$reset_key =  md5(rand(1, 99999));
			$cek_email = $this->db->where('email', $email)->get('users')->row();

			if($cek_email == null){
				echo "<script>
				alert('email tidak ditemukan')
				window.location.replace('".base_url('user/reset_password')."');
				</script>";
				

			}else{
				$reset = $this->M_member->update_reset_key($email,$reset_key);

				if($reset){
					
					$config = array(
						'protocol' => 'smtp',
						'charset'   => 'utf-8',
						'smtp_host' => 'smtp.googlemail.com',
						'smtp_port' => 465,
				  		'smtp_user' => 'gamebosku1@gmail.com', // change it to yours gamebosku1@gmail.com
				  		'smtp_pass' => 'gamebosku1234', // change it to yours
				  		// 'smtp_timeout' => 10,
				  		'mailtype' => 'html',
				  		'smtp_crypto' => 'ssl',
				  		'wordwrap' => TRUE
				  	);
					$message = "
					<html>
					<head>
					<title>Reset Password</title>
					</head>
					<body>
					<p>Anda melakukan permintaan reset password</p>
					<a href='".site_url('user/reset_passwords/'.$reset_key)."'>klik reset password</a>
					</body>
					</html>";

					//memanggil library email dan set konfigurasi untuk pengiriman email
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->from($config['smtp_user']);
					$this->email->to($email);
					$this->email->subject('Reset Password');
					$this->email->message($message);
					
					if($this->email->send()){
						echo "<script>
							alert('Email untuk reset password sudah dikirim, silahkan cek email anda')
							window.location.replace('".base_url('user/login')."');
							</script>";
					}else{
						echo "gagal";
					}
				}
			}

		} else{
			$this->load->view('member/v_forgot_password');
		}
	}


	function reset_passwords(){

		$reset_key = $this->uri->segment(3);
		
		if(!$reset_key){
			die('Jangan Dihapus');
		}

		if($this->M_member->check_reset_key($reset_key) == 1)
		{
			$this->load->view("member/v_reset_password");
		} else{
			die("reset key salah");
		}

	}

	function reset_password_validation(){
		$this->form_validation->set_rules('password', 'password', 'required|min_length[5]|matches[retype_password]');

		$this->form_validation->set_rules('retype_password', 'retype_password', 'required|min_length[5]|matches[password]');

		if ($this->form_validation->run()) 
		{
			$reset_key = $this->input->post('reset_key');
			$password = $this->input->post('password');

			if ($this->M_member->reset_password($reset_key, $password)) {
				// echo 'password telah berhasil di ubah';
				$this->session->set_flashdata('message','
					<h4 class="alert-heading text-center"><strong>Success Reset Your Password, Please Login</strong></h4>
					');

				redirect(base_url('user/login'));

			} else {
				echo 'eror';
			}
		}else {
			$this->load->view('v_forgot_password');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('user/login'));
	}



}
