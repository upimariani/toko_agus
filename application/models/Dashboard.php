<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Model
{
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->num_rows();
    }
    public function supplier()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        return $this->db->get()->num_rows();
    }
    public function produk_masuk()
    {
        $this->db->select('*');
        $this->db->from('produk_masuk');
        return $this->db->get()->num_rows();
    }
    public function produk_keluar()
    {
        $this->db->select('*');
        $this->db->from('produk_keluar');
        return $this->db->get()->num_rows();
    }

    //alert stok abis
    public function laporan_stok()
    {
        $this->db->select('sum(sisa) as qty, produk_masuk.id_produk, nama_produk, harga_produk, stok_min, satuan');
        $this->db->from('produk_masuk');
        $this->db->join('produk', 'produk_masuk.id_produk = produk.id_produk', 'left');
        $this->db->group_by('produk_masuk.id_produk');
        return $this->db->get()->result();
    }
}

/* End of file Dashboard.php */
