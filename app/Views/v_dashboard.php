<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- Jumbotron -->
        <div class="col">
            <div class="jumbotron-fluid mt-3 mb-4">
                <div class="container">
                    <h1 class="display-4 font-weight-bold">Hallo, <?= $username; ?>!</h1>
                    <p class="lead">Selamat datang di dashboard</p>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </div>
    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= session()->get('message') ?>"></div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="info-box mb-3 bg-primary">
                    <span class="info-box-icon"><i class="fas fa-receipt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Pesanan</span>
                        <span class="info-box-number"><?= $jml_psn; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Tamu</span>
                        <span class="info-box-number"><?= $jml_tamu; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pesanan Selesai</span>
                        <span class="info-box-number">22</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="info-box mb-3 bg-danger">
                    <span class="info-box-icon"><i class="far fa-comment"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Direct Messages</span>
                        <span class="info-box-number">163,921</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>