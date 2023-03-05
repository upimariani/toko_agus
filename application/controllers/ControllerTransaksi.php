<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi');
		$this->load->model('mPerencanaan');
	}


	public function index()
	{
		$data = array(
			'transaksi' => $this->Transaksi->select_transaksi()
		);
		$this->load->view('Kasir/Layout/head');
		$this->load->view('Kasir/Layout/navbar');
		$this->load->view('Kasir/Layout/aside');
		$this->load->view('Kasir/Transaksi/vTransaksi', $data);
		$this->load->view('Kasir/Layout/footer');
	}
	public function addtransaksi()
	{
		$data = array(
			'produk' => $this->Transaksi->produk()
		);
		$this->load->view('Kasir/Layout/head');
		$this->load->view('Kasir/Layout/navbar');
		$this->load->view('Kasir/Layout/aside');
		$this->load->view('Kasir/Transaksi/vaddTransaksi', $data);
		$this->load->view('Kasir/Layout/footer');
	}
	public function cart()
	{

		$qty_beli = $this->input->post('qty');
		$qty_sisa = $this->input->post('sisa_produk');
		if ($qty_beli == '0') {
			$this->session->set_flashdata('error', 'Quantity Minimal 1!!!');
			redirect('ControllerTransaksi/addtransaksi');
		} else {
			if ($qty_beli > $qty_sisa) {
				$this->session->set_flashdata('error', 'Quantity Yang tersedia tidak mencukupi!!!');
				redirect('ControllerTransaksi/addtransaksi');
			} else {
				$data = array(
					'id' => $this->input->post('id'),
					'name' => $this->input->post('name'),
					'price' => $this->input->post('price'),
					'qty' => $this->input->post('qty'),
					'sisa' => $this->input->post('sisa')
				);
				$this->cart->insert($data);
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan di Keranjang!');
				redirect('ControllerTransaksi/addtransaksi');
			}
		}
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('ControllerTransaksi/addTransaksi');
	}
	public function invoice()
	{
		$id_trans = $this->input->post('id_transaksi');
		$total =  $this->input->post('total');
		$pembayaran = $this->input->post('pembayaran');
		$data = array(
			'id_transaksi' => $this->input->post('id_transaksi'),
			'id_user' => $this->session->userdata('id'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_bayar' => $total,
			'pembayaran' => $pembayaran,
			'kembali' => $pembayaran - $total
		);
		$this->Transaksi->insert_transaksi($data);

		//menyimpan pesanan ke detail transaksi
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data_rinci = array(
				'id_transaksi' => $this->input->post('id_transaksi'),
				'id_produk_masuk' => $item['id'],
				'qty_kel' => $this->input->post('qty' . $i++),
				'tgl_keluar' => date('Y-m-d')
			);
			$this->Transaksi->insert_detail_transaksi($data_rinci);
		}

		//mengurangi jumlah stok
		$kstok = 0;
		foreach ($this->cart->contents() as $key => $value) {
			$id = $value['id'];
			$kstok = $value['sisa'] - $value['qty'];
			$data = array(
				'sisa' => $kstok
			);
			$this->Transaksi->update_sisa($id, $data);
		}


		//perencanaan otomatis
		$perencanaan = $this->mPerencanaan->perencanaan();
		foreach ($perencanaan as $key => $value) {
			//perhitungan au
			$au = $value->jml / 320;
			//perhitungan eoq rumus = akar dari 2sd/h

			// $eoq = 0;
			// $eoq = (2 * 100000 * $value->jml) / 50000;
			// $hasil = sqrt($eoq);
			// $hasil_bulat = round($hasil);


			//perhitungan rop rumus = (lt * au) +ss
			$rop = 0;
			$rop = 2 + (1 * $au);
			$hasil_rop = round($rop);


			$rop = array(
				'stok_min' => $hasil_rop
			);
			$this->db->where('id_produk', $value->id_produk);
			$this->db->update('produk', $rop);
		}
		$this->cart->destroy();
		redirect('ControllerTransaksi/struk/' . $id_trans);
	}
	public function struk($id)
	{
		$data = array(
			'transaksi' => $this->Transaksi->view_transaksi($id)
		);
		$this->load->view('Kasir/Layout/head');
		$this->load->view('Kasir/Layout/navbar');
		$this->load->view('Kasir/Layout/aside');
		$this->load->view('Kasir/Transaksi/vstruk', $data);
		$this->load->view('Kasir/Layout/footer');
	}
}

/* End of file ControllerTransaksi.php */
