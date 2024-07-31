<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->library('Pdf');
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	
	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
		$date= date('Y-m-d');
		$this->db->select('*');
		$this->db->from('penjualan a')->order_by('a.tanggal','DESC')->where('a.tanggal',$date);
		$this->db->join('pelanggan b','a.customer_id=b.customer_id','left');
		$sale= $this->db->get()->result_array();


		$this->db->from('pelanggan')->order_by('name','ASC');
		$customers= $this->db->get()->result_array();
		$data = array(
			'judul' => 'Cashier App || Sales Page',
			'sale'  => $sale,
			'customers' => $customers
		);
		$this->template->load('template_wak','sale',$data);
	}
     
	public function transaksi($customer_id)
	{
		date_default_timezone_set("Asia/Jakarta");
		$date= date('Y-m');
		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
        $amount = $this->db->count_all_results();

		$this->db->from('produk')->where('stok >',0)->order_by('name','ASC');
		$product = $this->db->get()->result_array();

		$note= date('ymd').$amount+1;

		$this->db->from('pelanggan')->where('customer_id',$customer_id);
		$customers_name = $this->db->get()->row()->name;

		$this->db->from('detail_penjualan a');
		$this->db->join('produk b','a.product_id=b.product_id','left');
		$this->db->where('a.code_penjualan',$note);
		$detail = $this->db->get()->result_array();

		$this->db->from('tempory a');
		$this->db->join('produk b','a.product_id=b.product_id','left');
		$this->db->where('a.user_id',$this->session->userdata('user_id'));
		$this->db->where('a.customer_id',$customer_id);
		$tempory = $this->db->get()->result_array();

		$data = array(
			'judul' 			=> 'Cashier App || Sales Transaction Page',
			'note'				=> $note,
			'product' 			=> $product,
			'customer_id'		=> $customer_id,
			'customers_name' 	=> $customers_name,
			'detail'			=> $detail,
			'tempory'			=> $tempory
		);
		$this->template->load('template_wak','transaksi',$data);
	}



	public function temp(){
		$this->db->from('produk')->where('product_id',$this->input->post('product_id'));
		$stok_lama = $this->db->get()->row()->stok;

		$this->db->from('tempory');
		$this->db->where('product_id',$this->input->post('product_id'));
		$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->where('customer_id',$this->input->post('customer_id'));
		$cek = $this->db->get()->result_array();

		if($stok_lama<$this->input->post('jumlah')){
			$this->session->set_flashdata('alert',
			'<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Oops!You dont have enough stock</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		}else if($cek<>NULL){
			$this->session->set_flashdata('alert',
			'<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>product alredy selected</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		}else{
			$data = array(
				'customer_id'	=> $this->input->post('customer_id'),
				'user_id'		=> $this->session->userdata('user_id'),
				'product_id'		=> $this->input->post('product_id'),
				'jumlah'			=> $this->input->post('jumlah'),
				
			);
			$this->db->insert('tempory',$data);
			$this->session->set_flashdata('alert',
			'<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<strong>succesfully!!</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		}
		redirect($_SERVER['HTTP_REFERER']);



	}
	public function cart(){
		$this->db->from('detail_penjualan');
		$this->db->where('product_id',$this->input->post('product_id'));
		$this->db->where('code_penjualan',$this->input->post('code_penjualan'));
		$cek = $this->db->get()->result_array();
		if($cek<>NULL){
			$this->session->set_flashdata('alert',
			'<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>product alredy selected</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->db->from('produk')->where('product_id',$this->input->post('product_id'));
		$price = $this->db->get()->row()->price;
	
		$this->db->from('produk')->where('product_id',$this->input->post('product_id'));
		$stok_lama = $this->db->get()->row()->stok;
		
		$stok_sekarang	= $stok_lama-$this->input->post('jumlah');
		$subtotal 	= $this->input->post('jumlah')*$price;


		if($stok_lama>=$this->input->post('jumlah')){			

			$data = array(
				'code_penjualan'	=> $this->input->post('code_penjualan'),
				'product_id'		=> $this->input->post('product_id'),
				'jumlah'			=> $this->input->post('jumlah'),
				'sub_total'			=> $subtotal
			);
			$this->db->insert('detail_penjualan',$data);

			$updatedata = array(
				'stok'		=> $stok_sekarang
			);
			$where = array(
				'product_id'	=> $this->input->post('product_id')
			);
			$this->db->update('produk',$updatedata,$where);

			$this->session->set_flashdata('alert',
			'<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<strong>succesfully!!</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		}else{
			$this->session->set_flashdata('alert',
			'<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Oops!You dont have enough stock</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		}
        redirect($_SERVER['HTTP_REFERER']);
		
	}

	public function delete($detail_id,$product_id){
		$this->db->from('detail_penjualan')->where('detail_id',$detail_id);
		$jumlah = $this->db->get()->row()->jumlah;

		$this->db->from('produk')->where('product_id',$product_id);
		$stok_lama = $this->db->get()->row()->stok;
		$stok_sekarang = $jumlah + $stok_lama;
		$updatedata = array(
			'stok'		=> $stok_sekarang
		);
		$where = array(
			'product_id'		=> $product_id
		);
		$this->db->update('produk',$updatedata,$where);


		$where = array(
			'detail_id'		=> $detail_id
		);
		$this->db->delete('detail_penjualan',$where);
		$this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_temp($temp_id){
		$where = array(
			'temp_id'		=> $temp_id
		);
		$this->db->delete('tempory',$where);
		$this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function pay(){
		$data = array(
            'code_penjualan'    		=> $this->input->post('code_penjualan'),
            'customer_id'  				=> $this->input->post('customer_id'),
            'total_harga' 				=> $this->input->post('total_harga'),
			'tanggal' 					=> date('Y-m-d')
        );
        $this->db->insert('penjualan',$data);
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sale/invoice/'.$this->input->post('code_penjualan'));
	}

	public function pay2(){
		date_default_timezone_set("Asia/Jakarta");
		$date= date('Y-m');
		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
        $amount = $this->db->count_all_results();
		$note= date('ymd').$amount+1;

		//mindahin tempory ke detail
		$this->db->from('tempory a');
		$this->db->join('produk b','a.product_id=b.product_id','left');
		$this->db->where('a.user_id',$this->session->userdata('user_id'));
		$this->db->where('a.customer_id',$this->input->post('customer_id'));
		$temp = $this->db->get()->result_array();
		
		$total_harga =0;

		foreach ($temp as $yaa){
			if($yaa['stok']<$yaa['jumlah']){
				$this->session->set_flashdata('alert',
				'<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<strong>Oops!You dont have enough stock</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
			$total_harga = $total_harga + $yaa['jumlah'] * $yaa['price'];

			$data = array(
				'code_penjualan'	=> $note,
				'product_id'		=> $yaa['product_id'],
				'jumlah'			=> $yaa['jumlah'],
				'sub_total'			=> $yaa['jumlah']*$yaa['price'],
			);
			$this->db->insert('detail_penjualan',$data);
		}
		
		$data = array(
            'code_penjualan'    		=> $note,
            'customer_id'  				=> $this->input->post('customer_id'),
            'total_harga' 				=> $total_harga,
			'tanggal' 					=> date('Y-m-d')
        );
        $this->db->insert('penjualan',$data);
        $this->session->set_flashdata('alert',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>succesfully!!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
		$dataa = array('stok' => $yaa['stok']-$yaa['jumlah']);
		$where = array('product_id' => $yaa['product_id']);
		$this->db->update('produk',$dataa,$where);

		$where2 = array(
			'customer_id' 	=> $this->input->post('customer_id'),
			'user_id'		=> $this->session->userdata('user_id'),
		);
		$this->db->delete('tempory',$where2);

        redirect('sale/invoice/'.$note);
	}


	public function invoice($code_penjualan){
		$this->db->select('*');
		$this->db->from('penjualan a')->order_by('a.tanggal','DESC')->where('a.code_penjualan',$code_penjualan);
		$this->db->join('pelanggan b','a.customer_id=b.customer_id','left');
		$sale= $this->db->get()->row();

		$this->db->from('detail_penjualan a');
		$this->db->join('produk b','a.product_id=b.product_id','left');
		$this->db->where('a.code_penjualan',$code_penjualan);
		$detail = $this->db->get()->result_array();

		$data = array(
			'judul' 			=> 'Cashier App || Sales Transaction Page',
			'note'				=> $code_penjualan,
			'sale'				=> $sale,
			'detail'			=> $detail
		);
		$this->template->load('template_wak','invoice',$data);	
	}

	public function print($code_penjualan){
		$this->db->select('*');
		$this->db->from('penjualan a')->order_by('a.tanggal','DESC')->where('a.code_penjualan',$code_penjualan);
		$this->db->join('pelanggan b','a.customer_id=b.customer_id','left');
		$sale= $this->db->get()->row();

		$this->db->from('detail_penjualan a');
		$this->db->join('produk b','a.product_id=b.product_id','left');
		$this->db->where('a.code_penjualan',$code_penjualan);
		$detail = $this->db->get()->result_array();

		$data = array(
			'judul' 			=> 'Cashier App || Sales Transaction Page',
			'note'				=> $code_penjualan,
			'sale'				=> $sale,
			'detail'			=> $detail
		);
		$this->load->view('receipts',$data);	
	}

	
}
