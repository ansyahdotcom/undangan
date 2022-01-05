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
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Tamu</th>
                                    <th>Jumlah Orang</th>
                                    <th>Nomer WA</th>
                                    <th>Kehadiran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($trn as $tm) : ?>
                                    <tr>
                                        <td><?= $tm['nama_tamu']; ?></td>
                                        <td><?= $tm['jumlah'] ?></td>
                                        <td><?= $tm['no_wa']; ?></td>
                                        <td>
                                            <?php if ($tm['kehadiran'] == 1) { ?>
                                                <span class="badge badge-pill badge-success px-3"><b>Hadir</b></span>
                                            <?php } else { ?>
                                                <span class="badge badge-pill badge-danger px-3"><b>Tidak Hadir</b></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del-modal<?= $tm['id_rsvp']; ?>" title="Hapus Data"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Tamu</th>
                                    <th>Jumlah Orang</th>
                                    <th>Nomer WA</th>
                                    <th>Kehadiran</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
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

<?php foreach ($trn as $tm) : ?>
    <!-- delete modal -->
    <div class="modal fade" id="del-modal<?= $tm['id_rsvp']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/tamu/delete" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                        <input type="hidden" name="id" value="<?= $tm['id_rsvp'] ?>">
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
<!-- /.content -->
<?= $this->endSection(); ?>