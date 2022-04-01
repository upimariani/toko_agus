<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk Keluar</h1>
                    <a href="<?= base_url('ControllerPengelolaanBarang/create_brg_keluar') ?>" class="btn btn-warning">Add Produk Keluar</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Produk Keluar</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Tanggal Keluar</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($brg_keluar as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_produk ?></td>
                                            <td><?= $value->tgl_keluar ?></td>
                                            <td class="text-center"><span class="badge badge-warning"><?= $value->qty_kel ?></span></td>
                                            <td><?= $value->create_time ?></td>
                                            <td class="text-center"> <a href="<?= base_url('ControllerPengelolaanBarang/hapus_brg_keluar/' . $value->id_produk_keluar) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('ControllerPengelolaanBarang/update_brg_keluar/' . $value->id_produk_keluar) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
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
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>