<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerKelolaUser extends CI_Controller
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
            $this->load->view('Pimpinan/Layout/head');
            $this->load->view('Pimpinan/Layout/navbar');
            $this->load->view('Pimpinan/Layout/aside');
            $this->load->view('Pimpinan/user', $data);
            $this->load->view('Pimpinan/Layout/footer');
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
            redirect('ControllerKelolaUser/user');
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
            $this->load->view('Pimpinan/Layout/head');
            $this->load->view('Pimpinan/Layout/navbar');
            $this->load->view('Pimpinan/Layout/aside');
            $this->load->view('Pimpinan/edit_user', $data);
            $this->load->view('Pimpinan/Layout/footer');
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
            redirect('ControllerKelolaUser/user');
        }
    }
    public function hapus_user($id)
    {
        $this->DataMaster->delete_user($id);
        $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!!!');
        redirect('ControllerKelolaUser/user');
    }
}

/* End of file ControllerKelolaUser.php */
