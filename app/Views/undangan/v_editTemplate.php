<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/templat">Data Template</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= session()->get('message') ?>"></div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card">
                    <!-- form start -->
                    <form id="" action="<?= base_url(); ?>/templat/update/<?= $template['id_tm']; ?>" method="post">
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?= $template['id_tm']; ?>">
                            <div class="form-group">
                                <label for="nama">Nama Template</label>
                                <input type="text" name="nama_tm" class="form-control <?= ($validation->hasError('nama_tm')) ? 'is-invalid' : ''; ?>" value="<?= $template['nama_tm']; ?>" id=" nama_tm" placeholder="Masukkan Nama Template">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Template</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control <?= ($validation->hasError('harga_tm')) ? 'is-invalid' : ''; ?>" value="<?= $template['harga_tm']; ?>" name=" harga_tm" id="harga_tm" aria-label="" placeholder="Ex: 50000">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save" id="save-btn"></i> Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>