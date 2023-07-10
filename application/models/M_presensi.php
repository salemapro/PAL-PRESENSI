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
    }
?>