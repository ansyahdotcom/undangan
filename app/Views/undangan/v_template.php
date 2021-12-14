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
                    <div class="card-header">
                        <a href="/templat/add" class="btn btn-success"><i class="fas fa-database"></i> Tambah Baru</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Template</th>
                                    <th>Nama Template</th>
                                    <th>Harga Template (Rp.)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($template as $tr) : ?>
                                    <tr>
                                        <td><?= $tr['id_tm']; ?></td>
                                        <td><?= $tr['nama_tm'] ?></td>
                                        <td><?= $tr['harga_tm']; ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm" title="lihat undangan"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-primary btn-sm" title="edit data"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del-modal<?= $tr['id_tm']; ?>" title="hapus data"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Template</th>
                                    <th>Nama Template</th>
                                    <th>Harga Template (Rp.)</th>
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

<?php foreach ($template as $tr) : ?>
    <!-- delete modal -->
    <div class="modal fade" id="del-modal<?= $tr['id_tm']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/templat/delete" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                        <input type="hidden" name="id" value="<?= $tr['id_tm'] ?>">
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