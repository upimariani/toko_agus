<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerSupplier extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataMaster');
        $this->load->model('Transaksi');
    }

    public function index()
    {
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/navbar');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/Layout/footer');
    }

    public function transaksi()
    {
        $data = array(
            'transaksi' => $this->Transaksi->transaksi_supplier()
        );

        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/navbar');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/vTransaksi', $data);
        $this->load->view('Supplier/Layout/footer');
    }

    public function transaksi_admin()
    {
        $data = array(
            'supplier' => $this->DataMaster->select_supplier(),
            'transaksi' => $this->Transaksi->transaksi_admin()
        );
        $this->load->view('Layout/head');
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/aside');
        $this->load->view('Content/vTransaksi', $data);
        $this->load->view('Layout/footer');
    }
    public function add_transaksi_admin()
    {
        if ($this->session->userdata('supplier') == '') {
            $supplier = $this->input->post('supplier');
            $array = array(
                'supplier' => $supplier
            );

            $this->session->set_userdata($array);
        }
        $data = array(
            'produk' => $this->DataMaster->select_produk_admin($this->session->userdata('supplier'))
        );
        $this->load->view('Layout/head');
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/aside');
        $this->load->view('Content/vaddTransaksi', $data);
        $this->load->view('Layout/footer');
    }
    public function add_cart()
    {
        $sisa = $this->input->post('sisa');
        $qty = $this->input->post('qty');
        if ($qty > $sisa) {
            $this->session->set_flashdata('error', 'Quantity Melebihi Stok yang Tersedia!!!');
            redirect('ControllerSupplier/add_transaksi_admin');
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'qty' => $this->input->post('qty')
            );
            $this->cart->insert($data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan di Keranjang!');
            redirect('ControllerSupplier/add_transaksi_admin');
        }
    }
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('ControllerSupplier/add_transaksi_admin');
    }
    public function tran_supp_oke()
    {
        $tran = array(
            'id_supplier' => $this->session->userdata('supplier'),
            'tgl_tran_supp' => date('Y-m-d'),
            'tot_bayar' => $this->cart->total(),
            'status_transaksi' => '0'
        );
        $this->db->insert('transaksi_supp', $tran);

        $max = $this->db->query("SELECT MAX(id_tran_supp) as max FROM `transaksi_supp`;")->row();
        foreach ($this->cart->contents() as $key => $value) {
            $data = array(
                'id_produk' => $value['id'],
                'id_tran_supp' => $max->max,
                'qty' => $value['qty'],
                'sisa' => $value['qty'],
            );
            $this->db->insert('produk_masuk', $data);
        }

        $this->session->unset_userdata('supplier');
        $this->cart->destroy();
        redirect('ControllerSupplier/transaksi_admin');
    }

    public function konfirmasi_supplier($id_transaksi)
    {
        $data = array(
            'status_transaksi' => '1'
        );
        $this->db->where('id_tran_supp', $id_transaksi);
        $this->db->update('transaksi_supp', $data);

        $produk_masuk = array(
            'tgl_masuk' => date('Y-m-d')
        );
        $this->db->where('id_tran_supp', $id_transaksi);
        $this->db->update('produk_masuk', $produk_masuk);


        redirect('ControllerSupplier/transaksi');
    }

    public function detail_transaksi_supplier($id_transaksi)
    {
        $data = array(
            'transaksi' => $this->Transaksi->detail_transaksi($id_transaksi)
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/navbar');
        $this->load->view('Supplier/Layout/aside');
        $this->load->view('Supplier/vDetailTransaksi', $data);
        $this->load->view('Supplier/Layout/footer');
    }

    public function detail_transaksi_admin($id_transaksi)
    {
        $data = array(
            'transaksi' => $this->Transaksi->detail_transaksi($id_transaksi)
        );
        $this->load->view('Layout/head');
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/aside');
        $this->load->view('Content/vDetailTransaksi', $data);
        $this->load->view('Layout/footer');
    }
}

/* End of file ControllerSupplier.php */
