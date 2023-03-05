<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPerencanaan extends CI_Model
{
	public function perencanaan()
	{
		$data = $this->db->query("SELECT SUM(qty) as jml, produk.id_produk FROM `produk_keluar` JOIN produk_masuk ON produk_keluar.id_produk_masuk=produk_masuk.id_produk_masuk JOIN produk ON produk.id_produk=produk_masuk.id_produk GROUP BY produk.id_produk;")->result();
		return $data;
	}
}

/* End of fils Perencanaan.php */
