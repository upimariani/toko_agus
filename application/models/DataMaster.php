<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataMaster extends CI_Model
{
    //kelola user
    public function insert_user($data)
    {
        $this->db->insert('user', $data);
    }
    public function select_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }
    public function edit_user($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id);
        return $this->db->get()->row();
    }
    public function update_user($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }


    //kelola data kategori
    public function insert_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function select_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get()->result();
    }
    public function edit_kategori($id)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id);
        return $this->db->get()->row();
    }
    public function update_kategori($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }
    public function delete_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    //kelola data produk
    public function insert_produk($data)
    {
        $this->db->insert('produk', $data);
    }
    public function select_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('supplier', 'produk.id_supplier = supplier.id_supplier', 'left');
        return $this->db->get()->result();
    }
    public function edit_produk($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id);
        return $this->db->get()->row();
    }
    public function update_produk($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    public function delete_produk($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }

    //kelola data supplier
    public function select_supplier()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        return $this->db->get()->result();
    }
    public function insert_supplier($data)
    {
        $this->db->insert('supplier', $data);
    }
    public function edit_supplier($id)
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('id_supplier', $id);
        return $this->db->get()->row();
    }
    public function update_supplier($id, $data)
    {
        $this->db->where('id_supplier', $id);
        $this->db->update('supplier', $data);
    }
    public function delete_supplier($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');
    }
}
                        
/* End of file DataMaster.php */
