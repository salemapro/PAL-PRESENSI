<?php
    class M_presensi extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        function get_data()
        {
            //return $this->db->get('tbl_daftarrapat')->result_array;
            $query = $this->db->query("SELECT * from tbl_daftarrapat WHERE status = '1'");
            return $query->result();
            //print_r($query);
            //die();
        }
        function get_data_rapat()
        {
            //return $this->db->get('tbl_daftarrapat')->result_array;
            $query = $this->db->query("SELECT * from tbl_daftarrapat");
            return $query->result();
            //print_r($query);
            //die();
        }

        public function simpan($judul, $tempat, $tanggal, $waktu, $link, $idZoom, $status)
        {
            $simpan = [
                'judulRapat' => $judul,
                'tempat' => $tempat,
                'tanggal' => $tanggal,
                'waktu' => $waktu,
                'status' => $status,
                'idZoom' => $idZoom,
                'link' => $link
            ];

            $this->db->insert('tbl_daftarrapat',$simpan);
        }

        public function update_rapat($id, $data) {
            $this->db->where('id', $id);
            $this->db->update('tbl_daftarrapat', $data);
            $retcode = $this->db->affected_rows();
            return $retcode;
        }

        public function data_rapat($id)
        {
            return $this->db->get_where('tbl_daftarrapat',['id' => $id]);
        }

        public function update($id, $judul, $tempat, $tanggal, $waktu, $link, $idZoom, $status)
        {
            $update = [
                'judulRapat' => $judul,
                'tempat' => $tempat,
                'tanggal' => $tanggal,
                'waktu' => $waktu,
                'status' => $status,
                'idZoom' => $idZoom,
                'link' => $link
            ];

            $this->db->where('id', $id);
            $this->db->update('tbl_daftarrapat',$update);
        }

        public function delete($id)
        {
            return $this->db->delete('tbl_daftarrapat', ['id' => $id]);
        }
    }
