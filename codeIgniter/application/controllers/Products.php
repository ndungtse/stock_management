<?php

class Products extends CI_Controller
{

    public function view()
    {
        if ($this->session->userdata('logged_in')) {
            $data['products'] = $this->product_model->getUserProducts();

            $this->load->helper('url');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('pages/products/view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('/users/login');
        }
    }

    public function addproduct()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $data['title'] = 'Save';

            $this->form_validation->set_rules('name', 'name', 'required|min_length[3]');
            $this->form_validation->set_rules('type', 'product type', 'required');
            $this->form_validation->set_rules('price', 'price', 'required');
            $this->form_validation->set_rules('quantity', 'quantity', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar', $data);
                $this->load->view('pages/products/addproduct', $data);
                $this->load->view('templates/footer');
            } else {
                $this->product_model->saveproduct();
                $this->session->set_flashdata('product_saved', 'Product saved');

                $data['info'] = 'Product saved successfully';
                redirect('/products/view?info='.$data['info']);
            }
        } else {
            redirect('/users/login');
        }
    }

    public function updateproduct()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $data['title'] = 'Update';
            $id = $_GET['id'];
            $data['product'] = $this->product_model->getproductbyid($id);
            $data['price'] = $this->product_model->getProductPrice($id);
            $data['id'] = $id;

            $this->form_validation->set_rules('name', 'name', 'required|min_length[3]');
            $this->form_validation->set_rules('type', 'product type', 'required');
            $this->form_validation->set_rules('price', 'price', 'required');
            $this->form_validation->set_rules('quantity', 'quantity', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar', $data);
                $this->load->view('pages/products/updateproduct', $data);
                $this->load->view('templates/footer');
            } else {
                $this->product_model->updateproduct($id);
                $this->product_model->updateProductPrice($id);
                $this->session->set_flashdata('product_updated', 'Product updated');

                $data['info'] = 'Product updated successfully';
                redirect('/products/view?info='.$data['info']);
            }
        } else {
            redirect('/users/login');
        }
    }

    public function removeproduct()
    {
        $id = $_GET['id'];
        $data['id'] = $id;
        if ($this->session->userdata('logged_in')) {
            $this->product_model->deleteproduct($id);
            $this->product_model->deleteproductprice($id);
            $this->session->set_flashdata('product_deleted', 'Product deleted');

            $data['info'] = 'Product deleted successfully';
            redirect('/products/view?info='.$data['info']);
        } else {
            redirect('/users/login');
        }
    }
}
