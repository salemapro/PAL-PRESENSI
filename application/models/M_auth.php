<?php
class M_auth extends CI_Model {

    private $_table = "tbl_admin";
	const SESSION_KEY = 'user_id';

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[30]'
			]
		];
	}

	public function login($username, $password)
	{
        $password = ($password);
		$this->db->where('username', $username);
		$query = $this->db->query("SELECT * from tbl_admin");
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}

		// cek apakah passwordnya benar?
		if ($password != $user->password) {
			return FALSE;
		}

		// bikin session
		$this->session->set_userdata([self::SESSION_KEY => $user->id]);
		$this->_update_last_login($user->id);

		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->query("SELECT * from tbl_admin WHERE id = $user_id");
		return $query->row();
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

	private function _update_last_login($id)
	{
		$data = [
			'last_login' => date("YYYY-mm-dd HH:ii:ss"),
		];

		return $this->db->query("UPDATE tbl_admin SET last_login = '$data' WHERE id = '$id'");
	}
}
