<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk Masuk</h1>
                    <a href="<?= base_url('ControllerPengelolaanBarang/create_brg_masuk') ?>" class="btn btn-warning mt-3">Add Produk Masuk</a>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Barang Masuk</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($brg_masuk as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><strong><?= $value->nama_produk ?></strong><br>
                                                Kategori: <span class="badge bg-olive"><?= $value->nama_kategori ?></span>
                                            </td>
                                            <td><?= $value->tgl_masuk ?></td>
                                            <td><?= $value->qty ?></td>
                                            <td><?= $value->create_time ?></td>
                                            <td class="text-center"> <a href="<?= base_url('ControllerPengelolaanBarang/hapus_brg_masuk/' . $value->id_produk_masuk . '/' . $value->id_produk) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('ControllerPengelolaanBarang/update_brg_masuk/' . $value->id_produk_masuk) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
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