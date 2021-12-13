<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<section class="content-header">
       <div class="container-fluid">
              <div class="row mb-2">
                     <div class="col-sm-6">
                            <h1>Manajemen Admin</h1>
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
                                   <!-- /.card-header -->
                                   <div class="card-header">
                                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                                 + Tambah Data
                                          </button>
                                   </div>

                                   <div class="card-body">
                                          <table id="example2" class="table table-bordered table-hover">
                                                 <thead>
                                                        <tr>
                                                               <th style="width: 10px">No.</th>
                                                               <th>Nama Admin</th>
                                                               <th>Username</th>
                                                               <th>Aksi</th>
                                                        </tr>
                                                 </thead>


                                                 <tbody>
                                                        <?php $no = 1;
                                                        foreach ($dataAdmin as $row) : ?>
                                                               <tr>
                                                                      <td><?= $no++; ?></td>
                                                                      <td><?= $row->nama_adm ?></td>
                                                                      <td><?= $row->username ?></td>
                                                                      <td><button type="button" class="btn btn-sm btn-info">
                                                                                    <i class="fa fa-edit" data-toggle="modal" data-target="#modal-edit<?= $row->id_adm; ?>"></i></button>
                                                                             <button type="button" class="btn btn-sm btn-danger">
                                                                                    <i class="fa fa-trash" data-toggle="modal" data-target="#modal-delete<?= $row->id_adm; ?>"></i></button>

                                                                      </td>
                                                               </tr>
                                                        <?php endforeach ?>
                                                 </tbody>
                                          </table>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</section>
<!-- /.content -->


<div class="modal fade" id="modal-default">
       <div class="modal-dialog">
              <div class="modal-content">
                     <div class="modal-header">
                            <h4 class="modal-title">Form Tambah Data Admin</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                            </button>
                     </div>
                     <form action="<?php echo base_url('Admin_controllers/simpan'); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                   <!-- <div class="form-group row">
                                          <label for="idBuku" class="col-sm-3 col-form-label">ID Buku</label>
                                          <div class="col-sm-9">
                                                 <input type="text" class="form-control" id="idBuku" name="idBuku" placeholder="ID Buku">
                                          </div>
                                   </div> -->
                                   <div class="form-group row">
                                          <label for="namaAdmin" class="col-sm-3 col-form-label">Nama Admin</label>
                                          <div class="col-sm-9">
                                                 <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" placeholder="Nama Admin" autofocus required>
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <label for="username" class="col-sm-3 col-form-label">Username</label>
                                          <div class="col-sm-9">
                                                 <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                          </div>
                                   </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                   <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                   <button type="submit" class="btn btn-success"><i class="far fa-check-circle pr-2" aria-hidden="true"></i>Simpan</button>
                            </div>
                     </form>
              </div>
              <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal Edit -->
<?php $no = 1;
foreach ($dataAdmin as $row) : ?>
       <div class="modal fade" id="modal-edit<?= $row->id_adm; ?>">
              <div class="modal-dialog">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h4 class="modal-title">Form Edit Data Admin</h4>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <form action="<?php echo base_url('Admin_controllers/edit'); ?>" method="POST" class="form-horizontal">
                                   <?php echo csrf_field(); ?>
                                   <div class="modal-body">
                                          <!-- <div class="form-group row">
                                          <label for="idBuku" class="col-sm-3 col-form-label">ID Buku</label>
                                          <div class="col-sm-9">
                                                 <input type="text" class="form-control" id="idBuku" name="idBuku" placeholder="ID Buku">
                                          </div>
                                   </div> -->
                                          <input type="hidden" value="<?= $row->id_adm; ?>" name="id_adm">
                                          <div class="form-group row">
                                                 <label for="namaAdmin" class="col-sm-3 col-form-label">Nama Admin</label>
                                                 <div class="col-sm-9">
                                                        <input value="<?= $row->nama_adm; ?>" type="text" class="form-control" name="namaAdmin" placeholder="Nama Admin">
                                                 </div>
                                          </div>
                                          <div class="form-group row">
                                                 <label for="username" class="col-sm-3 col-form-label">Username</label>
                                                 <div class="col-sm-9">
                                                        <input value="<?= $row->username; ?>" type="text" class="form-control" name="username" placeholder="Username">
                                                 </div>
                                          </div>

                                   </div>
                                   <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                          <button type="submit" class="btn btn-success"><i class="far fa-check-circle pr-2" aria-hidden="true"></i>Simpan</button>
                                   </div>
                            </form>
                     </div>
                     <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
       </div>
<?php endforeach ?>
<!-- /.modal -->

<!-- Modal Delete -->
<?php $no = 1;
foreach ($dataAdmin as $row) : ?>
       <div class="modal fade" id="modal-delete<?= $row->id_adm; ?>">
              <div class="modal-dialog">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h4 class="modal-title">Peringatan</h4>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <form action="<?php echo base_url('Admin_controllers/hapus'); ?>" method="POST" class="form-horizontal">
                                   <?= csrf_field(); ?>
                                   <div class="modal-body">
                                          <input type="hidden" value="<?= $row->id_adm; ?>" name="id_adm">
                                          <p>Apakah Anda yakin untuk menghapus data ini ?</p>

                                   </div>
                                   <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                          <button type="submit" class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
                                   </div>
                            </form>
                     </div>
                     <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
       </div>
<?php endforeach ?>
<!-- /.modal -->














<?= $this->endSection(); ?>