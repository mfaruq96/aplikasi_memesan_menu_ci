<?php

function is_logged_in()
{
	$ci = get_instance();

	if ( !$ci->session->userdata('email') ) {
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
		redirect('auth');
	}
}

?>
