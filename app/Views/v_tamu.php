<!-- https://web.whatsapp.com/send?phone=6285647426627&text=Hallo%20Pramita.id%0ASaya%20ingin%20bertanya%20tentang%20produk%20ini%0Ahttps%3A%2F%2Fpramita.id%2Fproduct%2Finner-pants-loss-by-khayr-moswear%2F -->
<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manajemen Tamu</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= session()->get('message'); ?>"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="addTamu" method="post">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <input type="hidden" name="id_tr" value="<?= $id_tr; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_tamu')) ? 'is-invalid' : '' ?>" id="nama_tamu" name="nama_tamu" placeholder="Nama Tamu" autofocus value="<?= old('nama_tamu'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_tamu'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">+62</span>
                                        </div>
                                        <input type="text" class="form-control" <?= ($validation->hasError('no_wa')) ? 'is-invalid' : '' ?>id="no_wa" name="no_wa" placeholder="No. Wa" value="<?= old('no_wa'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_wa'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row mt-2">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Nama</th>
                                        <th>Wa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($tamu as $tmu) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $tmu['nama_tamu']; ?></td>
                                            <td><?= $tmu['no_wa']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTamu<?= $tmu['id_tmu']; ?>" title="ubah data tamu"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delTamu<?= $tmu['id_tmu']; ?>" title="hapus data tamu"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- COBA -->
                        <!-- <div class="row">
                            <div id="reload">
                                <table class="table table-striped" id="mydata">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No.</th>
                                            <th>Nama</th>
                                            <th>Wa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_data">

                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php foreach ($tamu as $tmu) : ?>
    <!-- ubah data -->
    <div class="modal fade" id="editTamu<?= $tmu['id_tmu']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/tamu/editTamu" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id_tr" value="<?= $id_tr; ?>">
                            <input type="hidden" name="id_tmu" value="<?= $tmu['id_tmu']; ?>">
                            <div class="form-group col-md-12">
                                <label for="nama_tamu">Nama Tamu</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_tamu')) ? 'is-invalid' : '' ?>" id="nama_tamu" name="nama_tamu" placeholder="Nama Tamu" autofocus value="<?= $tmu['nama_tamu']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_tamu'); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="no_wa">No. Wa</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                    </div>
                                    <input type="text" class="form-control" <?= ($validation->hasError('no_wa')) ? 'is-invalid' : '' ?>id="no_wa" name="no_wa" placeholder="No. Wa" value="<?= $tmu['no_wa']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_wa'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- ubah data -->
    <div class="modal fade" id="editTamu<?= $tmu['id_tmu']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/tamu/editTamu" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                        <input type="hidden" name="id" value="<?= $tmu['id_tr'] ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
<?= $this->endSection(); ?>