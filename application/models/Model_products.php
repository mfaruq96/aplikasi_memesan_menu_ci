<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_products extends CI_Model
{

    public function get_all()
    {
		return $this->db->get('products')->result_array();
    }

	public function get_all_join_category()
	{
		$query = "SELECT `products`.*, `categories`.`category`
                    FROM `products`
					JOIN `categories`
                    ON `products`.`id_category` = `categories`.`id_category`
                    ";
        return $this->db->query($query)->result_array();
	}

	public function add_product()
	{
		// upload image
        $upload_image = $_FILES['image'];
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/products/';
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        $new_image = $this->upload->data('file_name');
        // end upload image

		$data = [
			'id_category' => htmlspecialchars($this->input->post('id_category', true)),
			'product' => htmlspecialchars($this->input->post('product', true)),
			'price' => htmlspecialchars($this->input->post('price', true)),
			'image' => $new_image,
			'is_active' => htmlspecialchars($this->input->post('status', true)),
		];

		return $this->db->insert('products', $data);
	}

	public function get_all_where_makanan()
	{
		$query = "SELECT `products`.*, `categories`.`category`
                    FROM `products`
					JOIN `categories`
                    ON `products`.`id_category` = `categories`.`id_category`
					WHERE `products`.`id_category` = 1
					ORDER BY `products`.`is_active` DESC
                    ";
        return $this->db->query($query)->result_array();
	}

	public function get_all_where_minuman()
	{
		$query = "SELECT `products`.*, `categories`.`category`
                    FROM `products`
					JOIN `categories`
                    ON `products`.`id_category` = `categories`.`id_category`
					WHERE `products`.`id_category` = 2
					ORDER BY `products`.`is_active` DESC
                    ";
        return $this->db->query($query)->result_array();
	}

	public function get_by_id_product($id_product)
	{
		$data = [
			'id_product' => $id_product,
		];
		return $this->db->get_where('products', $data)->row_array();
	}

	public function count()
	{
		$this->db->count_all_results('products');
        $this->db->from('products');
        return $this->db->count_all_results();
	}

}
