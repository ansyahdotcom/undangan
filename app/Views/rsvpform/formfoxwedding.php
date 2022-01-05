<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/assets/foxwedding/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets/foxwedding/css/main.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets/foxwedding/css/magnific-popup.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/assets/foxwedding/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

    <section id="rsvp" class="bg-secondary spacer-one-top-lg o-hidden ">
        <div class="container spacer-one-bottom-lg">
            <!--Row-->
            <div class="row justify-content-center">
                <div class="col">
                    <div class=" mb-5 pb-5 text-center">
                        <h1 class="display-4 ">Wedding Registry</h1>
                        <p class="w-md-40 mb-0 mx-auto text-dark-gray opacity-8">The best present you could possibly give
                            us </p>
                    </div>
                </div>
            </div>
            <!--End row-->
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <form method="post" action="customer/foxwedding">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input name="nama_tamu" type="text" class="form-control form-control-lg" placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <label>WA Number</label>
                            <input name="no_wa" type="text" class="form-control form-control-lg" placeholder="WA Number">
                        </div>
                        <div class="form-group">
                            <label>Number of Attendance</label>
                            <input name="jumlah" type="text" class="form-control form-control-lg" placeholder="Number of Attendance">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label>Attending</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group rounded bg-white p-2 border">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="atttending-yes" name="atttending" class="custom-control-input">
                                        <label class="custom-control-label" for="atttending-yes">Yes, I will be there</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group rounded bg-white p-2 border">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="atttending-no" name="atttending" class="custom-control-input">
                                        <label class="custom-control-label" for="atttending-no">Sorry, I can't come</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-lg btn-block btn-primary" type="submit">Confirm registry</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/foxwedding/js/jquery-1.12.4.min.js"></script>
    <script src="/assets/foxwedding/js/bootstrap.min.js"></script>
    <script src="/assets/foxwedding/js/smooth-scroll.js"></script>
    <script src="/assets/foxwedding/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/foxwedding/js/jquery.countdown.min.js"></script>
    <script src="/assets/foxwedding/js/placeholders.min.js"></script>
    <script src="/assets/foxwedding/js/instafeed.min.js"></script>
    <script src="/assets/foxwedding/js/script.js"></script>
</body>

</html>