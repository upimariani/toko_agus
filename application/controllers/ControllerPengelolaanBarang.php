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
    //kelola data barang keluar
    public function barang_keluar()
    {
        $data = array(
            'brg_keluar' => $this->KelolaProduk->barang_keluar()
        );
        $this->load->view('Layout/head');
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/aside');
        $this->load->view('Content/barang_keluar', $data);
        $this->load->view('Layout/footer');
    }
    public function create_brg_keluar()
    {
        $this->form_validation->set_rules('produk', 'Produk', 'required');
        $this->form_validation->set_rules('qty_kel', 'Quantity Keluar', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'brg_masuk' => $this->KelolaProduk->barang_masuk()
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/create_brg_keluar', $data);
            $this->load->view('Layout/footer');
        } else {
            $isi = array(
                'id_produk_masuk' => $this->input->post('produk'),
                'qty_kel' => $this->input->post('qty_kel'),
                'tgl_keluar' => $this->input->post('tgl')
            );
            $this->KelolaProduk->insert_brg_keluar($isi);

            //mengurangi data stok barang masuk
            $qty_seb = $this->input->post('qty_seb');
            $qty_kel = $isi['qty'];
            $tot = $qty_seb - $qty_kel;

            $qty_mas = array(
                'qty' => $tot
            );
            $this->db->where('id_produk_masuk', $isi['id_produk_masuk']);
            $this->db->update('produk_masuk', $qty_mas);


            $this->session->set_flashdata('success', 'Data Produk Keluar Berhasil Ditambahkan!');
            redirect('ControllerPengelolaanBarang/barang_keluar');
        }
    }
}
        
    /* End of file  ControllerPengelolaanBarang.php */
