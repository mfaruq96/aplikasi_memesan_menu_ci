<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
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
		$this->load->model('model_orders');
		$this->load->model('model_order_details');
	}
	
	public function all_orders()
	{
		$data['title'] = "All Orders";
		$data['active'] = "All Orders";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['orders'] = $this->model_orders->get_all();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('orders/all_orders');
		$this->load->view('layouts/main_footer');
	}

	public function order_details($id_order)
	{
		// var_dump($id_order);
		$data['title'] = "All Orders";
		$data['active'] = "All Orders";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['orders'] = $this->model_orders->get_where_status_one();
		$data['order_details'] = $this->model_order_details->get_where_id_order_join_products_user($id_order);
		$data['order_detail_try'] = $this->model_order_details->get_where_id_order_join_products_user_row($id_order);
		$id_user = $data['order_detail_try']['id_user'];
		$data['order'] = $this->model_orders->get_where_id($id_order);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('orders/order_details');
		$this->load->view('layouts/main_footer');
	}

	public function order_process()
	{
		$data['title'] = "Order Process";
		$data['active'] = "Order Process";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['orders'] = $this->model_orders->get_where_status_two();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('orders/order_process');
		$this->load->view('layouts/main_footer');
	}

	public function order_process_details($id_order)
	{
		// var_dump($id_order);
		$data['title'] = "Order Process";
		$data['active'] = "Order Process";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['orders'] = $this->model_orders->get_where_status_one();
		$data['order_details'] = $this->model_order_details->get_where_id_order_join_products_user($id_order);
		$data['order_detail_try'] = $this->model_order_details->get_where_id_order_join_products_user_row($id_order);
		$id_user = $data['order_detail_try']['id_user'];
		$data['order'] = $this->model_orders->get_where_id($id_order);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('orders/order_process_details');
		$this->load->view('layouts/main_footer');
	}

	public function order_process_verify($id_order)
	{
		$this->model_orders->update_status_two_to_three($id_order);
		$this->model_order_details->update_status_two_to_three($id_order);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data updated has been successfully.</div>');
		redirect('orders/all_orders');
	}

	public function order_verification()
	{
		$data['title'] = "Order Verification";
		$data['active'] = "Order Verification";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['orders'] = $this->model_orders->get_where_status_one();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('orders/order_verification');
		$this->load->view('layouts/main_footer');
	}

	public function order_verification_details($id_order)
	{
		// var_dump($id_order);
		$data['title'] = "Order Verification";
		$data['active'] = "Order Verification";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['orders'] = $this->model_orders->get_where_status_one();
		$data['order_details'] = $this->model_order_details->get_where_id_order_join_products_user($id_order);
		$data['order_detail_try'] = $this->model_order_details->get_where_id_order_join_products_user_row($id_order);
		$id_user = $data['order_detail_try']['id_user'];
		$data['order'] = $this->model_orders->get_where_id($id_order);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('orders/order_verification_details');
		$this->load->view('layouts/main_footer');
	}

	public function order_verification_verify($id_order)
	{
		// $a = $this->model_orders->get_where_id($id_order);
		// var_dump($a);
		$this->model_orders->update_status_one_to_two($id_order);
		$this->model_order_details->update_status_one_to_two($id_order);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data updated has been successfully.</div>');
		redirect('orders/order_process');
	}

	public function order_pending()
	{
		$data['title'] = "Manual Orders";
		$data['active'] = "Manual Orders";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['orders'] = $this->model_orders->get_where_status_zero();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('orders/order_pending');
		$this->load->view('layouts/main_footer');
	}

	public function order_pending_details($id_order)
	{
		$data['title'] = "Order Pending";
		$data['active'] = "Order Pending";
		$data['user'] = $this->model_users->get_by_email_session();
		$data['orders'] = $this->model_orders->get_where_status_zero();
		$data['order_details'] = $this->model_order_details->get_where_id_order_join_products_user($id_order);
		$data['order_detail_try'] = $this->model_order_details->get_where_id_order_join_products_user_row($id_order);
		$id_user = $data['order_detail_try']['id_user'];
		$data['order'] = $this->model_orders->get_where_id($id_order);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('orders/order_pending_details');
		$this->load->view('layouts/main_footer');
	}

	public function export_orders()
	{
		$data['title'] = "Report All Orders Soto Mie Bogor Boga Rasa";
		$data['order_details'] = $this->model_order_details->get_all_export();
		$data['orders'] = $this->model_orders->sum_total_price();
		// var_dump($data['orders']);die;

		$this->load->view('orders/exports/export_orders', $data);
	}

}
