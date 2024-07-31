<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kembaran_sirekap extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }

    public function index(){
        $this->db->from('hitung_suara');
        $this->db->order_by('nama_tps_4','ASC');
        $suara = $this->db->get()->result_array();
        
        $data = array(
            'judul'     => 'Praktek STS || Hitung Suara',
            'suara'     => $suara
        );

        $this->template->load('template_wak','kembaran_sirekap',$data);
    }

    public function add(){
        $total_4        = $this->input->post('total_4');
        $total_sah_4    = $this->input->post('total_sah_4');
        $total_tidaksah_4  = $this->input->post('total_tidaksah_4'); 
        $paslon1_4      = $this->input->post('paslon1_4');
        $paslon2_4      = $this->input->post('paslon2_4');
        $paslon3_4      = $this->input->post('paslon3_4');
        $nama_tps_4     = $this->input->post('nama_tps_4');

        if ($total_4<>$total_sah_4+$total_tidaksah_4){
            $this->session->set_flashdata('alert',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>total jumlah suara salah</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect($_SERVER['HTTP_REFERER']);

        }else if ($total_sah_4 !=  ($paslon1_4+$paslon2_4+$paslon3_4)){
            $this->session->set_flashdata('alert',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>total jumlah suara dari tiap paslon salah</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $data = array(
                'nama_tps_4'  => $nama_tps_4,
                'total_4'   => $total_4,
                'total_sah_4' => $total_sah_4,
                'total_tidaksah_4'  => $total_tidaksah_4,
                'paslon1_4'     => $paslon1_4,
                'paslon2_4'     => $paslon2_4,
                'paslon3_4'     => $paslon3_4,
            );
            $this->db->insert('hitung_suara',$data);
            $this->session->set_flashdata('alert',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Succesfully</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }
}