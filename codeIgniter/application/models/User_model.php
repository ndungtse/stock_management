<?php
	class User_model extends CI_Model{

		public function register($enc_password){
			$this->load->library('session');
			$data = array(
				'v_code' => random_int(1, 9999999),
				'v_address' => $this->input->post('address'),
                'v_email' => $this->input->post('email'),
                'v_name' => $this->input->post('name'),
                'v_phone' => $this->input->post('phone'),
                'v_password' => $enc_password
			);
			$this->session->set_userdata($data);
			return $this->db->insert('vendor', $data);
		}
		
		// Log user in
// public function login($username, $password){
		// 	// Validate
		// 	$this->db->where('username', $username);
		// 	$this->db->where('password', $password);

		// 	$result = $this->db->get('users');

		// 	if($result->num_rows() == 1){
		// 		return $result->row(0)->id;
		// 	} else {
		// 		return false;
		// 	}
		// }

		// // Check username exists
		// public function check_username_exists($username){
		// 	$query = $this->db->get_where('users', array('username' => $username));
		// 	if(empty($query->row_array())){
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }

		// // Check email exists
		// public function check_email_exists($email){
		// 	$query = $this->db->get_where('users', array('email' => $email));
		// 	if(empty($query->row_array())){
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }
	}