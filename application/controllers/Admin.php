<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('m_pesanan_masuk');
		$this->load->model('m_transaksi');
		$this->load->model('m_barang');
	}


	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'total_pesanan' => $this->m_admin->total_pesanan(),
			'total_barang' => $this->m_admin->total_barang(),
			'total_pelanggan' => $this->m_admin->total_pelanggan(),
			'total_kategori' => $this->m_admin->total_kategori(),
			'isi' => 'v_admin',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function setting()
	{

		$this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('kota', 'Kota', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('no_telpon', 'No Telpon', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Pengaturan ',
				'setting' => $this->m_admin->data_setting(),
				'isi' => 'v_setting',
			);
			$this->load->view('layout/v_wrapper_backend', $data, FALSE);
		} else {
			$data = array(
				'id' => 1,
				'lokasi' => $this->input->post('kota'),
				'nama_toko' => $this->input->post('nama_toko'),
				'alamat_toko' => $this->input->post('alamat_toko'),
				'no_telpon' => $this->input->post('no_telpon'),
			);
			$this->m_admin->edit($data);
			$this->session->set_flashdata('pesan', 'Pengaturan Berhasil di Ganti !!!');
			redirect('admin/setting');
		}
	}

	public function loop_produk($x)
	{
		$array = [];
		$array['pesanan'] = $x;
		$array['detail'] = [];

		for ($i = 0; $i < count($x); $i++) {
			$noOrder = $x[$i]->no_order;
			$dataBarang = $this->m_transaksi->getPesananByOrder($noOrder);
			array_push(
				$array['detail'],
				$dataBarang
			);
		}

		return $array;
	}

	public function pesanan_masuk()
	{
		$pesanan = $this->m_pesanan_masuk->pesanan();
		$diproses = $this->m_pesanan_masuk->pesanan_diproses();
		$dikirim = $this->m_pesanan_masuk->pesanan_dikirim();
		$selesai = $this->m_pesanan_masuk->pesanan_selesai();

		$getPesanan = $this->loop_produk($pesanan);
		$getDiproses = $this->loop_produk($diproses);
		$getDikirim = $this->loop_produk($dikirim);
		$getSelesai = $this->loop_produk($selesai);

		$data = array(
			'title' => 'Pesanan Masuk',
			'pesanan_masuk' => $getPesanan,
			'diproses' => $getDiproses,
			'dikirim' => $getDikirim,
			'selesai' => $getSelesai,
			'isi' => 'v_pesanan_masuk',
		);

		// echo '<pre>', print_r($data, 1), '</pre>';
		// die;

		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function proses($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '1'
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses/Dikemas !!!');
		redirect('admin/pesanan_masuk');
	}

	public function kirim($id_transaksi)
	{
		$getTR = $this->m_transaksi->getTransaksiByID($id_transaksi);
		$noOrder = $getTR[0]->no_order;

		$getRinciTR = $this->m_transaksi->getPesananByOrder($noOrder);

		for ($i=0; $i < count($getRinciTR); $i++) {
		    $getBarang = $this->m_barang->get_data($getRinciTR[$i]->id_barang);
		       
		    $getStokLama = $getBarang->stok;
		    
            $qtyBeli = [
                'id_barang' => $getRinciTR[$i]->id_barang,
                'stok' => ($getStokLama - $getRinciTR[$i]->qty),
            ];
    		$this->m_barang->edit($qtyBeli);
		}


		$data = array(
			'id_transaksi' => $id_transaksi,
			'no_resi' => $this->input->post('no_resi'),
			'status_order' => '2'
		);
	
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Kirim !!!');
		redirect('admin/pesanan_masuk');
	}
}
