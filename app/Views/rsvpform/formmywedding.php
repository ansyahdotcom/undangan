<!DOCTYPE html>
<!-- 
Template Name: My Wedding - Wedding Invite Template
Version: 1.1
Author: Kamleshyadav
Website: http://himanshusofttech.com/
Purchase: http://themeforest.net/user/kamleshyadav
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RSVP</title>
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link rel="icon" type="image/png" href="images/favicon.png" />
</head>

<body>
    <!-- RSVP SECTION START -->
    <div class="wd_section_heading">
        <h1 class="text-center">RSVP</h1>
        <span class="wd_dot_heading"></span>
    </div>
    <div class="container">
        <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1 text-center">
            <p>Mohon Isi Data Berikut Untuk Mengkonfirmasi Kehadiran Anda</p>
        </div>
        <div class="wd_rsvp_section">
            <form id="theForm" class="simform" autocomplete="off" action="" method="post">
                <input type="hidden" name="recipient" value="upasana.jain@himanshusofttech.com">
                <input type="hidden" name="subject" value="Wedding Planner" />
                <div class="simform-inner">
                    <ol class="questions">
                        <li>
                            <span><label for="q1">Nama Tamu</label></span>
                            <input id="q1" name="name" type="text" />
                        </li>
                        <li>
                            <span><label for="q2">Nomer Handphone</label></span>
                            <input id="q2" name="mobile_no" type="text" data-validate="number" />
                        </li>
                        <li>
                            <span><label for="q4">Jumlah Anggota Tamu</label></span>
                            <input id="q4" name="no_of_member" type="text" data-validate="mnumber" />
                        </li>
                        <li>
                            <span><label for="q5">Apakah Akan Menghadiri Acara? (Hadir/Tidak)</label></span>
                            <input id="q5" name="no_of_member" type="text" data-validate="text" />
                        </li>
                        <!-- <li>
                                            <span><label for="q5">Apakah Akan Menghadiri Acara? (Iya/Tidak)</label></span>
                                            <input id="q5" name="events" type="text" />
                                        </li> -->
                    </ol>
                    <!-- /questions -->
                    <button class="submit" type="submit">Send answers</button>
                    <div class="controls">
                        <button class="next fa fa-long-arrow-right"></button>
                        <div class="progress"></div>
                        <span class="number">
                            <span class="number-current"></span>
                            <span class="number-total"></span>
                        </span>
                        <span class="error-message"></span>
                    </div>
                    <!-- / controls -->
                </div>
                <!-- /simform-inner -->
                <span class="final-message"></span>
            </form>
            <!-- /simform -->
        </div>
        <!--form -->
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animation-bubble.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="js/plugins/flipclock/flipclock.js"></script>
    <script type="text/javascript" src="js/plugins/smoothscroll/smoothscroll.js"></script>
    <!-- REVOLUTION JS FILES -->
    <script type="text/javascript" src="js/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="js/plugins/revolution/js/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="js/plugins/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="js/plugins/countto/jquery.countTo.js"></script>
    <script src="js/plugins/smoothscroll/smoothscroll.js" type="text/javascript"></script>
    <script src="js/plugins/owl/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/plugins/rsvp/modernizr.custom.js"></script>
    <script src="js/plugins/rsvp/classie.js"></script>
    <script src="js/plugins/rsvp/step_form.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/plugins/stellar/jquery.stellar.js"></script>
    <script src="js/plugins/rsvp/modernizr.hover.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>