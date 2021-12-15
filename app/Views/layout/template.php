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

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Sweet Alert 2 -->
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

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark bg-primary">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url() ?>" class="nav-link <?php $uri = service('uri');
                                                                if ($uri->getSegment(1) == 'dashboard') {
                                                                    echo 'active';
                                                                } ?>">Dashboard</a>
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
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
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
    <!-- daterangepicker -->
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
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

    <!-- Preview Maps -->
    <script>
        function previewMapsAkad() {
            var mpAkad = $('#mp_akad').val();
            if (mpAkad == '') {
                $('.contain-mp-old-akad').prop('hidden', false);
                $('.contain-mp-akad').prop('hidden', true);
            } else {
                $('.contain-mp-old-akad').prop('hidden', true);
                $('.contain-mp-akad').remove();
                $('.preview-mp-akad').append(`<div class="contain-mp-akad">${mpAkad}</div>`);
            }
        }

        function previewMapsResepsi() {
            var mpResepsi = $('#mp_resepsi').val();
            if (mpResepsi == '') {
                $('.contain-mp-old-resepsi').prop('hidden', false);
                $('.contain-mp-resepsi').prop('hidden', true);
            } else {
                $('.contain-mp-old-resepsi').prop('hidden', true);
                $('.contain-mp-resepsi').remove();
                $('.preview-mp-resepsi').append(`<div class="contain-mp-resepsi">${mpResepsi}</div>`);
            }
        }
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
            format: 'DD/MM/YYYY HH:mm'
        });
        $('#resepsi').datetimepicker({
            icons: {
                time: 'far fa-clock'
            },
            format: 'DD/MM/YYYY HH:mm'
        });
    </script>

    <!-- Add method JQuery validator -->
    <script>
        $(function() {
            // DateTime
            jQuery.validator.addMethod("datetime", function(value, element) {
                return this.optional(element) || /^(([0-2]?\d)|([3][01]))\/[0,1]?\d\/((199\d)|([2-9]\d{3}))\s(00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9])$/.test(value);
            }, "Please enter a date in the format DD/MM/YYYY HH:mm");

            // CurencyIDR
            jQuery.validator.addMethod("currencyIDR", function(value, element) {
                return this.optional(element) || /^\Rp?(.[0-9]{1,3}.([0-9]{3}.)*[0-9]{3}|[0-9]+)(,[0-9][0-9])?$/.test(value);
            }, "Please enter a valid format currency (Rp.1.000.000,00)");
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
                    tgl_akad: {
                        // datetime: true
                    },
                    tgl_resepsi: {
                        required: true,
                        // datetime: true
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
                    tgl_akad: {
                        // datetime: "Format tanggal tidak valid (DD/MM/YYYY HH:mm)"
                    },
                    tgl_resepsi: {
                        required: "Tanggal resepsi wajib diisi",
                        // datetime: "Format tanggal tidak valid (DD/MM/YYYY HH:mm)"
                    },
                    mp_resepsi: {
                        required: "Maps resepsi wajib diisi"
                    },
                    almt_resepsi: {
                        required: "Alamat resepsi wajib diisi"
                    },
                    no_hp: {
                        required: "Nomor HP wajib diisi",
                        mobileIDN: "Format nomor HP tidak valid (08xxxxxxxxxx / +628xxxxxxxxxx)",
                        minlength: "Format nomor HP tidak valid (08xxxxxxxxxx / +628xxxxxxxxxx)",
                        maxlength: "Format nomor HP tidak valid (08xxxxxxxxxx / +628xxxxxxxxxx)"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                },
            });
        });
    </script>

    <!-- validate bs stepper next button -->
    <script>
        function isChecked() {
            constNextBtn = `<button type="button" class="btn btn-primary next-btn" onclick="stepper.next()">Selanjutnya <i class="fas fa-arrow-right"></i></button>`;
            $(".next-btn-copy").remove();
            $(".next-btn").remove();
            $(".data-part-actions").append(constNextBtn);
        }
    </script>

    <!-- if card undangan was clicked -->
    <script>
        function clickCardUndangan() {
            $(".card-undangan").click(function() {
                $(".card-undangan").removeClass("card-undangan-active");
                $(this).addClass("card-undangan-active");
            });
        }
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