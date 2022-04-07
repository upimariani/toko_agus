<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-user-alt"></i> Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
            <button id="create_user" class="btn btn-primary"><i class="fas fa-marker"></i> Create User</button>

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

                    <!-- general form elements -->
                    <div id="show_input_user" class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-marker"></i> Create New User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('controllerDataMaster/user') ?>" method="POST" role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama User</label>
                                            <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>" id="exampleInputEmail1" placeholder="Masukkan Nama User">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat') ?>" id="exampleInputPassword1" placeholder="Masukkan Alamat">
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No Telepon</label>
                                            <input type="number" name="no_tlpon" class="form-control" value="<?= set_value('no_tlpon') ?>" id="exampleInputPassword1" placeholder="Masukkan No Telepon">
                                            <?= form_error('no_tlpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Username</label>
                                            <input type="text" name="username" class="form-control" value="<?= set_value('username') ?>" id="exampleInputPassword1" placeholder="Masukkan Username">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="text" name="password" class="form-control" value="<?= set_value('password') ?>" id="exampleInputPassword1" placeholder="Masukkan Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Level User</label>
                                            <select name="level" class="form-control">
                                                <option value="">---Pilih Level User---</option>
                                                <option value="1" <?php if (set_value('level') == '1') {
                                                                        echo 'selected';
                                                                    } ?>>Admin</option>
                                                <option value="2" <?php if (set_value('level') == '2') {
                                                                        echo 'selected';
                                                                    } ?>>Pemilik</option>
                                            </select>
                                            <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">No Telepon</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Level User</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_user ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td><?= $value->no_hp ?></td>
                                            <td><?= $value->username ?></td>
                                            <td><?= $value->password ?></td>
                                            <td><?= $value->level_user ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('controllerdatamaster/hapus_user/' . $value->id_user) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('controllerdatamaster/update_user/' . $value->id_user) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
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
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>