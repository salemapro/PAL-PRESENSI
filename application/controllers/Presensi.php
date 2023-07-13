<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library([
			'form_validation'
		]);
		$this->load->helper('url');
		$this->load->model('M_presensi');
		$this->load->model('M_hadir');
		// if (!$this->M_auth->current_user()) {
		// 	redirect('Login/cek_login');
		// }
	}

	public function index()
	{
		$data['presensi'] = $this->M_presensi->get_data();
		$this->load->view('v_presensi', $data);
	}

	public function daftarRapat()
	{
		$data['presensi'] = $this->M_presensi->get_data_rapat();
		$this->load->view('v_header');
		$this->load->view('daftar_rapat/v_daftarRapat', $data);
	}

	public function daftarHadir()
	{
		$data['presensi'] = $this->M_presensi->get_data_rapat();
		$this->load->view('v_header');
		$this->load->view('daftar_hadir/v_daftarHadir', $data);
	}

	public function get_presensi()
	{
		$id_rapat = $this->input->post('id_rapat');
		$result = $this->M_hadir->get_presensi($id_rapat);
		echo json_encode($result);
	}

	public function formTambahRapat()
	{
		if ($this->input->is_ajax_request() == true) {
			$msg = [
				'sukses' => $this->load->view('daftar_rapat/v_modalTambahRapat', '', true)
			];
			echo json_encode($msg);
		}
	}
	public function formTambahHadir()
	{
		if ($this->input->is_ajax_request() == true) {
			$id_rapat = $this->input->post('id_rapat',true);

			$data = [
				'id_rapat' => $id_rapat
			];

			$msg = [
				'sukses' => $this->load->view('daftar_hadir/v_modalTambahHadir', $data , true)
			];

			echo json_encode($msg);
		}
	}

	public function formEditRapat()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);

			$ambildata = $this->M_presensi->data_rapat($id);
			
			if($ambildata->num_rows() > 0){
				$row = $ambildata->row_array();
				$data = [
					'id' => $id,
					'judul' => $row['judulRapat'],
					'tempat' => $row['tempat'],
					'tanggal' => $row['tanggal'],
					'waktu' => $row['waktu'],
					'status' => $row['status'],
					'idZoom' => $row['idZoom'],
					'link' => $row['link']
						
				];
			}

			$msg = [
				'sukses' => $this->load->view('daftar_rapat/v_modalEditRapat', $data, true)
			];
			echo json_encode($msg);
		}
	}

	public function simpanDataRapat()
	{
		if ($this->input->is_ajax_request() == true) {
			$judul = $this->input->post('judul', true);
			$tempat = $this->input->post('tempat', true);
			$tanggal = $this->input->post('tanggal', true);
			$waktu = $this->input->post('waktu', true);
			$link = $this->input->post('link', true);
			$idZoom = $this->input->post('idZoom', true);
			$status = $this->input->post('status', true);

			$this->form_validation->set_rules(
				'judul',
				'Judul Rapat',
				'trim|required|is_unique[tbl_daftarrapat.judulRapat]',
				[
					'required' => '%s tidak boleh kosong',
					'is_unique' => 'judul rapat sudah ada'
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$this->M_presensi->simpan($judul, $tempat, $tanggal, $waktu, $link, $idZoom, $status);

				$msg = [
					'sukses' => 'data rapat berhasil disimpan'
				];
			} else {
				$msg = [
					'error' => validation_errors()
				];
			}

			echo json_encode($msg);
		}
	}

	public function simpanDataHadir()
	{
		if ($this->input->is_ajax_request() == true) {
			$id_rapat = $this->input->post('id_rapat', true);
			$nip = $this->input->post('nip', true);
			$nama = $this->input->post('nama', true);
			$jabatan = $this->input->post('jabatan', true);
			$unit = $this->input->post('unit', true);
			$intansi = $this->input->post('intansi', true);
			$email = $this->input->post('email', true);
			$attendance = $this->input->post('attendance', true);

			$this->form_validation->set_rules(
				'nip',
				'NIP',
				'trim|required[tbl_daftarhadir.nip]',
				[
					'required' => '%s tidak boleh kosong'
					
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$this->M_hadir->simpan($id_rapat, $nip, $nama, $jabatan, $unit, $intansi, $email, $attendance);

				$msg = [
					'sukses' => 'data rapat berhasil di-simpan'
				];
			} else {
				$msg = [
					'error' => validation_errors()
				];
			}

			echo json_encode($msg);
		}
	}

	public function formLogin()
	{
		if ($this->input->is_ajax_request() == true) {
			$msg = [
				'sukses' => $this->load->view('v_modalLogin', '', true)
			];
			echo json_encode($msg);
		}
	}

	public function change_status_rapat()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id');
			$retcode = $this->M_presensi->update_rapat($id, [
				'status' => $this->input->post('status')
			]);
		}
	}

	public function updateDataRapat()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);
			$judul = $this->input->post('judul', true);
			$tempat = $this->input->post('tempat', true);
			$tanggal = $this->input->post('tanggal', true);
			$waktu = $this->input->post('waktu', true);
			$link = $this->input->post('link', true);
			$idZoom = $this->input->post('idZoom', true);
			$status = $this->input->post('status', true);

			$this->form_validation->set_rules(
				'judul',
				'Judul Rapat',
				'trim|required[tbl_daftarrapat.judulRapat]',
				[
					'required' => '%s tidak boleh kosong',
				]
			);

			if ($this->form_validation->run() == TRUE) {
				$this->M_presensi->update($id, $judul, $tempat, $tanggal, $waktu, $link, $idZoom, $status);

				$msg = [
					'sukses' => 'data rapat berhasil diupdate'
				];
			} else {
				$msg = [
					'error' => validation_errors()
				];
			}

			echo json_encode($msg);
		}
	}

	public function deleteRapat()
	{
		if ($this->input->is_ajax_request() == true) {
			$id = $this->input->post('id', true);

			$delete = $this->M_presensi->delete($id);

			if($delete){
				$msg = [
					'sukses' => 'Rapat Berhasil Terhapus'
				];
			}
			echo json_encode($msg);
		}
	}
}
