<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
       
    }

    public function index() {
        $this->db->from('suplier');
        $this->db->order_by('nama','ASC');
        $suplier = $this->db->get()->result_array();

        $data= array(
            'judul'     =>  'Cashier App || Suplier page',
           'suplier'    => $suplier
        
        );

        $this->template->load('template_wak','suplier',$data);
    }

    public function save(){
        $this->db->from('suplier');
        $this->db->where('nama',$this->input->post('nama'));
        $cek = $this->db->get()->result_array();
        if ($cek<>NULL){
            $this->session->set_flashdata('alert',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>suplier alredy exist</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
        }
      
		$data = array(
            'code'      => $this->input->post('code'),
			'nama' => $this->input->post('nama'),
            'telp' => $this->input->post('telp'),
        );
        $this->db->insert('suplier',$data);
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('suplier');
    }

    public function edit(){
        $where = array (
            'suplier_id' => $this->input->post('suplier_id')
        );
        $data = array(
            'nama' => $this->input->post('nama'),
            'telp'=>$this->input->post('telp'),
        );
        $this->db->update('suplier',$data,$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );
        redirect('suplier');
    }

    public function delete($id){
        $where = array (
            'suplier_id' => $id
        );
        $this->db->delete('suplier',$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

        redirect('suplier');
    }


}