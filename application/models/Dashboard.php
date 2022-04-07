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
}

/* End of file Dashboard.php */
