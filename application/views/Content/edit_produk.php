<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Produk</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">DataTables</li>
					</ol>
				</div>
			</div>

			<?php if ($this->session->userdata('success')) {
			?>
				<div class="alert alert-success alert-dismissible mt-3">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-check"></i> Alert!</h5>
					<?= $this->session->userdata('success') ?>
				</div>
			<?php
			} ?>

		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-8">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title"><i class="far fa-edit"></i> Update Data Produk</h3>
						</div>
						<form action="<?= base_url('controllerDataMaster/update_produk/' . $produk->id_produk) ?>" method="POST" role="form">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Kode Produk</label>
											<input type="text" name="kode" class="form-control" value="<?= $produk->kode_produk ?>" id="exampleInputEmail1" placeholder="Masukkan Nama User">
											<?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Nama Produk</label>
											<input type="text" name="nama" class="form-control" value="<?= $produk->nama_produk ?>" id="exampleInputPassword1" placeholder="Masukkan Alamat">
											<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Kategori</label>
											<select name="kategori" class="form-control">
												<option value="">---Pilih Kategori---</option>
												<?php
												foreach ($kategori as $key => $kategori) {
												?>
													<option value="<?= $kategori->id_kategori ?>" <?php if ($kategori->id_kategori == $produk->id_kategori) {
																										echo 'selected';
																									} ?>><?= $kategori->nama_kategori ?></option>
												<?php
												}
												?>

											</select>
											<?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Harga Produk</label>
											<input type="text" name="harga" class="form-control" value="<?= $produk->harga_produk ?>" id="exampleInputPassword1" placeholder="Masukkan Username">
											<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label for="exampleInputPassword1">Stok Supplier</label>
											<input type="number" name="stok_supp" class="form-control" value="<?= $produk->stok_supp ?>" id="exampleInputPassword1" placeholder="Masukkan Stok Supplier Produk">
											<?= form_error('stok_supp', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
									<!-- <div class="col-lg-12">
                                        <hr>
                                        <h5>Perhitungan Stok Minimal Gudang</h5>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Perhitungan Volume Penyimpanan</label>
                                            <input type="text" name="p_penyimpanan" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Ukuran Panjang Penyimpanan / cm2">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="l_penyimpanan" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Ukuran Lebar Penyimpanan / cm2">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="t_penyimpanan" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Ukuran Tinggi Penyimpanan / cm2">
                                            <?= form_error('t_penyimpanan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>


                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Perhitungan Volume Barang</label>
                                            <input type="text" name="p_barang" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Ukuran Panjang Penyimpanan / cm2">

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="l_barang" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Ukuran Lebar Penyimpanan / cm2">
                                            <?= form_error('l_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="t_barang" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Ukuran Tinggi Penyimpanan / cm2">

                                        </div>


                                    </div> -->
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-success"><i class="far fa-save"></i> Update</button>
								<a href="<?= base_url('controllerDataMaster/produk') ?>" class="btn btn-danger">Kembali</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>