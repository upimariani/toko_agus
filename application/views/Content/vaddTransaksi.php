<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Produk Supplier Here!</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
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

            <!-- /.row -->
            <div class="row">

                <div class="col-6">
                    <section class="content">
                        <div class="container-fluid">
                            <!-- SELECT2 EXAMPLE -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Data Transaksi</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <form action="<?= base_url('ControllerSupplier/add_cart') ?>" method="POST">
                                    <!-- <input type="text" value="<?= $this->session->userdata('supplier') ?>"> -->
                                    <section class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Produk</label>
                                                    <select class="form-control" name="id" id="produk_admin" required>
                                                        <option value="">--Pilih Produk---</option>
                                                        <?php
                                                        foreach ($produk as $key => $value) {
                                                        ?>
                                                            <option data-sisa="<?= $value->stok_supp ?>" data-name="<?= $value->nama_produk ?>" data-price="<?= $value->harga_produk ?>" data-harga="Rp. <?= number_format($value->harga_produk)  ?>" value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sisa Produk</label>
                                                    <input type="text" name="sisa" class="sisa form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Produk</label>
                                                    <input type="hidden" name="price" class="price">
                                                    <input type="hidden" name="name" class="name">
                                                    <input type="text" name="harga" class="harga form-control" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Qty Produk</label>
                                                    <input type="number" name="qty" class="form-control" min="1" required>
                                                </div>
                                                <button type="submt" class="btn btn-info">Add Cart</button>
                                            </div>
                                        </div>

                                    </section>
                                </form>
                            </div>
                        </div>
                </div>
                <?php
                $qty = 0;
                foreach ($this->cart->contents() as $key => $value) {
                    $qty += $value['qty'];
                }
                ?>
                <?php
                if ($qty != 0) {
                ?>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Keranjang Produk</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Nama Produk</th>
                                            <th>Harga Produk</th>
                                            <th>SubTotal</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($this->cart->contents() as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $value['qty'] ?></td>
                                                <td><?= $value['name'] ?></td>
                                                <td>Rp. <?= number_format($value['price'])  ?></td>
                                                <td>Rp. <?= number_format($value['qty'] * $value['price'])  ?></td>
                                                <td><a href="<?= base_url('ControllerSupplier/delete/' . $value['rowid']) ?>"><i class="right fas fa-trash"></i></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>

                                </table>

                            </div>
                            <a href="<?= base_url('ControllerSupplier/tran_supp_oke') ?>" class="btn btn-info">Kirim Pesanan</a>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                <?php
                }
                ?>

            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>