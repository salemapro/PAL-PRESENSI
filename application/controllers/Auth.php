<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
	 parent::__construct();
	 	$this->load->helper('url');
	 	$this->load->model('M_auth');
	 	$this->load->model('M_presensi');
	 }
 
	public function index()
	{
		show_404();
	}

	public function login()
	{
		$data['presensi'] = $this->M_presensi->get_data();
		$this->load->library('form_validation');

		$rules = $this->M_auth->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('v_presensi.php', $data);
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->M_auth->login($username, $password)){
			redirect('presensi');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan password benar!');
		}

		$this->load->view('v_presensi.php', $data);
	}

	public function logout()
	{
		$this->load->model('M_auth');
		$this->M_auth->logout();
		redirect(site_url());
	}
	

}
