<?php
    
    class Inventory_model extends CI_Model
    {
        
        public function getinventory()
        {
            $query = $this->db->query("SELECT p.p_name, p.p_qoh, p.p_type, p.p_code, pr.price_amount, p.sold
            FROM products p INNER JOIN prices pr ON p.p_code = pr.p_code WHERE u_code = ".$this->session->userdata('u_code'));
            return $query->result();
        }

        public function getinventory_by_id($id)
        {
            $query = $this->db->get_where('inventory', array('i_id' => $id));
            return $query->row_array();
        }

    }
?>