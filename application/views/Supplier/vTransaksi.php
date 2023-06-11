<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-barcode"></i> Data Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Supplier</li>
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
    <div class="col-md-12">
        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Transaksi Supplier</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Supplier</th>
                                    <th class="text-center">Tanggal Transaksi</th>
                                    <th class="text-center">Total Bayar</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($transaksi as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nama_supplier ?></td>
                                        <td><?= $value->tgl_tran_supp ?></td>
                                        <td>Rp. <?= number_format($value->tot_bayar) ?></td>
                                        <td><?= $value->time_supp ?></td>
                                        <td><?php if ($value->status_transaksi == '0') {
                                            ?>
                                                <span class="badge badge-danger">Belum Dikonfirmasi</span>
                                            <?php
                                            } else if ($value->status_transaksi == '1') {
                                            ?>
                                                <span class="badge badge-success">Selesai</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-danger">Tolak Pesanan!</span>

                                            <?php
                                            } ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('ControllerSupplier/detail_transaksi_supplier/' . $value->id_tran_supp) ?>" class="btn btn-success">Detail Transaksi</a>


                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Supplier</th>
                                    <th class="text-center">Tanggal Transaksi</th>
                                    <th class="text-center">Total Bayar</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>