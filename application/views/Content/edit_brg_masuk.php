<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Produk Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('ControllerPengelolaanBarang/edit_brg_masuk/' . $brg_masuk->id_produk_masuk) ?>" method="POST" role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Produk</label>
                                            <select class="form-control" name="produk" disabled>
                                                <option value="">---Pilih Produk---</option>
                                                <?php
                                                foreach ($produk as $key => $value) {
                                                ?>
                                                    <option value="<?= $value->id_produk ?>" <?php if ($brg_masuk->id_produk == $value->id_produk) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?= $value->nama_produk ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?= form_error('produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Quantity</label>
                                            <input type="number" value="<?= $brg_masuk->qty ?>" name="qty" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Quantity">
                                            <?= form_error('qty', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal Produk Masuk</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="tgl" value="<?= $brg_masuk->tgl_masuk ?>" class="form-control datetimepicker-input" placeholder="Masukkan Tanggal Barang Masuk" data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Save</button>
                                <a href="<?= base_url('ControllerPengelolaanBarang/barang_masuk') ?>" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>