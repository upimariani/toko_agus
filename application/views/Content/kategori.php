<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fab fa-buffer"></i> Data Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
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
                            <li class="nav-item"><a class="nav-link <?php if (form_error('kategori') == '') {
                                                                        echo 'active';
                                                                    } ?>" href="#tab_1" data-toggle="tab"><i class="fas fa-sticky-note"></i> Informasi Kategori</a></li>
                            <li class="nav-item"><a class="nav-link <?php if (form_error('kategori') != '') {
                                                                        echo 'active';
                                                                    } ?>" href="#tab_2" data-toggle="tab"><i class="fas fa-marker"></i> Create New Kategori</a></li>

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane <?php if (form_error('kategori') == '') {
                                                        echo 'active';
                                                    } ?>" id="tab_1">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Kategori</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($kategori as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?>.</td>
                                                    <td><?= $value->nama_kategori ?></td>
                                                    <td class="text-center"> <a href="<?= base_url('controllerdatamaster/hapus_kategori/' . $value->id_kategori) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        <a href="<?= base_url('controllerdatamaster/update_kategori/' . $value->id_kategori) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
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
                            <div class="tab-pane <?php if (form_error('kategori') != '') {
                                                        echo 'active';
                                                    } ?>" id="tab_2">
                                <form method="POST" action="<?= base_url('controllerdatamaster/kategori') ?>" role="form">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Kategori</label>
                                            <input type="text" name="kategori" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Kategori">
                                            <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
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