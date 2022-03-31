<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPengelolaanBarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KelolaProduk');
        $this->load->model('DataMaster');
    }


    //barang masuk
    public function barang_masuk()
    {
        $data = array(
            'brg_masuk' => $this->KelolaProduk->barang_masuk()
        );
        $this->load->view('Layout/head');
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/aside');
        $this->load->view('Content/barang_masuk', $data);
        $this->load->view('Layout/footer');
    }
    public function create_brg_masuk()
    {
        $this->form_validation->set_rules('produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('qty', 'Quantity Produk', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Barang Masuk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->DataMaster->select_produk()
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/create_brg_masuk', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'id_produk' => $this->input->post('produk'),
                'qty' => $this->input->post('qty'),
                'tgl_masuk' => $this->input->post('tgl')
            );
            $this->KelolaProduk->insert_brg_masuk($data);
            $this->session->set_flashdata('success', 'Data Produk Masuk Berhasil Ditambahkan!');
            redirect('ControllerPengelolaanBarang/barang_masuk');
        }
    }
}
        
    /* End of file  ControllerPengelolaanBarang.php */
