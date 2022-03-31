<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KelolaProduk extends CI_Model
{

    //kelola data barang masuk
    public function barang_masuk()
    {
        $this->db->select('*');
        $this->db->from('produk_masuk');
        $this->db->join('produk', 'produk_masuk.id_produk = produk.id_produk', 'left');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');

        return $this->db->get()->result();
    }
    public function insert_brg_masuk($data)
    {
        $this->db->insert('produk_masuk', $data);
    }
    public function edit_brg_masuk($id)
    {
        $this->db->select('*');
        $this->db->from('produk_masuk');
        $this->db->join('produk', 'produk_masuk.id_produk = produk.id_produk', 'left');
        $this->db->where('produk_masuk.id_barang_masuk', $id);
        return $this->db->get()->row();
    }
    public function update_brg_masuk($id, $data)
    {
        $this->db->where('id_barang_masuk', $id);
        $this->db->update('produk_masuk', $data);
    }
}
                        
/* End of file KelolaProduk.php */