<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
        $this->load->model('Categories_m');
    }

    public function index() {
        
        $this->db->from('category');
        $this->db->order_by('name_category','ASC');
        $categories = $this->db->get()->result_array();

    
      

        $data= array(
            'judul'     =>  'Cashier App || categories page',
            'categories'=> $categories,
     
        );

        $this->template->load('template_wak','product_categories',$data);
    }

    public function save(){
        $this->Categories_m->save();
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('categories');
    }

    // public function list($category_id){
    
    //     $this->db->select('p.name');
    //     $this->db->from('produk p');
    //     $this->db->join('category k', 'p.product_id = k.product_id');
    //     $this->db->where('k.category_id', $category_id);
    //     $list = $this->db->get()->result_array();
        

    //     $data = array(
    //         'judul' 			=> 'Cashier App || Sales Transaction Page',
    //         'list'              => $list,
           
    //     );
        
    //     $this->template->load('template_wak','list',$data);
       
    // }
    public function edit(){
        $where = array (
            'category_id' => $this->input->post('category_id')
        );
        $data = array(
            'name_category' => $this->input->post('name_category')
        );
        $this->db->update('category',$data,$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

    redirect('categories');
    }

    public function delete($category_id){
        $where = array(
            'category_id' => $category_id
        );
        $this->db->delete('category',$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

        redirect('categories');
    }

}

