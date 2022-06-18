<?php
	class User_model extends CI_Model{

		public function register($enc_password){
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
		
public function login($email, $password){
			$this->db->where('v_email', $email);
			$this->db->where('v_password', $password);
			$result = $this->db->get('vendor');

			if($result->num_rows() == 1){
				$user = array(
					'v_code' => $result->row()->v_code,
					'v_address' => $result->row()->v_address,
					'v_email' => $result->row()->v_email,
					'v_name' => $result->row()->v_name,
					'v_phone' => $result->row()->v_phone);
				return $user;
			} else {
				return false;
			}
		}

		public function check_email_exists($email){
			$query = $this->db->get_where('vendor', array('v_email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
	}