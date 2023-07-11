<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library([
			'form_validation'
		]);
		$this->load->helper('url');
		$this->load->model('M_presensi');
		$this->load->model('M_auth');
		$this->load->model('M_hadir');
		// if (!$this->M_auth->current_user()) {
		// 	redirect('Login/cek_login');
		// }
	}

	public function index()
	{
		$data['presensi'] = $this->M_presensi->get_data();
		$this->load->view('v_presensi',$data);
	}

	public function daftarRapat()
	{
		$data['presensi'] = $this->M_presensi->get_data();
		$this->load->view('v_header');
		$this->load->view('v_daftarRapat',$data);
	}

	public function daftarHadir()
	{
		$data['presensi'] = $this->M_presensi->get_data();
		$this->load->view('v_header');
		$this->load->view('v_daftarHadir',$data);
	}

	public function get_presensi()
	{
		$id_rapat = $this->input->post('id_rapat');
		$result = $this->M_hadir->get_presensi($id_rapat);
		echo json_encode($result);
	}

	public function formTambahRapat()
	{
		if($this->input->is_ajax_request() == true){
			$msg = [
				'sukses' => $this->load->view('v_modalTambahRapat', '', true)
			];
			echo json_encode($msg);
		}
	}

	public function simpanDataRapat()
	{
		if($this->input->is_ajax_request() == true){
			$judul = $this->input->post('judul', true);
			$tempat = $this->input->post('tempat', true);
			$tanggal = $this->input->post('tanggal', true);
			$waktu = $this->input->post('waktu', true);
			$link = $this->input->post('link', true);
			$id = $this->input->post('id', true);
			$status = $this->input->post('status', true);

			$this->form_validation->set_rules('judul', 'Judul Rapat', 'trim|required|is_unique[tbl_daftarrapat.judulRapat]',
			[
				'required' => '%s tidak boleh kosong',
				'is_unique' => 'judul rapat sudah ada'
			]);

			if ($this->form_validation->run() == TRUE){
				$this->M_presensi->simpan($judul, $tempat, $tanggal, $waktu, $link, $id, $status);

				$msg = [
					'sukses' => 'data rapat berhasil disimpan'
				];
				
			} else {
				$msg = [
					'error' => '<div class="alert alert-danger" role="alert">
									'.validation_errors().'
				  				</div>'
				];
			}

			echo json_encode($msg);
		}
	}

	public function formLogin()
	{
		if($this->input->is_ajax_request() == true){
			$msg = [
				'sukses' => $this->load->view('v_modalLogin', '', true)
			];
			echo json_encode($msg);
		}
	}
}
