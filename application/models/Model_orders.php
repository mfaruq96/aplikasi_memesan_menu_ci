<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_orders extends CI_Model
{

    public function get_all()
    {
		$query = "SELECT `orders`.*, `users`.`name`
                    FROM `orders`
					JOIN `users`
                    ON `orders`.`id_user` = `users`.`id_user`
					ORDER BY `orders`.`status` ASC
                    ";
        return $this->db->query($query)->result_array();
    }

	public function get_where_status_zero()
	{
		$query = "SELECT `orders`.*, `users`.`name`
                    FROM `orders`
					JOIN `users`
                    ON `orders`.`id_user` = `users`.`id_user`
					WHERE `orders`.`status` = 0
					ORDER BY `orders`.`updated_at` ASC
                    ";
        return $this->db->query($query)->result_array();
	}

	public function get_where_status_one()
	{
		$query = "SELECT `orders`.*, `users`.`name`
                    FROM `orders`
					JOIN `users`
                    ON `orders`.`id_user` = `users`.`id_user`
					WHERE `orders`.`status` = 1
					ORDER BY `orders`.`updated_at` ASC
                    ";
        return $this->db->query($query)->result_array();
	}

	public function get_where_status_two()
	{
		$query = "SELECT `orders`.*, `users`.`name`
                    FROM `orders`
					JOIN `users`
                    ON `orders`.`id_user` = `users`.`id_user`
					WHERE `orders`.`status` = 2
					ORDER BY `orders`.`updated_at` DESC
                    ";
        return $this->db->query($query)->result_array();
	}

	public function get_where_id_user($id_user)
	{
		$data = [
			'id_user' => $id_user,
			'status' => 0,
		];
		return $this->db->get_where('orders', $data)->row_array();
	}

	public function get_where_id_user_status_one($id_user)
	{
		$data = [
			'id_user' => $id_user,
			'status' => 1,
		];
		return $this->db->get_where('orders', $data)->row_array();
	}

	public function get_where_id($id_order)
	{
		$data = [
			'id_order' => $id_order,
		];
		return $this->db->get_where('orders', $data)->row_array();
	}

	public function add($id_user ,$total_price)
	{
		$data = [
			'id_user' => $id_user,
			'total_price' => $total_price,
			'invoice' => "NULL",
		];
		return $this->db->insert('orders', $data);
	}

	public function update_where_id_user($update_total_price, $current_id_user, $current_id_order)
	{
		$data = [
			'total_price' => $update_total_price,
		];
		$where = [
			'id_user' => $current_id_user,
			'id_order' => $current_id_order,
		];
		
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update('orders');
	}

	public function delete_where_id($id_order, $old_total_price, $total_price)
	{
		$data = [
			'total_price' => $total_price - $old_total_price,
		];
		$where = [
			'id_order' => $id_order,
		];
		$this->db->set($data);
        $this->db->where($where);
        return $this->db->update('orders');
	}

	public function delete_all_where_id($id_order)
	{
		$data = [
			'id_order' => $id_order,
		];
		$this->db->where($data);
        return $this->db->delete('orders');
	}

	public function update_check_out($id_order, $invoice, $remark)
	{
		// upload image
		$upload_image = $_FILES['image'];
		if( $upload_image )
		{
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['upload_path'] = './assets/img/orders/';
			$this->load->library('upload', $config);
			
			if( $this->upload->do_upload('image') )
			{
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else
			{
				echo $this->upload->display_errors();
			}
		}
		// end upload image

		$data = [
			'status' => 1,
			'invoice' => $invoice,
			'remark' => $remark,
		];
		$where = [
			'id_order' => $id_order,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update('orders');
	}

	public function update_status_one_to_two($id_order)
	{
		$data = [
			'status' => 2,
		];
		$where = [
			'id_order' => $id_order,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update('orders');
	}

	public function update_status_two_to_three($id_order)
	{
		$data = [
			'status' => 3,
		];
		$where = [
			'id_order' => $id_order,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update('orders');
	}

	public function get_where_id_user_status_zero_plus($id_user)
	{
		$data = [
			'id_user' => $id_user,
			'status >' => 0,
		];
		return $this->db->get_where('orders', $data)->result_array();
	}

	public function count_manual_order()
	{
		$this->db->count_all_results('orders');
		$this->db->where('status', 0);
        $this->db->from('orders');
        return $this->db->count_all_results();
	}

	public function count_order_verification()
	{
		$this->db->count_all_results('orders');
		$this->db->where('status', 1);
        $this->db->from('orders');
        return $this->db->count_all_results();
	}

	public function count_order_process()
	{
		$this->db->count_all_results('orders');
		$this->db->where('status', 2);
        $this->db->from('orders');
        return $this->db->count_all_results();
	}

	public function sum_total_price()
	{
		// $this->db->select_sum('total_price');
		// $this->db->from('orders');
		// return $this->db->get()->row_array();
		$this->db->select_sum('total_price');
		return $this->db->get('orders')->row_array();
	}

}
