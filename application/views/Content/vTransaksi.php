<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
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
            <button type="submt" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Transaksi Supplier</button>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Transaksi</h3>
                        </div>
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
                                                    <span class="badge badge-danger">Pesanan Ditolak!</span>

                                                <?php
                                                } ?>
                                            </td>
                                            <td class="text-center"><a href="<?= base_url('ControllerSupplier/detail_transaksi_admin/' . $value->id_tran_supp) ?>" class="btn btn-success">Detail Transaksi</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('ControllerSupplier/add_transaksi_admin') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="form-control" name="supplier" required>
                            <option value="">--Pilih Supplier---</option>
                            <?php
                            foreach ($supplier as $key => $value) {
                            ?>
                                <option value="<?= $value->id_supplier ?>"><?= $value->nama_supplier ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>