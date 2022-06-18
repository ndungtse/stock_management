<?php
    
    class Products extends CI_Controller {

        public function view(){
            $data['products'] = $this->product_model->getUserProducts();

            $this->load->helper('url');
            $this->load->view('templates/header', $data);
            $this->load->view('pages/products/view', $data);
            $this->load->view('templates/footer', $data);
        }

        public function addproduct(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $data['title'] = 'Save';

            $this->form_validation->set_rules('name', 'name', 'required|min_length[3]');
            $this->form_validation->set_rules('type', 'product type', 'required');
            $this->form_validation->set_rules('price', 'price', 'required');
            $this->form_validation->set_rules('quantity', 'quantity', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header', $data);
                $this->load->view('pages/products/addproduct', $data);
                $this->load->view('templates/footer');
            } else {
                $this->product_model->saveproduct();
                $this->session->set_flashdata('product_saved', 'Product saved');

                redirect('/');
            }

        }

        public function updateproduct(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $data['title'] = 'Update';
            // $id = $_GET['id'];
            // $data['product'] = $this->product_model->getproductbyid($id);

            $this->form_validation->set_rules('name', 'name', 'required|min_length[3]');
            $this->form_validation->set_rules('type', 'product type', 'required');
            $this->form_validation->set_rules('price', 'price', 'required');
            $this->form_validation->set_rules('quantity', 'quantity', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header', $data);
                $this->load->view('pages/products/updateproduct', $data);
                $this->load->view('templates/footer');
            } else {
                $this->product_model->updateproduct();
                $this->session->set_flashdata('product_updated', 'Product updated');

                redirect('/');
            }
        }

        public function removeproduct($id){
            $this->product_model->deleteproduct($id);
            $this->session->set_flashdata('product_deleted', 'Product deleted');

            redirect('/products/view');
        }
    }
?>