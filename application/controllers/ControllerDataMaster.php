<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerDataMaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataMaster');
    }

    //kelola data user
    public function user()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpon', 'No Telepon', 'required|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level User', 'required');


        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'user' => $this->DataMaster->select_user()
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/user', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'nama_user' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_tlpon'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level_user' => $this->input->post('level'),
            );
            $this->DataMaster->insert_user($data);
            $this->session->set_flashdata('success', 'Berhasil Memasukkan Data User!!!');
            redirect('controllerDataMaster/user');
        }
    }
    public function update_user($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpon', 'No Telepon', 'required|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level User', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'user' => $this->DataMaster->edit_user($id)
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/edit_user', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'nama_user' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_tlpon'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level_user' => $this->input->post('level'),
            );
            $this->DataMaster->update_user($id, $data);
            $this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!!!');
            redirect('controllerDataMaster/user');
        }
    }
    public function hapus_user($id)
    {
        $this->DataMaster->delete_user($id);
        $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!!!');
        redirect('controllerDataMaster/user');
    }

    //kelola data kategori produk
    public function kategori()
    {
        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'kategori' => $this->DataMaster->select_kategori()
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/kategori', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('kategori')
            );
            $this->DataMaster->insert_kategori($data);
            $this->session->set_flashdata('success', 'Data Kategori Berhasil Disimpan!');
            redirect('controllerDataMaster/kategori');
        }
    }
    public function update_kategori($id)
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'kategori' => $this->DataMaster->edit_kategori($id)
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/edit_kategori', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('kategori')
            );
            $this->DataMaster->update_kategori($id, $data);
            $this->session->set_flashdata('success', 'Data Kategori Berhasil Diperbaharui!');
            redirect('controllerDataMaster/kategori');
        }
    }
    public function hapus_kategori($id)
    {
        $this->DataMaster->delete_kategori($id);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
        redirect('controllerDataMaster/kategori');
    }

    //kelola data produk
    public function produk()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[produk.kode_produk]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->DataMaster->select_produk(),
                'kategori' => $this->DataMaster->select_kategori(),
                'supplier' => $this->DataMaster->select_supplier()
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/produk', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'id_supplier' => $this->input->post('supplier'),
                'kode_produk' => $this->input->post('kode'),
                'nama_produk' => $this->input->post('nama'),
                'harga_produk' => $this->input->post('harga'),
                'stok' => '0'
            );
            $this->DataMaster->insert_produk($data);
            $this->session->set_flashdata('success', 'Data Produk Berhasil Ditambahkan!');
            redirect('controllerDataMaster/produk');
        }
    }
    public function update_produk($id)
    {
        $kode = $this->input->post('kode');
        $produk = $this->DataMaster->edit_produk($id);
        if ($produk->kode_produk == $kode) {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('supplier', 'Supplier', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');
        } else {
            $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[produk.kode_produk]');
            $this->form_validation->set_rules('supplier', 'Supplier', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');
        }
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->DataMaster->edit_produk($id),
                'kategori' => $this->DataMaster->select_kategori(),
                'supplier' => $this->DataMaster->select_supplier()
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/edit_produk', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'id_supplier' => $this->input->post('supplier'),
                'kode_produk' => $this->input->post('kode'),
                'nama_produk' => $this->input->post('nama'),
                'harga_produk' => $this->input->post('harga'),
                'stok' => '0'
            );
            $this->DataMaster->update_produk($id, $data);
            $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui!');
            redirect('controllerDataMaster/produk');
        }
    }
    public function hapus_produk($id)
    {
        $this->DataMaster->delete_produk($id);
        $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus!');
        redirect('controllerDataMaster/produk');
    }

    //kelola data supplier
    public function supplier()
    {
        $data = array(
            'supplier' => $this->DataMaster->select_supplier()
        );
        $this->load->view('Layout/head');
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/aside');
        $this->load->view('Content/supplier', $data);
        $this->load->view('Layout/footer');
    }
    public function create_supplier()
    {
        $data = array(
            'nama_supplier' => $this->input->post('nama'),
            'nama_toko' => $this->input->post('nama_toko'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp')
        );
        $this->DataMaster->insert_supplier($data);
        $this->session->set_flashdata('success', 'Data Supplier Berhasil Ditambahkan!');
        redirect('controllerDataMaster/supplier');
    }
    public function edit_supplier($id)
    {
        $data = array(
            'nama_supplier' => $this->input->post('nama'),
            'nama_toko' => $this->input->post('nama_toko'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp')
        );
        $this->DataMaster->update_supplier($id, $data);
        $this->session->set_flashdata('success', 'Data Supplier Berhasil Diperbaharui!');
        redirect('controllerDataMaster/supplier');
    }
    public function hapus_supplier($id)
    {
        $this->DataMaster->delete_supplier($id);
        $this->session->set_flashdata('success', 'Data Supplier Berhasil Dihapus!');
        redirect('controllerDataMaster/supplier');
    }
}
        
    /* End of file  controllerDataMaster.php */
