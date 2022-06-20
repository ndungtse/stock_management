<?php
    
    class Pages extends CI_Controller {
        public function view($page = 'home') {
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                show_404();
            }
            else if($this->session->userdata('logged_in')) {
                
                $data['title'] = $page;
                $data['name'] = $this->session->userdata('u_name');
                $data['email'] = $this->session->userdata('u_email');

                $data['NoProducts'] = $this->product_model->getUserCountProducts();
                $data['Income'] = $this->product_model->getUserIncome();
                $data['NoSold'] = $this->product_model->getCountSold();

                $this->load->helper('url');
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar', $data);
                $this->load->view('pages/'.$page, $data);
                $this->load->view('templates/footer', $data);
            }
            else {
                redirect('/users/login');
            }
         }
    }
?>