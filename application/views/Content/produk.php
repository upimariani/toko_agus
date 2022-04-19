<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-barcode"></i> Data Produk</h1>
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
    <div class="col-md-8">
        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Produk</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><i class="fas fa-sticky-note"></i> Informasi Produk</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><i class="fas fa-marker"></i> Create New Produk</a></li>

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Produk</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($produk as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td>
                                                        <p>Supplier : <?= $value->nama_supplier ?></p>
                                                        Kode Produk: <strong><?= $value->kode_produk ?></strong>
                                                        <p><?= $value->nama_produk ?></p>
                                                    </td>
                                                    <td class="text-center"><?= $value->nama_kategori ?></td>
                                                    <td class="text-center">Rp. <?= number_format($value->harga_produk, 0)  ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('controllerdatamaster/hapus_produk/' . $value->id_produk) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        <a href="<?= base_url('controllerdatamaster/update_produk/' . $value->id_produk) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <form action="<?= base_url('controllerDataMaster/produk') ?>" method="POST" role="form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Kode Produk</label>
                                                    <input type="text" name="kode" class="form-control" value="<?= set_value('kode') ?>" id="exampleInputEmail1" placeholder="Masukkan Kode Produk">
                                                    <?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Nama Produk</label>
                                                    <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>" id="exampleInputPassword1" placeholder="Masukkan Nama Produk">
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
                                                        foreach ($supplier as $key => $value) {
                                                        ?>
                                                            <option value="<?= $value->id_supplier ?>"><?= $value->nama_supplier ?></option>
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
                                                            <option value="<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></option>
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
                                                    <input type="text" name="harga" class="form-control" value="<?= set_value('harga') ?>" id="exampleInputPassword1" placeholder="Masukkan Harga Produk">
                                                    <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>