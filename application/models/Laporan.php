<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Model
{
    //---------laporan biasa------------
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('produk_keluar');
        $this->db->join('produk_masuk', 'produk_masuk.id_produk_masuk = produk_keluar.id_produk_masuk', 'left');
        $this->db->join('produk', 'produk.id_produk = produk_masuk.id_produk', 'left');
        $this->db->where('DAY(produk_keluar.tgl_keluar)', $tanggal);
        $this->db->where('MONTH(produk_keluar.tgl_keluar)', $bulan);
        $this->db->where('YEAR(produk_keluar.tgl_keluar)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('produk_keluar');
        $this->db->join('produk_masuk', 'produk_masuk.id_produk_masuk = produk_keluar.id_produk_masuk', 'left');
        $this->db->join('produk', 'produk.id_produk = produk_masuk.id_produk', 'left');
        $this->db->where('MONTH(produk_keluar.tgl_keluar)', $bulan);
        $this->db->where('YEAR(produk_keluar.tgl_keluar)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('produk_keluar');
        $this->db->join('produk_masuk', 'produk_masuk.id_produk_masuk = produk_keluar.id_produk_masuk', 'left');
        $this->db->join('produk', 'produk.id_produk = produk_masuk.id_produk', 'left');
        $this->db->where('YEAR(produk_keluar.tgl_keluar)', $tahun);
        return $this->db->get()->result();
    }
}

/* End of file Laporan.php */
