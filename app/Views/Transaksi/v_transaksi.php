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
        <!-- Flash Data -->
        <div class="flash-data" data-flashdata="<?= session()->get('message'); ?>"></div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <a href="/transaksi/add" class="btn btn-success mr-2"><i class="fas fa-database"></i> Tambah Baru</a>
                            <?php if ($transaksi == null) : ?>
                                <!-- don't show button delete all -->
                            <?php else : ?>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del-all-modal"><i class="fas fa-trash"></i> Hapus Semua Data</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Transaksi</th>
                                    <th>Nama Pasangan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1; ?>
                                <?php foreach ($transaksi as $tr) : ?>
                                    <tr>
                                        <td class="font-weight-bold"><?= $num++; ?></td>
                                        <td>
                                            <p><?= $tr['id_tr']; ?></p>
                                            <small class="actions" hidden><a href="" class="text-primary font-weight-bold">Edit</a> | <a href="" class="text-danger font-weight-bold">Hapus</a></small>
                                        </td>
                                        <td><?= $tr['nama_pria'] . '  &  ' . $tr['nama_wanita']; ?></td>
                                        <td><?= date('D, d-m-Y', strtotime($tr['created_tr'])) . " | " . date('H:i', strtotime($tr['created_tr'])) . " WIB"; ?></td>
                                        <td>
                                            <a href="/transaksi/preview/<?= $tr['file_tm']; ?>/<?= $tr['permalink']; ?>/" class="btn btn-info btn-sm" title="lihat undangan"><i class="fas fa-eye"></i></a>
                                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" title="tambah tamu undangan"><i class="fas fa-users"></i></button>
                                            <a href="/transaksi/edit/<?= $tr['id_tr']; ?>" class="btn btn-primary btn-sm" title="edit data"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del-modal<?= $tr['id_tr']; ?>" title="hapus data"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID Transaksi</th>
                                    <th>Nama Pasangan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Actions</th>
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
<!-- /.content -->

<?php foreach ($transaksi as $tr) : ?>
    <!-- delete modal -->
    <div class="modal fade" id="del-modal<?= $tr['id_tr']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/transaksi/delete" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                        <input type="hidden" name="id" value="<?= $tr['id_tr'] ?>">
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

<!-- delete all modal -->
<div class="modal fade" id="del-all-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Semua Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/transaksi/deleteAll" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus semua data?</p>
                    <p class="font-weight-bold text-danger font-italic">(Peringatan!!! semua data yang telah dihapus tidak dapat dikembalikan)</p>
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
<?= $this->endSection(); ?>