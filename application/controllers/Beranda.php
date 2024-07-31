<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	
	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
		$date= date('Y-m-d');
		$this->db->select('sum(total_harga) as total');
		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m-%d')",$date);
		$today = $this->db->get()->row()->total;

		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m-%d')",$date);
		$transaksi = $this->db->count_all_results();

		$date= date('Y-m');
		$this->db->select('sum(total_harga) as total');
		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
		$month = $this->db->get()->row()->total;

		$produk = $this->db->from('produk')->count_all_results();

		if($today==NULL){
			$today = 0;
		};
		if($month==NULL){
			$month = 0;
		};
		if($transaksi==NULL){
			$transaksi = 0;
		}


		$now 		= date('M');
		$satu		= date('M',strtotime("-1 Months"));
		$dua		= date('M',strtotime("-2 Months"));
		$tiga		= date('M',strtotime("-3 Months"));
		$empat		= date('M',strtotime("-4 Months"));
		$lima		= date('M',strtotime("-5 Months"));

		$date = date ("Y-m",strtotime("-1 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
		$month1 = $this->db->get()->row()->total;

		$date = date ("Y-m",strtotime("-2 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
		$month2 = $this->db->get()->row()->total;

		$date = date ("Y-m",strtotime("-3 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
		$month3 = $this->db->get()->row()->total;

		$date = date ("Y-m",strtotime("-4 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
		$month4 = $this->db->get()->row()->total;

		$date = date ("Y-m",strtotime("-5 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$date);
		$month5 = $this->db->get()->row()->total;

		$this->db->select('sum(paslon1_4) as paslon1_4')->from('hitung_suara');
		$paslon1_4 = $this->db->get()->row()->paslon1_4;

		$this->db->select('sum(paslon2_4) as paslon2_4')->from('hitung_suara');
		$paslon2_4 = $this->db->get()->row()->paslon2_4;

		$this->db->select('sum(paslon3_4) as paslon3_4')->from('hitung_suara');
		$paslon3_4 = $this->db->get()->row()->paslon3_4;



		//top category
	
		
		// $this->db->select('c.name_category as category, SUM(p.jumlah) as total_sales');
		// $this->db->from('category c');
		// $this->db->join('produk p', 'c.category_id = p.category_id');
		// $this->db->group_by('c.name_category');
		// $this->db->order_by('total_sales', 'desc');
		// $this->db->limit(5); // Mengambil top 5 kategori dengan penjualan tertinggi
		// $category = $this->db->get()->result_array();
		
		$data = array(
			'judul' => 'Cashier App || Dashboard',
			'today'	=> $today,
			'month'	=>	$month,
			'produk' => $produk,
			'transaksi' =>$transaksi,
			'now'		=> $now,
			'satu'		=> $satu,
			'dua'		=> $dua,
			'tiga'		=> $tiga,
			'empat'		=> $empat,
			'lima'		=> $lima,
			'month1'		=> $month1,
			'month2'		=> $month2,
			'month3'		=> $month3,
			'month4'		=> $month4,
			'month5'		=> $month5,
			//'category'		=> $category,
			'paslon1_4'		=> $paslon1_4,
			'paslon2_4'		=>$paslon2_4,
			'paslon3_4'		=> $paslon3_4

		




		);
		$this->template->load('template_wak','home',$data);
		
	}
}
