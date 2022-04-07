<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('controllerLogin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $produk ?></h3>

                            <p>Produk</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-barcode"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $supplier ?></h3>

                            <p> Supplier</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $brg_masuk ?></h3>

                            <p>Produk Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $brg_keluar ?></h3>

                            <p>Produk Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <!-- right col -->
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Laporan Stok Barang</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lap as $key => $value) {
                                ?>
                                    <tr>
                                        <td>
                                            <?= $value->nama_produk ?>
                                        </td>
                                        <td>Rp. <?= number_format($value->harga_produk, 0) ?></td>
                                        <td>
                                            <?php
                                            if ($value->qty <= 5) {
                                            ?>
                                                <small class="text-danger mr-1">
                                                    <i class="fas fa-arrow-down"></i>
                                                    <?= $value->qty ?>
                                                </small>
                                                <span class="badge bg-danger">Segera Restock!</span>
                                            <?php
                                            } else {
                                            ?>
                                                <small class="text-success mr-1">
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?= $value->qty ?>
                                                </small>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <?php
                foreach ($lap as $key => $value) {
                    if ($value->qty <= 5) {
                ?>
                        <div class="callout callout-danger">
                            <h5>Produk <strong> <?= $value->nama_produk ?></strong></h5>

                            <p>Segera Melakukan Pemesanan Kembali, sebelum stok produk kamu habis!</p>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>


        <!-- /.col-md-6 -->
        <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
</div>