<?php
	class Users extends CI_Controller{

		public function signup(){
			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'name', 'required|min_length[3]');
			$this->form_validation->set_rules('address', 'address', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $data);
				$this->load->view('pages/users/signup', $data);
				$this->load->view('templates/footer');
			} else {
				$enc_password = md5($this->input->post('password'));
				$this->user_model->register($enc_password);
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('/');
			}
		}

public function login(){
			// $data['title'] = 'Sign In';
			$data['title'] = $this->session->userdata();

			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/users/login', $data);
				$this->load->view('templates/footer');
			} else {
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));

				$v_code = $this->user_model->login($email, $password);

				if($v_code){
					$user_data = array(
						'v_code' => $v_code,
						'email' => $email,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					redirect('/');
				} else {
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('users/login');
				}		
			}
		}

		public function logout(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('v_code');
			$this->session->unset_userdata('email');

			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');
		}

		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}

?>