<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPimpinan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan');
        $this->load->model('Dashboard');
    }


    public function index()
    {
        $data = array(
            'produk' => $this->Dashboard->produk(),
            'brg_masuk' => $this->Dashboard->produk_masuk(),
            'brg_keluar' => $this->Dashboard->produk_keluar(),
            'supplier' => $this->Dashboard->supplier(),
        );
        $this->load->view('Pimpinan/Layout/head');
        $this->load->view('Pimpinan/Layout/navbar');
        $this->load->view('Pimpinan/Layout/aside');
        $this->load->view('Pimpinan/dashboard', $data);
        $this->load->view('Pimpinan/Layout/footer');
    }
    public function lap_harian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->Laporan->lap_harian($tanggal, $bulan, $tahun)
        );
        $this->load->view('Pimpinan/Layout/head');
        $this->load->view('Pimpinan/Layout/navbar');
        $this->load->view('Pimpinan/Layout/aside');
        $this->load->view('Pimpinan/Laporan/harian', $data);
        $this->load->view('Pimpinan/Layout/footer');
    }
    public function lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->Laporan->lap_bulanan($bulan, $tahun)
        );
        $this->load->view('Pimpinan/Layout/head');
        $this->load->view('Pimpinan/Layout/navbar');
        $this->load->view('Pimpinan/Layout/aside');
        $this->load->view('Pimpinan/Laporan/bulanan', $data);
        $this->load->view('Pimpinan/Layout/footer');
    }
    public function lap_tahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
            'laporan' => $this->Laporan->lap_tahunan($tahun)
        );
        $this->load->view('Pimpinan/Layout/head');
        $this->load->view('Pimpinan/Layout/navbar');
        $this->load->view('Pimpinan/Layout/aside');
        $this->load->view('Pimpinan/Laporan/tahunan', $data);
        $this->load->view('Pimpinan/Layout/footer');
    }
}

/* End of file ControllerPimpinan.php */
