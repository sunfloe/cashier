<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')!='admin'){
            redirect('beranda');
        }
        $this->load->model('Cust_model');
        

    }
	public function index()
	{
        $this->db->from('user');
        $this->db->order_by('name','ASC');
        $user = $this->db->get()->result_array();
		$data = array(
			'judul' => 'Cashier App || User Page',
            'user' => $user
		);
		$this->template->load('template_wak','user',$data);
	}

    public function save(){
        $this->db->from('user');
        $this->db->where('username',$this->input->post('username'));
        $cek = $this->db->get()->result_array();
        if ($cek<>NULL){
            $this->session->set_flashdata('alert',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>username alredy exist</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
        }
        $this->Cust_model->save();
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('user');
    }

    public function edit(){
        $where = array (
            'user_id' => $this->input->post('user_id')
        );
        $data = array(
            'name' => $this->input->post('name')
        );
        $this->db->update('user',$data,$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

    redirect('user');
    }

    public function delete($id){
        $where = array(
            'user_id' => $id
        );
        
        $this->db->delete('user',$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

        redirect('user');
    }

    public function reset($id){
        $where = array (
            'user_id' =>$id
        );
        $data = array(
            'password' => md5('123')
        );
        $this->db->update('user',$data,$where);
        $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>succesfully!! your password is changed to 123</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );

    redirect('user');
    }
}
