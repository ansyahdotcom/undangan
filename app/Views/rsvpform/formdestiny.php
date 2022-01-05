<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/assets/destiny/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets/destiny/css/base.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets/destiny/css/main.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets/destiny/css/venobox.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets/destiny/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Kristi|Lato:100,300,300i,400,700" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row vertical-align">
            <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 ">
                <h1 class="title">RSVP</h1>
                <p class="mt-20 pd-r20">Konfirmasi kehadiran anda dengan mengisi nama pribadi atau nama keluarga dan jumlah yang hadir.</p>
            </div>
            <div class="col-md-5 col-sm-5 ">
                <div class="block-registry">
                    <form class="registry-form" method="post" action="#">
                        <div class="input-columns clearfix">
                            <div class="column-1">
                                <div class="column-inner">
                                    <input placeholder="Nama anda" value="" id="nama_tamu" name="nama_tamu" type="text">
                                </div>
                            </div>
                            <div class="column-2">
                                <div class="column-inner">
                                    <input placeholder="Nomor WA" value="" id="no_wa" name="no_wa" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="input-columns clearfix">
                            <div class="column-1">
                                <div class="column-inner">
                                    <input placeholder="Jumlah yang hadir" value="" id="jumlah" name="jumlah" type="text">
                                </div>
                            </div>
                            <div class="column-2">
                                <div class="column-inner">
                                    <div class="column-inner select-input">
                                        <select name="kehadiran">
                                            <option value="1">Hadir</option>
                                            <option value="0">Tidak hadir</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input value="Send" class=" but submit" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/destiny/js/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="/assets/destiny/js/jquery.countdown.min.js" type="text/javascript"></script>
    <script src="/assets/destiny/js/venobox.min.js" type="text/javascript"></script>
    <script src="/assets/destiny/js/smooth-scroll.js" type="text/javascript"></script>
    <script src="/assets/destiny/js/script.js" type="text/javascript"></script>
    <script src="/assets/destiny/js/placeholders.min.js" type="text/javascript"></script>
</body>

</html>