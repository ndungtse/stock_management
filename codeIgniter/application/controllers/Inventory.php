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

    public function sold()
    {
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

    function sellproduct()
    {
        if (isset($_GET['p']) && isset($_GET['d']) && isset($_GET['n'])) {
            $p_code = $_GET['p'];
            $price = $_GET['d'];
            $name = $_GET['n'];

        $data['p_code'] = $p_code;
        $data['price'] = $price;
        $data['name'] = $name;
        $data['title'] = 'inventory';
        $data['snav'] = 'all';

        $this->form_validation->set_rules('quantity', 'Product Quantity', 'required|numeric|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->helper('url');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/subnav', $data);
            $this->load->view('pages/inventory/sellproduct', $data);
        } else {
            $this->inventory_model->updateOnSell($p_code, $price);
            $this->overview();
        }
    }
    }
}
