<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_model {

    const SESSION_KEY = 'user_id';

    // fungsi simpan data register
    public function simpan_register($data) {

        return $this->db->insert("tbl_admin", $data);

    }

    // fungsi cek login
    public function cek_login($username, $password)
    {
        // $this->db->select("*");
        // $this->db->from("tbl_admin");
        // $this->db->where("username", $username);
        // $query = $this->db->get();
        // $user = $query->row();
        // $password = ($password);
		$this->db->where('username', $username);
		$query = $this->db->query("SELECT * FROM tbl_admin");
		$user = $query->row();
        /**
         * Check password
         */
        if (!empty($user)) {
            if (password_verify($password, $user->password)) {
                return $query->result();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }

    }

    public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

}