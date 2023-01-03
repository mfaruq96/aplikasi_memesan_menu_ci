<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_users extends CI_Model
{

    public function get_all()
    {
		$query = "SELECT `users`.*, `roles`.`role`
                    FROM `users`
					JOIN `roles`
                    ON `users`.`id_role` = `roles`.`id_role`
                    ";
        return $this->db->query($query)->result_array();
    }

	public function get_by_email()
	{
		$email = $this->input->post('email');
		return $this->db->get_where('users', ['email' => $email])->row_array();
	}

	public function get_by_email_session()
	{
		$email = $this->session->userdata('email');
		return $this->db->get_where('users', ['email' => $email])->row_array();
	}

	public function register()
	{
		$data = [
			'id_role' => 1,
			'name' => htmlspecialchars($this->input->post('name', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'phone' => htmlspecialchars($this->input->post('phone', true)),
			'password' => password_hash($this->input->post('password_one'), PASSWORD_DEFAULT),
			'image' => "default.svg",
			'is_active' => 1,
		];
		// var_dump($data);
		return $this->db->insert('users', $data);
	}

	public function edit_profile()
	{
		$email = $this->input->post('email');

		// upload image
		$upload_image = $_FILES['image'];
		if( $upload_image )
		{
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/profiles/';
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
			'name' => htmlspecialchars($this->input->post('name', true)),
			'phone' => htmlspecialchars($this->input->post('phone', true))
		];

		$this->db->set($data);
		$this->db->where('email', $email);
		$this->db->update('users');
	}

	public function change_password()
	{
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password1');

		
	}

}
