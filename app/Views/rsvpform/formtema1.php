<head>
    <!-- Library CSS -->
    <link href="/assets/blueflowers/css/wedding_library.css" rel="stylesheet">

    <!-- Icons CSS -->
    <link href="fonts/themify-icons.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/assets/blueflowers/css/wedding_style.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/blueflowers/css/leaves.css" type="text/css" media="screen">
    <link href="/assets/blueflowers/css/responsive.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/assets/blueflowers/envelope/css/style.css" rel="stylesheet">
    <!-- Color CSS -->
    <link href="/assets/blueflowers/envelope/css/blue.css" rel="stylesheet">

    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="/assets/plugins/sweetalert2/sweetalert2.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
</head>

<body>
    <!-- RSVP -->
    <section class="rsvp" id="rsvp">
        <div class="container-envelope text-center wed_great_titles">
            <h2>Join Our Party</h2>
            
            <?= session()->get('message'); ?>

            <div id="envelope" data-100-top="@class:active" data-200-bottom="@class: ">
                <div class="envelope_front">
                    <div class="env_top_top"></div>
                </div>
                <div class="envelope_back">
                    <div class="env_top"></div>
                </div>

                <div class="paper">

                    <!-- End Date of Reservation -->
                    <div class="paper_title">Please RSVP</div>

                    <!-- Form -->
                    <form action="/customer/savetema1" class="quickForm" method="POST">
                        <div id="div_block_1">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $trn['id_tr']; ?>">

                            <div class="txt_input">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                            </div>
                            <div class="txt_input">
                                <input type="number" class="form-control" name="jml_tamu" id="jml_tamu" placeholder="Jumlah yang hadir">
                            </div>
                            <div class="txt_input">
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor WA">
                            </div>
                            <select class="form-control txt_input" name="kehadiran" id="kehadiran" placeholder="# Kehadiran">
                                <option value="" selected disabled># Kehadiran</option>
                                <option value="1">Hadir</option>
                                <option value="0">Tidak Hadir</option>
                            </select>

                            <button type="submit" class="btn btn-lg submit_block_1">Kirim</button>


                            <!-- Form Additional text -->
                            <p>We’re excited to see you! Any questions, just email us at:
                                <a href="mailto:johndoeman@gmail.com">johndoeman@gmail.com</a>
                            </p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- RSVP End -->

    <!-- JQuery -->
    <script src="/assets/blueflowers/js/jquery-1.12.4.min.js"></script>

    <!-- Library JS -->
    <script src="/assets/blueflowers/js/wedding_library.js"></script>
    <script src="/assets/blueflowers/js/jquery.countdown.min.js"></script>
    <script src="/assets/blueflowers/js/leaves.js"></script>

    <!-- Theme JS -->
    <script src="/assets/blueflowers/envelope/js/script.js"></script>

    <!-- Theme JS -->
    <script src="/assets/blueflowers/js/wedding_script.js"></script>

    <!-- jquery-validation -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/assets/plugins/jquery-validation/additional-methods.min.js"></script>

    <!-- Add method JQuery validator -->
    <script src="/assets/dist/js/methodvalidate.js"></script>
    <!-- JQuery Validator Form -->
    <script src="/assets/dist/js/formvalidate.js"></script>

    <!-- Sweet Alert -->
    <script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/assets/dist/js/swal.js"></script>
</body>