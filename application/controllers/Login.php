<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
            $this->load->helper('url');
            $this->load->model('M_login');
            // $this->load->model('M_presensi');
        }

    public function cek_login()
    {
        // $data['presensi'] = $this->M_presensi->get_data();

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //cek login via model
        $cek = $this->M_login->cek_login($username, $password);

        if(!empty($cek)){

            foreach($cek as $user) {

                //looping data user
                $session_data = array(
                    'id'   => $user->id,
                    'username'  => $user->username

                );
                //buat session berdasarkan user yang login
                $this->session->set_userdata($session_data);

            }

            echo "success";

        } else {
            
            echo "error";

        }

        // $this->load->view('v_presensi.php', $data);

    }

    // public function logout()
	// {
	// 	$this->session->unset_userdata($session_data);
	// 	return !$this->session->has_userdata($session_data);
	// }

}