<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
		$this->load->model('m_pesanan_masuk');
		$this->load->model('m_user');
		$params = array('server_key' => 'SB-Mid-server-r19IWEcvfsP1ELot6qWEKJNQ', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
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

	public function index()
	{
		$belum_bayar = $this->m_transaksi->belum_bayar();
		$diproses = $this->m_transaksi->diproses();
		$dikirim = $this->m_transaksi->dikirim();
		$selesai = $this->m_transaksi->selesai();

		$getBelumBayar = $this->loop_produk($belum_bayar);
		$getDiproses = $this->loop_produk($diproses);
		$getDikirim = $this->loop_produk($dikirim);
		$getSelesai = $this->loop_produk($selesai);

		$data = array(
			'title' => 'Pesanan Saya',
			'belum_bayar' => $getBelumBayar,
			'diproses' => $getDiproses,
			'dikirim' => $getDikirim,
			'selesai' => $getSelesai,
			'isi' => 'v_pesanan_saya',
		);

		// echo '<pre>', print_r($data, 1), '</pre>';
		// die;

		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function bayar($id_transaksi)
	{
		$id_transaksi = decrypt_url($id_transaksi);

		$this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti_bayar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = 'bukti_bayar';
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Pembayaran',
					'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
					'rekening' => $this->m_transaksi->rekening(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'v_bayar',
				);

				$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
			} else {
				$upload_data	= array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti_bayar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_transaksi' => $id_transaksi,
					'atas_nama' => $this->input->post('atas_nama'),
					'nama_bank' => $this->input->post('nama_bank'),
					'no_rek' => $this->input->post('no_rek'),
					'status_bayar' => '1',
					'bukti_bayar'	=> $upload_data['uploads']['file_name'],
				);
				$this->m_transaksi->upload_buktibayar($data);
				$this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Di Upload !!!');
				redirect('pesanan_saya');
			}
		}

		$getDetailTransaksi = $this->m_transaksi->detail_pesanan($id_transaksi);
		$noOrder = $getDetailTransaksi->no_order;
		$getBarang = $this->m_transaksi->getPesananByOrder($noOrder);
		$data = array(
			'title' => 'Pembayaran',
			'pesanan' => $getDetailTransaksi,
			'barang' => $getBarang,
			'rekening' => $this->m_transaksi->rekening(),
			'isi' => 'v_bayar',
		);
		$data['pelanggan'] = $this->m_user->getUserByID($data['pesanan']->id_pelanggan);

		// $getStatus = $this->midtrans->status($getDetailTransaksi->order_id);

		// echo '<pre>', print_r($getStatus, 1), '</pre>';
		// die;


		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function diterima($id_transaksi)
	{
		$id_transaksi = decrypt_url($id_transaksi);

		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '3'
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Telah diterima !!!');
		redirect('pesanan_saya');
	}

	public function detail_pesanan($id)
	{
		$id_transaksi = decrypt_url($id);
		$getTR =  $this->m_transaksi->detail_pesanan($id_transaksi);
		$getPelanggan = $this->m_user->getUserByID($getTR->id_pelanggan);

		$noOrder = $getTR->no_order;
		$getData = [
			'no_order' => $noOrder,
			'transaksi' => $this->m_transaksi->getTransaksiByOrder($noOrder),
			'barang' => $this->m_transaksi->getPesananByOrder($noOrder),
			'pelanggan' => $getPelanggan
		];

		$data = array(
			'title' => 'Detail Pesanan',
			'detail' => $getData,
			'isi' => 'v_detail_pesanan',
		);

		// echo '<pre>', print_r($getData, 1), '</pre>';
		// die;

		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function detail_barang()
	{
		$postData = json_decode($_POST['datanya']);
		$dataBarang = $this->m_transaksi->getPesananByOrder($postData->noOrder);

		echo json_encode($dataBarang);
	}
}
