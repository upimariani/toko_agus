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
            redirect('ControllerDataMaster/user');
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
            redirect('controllerdatamaster/user');
        }
    }
    public function hapus_user($id)
    {
        $this->DataMaster->delete_user($id);
        $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!!!');
        redirect('controllerdatamaster/user');
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
            redirect('controllerdatamaster/kategori');
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
            redirect('controllerdatamaster/kategori');
        }
    }
    public function hapus_kategori($id)
    {
        $this->DataMaster->delete_kategori($id);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
        redirect('controllerdatamaster/kategori');
    }

    //kelola data produk
    public function produk()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[produk.kode_produk]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->DataMaster->select_produk(),
                'kategori' => $this->DataMaster->select_kategori()
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/produk', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'kode_produk' => $this->input->post('kode'),
                'nama_produk' => $this->input->post('nama'),
                'harga_produk' => $this->input->post('harga'),
                'stok' => '0'
            );
            $this->DataMaster->insert_produk($data);
            $this->session->set_flashdata('success', 'Data Produk Berhasil Ditambahkan!');
            redirect('controllerdatamaster/produk');
        }
    }
    public function update_produk($id)
    {
        $kode = $this->input->post('kode');
        $produk = $this->DataMaster->edit_produk($id);
        if ($produk->kode_produk == $kode) {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');
        } else {
            $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[produk.kode_produk]');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');
        }
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->DataMaster->edit_produk($id),
                'kategori' => $this->DataMaster->select_kategori()
            );
            $this->load->view('Layout/head');
            $this->load->view('Layout/navbar');
            $this->load->view('Layout/aside');
            $this->load->view('Content/edit_produk', $data);
            $this->load->view('Layout/footer');
        } else {
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'kode_produk' => $this->input->post('kode'),
                'nama_produk' => $this->input->post('nama'),
                'harga_produk' => $this->input->post('harga'),
                'stok' => '0'
            );
            $this->DataMaster->update_produk($id, $data);
            $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui!');
            redirect('controllerdatamaster/produk');
        }
    }
    public function hapus_produk($id)
    {
        $this->DataMaster->delete_produk($id);
        $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus!');
        redirect('controllerdatamaster/produk');
    }
}
        
    /* End of file  controllerDataMaster.php */
