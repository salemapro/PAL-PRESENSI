<?php
class M_hadir extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_hadir()
    {
        //return $this->db->get('tbl_daftarrapat')->result_array;
        $query = $this->db->query("SELECT tbl_daftarhadir.nip, tbl_daftarhadir.namaLengkap, tbl_daftarhadir.jabatan, 
                        tbl_daftarhadir.unit, tbl_daftarhadir.intansi, tbl_daftarhadir.email, tbl_daftarhadir.attendance 
                    FROM tbl_daftarhadir 
                    INNER JOIN tbl_daftarrapat ON tbl_daftarhadir.id_Rapat = tbl_daftarrapat.id 
                    WHERE tbl_daftarhadir.id_Rapat = tbl_daftarrapat.id");
        return $query->result();
        //print_r($query);
        //die();
    }

    public function get_presensi($id_rapat)
    {
        $this->db->from('tbl_daftarhadir');
        $this->db->where('id_Rapat', $id_rapat);
        return $this->db->get()->result();
    }
}
