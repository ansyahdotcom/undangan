<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jheng Onjheng</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="/assets/plugins/sweetalert2/sweetalert2.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="/assets/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/dist/css/style.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>


        </nav>
        <!-- /.navbar -->
        <?= $this->include('layout/sidebar'); ?>

        <div class="content-wrapper">
            <?= $this->renderSection('content'); ?>
        </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Apakah Anda ingin logout?</div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" href="http://localhost:8080/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="kirim" method="post">
                        <?= csrf_field(); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Tamu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Nama Tamu</label>
                                <input type="text" name="nama_tamu" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">No. Wa</label>
                                <input type="text" name="no_wa" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/dist/js/demo.js"></script>
    <!-- Sweet Alert -->
    <script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/assets/dist/js/swal.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/jszip/jszip.min.js"></script>
    <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- InputMask -->
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- jquery-validation -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/assets/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- BS-Stepper -->
    <script src="/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- Select2 -->
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script>
        $(function() {
            //Initialize Select2 Bootstrap Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'DD-MM-YYYY'
            });

            $('.datepick').datetimepicker({
                format: {
                    toValue: function(date, format, language) {
                        var d = new Date(date);
                        d.setDate(d.getDate() + 7);
                        return new Date(d);
                    }
                }

            });
        });

        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
    </script>

    <!-- BS Stepper -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>

    <!-- Preview Image -->
    <script>
        function previewImgPria() {
            const foto = document.querySelector('#fto_pria');
            const fotoName = document.querySelector('#fto_pria').value;
            const imgPreview = document.querySelector('.foto_pria');

            fotoName.textContent = foto.files[0].name;

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgWanita() {
            const foto = document.querySelector('#fto_wanita');
            const fotoName = document.querySelector('#fto_wanita').value;
            const imgPreview = document.querySelector('.foto_wanita');

            fotoName.textContent = foto.files[0].name;

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

    <!-- Datetime Picker -->
    <script>
        $('#akad').datetimepicker({
            icons: {
                time: 'far fa-clock'
            },
            format: 'MM/DD/YYYY HH:mm'
        });
        $('#resepsi').datetimepicker({
            icons: {
                time: 'far fa-clock'
            },
            format: 'MM/DD/YYYY HH:mm'
        });
    </script>

    <!-- JQuery Validator Form -->
    <script>
        $(function() {
            $('.quickForm').validate({
                rules: {
                    fto_pria: {
                        accept: "jpg,jpeg,gif,png",
                        extension: "jpg|jpeg|gif|png",
                        maxsize: 2097152
                    },
                    fto_wanita: {
                        accept: "jpg,jpeg,gif,png",
                        extension: "jpg|jpeg|gif|png",
                        maxsize: 2097152
                    },
                    nm_pria: {
                        required: true,
                        lettersonly: true,
                        noSpace: false
                    },
                    nm_wanita: {
                        required: true,
                        lettersonly: true,
                        noSpace: false
                    },
                    pgl_pria: {
                        required: true,
                        lettersonly: true
                    },
                    pgl_wanita: {
                        required: true,
                        lettersonly: true
                    },
                    ayh_pria: {
                        required: true,
                        lettersonly: true,
                        noSpace: false
                    },
                    ibu_pria: {
                        required: true,
                        lettersonly: true,
                        noSpace: false
                    },
                    ayh_wanita: {
                        required: true,
                        lettersonly: true,
                        noSpace: false
                    },
                    ibu_wanita: {
                        required: true,
                        lettersonly: true,
                        noSpace: false
                    },
                    tgl_resepsi: {
                        required: true
                    },
                    mp_resepsi: {
                        required: true
                    },
                    almt_resepsi: {
                        required: true
                    },
                    no_hp: {
                        required: true,
                        mobileIDN: true,
                        minlength: 11,
                        maxlength: 15
                    },
                },
                messages: {
                    fto_pria: {
                        accept: "Format foto harus jpg, jpeg, gif, png",
                        extension: "Format foto harus jpg, jpeg, gif, png",
                        maxsize: "Ukuran foto maksimal 2MB"
                    },
                    fto_wanita: {
                        accept: "Format foto harus jpg, jpeg, gif, png",
                        extension: "Format foto harus jpg, jpeg, gif, png",
                        maxsize: "Ukuran foto maksimal 2MB"
                    },
                    nm_pria: {
                        required: "Nama pria wajib diisi",
                        lettersonly: "Nama pria hanya boleh huruf"
                    },
                    nm_wanita: {
                        required: "Nama wanita wajib diisi",
                        lettersonly: "Nama wanita hanya boleh huruf"
                    },
                    pgl_pria: {
                        required: "Nama panggilan pria wajib diisi",
                        lettersonly: "Nama panggilan pria hanya boleh huruf"
                    },
                    pgl_wanita: {
                        required: "Nama panggilan wanita wajib diisi",
                        lettersonly: "Nama panggilan wanita hanya boleh huruf"
                    },
                    ayh_pria: {
                        required: "Nama ayah pria wajib diisi",
                        lettersonly: "Nama ayah pria hanya boleh huruf"
                    },
                    ibu_pria: {
                        required: "Nama ibu pria wajib diisi",
                        lettersonly: "Nama ibu pria hanya boleh huruf"
                    },
                    ayh_wanita: {
                        required: "Nama ayah wanita wajib diisi",
                        lettersonly: "Nama ayah wanita hanya boleh huruf"
                    },
                    ibu_wanita: {
                        required: "Nama ibu wanita wajib diisi",
                        lettersonly: "Nama ibu wanita hanya boleh huruf"
                    },
                    tgl_resepsi: {
                        required: "Tanggal resepsi wajib diisi"
                    },
                    mp_resepsi: {
                        required: "Maps resepsi wajib diisi"
                    },
                    almt_resepsi: {
                        required: "Alamat resepsi wajib diisi"
                    },
                    no_hp: {
                        required: "Nomor HP wajib diisi",
                        mobileIDN: "Format nomor HP tidak valid",
                        minlength: "Format nomor HP tidak valid",
                        maxlength: "Format nomor HP tidak valid"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                    countValidation();
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                    $(element).addClass('need-validation');
                    countValidation();
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).removeClass('need-validation');
                    $(element).addClass('is-valid');
                    countValidation();
                }
            });
        });
    </script>

    <!-- count length need-validation class -->
    <script>
        function countValidation() {
            // const nextBtnSubmit = `<button type="submit" class="btn btn-primary next-btn-submit">Next <i class="fas fa-arrow-right"></i></button>`;
            // const nextBtn = `<button type="button" class="btn btn-primary next-btn" onclick="stepper.next()" hidden>Next <i class="fas fa-arrow-right"></i></button>`;

            if ($('.need-validation').length > 1) {
                $('.next-btn-submit').prop('hidden', false);
                $('.next-btn').prop('hidden', true);
            } else {
                $('.next-btn-submit').prop('hidden', true);
                $('.next-btn').prop('hidden', false);
            }

            console.log($('.need-validation').length);
        };
    </script>

    <!-- Responsive Data Tables -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>