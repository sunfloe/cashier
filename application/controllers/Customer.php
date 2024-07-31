<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('beranda');
        }
    }
	public function index()
	{
        $this->db->from('pelanggan');
        $this->db->order_by('name','ASC');
        $customer = $this->db->get()->result_array();
		$data = array(
			'judul' => 'Cashier App || Customer Page',
            'customer' => $customer
		);
		$this->template->load('template_wak','customer',$data);
	}

    public function save(){
        $this->db->from('pelanggan');
        $data = array(
            'name'      => $this->input->post('name'),
            'alamat'  => $this->input->post('alamat'),
            'telp'  => $this->input->post('telp'),
        );
        $this->db->insert('pelanggan',$data);
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('customer');
    }

    public function delete($id){
        $where = array(
            'customer_id' => $id
        );
        $this->db->delete('pelanggan',$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

        redirect('customer');
    }

    public function edit(){
        $where = array (
            'customer_id' => $this->input->post('customer_id')
        );
        $data = array(
            'name' => $this->input->post('name'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
        );
        $this->db->update('pelanggan',$data,$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

    redirect('customer');
    }
}