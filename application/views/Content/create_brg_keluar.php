<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Produk Keluar</h1>
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
                        <form action="<?= base_url('ControllerPengelolaanBarang/create_brg_keluar') ?>" method="POST" role="form">
                            <input type="hidden" name="qty_seb" class="qty">
                            <input type="hidden" name="id" class="id">
                            <input type="hidden" name="stok" class="stok">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Produk</label>
                                            <select class="form-control" id="produk" name="produk">
                                                <option value="">---Pilih Produk---</option>
                                                <?php
                                                foreach ($brg_masuk as $key => $value) {
                                                ?>
                                                    <option value="<?= $value->id_produk_masuk ?>" data-id="<?= $value->id_produk ?>" data-qty="<?= $value->qty ?>" <?php if (set_value('produk') == $value->id_produk_masuk) {
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
                                            <input type="number" class="qty form-control" id="exampleInputPassword1" placeholder="Quantity" readonly>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tanggal Produk Keluar</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" value="<?= set_value('tgl') ?>" name="tgl" class="form-control datetimepicker-input" data-target="#reservationdate" />
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
                                            <input type="number" value="<?= set_value('qty_kel') ?>" name="qty_kel" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Quantity">
                                            <?= form_error('qty_kel', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning"><i class="far fa-save"></i> Save</button>
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