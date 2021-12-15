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
                        <form action="/transaksi/update" class="quickForm" method="POST" enctype="multipart/form-data">
                            <!-- CSRF Protection -->
                            <?= csrf_field(); ?>

                            <!-- bs stepper content start -->
                            <div class="bs-stepper-content">

                                <!-- bs stepper content template start -->
                                <div id="template-part" class="content" role="tabpanel" aria-labelledby="template-part-trigger">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h4 class="text-capitalize text-center text-white font-weight-bold">Pilih Template Undangan</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php $num = 0; ?>
                                                <?php foreach ($template as $t) : ?>
                                                    <?php $num++ ?>
                                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                                        <div class="card card-undangan bg-light d-flex flex-fill <?= ($t['id_tm'] == $trn['id_tm'] ? "card-undangan-active" : ""); ?>" onclick="clickCardUndangan()">
                                                            <div class="card-header bg-secondary text-white border-bottom-0">
                                                                <?= $t['nama_tm']; ?>
                                                            </div>
                                                            <div class="card-body d-flex justify-content-center align-items-center">
                                                                <div class="text-center">
                                                                    <img src="/assets/dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <button class="btn btn-sm btn-info" title="preview undangan">
                                                                        <i class="fas fa-eye"></i>
                                                                        Preview
                                                                    </button>
                                                                    <div class="icheck-success d-inline">
                                                                        <input type="radio" class="radioSuccess" id="radioSuccess<?= $num; ?>" value="<?= $t['id_tm']; ?>" name="undangan" onchange="isChecked()" <?= ($t['id_tm'] == $trn['id_tm'] ? "checked" : ""); ?>>
                                                                        <label for="radioSuccess<?= $num; ?>">
                                                                            <span class="font-weight-bold">Pilih Undangan</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="data-part-actions d-flex justify-content-end">
                                                <button type="button" class="btn btn-primary next-btn" onclick="stepper.next()">Selanjutnya <i class="fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /. bs stepper content template -->

                                <!-- bs stapper content data start -->
                                <div id="data-part" class="content" role="tabpanel" aria-labelledby="data-part-trigger">
                                    <!-- data diri pengantin -->
                                    <input type="hidden" name="id" value="<?= $trn['id_tr']; ?>">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            <h4 class="text-capitalize text-center text-white font-weight-bold">Biodata pengantin</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="font-italic font-weight-bold">Field bertanda (<span class="text-danger">*</span>) wajib diisi!</p>
                                            <div class="row mb-4 mt-2 text-center">
                                                <div class="col-md-6">
                                                    <img src="/assets/dist/img/transaksi/<?= $trn['foto_pria']; ?>" class="img-circle img-fluid border-dashed border-primary object-cover foto_pria" alt="foto pria">
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="/assets/dist/img/transaksi/<?= $trn['foto_wanita']; ?>" class="img-circle img-fluid border-dashed border-primary object-cover foto_wanita" alt="foto wanita">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Upload Foto Pria</label>
                                                        <small>
                                                            <p class="text-primary font-italic">upload foto beresolusi 500px <span class="text-danger">x</span> 500px, maksimal ukuran 2MB, berformat jpg, jpeg, png, dan gif</p>
                                                        </small>
                                                        <input type="hidden" name="fto_pria_old" value="<?= $trn['foto_pria']; ?>">
                                                        <input type="file" name="fto_pria" class="form-control" id="fto_pria" onchange="previewImgPria()" accept="image/jpg, image/jpeg, image/gif, image/png">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Upload Foto Wanita</label>
                                                        <small for="">
                                                            <p class="text-primary font-italic">upload foto beresolusi 500px <span class="text-danger">x</span> 500px, maksimal ukuran 2MB, berformat jpg, jpeg, png, dan gif</p>
                                                        </small>
                                                        <input type="hidden" name="fto_wanita_old" value="<?= $trn['foto_wanita']; ?>">
                                                        <input type="file" name="fto_wanita" class="form-control" id="fto_wanita" onchange="previewImgWanita()" accept="image/jpg, image/jpeg, image/gif, image/png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Pria <span class="text-danger">*</span></label>
                                                        <input type="text" name="nm_pria" class="form-control" id="nm_pria" value="<?= $trn['nama_pria']; ?>" placeholder="masukkan nama pria" autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Wanita <span class="text-danger">*</span></label>
                                                        <input type="text" name="nm_wanita" class="form-control" id="nm_wanita" value="<?= $trn['nama_wanita']; ?>" placeholder="masukkan nama wanita">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Panggilan Pria <span class="text-danger">*</span></label>
                                                        <input type="text" name="pgl_pria" class="form-control" id="pgl_pria" value="<?= $trn['nama_pgl_pria']; ?>" placeholder="masukkan nama panggilan pria">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Panggilan Wanita <span class="text-danger">*</span></label>
                                                        <input type="text" name="pgl_wanita" class="form-control" id="pgl_wanita" value="<?= $trn['nama_pgl_wanita']; ?>" placeholder="masukkan nama panggilan wanita">
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
                                                        <input type="text" name="ayh_pria" class="form-control" id="ayh_pria" value="<?= $trn['nama_ayah_pria']; ?>" placeholder="masukkan nama ayah pria">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Ibu Pria <span class="text-danger">*</span></label>
                                                        <input type="text" name="ibu_pria" class="form-control" id="ibu_pria" value="<?= $trn['nama_ibu_pria']; ?>" placeholder="masukkan nama ibu pria">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Ayah Wanita <span class="text-danger">*</span></label>
                                                        <input type="text" name="ayh_wanita" class="form-control" id="ayh_wanita" value="<?= $trn['nama_ayah_wanita']; ?>" placeholder="masukkan nama ayah wanita">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Ibu Wanita <span class="text-danger">*</span></label>
                                                        <input type="text" name="ibu_wanita" class="form-control" id="ibu_wanita" value="<?= $trn['nama_ibu_wanita']; ?>" placeholder="masukkan nama ibu wanita">
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
                                                    <div class="contain-mp-old-akad"><?= $trn['maps_akad']; ?></div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Tanggal dan Waktu Akad</label>
                                                        <div class="input-group date" id="akad" data-target-input="nearest">
                                                            <input type="text" name="tgl_akad" class="form-control datetimepicker-input" id="tgl_akad" data-target="#akad" value="<?= date('m-d-Y H:i', strtotime($trn['tgl_akad'])); ?>" placeholder="masukkan tanggal akad" />
                                                            <div class="input-group-append" data-target="#akad" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Maps Akad</label>
                                                        <input type="hidden" name="mp_akad_old" value='<?= $trn['maps_akad']; ?>'>
                                                        <input type="text" name="mp_akad" class="form-control" id="mp_akad" onchange="previewMapsAkad()" placeholder="masukkan maps akad">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat Akad</label>
                                                <textarea name="almt_akad" class="form-control" id="almt_akad" cols="30" rows="5" placeholder="masukkan alamat akad"><?= $trn['alamat_akad']; ?></textarea>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <label for="">Tampilan Maps Resepsi</label>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="preview-mp-resepsi p-0 border-dashed border-primary">
                                                    <div class="contain-mp-old-resepsi"><?= $trn['maps_resepsi']; ?></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Tanggal dan Waktu Resepsi <span class="text-danger">*</span></label>
                                                        <div class="input-group date" id="resepsi" data-target-input="nearest">
                                                            <input type="text" name="tgl_resepsi" class="form-control  datetimepicker-input" id="tgl_resepsi" data-target="#resepsi" value="<?= date('m-d-Y H:i:s', strtotime($trn['tgl_resepsi'])); ?>" placeholder="masukkan tanggal resepsi" />
                                                            <div class="input-group-append" data-target="#resepsi" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Maps Resepsi <span class="text-danger">*</span></label>
                                                        <input type="hidden" name="mp_resepsi_old" value='<?= $trn['maps_resepsi']; ?>'>
                                                        <input type="text" name="mp_resepsi1" class="form-control" id="mp_resepsi" onchange="previewMapsResepsi()" placeholder="masukkan maps resepsi">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat Resepsi <span class="text-danger">*</span></label>
                                                <textarea name="almt_resepsi" class="form-control" id="almt_resepsi" cols="30" rows="5" placeholder="masukkan alamat resepsi"><?= $trn['alamat_resepsi']; ?></textarea>
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
                                                        <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $trn['nomor_hp']; ?>" placeholder="masukkan nomor hp">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Kustom URL Undangan</label>
                                                        <small>
                                                            <p class="text-primary font-italic">jika ingin mengkustom alamat url undangan silahkan isi field ini</p>
                                                        </small>
                                                        <input type="hidden" name="custom_link_old" value="<?= $trn['permalink']; ?>">
                                                        <input type="text" name="custom_link" class="form-control" id="custom_link" value="<?= $trn['permalink']; ?>" placeholder="masukkan kustom url undangan (contoh: rendi-reni-wedding)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-primary" onclick="stepper.previous()"><i class="fas fa-arrow-left"></i> Kembali</button>
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Update</button>
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
<?= $this->endSection(); ?>