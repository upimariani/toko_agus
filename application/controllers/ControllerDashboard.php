<?php

defined('BASEPATH') or exit('No direct script access allowed');

class controllerDashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard');
    }
    public function index()
    {
        $data = array(
            'produk' => $this->Dashboard->produk(),
            'brg_masuk' => $this->Dashboard->produk_masuk(),
            'brg_keluar' => $this->Dashboard->produk_keluar(),
            'supplier' => $this->Dashboard->supplier()
        );
        $this->load->view('Layout/head');
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/aside');
        $this->load->view('Content/dashboard', $data);
        $this->load->view('Layout/footer');
    }
}
        
    /* End of file  Dashboard.php */
