<?php
    class Product_model extends CI_Model{

        public function saveproduct(){
            $p_code = random_int(1, 9999999);
            $data = array(
                'p_code' => $p_code,
                'p_name' => $this->input->post('name'),
                'p_type' => $this->input->post('type'),
                'p_qoh' => $this->input->post('quantity'),
                'p_rem' => $this->input->post('quantity'),
                'u_code' => $this->session->userdata('u_code')
            );
            $data1 = array(
                'price_code' => random_int(1, 9999999),
                'p_code' => $p_code,
                'price_amount' => $this->input->post('price'),
            );
            $this->db->insert('products', $data);
            return $this->db->insert('prices', $data1);
        }

        public function getUserProducts(){
            $query = $this->db->query("SELECT p.p_name, p.p_qoh, p.p_type, p.p_code, pr.price_amount
             FROM products p INNER JOIN prices pr ON p.p_code = pr.p_code WHERE u_code = ".$this->session->userdata('u_code'));
            return $query->result();
        }

        public function getProductPrice($p_code){
            $this->db->select('price_amount');
            $this->db->from('prices');
            $this->db->where("p_code", $p_code);
            $query = $this->db->get();
            return $query->result();
        }

        public function getproductbyid($id){
            $this->db->select('*');
            $this->db->from('products');
            $this->db->where('p_code', $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function updateproduct($id){
            $data = array(
                'p_name' => $this->input->post('name'),
                'p_type' => $this->input->post('type'),
                'p_qoh' => $this->input->post('quantity'),
            );
            $this->db->set($data);
            $this->db->where('p_code', $id);
            $this->db->update('products');
        }
        public function updateProductPrice($id){
            $data = array(
                'price_amount' => $this->input->post('price'),
            );
            $this->db->set($data);
            $this->db->where('p_code', $id);
            $this->db->update('prices');
        }

        public function deleteproduct($id){
            $this->db->where('p_code', $id);
            $this->db->delete('products');
        }
        public function deleteproductprice($id){
            $this->db->where('p_code', $id);
            $this->db->delete('prices');
        }

        public function getUserCountProducts(){
            $query = $this->db->query("SELECT SUM(p_qoh) as p_sum FROM products WHERE u_code = ".$this->session->userdata('u_code'));
            return $query->result_array();
        }

        public function getUserIncome(){
            $query = $this->db->query("SELECT SUM(s_cost) as s_sum FROM sold WHERE u_code = ".$this->session->userdata('u_code'));
            return $query->result_array();
        }

        public function getCountSold(){
            $query = $this->db->query("SELECT SUM(q_sold) as c_sold FROM sold WHERE u_code = ".$this->session->userdata('u_code'));
            return $query->result_array();
        }

    }
?>