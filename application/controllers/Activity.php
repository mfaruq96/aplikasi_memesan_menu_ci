<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller
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

		// login guest
		if( $this->session->userdata('id_role') == 4 )
        {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login for continue order!</div>');
            redirect('home');
        };
		// end login guest

		// load model
		$this->load->model('model_users');
		$this->load->model('model_products');
		$this->load->model('model_orders');
		$this->load->model('model_order_details');
	}

	public function carts()
	{
		$data['title'] = "Carts";
		$data['active'] = "Carts";
		$data['user'] = $this->model_users->get_by_email_session();
		$id_user = $data['user']['id_user'];
		$data['order_details'] = $this->model_order_details->get_where_id_user_status_zero($id_user);
		$data['order'] = $this->model_orders->get_where_id_user($id_user);

		if( empty($data['order']) )
		{
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Your cart is empty, please add item to cart!</div>');
            return redirect('home');
		}

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('activity/carts');
		$this->load->view('layouts/main_footer');
	}

	public function add($id_product)
	{
		// data form
		$qty = htmlspecialchars($this->input->post('qty', true));
		$note = htmlspecialchars($this->input->post('note', true));

		// data user
		$data['user'] = $this->model_users->get_by_email_session();
		$id_user = $data['user']['id_user'];

		// get product
		$product = $this->model_products->get_by_id_product($id_product);
		$price = $product['price'];

		$total_price = $qty * $price;

		// jika orderan user dengan status 0 tidak ada maka buat orderan baru
		$order_check = $this->model_orders->get_where_id_user($id_user);
		if( empty($order_check) )
		{
			$this->model_orders->add($id_user ,$total_price);
		} else
		{
			$order_on = $this->model_orders->get_where_id_user($id_user);
			$current_total_price = $order_on['total_price'];
			$current_id_order = $order_on['id_order'];
			$add_total_price = $product['price'] * $qty;
			$update_total_price = $current_total_price + $add_total_price;
			$current_id_user = $order_on['id_user'];
			$this->model_orders->update_where_id_user($update_total_price, $current_id_user, $current_id_order);
		}

		// input order_details user sesuai dengan id_order
		$order_check_try = $this->model_orders->get_where_id_user($id_user);
		$id_order = $order_check_try['id_order'];
		$order_detail_check = $this->model_order_details->get_where_id_order_id_product($id_order, $id_product);
		if( empty($order_detail_check) )
		{
			$this->model_order_details->add($id_user, $id_order, $id_product, $qty, $note, $price);
		} else
		{
			// update order details jika product sama
			$order_detail_check_try = $this->model_order_details->get_where_id_order_id_product($id_order, $id_product);
			$current_qty = $order_detail_check_try['qty'];
			$new_qty = $current_qty + $qty;

			if( !empty($note) )
			{
				// ada note
				$this->model_order_details->update_where_id_order_id_product_plus_note($id_order, $id_product, $new_qty, $note);
			} else
			{
				// tidak ada note
				$this->model_order_details->update_where_id_order_id_product($id_order, $id_product, $new_qty);
			}
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item added to cart successfully.</div>');
        return redirect('activity/carts');
	}
	
	public function carts_edit($id_order_detail)
	{
		$data['title'] = "Carts";
		$data['active'] = "Carts";
		$data['user'] = $this->model_users->get_by_email_session();

		$data['order_detail'] = $this->model_order_details->get_where_id($id_order_detail);
		$id_product = $data['order_detail']['id_product'];
		$data['product'] = $this->model_products->get_by_id_product($id_product);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('activity/carts_edit');
		$this->load->view('layouts/main_footer');
	}

	public function update($id_order_detail)
	{
		// data form
		$qty = htmlspecialchars($this->input->post('qty', true));
		$note = htmlspecialchars($this->input->post('note', true));

		// data user
		$data['user'] = $this->model_users->get_by_email_session();
		$id_user = $data['user']['id_user'];

		$order_detail_check = $this->model_order_details->get_where_id($id_order_detail);
		$id_product = $order_detail_check['id_product'];
		$id_order = $order_detail_check['id_order'];
		$current_id_order = $order_detail_check['id_order'];
		$old_note = $order_detail_check['note'];
		$old_total_price = $order_detail_check['qty'] * $order_detail_check['price'];
		$product = $this->model_products->get_by_id_product($id_product);
		$product_active = $product['is_active'];

		if( $product_active == 0 )
		{
			if( $old_note == $note )
			{
				// gagal karena product habis
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Item updated failed, stock not available!</div>');
				return redirect('activity/carts');
			} else
			{
				// update note
				$this->model_order_details->update_where_id_order_detail_note($id_order_detail, $note);
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Item updated failed, stock not available! and Your note has been updated.</div>');
				return redirect('activity/carts');
			}
		} else
		{
			// update order details
			$new_qty = $qty;
			$this->model_order_details->update_where_id_order_id_product_plus_note($id_order, $id_product, $new_qty, $note);

			// update orders
			$order = $this->model_orders->get_where_id_user($id_user);
			$order_total_price = $order['total_price'];
			$new_total_price = $qty * $product['price'];
			$update_total_price = $order_total_price - $old_total_price + $new_total_price;
			$this->model_orders->update_where_id_user($update_total_price, $id_user, $current_id_order);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item updated has been successfully.</div>');
			return redirect('activity/carts');
		}
	}

	public function carts_delete($id_order_detail)
	{
		$order_detail_check = $this->model_order_details->get_where_id($id_order_detail);
		$id_user = $order_detail_check['id_user'];
		$id_order = $order_detail_check['id_order'];
		$old_total_price = $order_detail_check['qty'] * $order_detail_check['price'];
		$order = $this->model_orders->get_where_id_user($id_user);
		$total_price = $order['total_price'];

		$this->model_orders->delete_where_id($id_order, $old_total_price, $total_price);
		$this->model_order_details->delete_where_id($id_order_detail);

		$order_detail_check_user = $this->model_order_details->get_where_id_user_id_order($id_user, $id_order);
		if( empty($order_detail_check_user) )
		{
			$this->model_orders->delete_all_where_id($id_order);

			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Your cart is empty, please add item to cart!</div>');
            return redirect('home');
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item deleted has been successfully!</div>');
        return redirect('activity/carts');
	}

	public function check_out($id_order)
	{
		$remark = htmlspecialchars($this->input->post('remark', true));

		$order = $this->model_orders->get_where_id($id_order);
		$id_user = $order['id_user'];

		$month = date('m');
		$year = date('Y');
		$invoice = "INV/" . $month . "/" . $year . "/" . $id_order;

		// update data orders
		$this->model_orders->update_check_out($id_order, $invoice, $remark);
		
		// update data order details
		$this->model_order_details->update_check_out($id_order);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations, your order has been successfully shipped.</div>');
		return redirect("home");
	}

	public function history()
	{
		$data['title'] = "History";
		$data['active'] = "History";
		$data['user'] = $this->model_users->get_by_email_session();
		$id_user = $data['user']['id_user'];
		$data['orders'] = $this->model_orders->get_where_id_user_status_zero_plus($id_user);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('activity/history');
		$this->load->view('layouts/main_footer');
	}

	public function history_details($id_order)
	{
		$data['title'] = "History";
		$data['active'] = "History";
		$data['user'] = $this->model_users->get_by_email_session();
		$id_user = $data['user']['id_user'];
		$data['order'] = $this->model_orders->get_where_id($id_order);
		$data['order_details'] = $this->model_order_details->get_where_id_order_join_products_user($id_order);

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('activity/history_details');
		$this->load->view('layouts/main_footer');
	}

}
