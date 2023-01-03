<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_order_details extends CI_Model
{

    public function get_all()
    {
		return $this->db->get('order_details')->result_array();
    }

	public function get_all_export()
	{
		$query = "SELECT `order_details`.*, `users`.`name`, `products`.`product`, `users`.`phone`, `orders`.`invoice`
                    FROM `order_details`
					JOIN `users`
                    ON `order_details`.`id_user` = `users`.`id_user`
					JOIN `products`
                    ON `order_details`.`id_product` = `products`.`id_product`
					JOIN `orders`
                    ON `order_details`.`id_order` = `orders`.`id_order`
					ORDER BY `orders`.`invoice` ASC
                    ";
        return $this->db->query($query)->result_array();
	}

	public function get_where_id_user_status_zero($id_user)
	{
		$query = "SELECT `order_details`.*, `products`.`product`
                    FROM `order_details`
					JOIN `products`
                    ON `order_details`.`id_product` = `products`.`id_product`
					WHERE `order_details`.`id_user` = $id_user
					AND `order_details`.`status` = 0
					ORDER BY `order_details`.`updated_at` DESC
                    ";
        return $this->db->query($query)->result_array();
	}

	public function get_where_id_order_id_product($id_order, $id_product)
	{
		$data = [
			'id_order' => $id_order,
			'id_product' => $id_product,
		];
		return $this->db->get_where('order_details', $data)->row_array();
	}

	public function get_where_id($id_order_detail)
	{
		$data = [
			'id_order_detail' => $id_order_detail,
		];
		return $this->db->get_where('order_details', $data)->row_array();
	}

	public function get_where_id_order_join_products_user($id_order)
	{
		$query = "SELECT `order_details`.*, `users`.`name`, `products`.`product`
                    FROM `order_details`
					JOIN `users`
                    ON `order_details`.`id_user` = `users`.`id_user`
					JOIN `products`
                    ON `order_details`.`id_product` = `products`.`id_product`
					WHERE `order_details`.`id_order` = $id_order
					ORDER BY `order_details`.`updated_at` DESC
                    ";
        return $this->db->query($query)->result_array();
	}

	public function get_where_id_order_join_products_user_row($id_order)
	{
		$query = "SELECT `order_details`.*, `users`.`name`, `products`.`product`, `users`.`phone`
                    FROM `order_details`
					JOIN `users`
                    ON `order_details`.`id_user` = `users`.`id_user`
					JOIN `products`
                    ON `order_details`.`id_product` = `products`.`id_product`
					WHERE `order_details`.`id_order` = $id_order
					ORDER BY `order_details`.`updated_at` DESC
                    ";
        return $this->db->query($query)->row_array();
	}

	public function add($id_user, $id_order, $id_product, $qty, $note, $price)
	{
		$data = [
			'id_user' => $id_user,
			'id_order' => $id_order,
			'id_product' => $id_product,
			'qty' => $qty,
			'note' => $note,
			'price' => $price,
			'status' => 0,
		];
		return $this->db->insert('order_details', $data);
	}

	public function update_where_id_order_id_product($id_order, $id_product, $new_qty)
	{
		$data = [
			'qty' => $new_qty,
		];
		$where = [
			'id_order' => $id_order,
			'id_product' => $id_product,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update('order_details');
	}

	public function update_where_id_order_id_product_plus_note($id_order, $id_product, $new_qty, $note)
	{
		$data = [
			'qty' => $new_qty,
			'note' => $note,
		];
		$where = [
			'id_order' => $id_order,
			'id_product' => $id_product,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update('order_details');
	}

	public function update_where_id_order_detail_note($id_order_detail, $note)
	{
		$data = [
			'note' => $note,
		];
		$where = [
			'id_order_detail' => $id_order_detail,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update('order_details');
	}

	public function delete_where_id($id_order_detail)
	{
		$data = [
			'id_order_detail' => $id_order_detail,
		];
		$this->db->where($data);
        return $this->db->delete('order_details');
	}

	public function get_where_id_user_id_order($id_user, $id_order)
	{
		$data = [
			'id_user' => $id_user,
			'id_order' => $id_order,
		];
		return $this->db->get_where('order_details', $data)->row_array();
	}

	public function update_check_out($id_order)
	{
		$data = [
			'status' => 1,
		];
		$where = [
			'id_order' => $id_order,
		];
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update('order_details');
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
		return $this->db->update('order_details');
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
		return $this->db->update('order_details');
	}

}
