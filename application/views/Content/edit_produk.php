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
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Supplier Produk</label>
                                            <select name="supplier" class="form-control">
                                                <option value="">---Pilih Supplier Produk---</option>
                                                <?php
                                                foreach ($supplier as $key => $item) {
                                                ?>
                                                    <option value="<?= $item->id_supplier ?>" <?php if ($item->id_supplier == $produk->id_supplier) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?= $item->nama_supplier ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?= form_error('supplier', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Stok Minimal Produk</label>
                                            <input type="text" name="stok_min" class="form-control" value="<?= $produk->stok_min ?>" id="exampleInputPassword1" placeholder="Masukkan Stok Minimal Produk">
                                            <?= form_error('stok_min', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
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