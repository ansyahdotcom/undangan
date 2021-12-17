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
                    <form id="" action="<?= base_url(); ?>/templat/save" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row mb-4 mt-2 text-center">
                                <div class="col-md-12">
                                    <img src="/assets/dist/img/thumbnail/thumbnail-undangan.jpg" class="rounded img-fluid border-dashed border-primary thumb" alt="Thumbnail Template">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Upload Thumbnail Template</label>
                                <small>
                                    <p class="text-primary font-italic">upload foto maksimal ukuran 2MB, berformat jpg, jpeg, dan png</p>
                                </small>
                                <input type="file" name="thumbnail" class="form-control" id="thumbnail" onchange="previewThumbnail()" accept="image/jpg, image/jpeg, image/png">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Template</label>
                                <input type="text" name="nama_tm" class="form-control <?= ($validation->hasError('nama_tm')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_tm'); ?>"" id=" nama_tm" placeholder="Masukkan Nama Template">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_tm'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Template</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control <?= ($validation->hasError('harga_tm')) ? 'is-invalid' : ''; ?>" value="<?= old('harga_tm'); ?>"" name=" harga_tm" id="harga_tm" aria-label="" placeholder="Ex: 50000">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('harga_tm'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save" id="save-btn"></i> Simpan</button>
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