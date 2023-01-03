<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// load model
		$this->load->model('model_users');
	}
	
	public function index()
	{
		// sudah login
		if( $this->session->userdata('email') )
        {
            redirect('home');
        };

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password too short!'
        ]);

		if( $this->form_validation->run() == false )
		{
			$data['title'] = "Login";

			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('layouts/auth_copyright');
			$this->load->view('layouts/auth_footer');
		} else
		{
			$this->_login();
		}
	}

	private function _login()
	{
		// data
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// cek email
		$user = $this->model_users->get_by_email();
		// var_dump($user);die;
		// email sudah terdaftar
		if( $user )
		{
			// jika akun sudah aktif
			if( $user['is_active'] == 1 )
			{
				// cek password
				if( password_verify($password, $user['password']) )
				{
					// jika berhasil login
					$data = [
						'email' => $user['email'],
						'id_role' => $user['id_role']
					];
					$this->session->set_userdata($data);
					if( $user['id_role'] == 1 )
					{
						// login admin
						redirect('admin');
					} else
					{
						// login customer
						redirect('home');
					}
				} else
				{
					// password salah
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth'); 
				}
			} else
			{
				// akun belum aktif
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
				redirect('auth');
			}
		} else
		{
			// email belum terdaftar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
		}
	}

	public function register()
	{
		// sudah login
		if( $this->session->userdata('email') )
        {
            redirect('home');
        };

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('phone', 'Phone', 'required|trim');
		$this->form_validation->set_rules('password_one', 'Password', 'required|trim|min_length[6]|matches[password_two]',[
			'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password_two', 'Password', 'required|trim|matches[password_one]');

		if( $this->form_validation->run() == false )
		{
			$data['title'] = "Register";
	
			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('layouts/auth_copyright');
			$this->load->view('layouts/auth_footer');
		} else
		{
			$this->model_users->register();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
            redirect('auth');
		}
	}

	public function forgot_password()
	{
		// sudah login
		if( $this->session->userdata('email') )
        {
            redirect('home');
        };

		$data['title'] = "Forgot Password";

		$this->load->view('layouts/auth_header', $data);
		$this->load->view('auth/forgot_password');
		$this->load->view('layouts/auth_copyright');
		$this->load->view('layouts/auth_footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout.</div>');
		redirect('auth');
	}

}
