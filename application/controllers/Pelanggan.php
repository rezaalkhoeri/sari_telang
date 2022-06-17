<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pelanggan');
		$this->load->model('m_auth');
	}


	public function register()
	{
		$this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('email', 'E-mail', 'required|is_unique[tbl_pelanggan.email]', array(
			'required' => '%s Haris Diisi !!!',
			'is_unique' => '%s Email Sudah Ini Terdaftar ...!'
		));
		$this->form_validation->set_rules('password', 'password', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		$this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]', array(
			'required' => '%s Haris Diisi !!!',
			'matches' => '%s Password Tidak Sama ...!'
		));


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Register Pelanggan',
				'isi' => 'v_register',
			);
			$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
		} else {
			$data = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			);
			$this->m_pelanggan->register($data);
			$this->session->set_flashdata('pesan', 'Selamat, Register Berhasil Silahkan Login Kembali !!');
			redirect('pelanggan/register');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'E-Mail', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));


		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->pelanggan_login->login($email, $password);
		}
		$data = array(
			'title' => 'Masuk Pelanggan',
			'isi' => 'v_login_pelanggan',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function logout()
	{
		$this->pelanggan_login->logout();
	}

	public function akun()
	{
		$id = $this->session->userdata('id_pelanggan');

		$getData = $this->m_pelanggan->get_pelangganByID($id);

		$data = array(
			'title' => 'Akun Saya',
			'isi' => 'v_akun_saya',
			'user' => $getData,
		);

		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function edit_profil()
	{
		$id = $this->session->userdata('id_pelanggan');

		$post = $this->input->post();
		$data = [
			'email' => $post['email'],
			'nama_pelanggan' => $post['username'],
		];

		if ($post['password'] !== '') {
			$data['password'] = $post['password'];
		}

		$result = $this->m_pelanggan->update_data($id, $data);
		if ($result) {
			$response = [
				'status' => 'success',
				'message' => 'Profil berhasil diubah!'
			];
		} else {
			$response = [
				'status' => 'error',
				'message' => 'Profil gagal diubah!'
			];
		}

		$this->session->set_userdata($data);
		$this->session->set_flashdata('response', $response);
		redirect(base_url('pelanggan/akun'));
	}

	public function update_foto()
	{
		$config['upload_path'] = './assets/foto/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
		$config['max_size']     = '2000';
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('foto')) {
			$response = [
				'status' => 'error',
				'message' => $this->upload->display_errors()
			];

			$this->session->set_flashdata('response', $response);
			return redirect('pelanggan/akun');
		}

		$data_foto = $this->upload->data();

		$data['foto'] = $data_foto['file_name'];

		$result = $this->m_pelanggan->update_data($this->session->id_pelanggan, $data);
		if ($result) {
			$response = [
				'status' => 'success',
				'message' => 'Foto Profil berhasil diubah!'
			];
		} else {
			$response = [
				'status' => 'error',
				'message' => 'Foto Profil gagal diubah!'
			];
			unlink($data_foto['full_path']);
		}

		$this->session->set_userdata('foto', $data_foto['file_name']);

		$this->session->set_flashdata('response', $response);
		redirect('pelanggan/akun');
	}
}
