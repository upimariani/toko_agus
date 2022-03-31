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

                $this->ci->session->set_userdata('username', $username);
                $this->session->set_flashdata('success', 'Selamat Datang, ', $username);

                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Salah!!!');
                redirect(base_url('controllerLogin'));
            }
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
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
