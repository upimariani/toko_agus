<?php

defined('BASEPATH') or exit('No direct script access allowed');

class controllerLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->ci = &get_instance();
        $this->load->model('Login');
    }


    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('content/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login = $this->Login->auth($username, $password);
            if ($login) {
                $username = $login->username;
                $id = $login->id_user;
                $level = $login->level_user;


                $array = array(
                    'id' => $id
                );

                $this->session->set_userdata($array);


                if ($level == '1') {
                    $this->ci->session->set_userdata('username', $username);
                    $this->session->set_flashdata('success', 'Selamat Datang, ', $username);

                    redirect(base_url('ControllerDashboard'));
                } else if ($level == '2') {
                    $this->ci->session->set_userdata('username', $username);
                    $this->session->set_flashdata('success', 'Selamat Datang, ', $username);

                    redirect(base_url('ControllerPimpinan'));
                } else if ($level == '3') {
                    $this->ci->session->set_userdata('username', $username);
                    $this->session->set_flashdata('success', 'Selamat Datang, ', $username);

                    redirect(base_url('ControllerKasir'));
                }
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Salah!!!');
                redirect(base_url('controllerLogin'));
            }
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->session->set_flashdata('success', 'Anda Berhasil LogOut!');

        redirect('controllerLogin');
    }
    public function protect()
    {
        if ($this->ci->session->username('username') == "") {
            $this->session->set_flashdata('error', 'Anda Belum Melakukan Login');
            redirect('controllerLogin');
        }
    }
}
        
    /* End of file  Login.php */
