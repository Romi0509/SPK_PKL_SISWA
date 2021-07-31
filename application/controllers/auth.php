<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->model('m_login');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login SPK PKL';
			$this->load->view('template/Auth_header', $data);
			$this->load->view('auth/Login');
			$this->load->view('template/Auth_footer');
		} else {
			$this->login();
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		$cek = $this->db->get_where('user', ['username' => $username])->row_array();

		// 	//jika user ada
		if ($user) {
			//jika usernya aktif
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'role' => $user['role']
				];
				$this->session->set_userdata($data);
				$this->session->set_userdata(["user_logged" => $cek]);
				redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
					Username atau Password Salah!</div>');
				redirect('auth');
			}
		} else {
			// $this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
			// Username Tidak Terdaftar!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_admin.username]', [
			'is_unique' => 'Username sudah terdaftar'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
			'matches' => 'password tidak sama',
			'min_length' => 'password lemah'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah User';
			$this->load->view('template/Auth_header', $data);
			$this->load->view('auth/Registration');
			$this->load->view('template/Auth_footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('name', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),

			];

			$this->db->insert('tb_admin', $data);
			$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
			 Akun telah berhasil di daftarkan. Silahkan Login</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('auth');
	}
}
