<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_presensi');
		$this->load->model('M_auth');
		// $this->load->model('M_hadir');
		// $this->load->model('M_rapat');
		if (!$this->M_auth->current_user()) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['presensi'] = $this->M_presensi->get_data();
		$this->load->view('v_header');
		$this->load->view('v_daftarRapat',$data);
		$this->load->view('v_footer');
	}

	public function daftarRapat()
	{
		$data['presensi'] = $this->M_presensi->get_data();
		$this->load->view('v_header');
		$this->load->view('v_daftarRapat',$data);
		$this->load->view('v_footer');
	}

	public function daftarHadir()
	{
		$data['presensi'] = $this->M_presensi->get_data();
		$this->load->view('v_header');
		$this->load->view('v_daftarHadir',$data);
		// $this->load->view('v_footer');
	}

	public function get_presensi()
	{
		$id_rapat = $this->input->post('id_rapat');
		$result = $this->M_hadir->get_presensi($id_rapat);
		echo json_encode($result);
	}
}
