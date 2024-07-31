<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
       
    }

    public function index() {
        date_default_timezone_set("Asia/Jakarta");
		$date= date('Y-m-d');
		$this->db->select('*');
		$this->db->from('purchase a')->order_by('a.tanggal','DESC')->where('a.tanggal',$date);
		$this->db->join('suplier b','a.code_s=b.code','left');
		$purchase= $this->db->get()->result_array();


        $this->db->from('suplier')->order_by('nama','ASC');
		$suplier= $this->db->get()->result_array();
		$data = array(
			'judul' => 'Cashier App || Sales Page',
            'purchase'=> $purchase,
			'suplier' => $suplier
		);
		$this->template->load('template_wak','purchase',$data);
    }

    public function detail($suplier_id)
	{
		date_default_timezone_set("Asia/Jakarta");
		$date= date('Y-m');
		$this->db->from('purchase');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
        $amount = $this->db->count_all_results();

		$this->db->from('produk')->where('stok >',0)->order_by('name','ASC');
		$product = $this->db->get()->result_array();

		$note= date('ymd').$amount+1;

		$this->db->from('suplier')->where('suplier_id',$suplier_id);
		$suplier_name = $this->db->get()->row()->nama;

		// $this->db->from('detail_penjualan a');
		// $this->db->join('produk b','a.product_id=b.product_id','left');
		// $this->db->where('a.code_penjualan',$note);
		// $detail = $this->db->get()->result_array();

		// $this->db->from('tempory a');
		// $this->db->join('produk b','a.product_id=b.product_id','left');
		// $this->db->where('a.user_id',$this->session->userdata('user_id'));
		// $this->db->where('a.customer_id',$customer_id);
		// $tempory = $this->db->get()->result_array();

		$data = array(
			'judul' 			=> 'Cashier App || Sales Transaction Page',
			'note'	=> $note,
			'product' 			=> $product,
			'suplier_id'		=> $suplier_id,
			'suplier_name' 	    => $suplier_name,
			// 'detail'			=> $detail,
			// 'tempory'			=> $tempory
		);
		$this->template->load('template_wak','detail',$data);
	}

    public function pay(){
        date_default_timezone_set("Asia/Jakarta");
		$date= date('Y-m');
		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
        $amount = $this->db->count_all_results();
		$note= date('ymd').$amount+1;

		

        $this->db->from('purchase a');
		$this->db->join('produk b','a.product_id=b.product_id','left');
		$this->db->where('a.kode_pembelian',$note);
		$code_product = $this->db->get()->row()->note;
        
		$data = array(
            'kode_pembelian'    		=> $note,
            'suplier_id'  				=> $suplier_id,
            'code_product' 			    =>  $code_product,
            'total_tagihan' 			=> $this->input->post('total_tagihan'),
			'tanggal' 					=> date('Y-m-d')
        );
        $this->db->insert('purchase',$data);
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sale/invoice/'.$this->input->post('code_penjualan'));
	}
}