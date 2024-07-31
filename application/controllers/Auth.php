<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
	public function index()
	{
		$this->load->view('login');
	}

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->from('user');
        $this->db->where('username',$username);
        $cek = $this->db->get()->row();
        if ($cek==NULL){//jika cek == kosong maka username nya ngga ditemukan 
            $this->session->set_flashdata('alert',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>username doesnt exist</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('auth');
        
        }else if($password ==$cek-> password){
            $data =array(
                'user_id' => $cek->user_id,
                'username' => $cek->username,
                'name' => $cek->name,
                'level' => $cek->level,
            );
            $this->session->set_userdata($data);
            redirect('beranda');
        }else{
            $this->session->set_flashdata('alert',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>your password is incorrect</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );
        redirect('auth');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}
