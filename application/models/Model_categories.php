<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_categories extends CI_Model
{

    public function get_all()
    {
		return $this->db->get('categories')->result_array();
    }

	public function add_category()
	{
		$data = [
			'category' => htmlspecialchars($this->input->post('category', true)),
		];
		return $this->db->insert('categories', $data);
	}

}
