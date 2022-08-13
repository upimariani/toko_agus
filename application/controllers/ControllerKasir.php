<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerKasir extends CI_Controller
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
            'supplier' => $this->Dashboard->supplier(),
            'lap' => $this->Dashboard->laporan_stok()
        );
        $this->load->view('Kasir/Layout/head');
        $this->load->view('Kasir/Layout/navbar');
        $this->load->view('Kasir/Layout/aside');
        $this->load->view('Kasir/dashboard', $data);
        $this->load->view('Kasir/Layout/footer');
    }
}

/* End of file ControllerKasir.php */
