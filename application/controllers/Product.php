<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')!='admin'){
            redirect('beranda');
        }
    }
	public function index()
	{
        $categories = $this->db->get('category')->result_array();

      
        $this->db->from('produk');
        
        $this->db->order_by('name','ASC');
        $product = $this->db->get()->result_array();

		$data = array(
			'judul' => 'Cashier App || Product Page',
            'product' => $product,
            'categories' => $categories
		);
		$this->template->load('template_wak','product',$data);
	}

    public function save(){
        $this->db->from('produk');
        $data = array(
            'name'      => $this->input->post('name'),
            // 'category_id' => $this->input->post('category_id'),
            'code_product'  => $this->input->post('code_product'),
            'price'  => $this->input->post('price'),
            'stok'  => $this->input->post('stok'),
        );
        $this->db->insert('produk',$data);
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('product');
    }

    public function delete($id){

        $where = array(
            'product_id' => $id
        );
        
        

        $this->db->delete('produk',$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

        redirect('product');
    }

    public function edit(){
        $where = array (
            'product_id' => $this->input->post('product_id')
        );
        $data = array(
            'code_product' => $this->input->post('code_product'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'stok' => $this->input->post('stok'),
        );
        $this->db->update('produk',$data,$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

    redirect('product');
    }
}

