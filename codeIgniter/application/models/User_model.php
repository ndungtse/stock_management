<?php
	class User_model extends CI_Model{

		public function register($enc_password){
			$data = array(
				'u_address' => $this->input->post('address'),
                'u_email' => $this->input->post('email'),
                'u_name' => $this->input->post('name'),
                'u_phone' => $this->input->post('phone'),
                'u_password' => $enc_password
			);
			$this->session->set_userdata($data);
			return $this->db->insert('users', $data);
		}
		
public function login($email, $password){
			$this->db->where('u_email', $email);
			$this->db->where('u_password', $password);
			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				$user = array(
					'u_code' => $result->row()->u_code,
					'u_address' => $result->row()->u_address,
					'u_email' => $result->row()->u_email,
					'u_name' => $result->row()->u_name,
					'u_phone' => $result->row()->u_phone);
				return $user;
			} else {
				return false;
			}
		}

		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('u_email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
	}