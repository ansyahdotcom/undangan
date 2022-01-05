<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 justify-content-end">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/customer">Data Customer</a></li>
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
                    <form action="/customer/save" class="quickForm" method="POST" enctype="multipart/form-data">
                        <!-- CSRF Protection -->
                        <?= csrf_field(); ?>

                        <div class="card-header bg-primary">
                            <h4 class="text-capitalize text-center text-white font-weight-bold"><?= $title; ?></h3>
                        </div>
                        <div class="card-body form-add">
                            <p class="font-italic font-weight-bold">Field bertanda (<span class="text-danger">*</span>) wajib diisi!</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Pria <span class="text-danger">*</span></label>
                                        <input type="text" name="nm_pria" class="form-control" id="nm_pria" placeholder="masukkan nama pria" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Wanita <span class="text-danger">*</span></label>
                                        <input type="text" name="nm_wanita" class="form-control" id="nm_wanita" placeholder="masukkan nama wanita">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nomor HP <span class="text-danger">*</span></label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="masukkan nomor hp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="/customer" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
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