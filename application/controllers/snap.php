<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-r19IWEcvfsP1ELot6qWEKJNQ', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->model('m_transaksi');
	}

	public function index()
	{
		$this->load->view('midtrans/checkout_snap');
	}

	public function token()
	{
		$postData = json_decode($_POST['datanya']);

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => (int)$postData->totalBayar, // no decimal allowed for creditcard
		);

		// Optional
		// $item1_details = array(
		// 	'id' => 'a1',
		// 	'price' => 18000,
		// 	'quantity' => 3,
		// 	'name' => "Apple"
		// );

		// Optional
		// $item2_details = array(
		// 	'id' => 'a2',
		// 	'price' => 20000,
		// 	'quantity' => 2,
		// 	'name' => "Orange"
		// );

		// Optional
		// $item_details = array($item1_details, $item2_details);

		// Optional
		// $billing_address = array(
		// 	'first_name'    => "Andri",
		// 	'last_name'     => "Litani",
		// 	'address'       => "Mangga 20",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16602",
		// 	'phone'         => "081122334455",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		// $shipping_address = array(
		// 	'first_name'    => "Obet",
		// 	'last_name'     => "Supriadi",
		// 	'address'       => "Manggis 90",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16601",
		// 	'phone'         => "08113366345",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
			'first_name'    => $postData->nama,
			// 'last_name'     => "Litani",
			'email'         => $postData->email,
			// 'phone'         => "081122334455",
			// 'billing_address'  => $billing_address,
			// 'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			// 'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'));
		$getStatus = $this->midtrans->status($result->order_id);

		$noOrder = $this->input->post('no_order');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$total = $this->input->post('total');

		$bayarData = [
			'no_order' => $noOrder,
			'transaksi' => $this->m_transaksi->getTransaksiByOrder($noOrder),
			'barang' => $this->m_transaksi->getPesananByOrder($noOrder),
			'nama' => $nama,
			'email' => $email,
			'total' => $total
		];
		// echo 'RESULT <br><pre>';
		// var_dump($result);
		// echo '</pre>';

		// echo '<pre>', print_r($getStatus, 1), '</pre>';
		// die;


		if ($getStatus->status_code == 200) {
			$data = array(
				'id_transaksi' => $bayarData['transaksi'][0]->id_transaksi,
				'status_bayar' => '1',
				'order_id' => $getStatus->order_id,
				'payment_type' => $getStatus->payment_type,
				'transaction_time' => $getStatus->transaction_time,
				'transaction_status' => $getStatus->transaction_status,
			);

			if ($getStatus->payment_type == 'bank_transfer') {
				$data['bank'] = $getStatus->va_numbers[0]->bank;
				$data['va_number'] = $getStatus->va_numbers[0]->bank;
			}

			if ($getStatus->payment_type == 'cstore') {
				$data['store'] = $getStatus->store;
			}

			$this->m_transaksi->upload_buktibayar($data);
			$this->session->set_flashdata('pesan', 'Pembayaran berhasil !!!');
			redirect('pesanan_saya');
		} else {
			$data = array(
				'title' => 'Invoice',
				'result' => $result,
				'pembayaran' => $getStatus,
				'data_pesanan' => $bayarData,
				'isi' => 'midtrans/finish_pay',
			);

			// echo '<pre>', print_r($data, 1), '</pre>';
			// die;

			$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
		}
	}
}
