<?php
    class Product_model extends CI_Model{

        public function saveproduct(){
            $p_code = random_int(1, 9999999);
            $data = array(
                'p_code' => $p_code,
                'p_name' => $this->input->post('name'),
                'p_type' => $this->input->post('type'),
                'p_qoh' => $this->input->post('quantity'),
                'v_code' => $this->session->userdata('v_code')
            );
            $data1 = array(
                'price_code' => random_int(1, 9999999),
                'p_code' => $p_code,
                'price_amount' => $this->input->post('price'),
            );
            $this->db->insert('product', $data);
            return $this->db->insert('price', $data1);
        }

        public function getUserProducts(){
            $query = $this->db->query("SELECT p.p_name, p.p_qoh, p.p_type, p.p_code, pr.price_amount
             FROM product p INNER JOIN price pr ON p.p_code = pr.p_code WHERE v_code = ".$this->session->userdata('v_code'));
            return $query->result();
        }

        public function getProductPrice($p_code){
            $this->db->select('price_amount');
            $this->db->from('price');
            $this->db->where("p_code", $p_code);
            $query = $this->db->get();
            return $query->result();
        }

        public function getproductbyid($id){
            $this->db->select('*');
            $this->db->from('product');
            $this->db->where('p_code', $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function updateproduct($id){
            $data = array(
                'p_name' => $this->input->post('p_name'),
                'p_type' => $this->input->post('p_type'),
                'p_qoh' => $this->input->post('p_qoh'),
            );
            $data1 =  $this->input->post('p_price');

            $this->db->where('p_code', $id);
            $this->db->update('product', $data);
            $this->db->update('price', $data1);
        }
        // public function updateProductPrice($id){
        //     $data = array(
        //         'price_amount' => $this->input->post('p_price'),
        //     );
        //     $this->db->where('p_code', $id);
        //     $this->db->update('price', $data);
        // }

        public function deleteproduct($id){
            $this->db->where('p_code', $id);
            $this->db->delete('product');
        }

    }
?>