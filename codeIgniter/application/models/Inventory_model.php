<?php
    
    class Inventory_model extends CI_Model
    {
        
        public function getinventory()
        {
            $query = $this->db->query("SELECT p.p_code, q_sold, p.p_rem, p.u_code, p.p_name, p.p_qoh, p.p_type, p.p_code, pr.price_amount, p.sold
            FROM products p INNER JOIN prices pr ON p.p_code = pr.p_code WHERE u_code = ".$this->session->userdata('u_code'));
            return $query->result();
        }

        public function getinventory_by_id($id)
        {
            $query = $this->db->get_where('inventory', array('i_id' => $id));
            return $query->row_array();
        }

        public function getsoldbyuser(){
           $query = $this->db->get_where('sold', array('u_code' => $this->session->userdata('u_code')));
            return $query->result();
        }

        public function updateOnSell($id, $pr, $qoh, $name){
            $data = array(
                'sold' => 1,
                'p_rem' => $qoh-$this->input->post('quantity'),
                'q_sold' => $this->input->post('quantity'),
            );
            $data1 = array(
                'q_sold' => $this->input->post('quantity'),
                's_cost' => $this->input->post('quantity')*$pr,
                'p_sold' => $name,
                'u_code' => $this->session->userdata('u_code'),
            );
            $this->db->set($data);
            $this->db->where('p_code', $id);
            $this->db->update('products');
            $this->db->insert('sold', $data1);

            return true;
        }

        public function getOutOfStock(){
            $query = $this->db->query("SELECT p.p_code, p.p_name, p.p_qoh, p.p_rem, p.p_type, p.p_code, pr.price_amount
            FROM products p INNER JOIN prices pr ON p.p_code = pr.p_code WHERE p.p_rem = 0 AND u_code = ".$this->session->userdata('u_code'));
            return $query->result();
        }
    }
