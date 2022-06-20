<?php
    
    class Inventory extends CI_Controller
    {
        
        public function overview()
        {
            if ($this->session->userdata('logged_in')) {
                $data['title'] = 'inventory';
                $data['inventories'] = $this->inventory_model->getinventory();
                $this->load->helper('url');
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar', $data);
                $this->load->view('pages/inventory/overview', $data);
                $this->load->view('templates/footer', $data);
            } else {
                redirect('/users/login');
            }
        }
    }
?>