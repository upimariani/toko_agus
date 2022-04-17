<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
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

                    <!-- general form elements -->
                    <div id="show_input_user" class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Update User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('ControllerKelolaUser/update_user/' . $user->id_user) ?>" method="POST" role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama User</label>
                                            <input type="text" name="nama" class="form-control" value="<?= $user->nama_user ?>" id="exampleInputEmail1" placeholder="Masukkan Nama User">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?= $user->alamat ?>" id="exampleInputPassword1" placeholder="Masukkan Alamat">
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No Telepon</label>
                                            <input type="number" name="no_tlpon" class="form-control" value="<?= $user->no_hp ?>" id="exampleInputPassword1" placeholder="Masukkan No Telepon">
                                            <?= form_error('no_tlpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Username</label>
                                            <input type="text" name="username" class="form-control" value="<?= $user->username ?>" id="exampleInputPassword1" placeholder="Masukkan Username">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="text" name="password" class="form-control" value="<?= $user->password ?>" id="exampleInputPassword1" placeholder="Masukkan Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Level User</label>
                                            <select name="level" class="form-control">
                                                <option value="">---Pilih Level User---</option>
                                                <option value="1" <?php if ($user->level_user == '1') {
                                                                        echo 'selected';
                                                                    } ?>>Admin</option>
                                                <option value="2" <?php if ($user->level_user == '2') {
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
                                <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Submit</button>
                                <a class="btn btn-danger" href="<?= base_url('controllerdatamaster/user') ?>">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>