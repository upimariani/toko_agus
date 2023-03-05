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
                'produk' => $this->DataMaster->select_produk_admin()
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
                'sisa' => $this->input->post('qty'),
                'tgl_masuk' => $this->input->post('tgl')
            );
            $this->KelolaProduk->insert_brg_masuk($data);
            $this->session->set_flashdata('success', 'Data Produk Masuk Berhasil Ditambahkan!');
            redirect('ControllerPengelolaanBarang/barang_masuk');
        }
    }
    public function edit_brg_masuk($id)
    {
        $this->form_validation->set_rules('qty', 'Quantity', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Masuk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->DataMaster->select_produk_admin(),
                'brg_masuk' => $this->KelolaProduk->edit_brg_masuk($id)
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/edit_brg_masuk', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'qty' => $this->input->post('qty'),
                'sisa' => $this->input->post('qty'),
                'tgl_masuk' => $this->input->post('tgl')
            );
            $this->db->where('id_produk_masuk', $id);
            $this->db->update('produk_masuk', $data);
            $this->session->set_flashdata('success', 'Data Produk Masuk Berhasil Diperbaharui!');
            redirect('ControllerPengelolaanBarang/barang_masuk');
        }
    }
    public function hapus_brg_masuk($id)
    {
        $this->db->where('id_produk_masuk', $id);
        $this->db->delete('produk_masuk');
        $this->session->set_flashdata('success', 'Data Barang Masuk Berhasil Dihapus!');
        redirect('ControllerPengelolaanBarang/barang_masuk');
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
            $qty_seb = $this->input->post('qty_seb');
            $qty_kel = $this->input->post('qty_kel');
            if ($qty_kel <= $qty_seb) {
                $isi = array(
                    'id_produk_masuk' => $this->input->post('produk'),
                    'qty_kel' => $this->input->post('qty_kel'),
                    'tgl_keluar' => $this->input->post('tgl')
                );
                $this->KelolaProduk->insert_brg_keluar($isi);

                //mengurangi data stok barang masuk
                $id = $this->input->post('produk');
                $qty = $this->input->post('qty_kel');
                $qty_seb = $this->input->post('qty_seb');
                $tot = $qty_seb - $qty;
                $qty_mas = array(
                    'sisa' => $tot
                );
                $this->db->where('id_produk_masuk', $id);
                $this->db->update('produk_masuk', $qty_mas);

                $id_produk = $this->input->post('id');
                $stok = $this->input->post('stok');

                $this->session->set_flashdata('success', 'Data Produk Keluar Berhasil Ditambahkan!');
                redirect('ControllerPengelolaanBarang/barang_keluar');
            } else {
                $this->session->set_flashdata('error', 'Data Quantity Keluar Melebihi Batas Stok Sebelumnya!');
                redirect('ControllerPengelolaanBarang/create_brg_keluar');
            }
        }
    }
    public function update_brg_keluar($id)
    {
        $this->form_validation->set_rules('qty_kel', 'Quantity Keluar', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'brg_kel' => $this->KelolaProduk->edit_brg_keluar($id),
                'brg_masuk' => $this->KelolaProduk->barang_masuk()
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/edit_brg_keluar', $data);
            $this->load->view('Layout/footer');
        } else {
            $stok = $this->input->post('stok_brg_masuk') + $this->input->post('stok_keluar');
            $stok_k = $stok - $this->input->post('qty_kel');

            //update barang keluar
            $data = array(
                'qty_kel' => $this->input->post('qty_kel'),
                'tgl_keluar' => $this->input->post('tgl')
            );
            $this->db->where('id_produk_keluar', $id);
            $this->db->update('produk_keluar', $data);

            $item = array(
                'qty' => $stok_k
            );
            $this->db->where('id_produk_masuk', $this->input->post('id_brg_masuk'));
            $this->db->update('produk_masuk', $item);


            $this->session->set_flashdata('success', 'Data Produk Keluar Berhasil Diperbaharui!');
            redirect('ControllerPengelolaanBarang/barang_keluar');
        }
    }
    public function hapus_brg_keluar($id)
    {
    }
}
        
    /* End of file  ControllerPengelolaanBarang.php */
