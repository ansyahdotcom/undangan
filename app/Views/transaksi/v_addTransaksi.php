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
                    <li class="breadcrumb-item"><a href="/transaksi">Data Transaksi</a></li>
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
                    <!-- bs stepper start -->
                    <div class="bs-stepper">
                        <!-- bs stapper tablist start -->
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#template-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="template-part" id="template-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Pilih Template</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#data-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="data-part" id="data-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Data Undangan</span>
                                </button>
                            </div>
                        </div>
                        <!-- /. bs-stepper-tablist -->

                        <!-- form start -->
                        <form action="/transaksi/save" class="quickForm" method="POST" enctype="multipart/form-data">
                            <!-- CSRF Protection -->
                            <?= csrf_field(); ?>

                            <!-- bs stepper content start -->
                            <div class="bs-stepper-content">

                                <!-- bs stepper content template start -->
                                <div id="template-part" class="content" role="tabpanel" aria-labelledby="template-part-trigger">

                                    <div class="data-part-actions d-flex justify-content-between mb-3">
                                        <a href="/transaksi" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
                                        <button type="button" class="btn btn-primary next-btn-copy" disabled>Selanjutnya <i class="fas fa-arrow-right"></i></button>
                                    </div>

                                    <!-- Default box -->
                                    <div class="card card-solid">
                                        <div class="card-header bg-primary">
                                            <h4 class="text-capitalize text-center text-white font-weight-bold">Pilih Template Undangan</h3>
                                        </div>
                                        <div class="card-body pb-0">
                                            <div class="row">
                                                <?php $num = 0; ?>
                                                <?php foreach ($template as $t) : ?>
                                                    <?php $num++ ?>
                                                    <div class="undangan col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
                                                        <div class="card card-undangan bg-light d-flex flex-fill" onclick="clickCardUndangan()">
                                                            <div class="card-header h5 text-center text-muted font-weight-bold border-bottom-0">
                                                                <?= $t['nama_tm']; ?>
                                                            </div>
                                                            <div class="card-body card-body-undangan d-flex justify-content-center align-items-center" style="background-image: url('/assets/dist/img/template/Pastel_Floral.png'); background-repeat: no-repeat; background-position: center; background-size: cover;">

                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <button type="button" class="btn btn-sm text-muted" data-toggle="modal" data-target="#preview-modal<?= $t['id_tm']; ?>" title="preview undangan">
                                                                        <span class="font-weight-bold">
                                                                            <i class="fas fa-eye"></i>
                                                                            Preview
                                                                        </span>
                                                                    </button>
                                                                    <div class="icheck-success d-inline text-muted">
                                                                        <input type="radio" class="radioSuccess" id="radioSuccess<?= $num; ?>" value="<?= $t['id_tm']; ?>" name="undangan" onchange="isChecked()">
                                                                        <label for="radioSuccess<?= $num; ?>">
                                                                            <span class="font-weight-bold">Pilih</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="mb-3">
                                                <nav aria-label="Template Page Navigation">
                                                    <ul class="pagination justify-content-center m-0">
                                                        <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">8</a></li> -->
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <div class="data-part-actions d-flex justify-content-between">
                                                <a href="/transaksi" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
                                                <button type="button" class="btn btn-primary next-btn-copy" disabled>Selanjutnya <i class="fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /. bs stepper content template -->

                                <!-- bs stapper content data start -->
                                <div id="data-part" class="content" role="tabpanel" aria-labelledby="data-part-trigger">

                                    <div class="d-flex justify-content-between mb-3">
                                        <button type="button" class="btn btn-primary" onclick="stepper.previous()"><i class="fas fa-arrow-left"></i> Kembali</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    </div>

                                    <!-- data diri pengantin -->
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h4 class="text-capitalize text-center text-white font-weight-bold">Biodata pengantin</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="font-italic font-weight-bold">Field bertanda (<span class="text-danger">*</span>) wajib diisi!</p>
                                            <div class="row mb-4 mt-2 text-center">
                                                <div class="col-md-6">
                                                    <img src="/assets/dist/img/transaksi/default-p.png" class="img-circle img-fluid border-dashed border-primary object-cover foto_pria" alt="foto pria">
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="/assets/dist/img/transaksi/default-w.png" class="img-circle img-fluid border-dashed border-primary object-cover foto_wanita" alt="foto wanita">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Upload Foto Pria</label>
                                                        <small>
                                                            <p class="text-primary font-italic">upload foto rasio 1 <span class="text-danger">:</span> 1, maksimal ukuran 2MB, berformat jpg, jpeg, png, dan gif</p>
                                                        </small>
                                                        <input type="file" name="fto_pria" class="form-control" id="fto_pria" onchange="previewImgPria()" accept="image/jpg, image/jpeg, image/gif, image/png">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Upload Foto Wanita</label>
                                                        <small for="">
                                                            <p class="text-primary font-italic">upload foto rasio 1 <span class="text-danger">:</span> 1, maksimal ukuran 2MB, berformat jpg, jpeg, png, dan gif</p>
                                                        </small>
                                                        <input type="file" name="fto_wanita" class="form-control" id="fto_wanita" onchange="previewImgWanita()" accept="image/jpg, image/jpeg, image/gif, image/png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Pria <span class="text-danger">*</span></label>
                                                        <input type="text" name="nm_pria" class="form-control" id="nm_pria" placeholder="masukkan nama pria" autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Wanita <span class="text-danger">*</span></label>
                                                        <input type="text" name="nm_wanita" class="form-control" id="nm_wanita" placeholder="masukkan nama wanita">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Panggilan Pria <span class="text-danger">*</span></label>
                                                        <input type="text" name="pgl_pria" class="form-control" id="pgl_pria" placeholder="masukkan nama panggilan pria">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Panggilan Wanita <span class="text-danger">*</span></label>
                                                        <input type="text" name="pgl_wanita" class="form-control" id="pgl_wanita" placeholder="masukkan nama panggilan wanita">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- data orang tua pengantin -->
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h4 class="text-capitalize text-center text-white font-weight-bold">Biodata orang tua pengantin</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Ayah Pria <span class="text-danger">*</span></label>
                                                        <input type="text" name="ayh_pria" class="form-control" id="ayh_pria" placeholder="masukkan nama ayah pria">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Ibu Pria <span class="text-danger">*</span></label>
                                                        <input type="text" name="ibu_pria" class="form-control" id="ibu_pria" placeholder="masukkan nama ibu pria">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Ayah Wanita <span class="text-danger">*</span></label>
                                                        <input type="text" name="ayh_wanita" class="form-control" id="ayh_wanita" placeholder="masukkan nama ayah wanita">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Ibu Wanita <span class="text-danger">*</span></label>
                                                        <input type="text" name="ibu_wanita" class="form-control" id="ibu_wanita" placeholder="masukkan nama ibu wanita">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- waktu dan tempat acara -->
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h4 class="text-capitalize text-center text-white font-weight-bold">Waktu dan tempat acara</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-center">
                                                <label for="">Tampilan Maps Akad</label>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="preview-mp-akad p-0 border-dashed border-primary">
                                                    <div class="contain-mp-old-akad">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658827.85049738!2d99.40239044513784!3d-2.275096596503077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1639578696772!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Tanggal dan Waktu Akad</label>
                                                        <div class="input-group date" id="akad" data-target-input="nearest">
                                                            <input type="text" name="tgl_akad" class="form-control datetimepicker-input" id="tgl_akad" data-toggle="datetimepicker" data-target="#akad" placeholder="masukkan tanggal akad" autocomplete="off"/>
                                                            <div class="input-group-append" data-target="#akad" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Maps Akad</label>
                                                        <input type="text" name="mp_akad" class="form-control" id="mp_akad" onchange="previewMapsAkad()" placeholder="masukkan maps akad">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat Akad</label>
                                                <textarea name="almt_akad" class="form-control" id="almt_akad" cols="30" rows="5" placeholder="masukkan alamat akad"></textarea>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <label for="">Tampilan Maps Resepsi</label>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="preview-mp-resepsi p-0 border-dashed border-primary">
                                                    <div class="contain-mp-old-resepsi">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32658827.85049738!2d99.40239044513784!3d-2.275096596503077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1639578696772!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Tanggal dan Waktu Resepsi <span class="text-danger">*</span></label>
                                                        <div class="input-group date" id="resepsi" data-target-input="nearest">
                                                            <input type="text" name="tgl_resepsi" class="form-control datetimepicker-input" id="tgl_resepsi" data-toggle="datetimepicker" data-target="#resepsi" placeholder="masukkan tanggal resepsi" autocomplete="off"/>
                                                            <div class="input-group-append" data-target="#resepsi" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Maps Resepsi <span class="text-danger">*</span></label>
                                                        <input type="text" name="mp_resepsi" class="form-control" id="mp_resepsi" onchange="previewMapsResepsi()" placeholder="masukkan maps resepsi">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat Resepsi <span class="text-danger">*</span></label>
                                                <textarea name="almt_resepsi" class="form-control" id="almt_resepsi" cols="30" rows="5" placeholder="masukkan alamat resepsi"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- tambahan -->
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h4 class="text-capitalize text-center text-white font-weight-bold">Tambahan lain-lain</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nomor HP <span class="text-danger">*</span></label>
                                                        <small>
                                                            <p class="text-primary font-italic">nomor hp yang didaftarkan harus valid</p>
                                                        </small>
                                                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="masukkan nomor hp">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Kustom URL Undangan</label>
                                                        <small>
                                                            <p class="text-primary font-italic">jika ingin mengkustom alamat url undangan silahkan isi field ini</p>
                                                        </small>
                                                        <input type="text" name="custom_link" class="form-control" id="custom_link" placeholder="kustom url undangan tanpa spasi, gunakan tanda pemisah '-' (contoh: rendi-reni)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-primary" onclick="stepper.previous()"><i class="fas fa-arrow-left"></i> Kembali</button>
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /. bs stepper content data -->

                            </div>
                            <!-- /. bs stepper content -->
                        </form>
                        <!-- /.form -->
                    </div>
                    <!-- /. bs stepper -->
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

<!-- modal preview undangan -->
<?php foreach ($template as $t) : ?>
    <div class="modal fade" id="preview-modal<?= $t['id_tm']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $t['nama_tm']; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="carousel-wrap">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <img class="img img-fluid img-thumbnail" src="/assets/dist/img/template/Pastel_Floral.png" alt="">
                            </div>
                            <div class="item">
                                <img class="img img-fluid img-thumbnail" src="/assets/dist/img/template/Sparkling_Flowers.png" alt="">
                            </div>
                            <div class="item">
                                <img class="img img-fluid img-thumbnail" src="/assets/dist/img/template/Modern_Elegant.png" alt="">
                            </div>
                            <div class="item">
                                <img class="img img-fluid img-thumbnail" src="/assets/dist/img/template/Dark_Flower.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<?= $this->endSection(); ?>