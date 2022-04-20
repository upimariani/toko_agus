<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-user-tie"></i> Data Supplier</h1>
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
    <div class="col-md-8">
        <div class="row">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Supplier</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><i class="fas fa-sticky-note"></i> Informasi Supplier</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><i class="fas fa-marker"></i> Create New Supplier</a></li>

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane <?php if (form_error('nama') == '') {
                                                        echo 'active';
                                                    } ?>" id="tab_1">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Supplier</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">No Telepon</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($supplier as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td>
                                                        <p>Toko : <strong><?= $value->nama_toko ?></strong></p>
                                                        <p><?= $value->nama_supplier ?></p>
                                                    </td>
                                                    <td><?= $value->alamat ?></td>
                                                    <td class="text-center"><span class="badge bg-warning"><?= $value->no_hp ?></span></td>
                                                    <td class="text-center"><a href="<?= base_url('controllerdatamaster/hapus_supplier/' . $value->id_supplier) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        <a href="<?= base_url('ControllerDataMaster/update_supplier/' . $value->id_supplier) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
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
                            <!-- /.tab-pane -->
                            <div class="tab-pane <?php if (form_error('nama') != '') {
                                                        echo 'active';
                                                    } ?>" id="tab_2">
                                <form role="form" action="<?= base_url('ControllerDataMaster/supplier') ?>" method="POST">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nama Supplier</label>
                                                <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control" placeholder="Masukkan Nama Supplier">
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Toko</label>
                                                <input type="text" value="<?= set_value('nama_toko') ?>" name="nama_toko" class="form-control" placeholder="Masukkan Nama Toko">
                                                <?= form_error('nama_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" value="<?= set_value('alamat') ?>" name="alamat" rows="3" placeholder="Masukkan Alamat"></textarea>
                                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nomor Telepon</label>
                                                <input type="number" value="<?= set_value('no_hp') ?>" name="no_hp" class="form-control" rows="3" placeholder="Masukkan Nomor Telepon">
                                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>