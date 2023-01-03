<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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
		$this->load->model('model_products');
		$this->load->model('model_orders');
		$this->load->model('model_order_details');
	}
	
	public function index()
	{
		$data['title'] = "Dashboard";
		$data['active'] = "Dashboard";
		$data['user'] = $this->model_users->get_by_email_session();

		// count products
		$data['count_product'] = $this->model_products->count();
		// count manual order
		$data['count_manual_order'] = $this->model_orders->count_manual_order();
		// count order verification
		$data['count_order_verification'] = $this->model_orders->count_order_verification();
		// count order process
		$data['count_order_process'] = $this->model_orders->count_order_process();

		// get untuk tabel
		$data['orders'] = $this->model_orders->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('admin/index');
		$this->load->view('layouts/main_footer');
	}

}
