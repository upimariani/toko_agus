<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Model
{
    public function select_transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        return $this->db->get()->result();
    }
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('produk_masuk', 'produk.id_produk = produk_masuk.id_produk', 'left');
        $this->db->where('sisa !=0');
        return $this->db->get()->result();
    }
    public function insert_detail_transaksi($data)
    {
        $this->db->insert('produk_keluar', $data);
    }
    public function insert_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function update_sisa($id, $data)
    {
        $this->db->where('id_produk_masuk', $id);
        $this->db->update('produk_masuk', $data);
    }
    public function view_transaksi($id)
    {
        $data['pesanan'] = $this->db->query("SELECT * FROM `transaksi` JOIN produk_keluar ON transaksi.id_transaksi = produk_keluar.id_transaksi JOIN produk_masuk ON produk_masuk.id_produk_masuk = produk_keluar.id_produk_masuk JOIN produk ON produk.id_produk=produk_masuk.id_produk WHERE transaksi.id_transaksi='" . $id . "'")->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` WHERE transaksi.id_transaksi='" . $id . "'")->row();
        return $data;
    }


    //transaksi admin
    public function transaksi_admin()
    {
        return $this->db->query("SELECT * FROM `transaksi_supp` JOIN supplier ON transaksi_supp.id_supplier=supplier.id_supplier;")->result();
    }


    //transaksi supplier
    public function transaksi_supplier()
    {
        return $this->db->query("SELECT * FROM `transaksi_supp` JOIN supplier ON transaksi_supp.id_supplier=supplier.id_supplier where supplier.id_supplier='" . $this->session->userdata('id') . "';")->result();
    }
    public function detail_transaksi($id)
    {
        $data['pesanan'] = $this->db->query("SELECT * FROM `transaksi_supp` JOIN produk_masuk ON transaksi_supp.id_tran_supp = produk_masuk.id_tran_supp JOIN produk ON produk_masuk.id_produk = produk.id_produk WHERE transaksi_supp.id_tran_supp='" . $id . "'")->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM `transaksi_supp` JOIN supplier ON transaksi_supp.id_supplier=supplier.id_supplier WHERE transaksi_supp.id_tran_supp='" . $id . "'")->row();
        return $data;
    }
}

/* End of file Transaksi.php */
