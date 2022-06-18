<?php
	class User_model extends CI_Model{

		public function register($enc_password){
			// $this->load->library('session');

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
				return $result->row(0)->v_code;
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