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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/transaksi/add" class="btn btn-success"><i class="fas fa-database"></i> Tambah Baru</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Transkasi</th>
                                    <th>Nama Pasangan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $tr) : ?>
                                <tr>
                                    <td><?= $tr['id_tr']; ?></td>
                                    <td><?= $tr['nama_pria'] . '  &  ' . $tr['nama_wanita']; ?></td>
                                    <td><?= $tr['created_tr']; ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" title="lihat"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-primary btn-sm" title="edit data"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" title="hapus data"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Transkasi</th>
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
<?= $this->endSection(); ?>