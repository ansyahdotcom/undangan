<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 justify-content-end">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin">Data Admin</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- flash data -->
        <div class="flash-data" data-flashdata="<?= session()->get('message') ?>"></div>

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card">

                    <!-- form start -->
                    <form action="/admin/update" class="quickForm" method="POST" enctype="multipart/form-data">
                        <!-- CSRF Protection -->
                        <?= csrf_field(); ?>

                        <div class="card-header bg-primary">
                            <h4 class="text-capitalize text-center text-white font-weight-bold"><?= $title; ?></h3>
                        </div>
                        <div class="card-body form-add">
                            <p class="font-italic font-weight-bold">Field bertanda (<span class="text-danger">*</span>) wajib diisi!</p>
                            <div class="row">
                                <input type="hidden" name="id_adm" value="<?= $adm['id_adm']; ?>">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Admin <span class="text-danger">*</span></label>
                                        <input type="text" name="namaAdmin" class="form-control" id="namaAdmin" value="<?= $adm['nama_adm']; ?>" placeholder="Masukkan nama admin" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Username <span class="text-danger">*</span></label>
                                        <input type="text" name="username" class="form-control" id="username" value="<?= $adm['username']; ?>" placeholder="Masukkan username admin">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Masukkan password admin">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="/admin" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Update</button>
                            </div>
                        </div>

                    </form>
                    <!-- /.form -->

                </div>
                <!-- /.card -->
            </div>
            <!--/.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection(); ?>