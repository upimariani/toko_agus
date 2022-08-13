<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Here!</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div>
            </div>
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
                                <form action="<?= base_url('ControllerTransaksi/cart') ?>" method="POST">
                                    <section class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Produk</label>
                                                    <select class="form-control" name="id" id="produk_cart" required>
                                                        <option value="">--Pilih Produk---</option>
                                                        <?php
                                                        foreach ($produk as $key => $value) {
                                                        ?>
                                                            <option data-sisa="<?= $value->sisa ?>" data-name="<?= $value->nama_produk ?>" data-price="<?= $value->harga_produk ?>" data-harga="Rp. <?= number_format($value->harga_produk)  ?>" value="<?= $value->id_produk_masuk ?>"><?= $value->nama_produk ?> | Tanggal Masuk <?= $value->tgl_masuk ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Produk</label>
                                                    <input type="hidden" name="price" class="price">
                                                    <input type="hidden" name="name" class="name">
                                                    <input type="hidden" name="sisa" class="sisa">
                                                    <input type="text" name="harga" class="harga form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Qty Produk</label>
                                                    <input type="number" name="qty" class="form-control" required>
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
                                                <td><a href="<?= base_url('ControllerTransaksi/delete/' . $value['rowid']) ?>"><i class="right fas fa-trash"></i></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>

                                </table>

                            </div>
                            <button type="submt" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Add Cart</button>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('ControllerTransaksi/invoice') ?>" method="POST">
            <?php
            $i = 1;
            foreach ($this->cart->contents() as $items) {
                echo form_hidden('qty' . $i++, $items['qty']);
            }
            ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Jumlah Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $id_transaksi =  date('Ymd') . strtoupper(random_string('alnum', 8));
                    ?>
                    <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                    <input type="hidden" name="total" value="<?= $this->cart->total()  ?>">
                    <p>Id Transaksi : <?= $id_transaksi ?></p>
                    <p>Total Pembayaran : <strong>Rp. <?= number_format($this->cart->total())  ?></strong></p>
                    <div class="form-group">
                        <label>Pembayaran</label>
                        <input type="number" name="pembayaran" class="form-control" required>
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