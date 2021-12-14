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
                            <div class="step" data-target="#data-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="data-part" id="data-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Data Undangan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#template-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="template-part" id="template-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Pilih Template</span>
                                </button>
                            </div>
                        </div>
                        <!-- /. bs-stepper-tablist -->

                        <!-- form start -->
                        <form action="/transaksi/save" class="quickForm" method="POST" enctype="multipart/form-data">
                            <!-- bs stepper content start -->
                            <div class="bs-stepper-content">

                                <!-- bs stapper content data start -->
                                <div id="data-part" class="content" role="tabpanel" aria-labelledby="data-part-trigger">
                                    <!-- CSRF Protection -->
                                    <?= csrf_field(); ?>
                                    <!-- data diri pengantin -->
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
                                                        <p class="text-primary font-italic">upload foto beresolusi 500px <span class="text-danger">x</span> 500px, maksimal ukuran 2MB, berformat jpg, jpeg, png, dan gif</p>
                                                    </small>
                                                    <input type="file" name="fto_pria" class="form-control" id="fto_pria" onchange="previewImgPria()" accept="image/jpg, image/jpeg, image/gif, image/png">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Upload Foto Wanita</label>
                                                    <small for="">
                                                        <p class="text-primary font-italic">upload foto beresolusi 500px <span class="text-danger">x</span> 500px, maksimal ukuran 2MB, berformat jpg, jpeg, png, dan gif</p>
                                                    </small>
                                                    <input type="file" name="fto_wanita" class="form-control" id="fto_wanita" onchange="previewImgWanita()" accept="image/jpg, image/jpeg, image/gif, image/png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Pria <span class="text-danger">*</span></label>
                                                    <input type="text" name="nm_pria" class="form-control need-validation" id="nm_pria" placeholder="masukkan nama pria" autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Wanita <span class="text-danger">*</span></label>
                                                    <input type="text" name="nm_wanita" class="form-control need-validation" id="nm_wanita" placeholder="masukkan nama wanita">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Panggilan Pria <span class="text-danger">*</span></label>
                                                    <input type="text" name="pgl_pria" class="form-control need-validation" id="pgl_pria" placeholder="masukkan nama panggilan pria">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Panggilan Wanita <span class="text-danger">*</span></label>
                                                    <input type="text" name="pgl_wanita" class="form-control need-validation" id="pgl_wanita" placeholder="masukkan nama panggilan wanita">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- data orang tua pengantin -->
                                    <div class="card-header bg-primary">
                                        <h4 class="text-capitalize text-center text-white font-weight-bold">Biodata orang tua pengantin</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Ayah Pria <span class="text-danger">*</span></label>
                                                    <input type="text" name="ayh_pria" class="form-control need-validation" id="ayh_pria" placeholder="masukkan nama ayah pria">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Ibu Pria <span class="text-danger">*</span></label>
                                                    <input type="text" name="ibu_pria" class="form-control need-validation" id="ibu_pria" placeholder="masukkan nama ibu pria">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Ayah Wanita <span class="text-danger">*</span></label>
                                                    <input type="text" name="ayh_wanita" class="form-control need-validation" id="ayh_wanita" placeholder="masukkan nama ayah wanita">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nama Ibu Wanita <span class="text-danger">*</span></label>
                                                    <input type="text" name="ibu_wanita" class="form-control need-validation" id="ibu_wanita" placeholder="masukkan nama ibu wanita">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- waktu dan tempat acara -->
                                    <div class="card-header bg-primary">
                                        <h4 class="text-capitalize text-center text-white font-weight-bold">Waktu dan tempat acara</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tanggal dan Waktu Akad</label>
                                                    <div class="input-group date" id="akad" data-target-input="nearest">
                                                        <input type="text" name="tgl_akad" class="form-control datetimepicker-input" id="tgl_akad" data-target="#akad" placeholder="masukkan tanggal akad" />
                                                        <div class="input-group-append" data-target="#akad" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Maps Akad</label>
                                                    <input type="text" name="mp_akad" class="form-control" id="mp_akad" placeholder="masukkan maps akad">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat Akad</label>
                                            <textarea name="almt_akad" class="form-control" id="almt_akad" cols="30" rows="5" placeholder="masukkan alamat akad"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tanggal dan Waktu Resepsi <span class="text-danger">*</span></label>
                                                    <div class="input-group date" id="resepsi" data-target-input="nearest">
                                                        <input type="text" name="tgl_resepsi" class="form-control need-validation datetimepicker-input" id="tgl_resepsi" data-target="#resepsi" placeholder="masukkan tanggal resepsi" />
                                                        <div class="input-group-append" data-target="#resepsi" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Maps Resepsi <span class="text-danger">*</span></label>
                                                    <input type="text" name="mp_resepsi" class="form-control need-validation" id="mp_resepsi" placeholder="masukkan maps resepsi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat Resepsi <span class="text-danger">*</span></label>
                                            <textarea name="almt_resepsi" class="form-control need-validation" id="almt_resepsi" cols="30" rows="5" placeholder="masukkan alamat resepsi"></textarea>
                                        </div>
                                    </div>

                                    <!-- tambahan -->
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
                                                    <input type="text" name="no_hp" class="form-control need-validation" id="no_hp" placeholder="masukkan nomor hp">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Kustom URL Undangan</label>
                                                    <small>
                                                        <p class="text-primary font-italic">jika ingin mengkustom alamat url undangan silahkan isi field ini</p>
                                                    </small>
                                                    <input type="text" name="custom_link" class="form-control need-validation" id="custom_link" placeholder="masukkan kustom url undangan (contoh: rendi-reni-wedding)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="data-part-actions d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary next-btn-submit">Next <i class="fas fa-arrow-right"></i></button>
                                            <button type="button" class="btn btn-primary next-btn" onclick="stepper.next()" hidden>Next <i class="fas fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /. bs stepper content data -->

                                <!-- bs stepper content template start -->
                                <div id="template-part" class="content" role="tabpanel" aria-labelledby="template-part-trigger">
                                    <div class="card-header bg-primary">
                                        <h4 class="text-capitalize text-center text-white font-weight-bold">Pilih Template Undangan</h3>
                                    </div>
                                    <div class="card-body">
                                        Template Undangan
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-primary" onclick="stepper.previous()"><i class="fas fa-arrow-left"></i> Previous</button>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /. bs stepper content template -->
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
<?= $this->endSection(); ?>