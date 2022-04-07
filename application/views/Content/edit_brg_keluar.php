<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Produk Keluar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
            <?php if ($this->session->userdata('error')) {
            ?>
                <div class="alert alert-danger alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    <?= $this->session->userdata('error') ?>
                </div>
            <?php
            } ?>
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
                        <form action="<?= base_url('ControllerPengelolaanBarang/update_brg_keluar/' . $brg_kel->id_produk_keluar) ?>" method="POST" role="form">
                            <input type="hidden" name="stok_brg_masuk" value="<?= $brg_kel->qty ?>">
                            <input type="hidden" name="stok_keluar" value="<?= $brg_kel->qty_kel ?>">
                            <input type="hidden" name="id_brg_masuk" value="<?= $brg_kel->id_produk_masuk ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Produk</label>
                                            <select class="form-control" id="produk" name="produk" disabled>
                                                <option value="">---Pilih Produk---</option>
                                                <?php
                                                foreach ($brg_masuk as $key => $value) {
                                                ?>
                                                    <option data-qty="<?= $value->qty ?>" value="<?= $value->id_produk_masuk ?>" <?php if ($brg_kel->id_produk_masuk == $value->id_produk_masuk) {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>><?= $value->nama_produk ?> | <?= $value->create_time ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?= form_error('produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Quantity Sebelumnya</label>
                                            <input type="number" value="<?= $brg_kel->qty ?>" class="qty form-control" id="exampleInputPassword1" placeholder="Quantity" readonly>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tanggal Produk Keluar</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" value="<?= $brg_kel->tgl_keluar ?>" name="tgl" class="form-control datetimepicker-input" placeholder="Masukkan Tanggal Barang Masuk" data-target="#reservationdate" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Quantity Keluar</label>
                                            <input type="number" value="<?= $brg_kel->qty_kel ?>" name="qty_kel" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Quantity">
                                            <?= form_error('qty_kel', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
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