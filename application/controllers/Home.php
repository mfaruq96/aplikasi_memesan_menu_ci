<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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

		// load model
		$this->load->model('model_users');
		$this->load->model('model_products');
	}
	
	public function index()
	{
		$data['title'] = "Home";
		$data['active'] = "Home";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['products_makanan'] = $this->model_products->get_all_where_makanan();
		$data['products_minuman'] = $this->model_products->get_all_where_minuman();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('home/index');
		$this->load->view('modals/home');
		$this->load->view('layouts/main_footer');
	}

	public function product($id_product)
	{
		$data['title'] = "Home";
		$data['active'] = "Home";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['product'] = $this->model_products->get_by_id_product($id_product);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('home/product');
		$this->load->view('modals/home');
		$this->load->view('layouts/main_footer');
	}

}
