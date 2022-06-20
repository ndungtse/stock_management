<?php
    
    class Inventory extends CI_Controller
    {
        
        public function overview()
        {
            if ($this->session->userdata('logged_in')) {
                $data['title'] = 'inventory';
                $data['snav'] = 'all';
                $data['inventories'] = $this->inventory_model->getinventory();
                $this->load->helper('url');
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar', $data);
                $this->load->view('templates/subnav', $data);
                $this->load->view('pages/inventory/overview', $data);
                $this->load->view('templates/footer', $data);
            } else {
                redirect('/users/login');
            }
        }

        public function sold(){
            if ($this->session->userdata('logged_in')) {
                $data['title'] = 'inventory';
                $data['snav'] = 'sold';
                $data['solds'] = $this->inventory_model->getsoldbyuser();
                $this->load->helper('url');
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar', $data);
                $this->load->view('templates/subnav', $data);
                $this->load->view('pages/inventory/sold', $data);
                $this->load->view('templates/footer', $data);
            } else {
                redirect('/users/login');
            }
        }
    }
?>