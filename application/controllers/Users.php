<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// belum login
		if( !$this->session->userdata('email') )
        {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
            redirect('auth');
        };

		// Login admin only
        if( $this->session->userdata('id_role') != 1 )
        {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Access blocked!</div>');
            redirect('home');
        }
        // End Login admin only

		// load model
		$this->load->model('model_users');
	}
	
	public function index()
	{
		$data['title'] = "All Users";
		$data['active'] = "All Users";
		$data['user'] = $this->model_users->get_by_email_session();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('users/index');
		$this->load->view('layouts/main_footer');
	}

}
