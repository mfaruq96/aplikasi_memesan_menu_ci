<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		// belum login
		if( !$this->session->userdata('email') )
        {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
            redirect('auth');
        };

		// load model
		$this->load->model('model_users');
	}
	
	public function index()
	{
		$data['title'] = "My Profile";
		$data['active'] = "My Profile";
		$data['user'] = $this->model_users->get_by_email_session();

		$this->load->view('layouts/main_header', $data);
		$this->load->view('layouts/main_sidebar');
		$this->load->view('layouts/main_wrapper');
		$this->load->view('layouts/main_topbar');
		$this->load->view('profile/index');
		$this->load->view('layouts/main_footer');
	}

	public function edit_profile()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');

		if( $this->form_validation->run() == false )
		{
			$data['title'] = "Edit Profile";
			$data['active'] = "Edit Profile";
			$data['user'] = $this->model_users->get_by_email_session();

			$this->load->view('layouts/main_header', $data);
			$this->load->view('layouts/main_sidebar');
			$this->load->view('layouts/main_wrapper');
			$this->load->view('layouts/main_topbar');
			$this->load->view('profile/edit_profile');
			$this->load->view('layouts/main_footer');
		} else
		{
			// var_dump($this->input->post());
			$this->model_users->edit_profile();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated.</div>');
            redirect('profile');
		}
	}

	public function change_password()
	{
		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|required|min_length[6]|matches[new_password1]');

		if( $this->form_validation->run() == false )
		{
			$data['title'] = "Change Password";
			$data['active'] = "Change Password";
			$data['user'] = $this->model_users->get_by_email_session();

			$this->load->view('layouts/main_header', $data);
			$this->load->view('layouts/main_sidebar');
			$this->load->view('layouts/main_wrapper');
			$this->load->view('layouts/main_topbar');
			$this->load->view('profile/change_password');
			$this->load->view('layouts/main_footer');
		} else
		{
			// $this->model_users->change_password();
			$current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
			$user = $this->model_users->get_by_email_session();

            if( !password_verify($current_password, $user['password']) )
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('profile/change_password');
            } else
            {
                if( $current_password == $new_password )
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('profile/change_password');
                } else
                {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('users');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Change password successfully.</div>');
                    redirect('profile/change_password');
                }
            }
		}
	}

}
