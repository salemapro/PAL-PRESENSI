<?php
    class M_presensi extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        function get_data()
        {
            //return $this->db->get('tbl_daftarrapat')->result_array;
            $query = $this->db->query("SELECT * from tbl_daftarrapat");
            return $query->result();
            //print_r($query);
            //die();
        }

        public function simpan($judul, $tempat, $tanggal, $waktu, $link, $id, $status)
        {
            $simpan = [
                'judulRapat' => $judul,
                'tempat' => $tempat,
                'tanggal' => $tanggal,
                'waktu' => $waktu,
                'status' => $status,
                'idZoom' => $id,
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
    }
