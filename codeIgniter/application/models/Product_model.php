<?php
    class User_model extends CI_Model{

        public function saveproduct(){
            $data = array(
                'p_code' => random_int(1, 9999999),
                'p_name' => $this->input->post('p_name'),
                'p_price' => $this->input->post('p_price'),
                'p_type' => $this->input->post('p_type'),
                'p_qoh' => $this->input->post('p_qoh'),
            );
            return $this->db->insert('product', $data);
        }

        public function getproduct(){
            $this->db->select('*');
            $this->db->from('product');
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
                'p_price' => $this->input->post('p_price'),
                'p_type' => $this->input->post('p_type'),
                'p_qoh' => $this->input->post('p_qoh'),
            );
            $this->db->where('p_code', $id);
            $this->db->update('product', $data);
        }

        public function deleteproduct($id){
            $this->db->where('p_code', $id);
            $this->db->delete('product');
        }

    }
?>