<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
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
              <div class="flash-data" data-flashdata="<?= session()->get('message'); ?>"></div>
              <div class="row">
                     <div class="col-12">
                            <form action="#" class="bulk-form" method="post">
                                   <div class="card">
                                          <!-- /.card-header -->
                                          <div class="card-header">
                                                 <div class="d-flex align-items-start">
                                                        <a href="/admin/add" class="btn btn-success">
                                                               <i class="fas fa-plus"></i> Tambah Data
                                                        </a>
                                                        <div class="input-group bulk-input-group col-md-4">
                                                               <select class="form-control" name="bulk">
                                                                      <option value="" selected>--- Pilih opsi bulk ---</option>
                                                                      <option value="/admin/bulk_delete">Hapus data</option>
                                                               </select>
                                                               <span class="input-group-append">
                                                                      <button type="submit" class="btn btn-primary bulk-btn" disabled>Mulai <i class="fas fa-arrow-right"></i></button>
                                                               </span>
                                                        </div>
                                                 </div>
                                          </div>

                                          <div class="card-body">
                                                 <table id="example1" class="table table-bordered table-hover">
                                                        <thead>
                                                               <tr>
                                                                      <th style="width: 15px" class="th-check"><input type="checkbox" class="check-all" title="pilih semua"></th>
                                                                      <th style="width: 15px">#</th>
                                                                      <th>Nama Admin</th>
                                                                      <th>Username</th>
                                                                      <th>Aksi</th>
                                                               </tr>
                                                        </thead>


                                                        <tbody>
                                                               <?php $no = 1;
                                                               foreach ($dataAdmin as $row) : ?>
                                                                      <tr>
                                                                             <td class="td-check">
                                                                                    <?php if ($row['id_adm'] != 1) : ?>
                                                                                           <input type="checkbox" class="check-it" name="check[]" value="<?= $row['id_adm']; ?>" title="pilih data ini (<?= $row['id_adm']; ?>)">
                                                                                    <?php endif; ?>
                                                                             </td>
                                                                             <td><?= $no++; ?></td>
                                                                             <td><?= $row['nama_adm'] ?></td>
                                                                             <td><?= $row['username'] ?></td>
                                                                             <td>
                                                                                    <?php if ($row['id_adm'] != 1) : ?>
                                                                                           <a href="/admin/edit/<?= $row['id_adm']; ?>" class="btn btn-sm btn-info">
                                                                                                  <i class="fa fa-edit"></i>
                                                                                           </a>
                                                                                           <button type="button" class="btn btn-sm btn-danger">
                                                                                                  <i class="fa fa-trash" data-toggle="modal" data-target="#modal-delete<?= $row['id_adm']; ?>"></i>
                                                                                           </button>
                                                                                    <?php endif; ?>
                                                                             </td>
                                                                      </tr>
                                                               <?php endforeach ?>
                                                        </tbody>

                                                        <tfoot>
                                                               <tr>
                                                                      <th style="width: 15px" class="th-check"><input type="checkbox" class="check-all" title="pilih semua"></th>
                                                                      <th style="width: 15px">#</th>
                                                                      <th>Nama Admin</th>
                                                                      <th>Username</th>
                                                                      <th>Aksi</th>
                                                               </tr>
                                                        </tfoot>
                                                 </table>
                                          </div>
                                   </div>
                            </form>
                     </div>
              </div>
       </div>
</section>
<!-- /.content -->

<!-- Modal Delete -->
<?php $no = 1;
foreach ($dataAdmin as $row) : ?>
       <div class="modal fade" id="modal-delete<?= $row['id_adm']; ?>">
              <div class="modal-dialog">
                     <div class="modal-content">
                            <div class="modal-header">
                                   <h4 class="modal-title">Hapus data</h4>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>
                            <form action="/admin/delete" method="POST" class="form-horizontal">
                                   <?= csrf_field(); ?>
                                   <div class="modal-body">
                                          <input type="hidden" value="<?= $row['id_adm']; ?>" name="id_adm">
                                          <p>Apakah Anda yakin untuk menghapus data ini ?</p>

                                   </div>
                                   <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                          <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
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