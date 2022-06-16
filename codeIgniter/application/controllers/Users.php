<?php
	class Users extends CI_Controller{

		public function register(){
			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'name', 'required|min_length[3]');
			$this->form_validation->set_rules('address', 'address', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('pages/users/register', $data);
				$this->load->view('templates/footer');
			} else {
				$enc_password = md5($this->input->post('password'));
				$this->user_model->register($enc_password);
				// $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('/');
			}
		}

		// Log in user
// public function login(){
		// 	$data['title'] = 'Sign In';

		// 	$this->form_validation->set_rules('username', 'Username', 'required');
		// 	$this->form_validation->set_rules('password', 'Password', 'required');

		// 	if($this->form_validation->run() === FALSE){
		// 		$this->load->view('templates/header');
		// 		$this->load->view('users/login', $data);
		// 		$this->load->view('templates/footer');
		// 	} else {
				
		// 		// Get username
		// 		$username = $this->input->post('username');
		// 		// Get and encrypt the password
		// 		$password = md5($this->input->post('password'));

		// 		// Login user
		// 		$user_id = $this->user_model->login($username, $password);

		// 		if($user_id){
		// 			// Create session
		// 			$user_data = array(
		// 				'user_id' => $user_id,
		// 				'username' => $username,
		// 				'logged_in' => true
		// 			);

		// 			$this->session->set_userdata($user_data);

		// 			// Set message
		// 			$this->session->set_flashdata('user_loggedin', 'You are now logged in');

		// 			redirect('posts');
		// 		} else {
		// 			// Set message
		// 			$this->session->set_flashdata('login_failed', 'Login is invalid');

		// 			redirect('users/login');
		// 		}		
		// 	}
		// }

		// // Log user out
		// public function logout(){
		// 	// Unset user data
		// 	$this->session->unset_userdata('logged_in');
		// 	$this->session->unset_userdata('user_id');
		// 	$this->session->unset_userdata('username');

		// 	// Set message
		// 	$this->session->set_flashdata('user_loggedout', 'You are now logged out');

		// 	redirect('users/login');
		// }

		// // Check if username exists
		// public function check_username_exists($username){
		// 	$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
		// 	if($this->user_model->check_username_exists($username)){
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }

		// // Check if email exists
		// public function check_email_exists($email){
		// 	$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
		// 	if($this->user_model->check_email_exists($email)){
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }
	}

?>