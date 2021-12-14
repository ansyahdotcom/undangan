<?= $this->extend('layout/template_login') ?>
<?= $this->section('content'); ?>

<!-- Custom Style -->
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 15px;
        margin: auto;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-label-group input,
    .form-label-group label {
        height: 3.125rem;
        padding: .75rem;
    }

    .form-label-group label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        pointer-events: none;
        cursor: text;
        /* Match the input under the label */
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:-moz-placeholder-shown) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
    }

    .form-label-group input:not(:-ms-input-placeholder) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
    }

    .form-label-group input:not(:-moz-placeholder-shown)~label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
    }

    .form-label-group input:not(:-ms-input-placeholder)~label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
    }

    .form-label-group input:not(:placeholder-shown)~label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
    }

    .form-label-group input:-webkit-autofill~label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
    }

    /* Fallback for Edge */
    @supports (-ms-ime-align: auto) {
        .form-label-group {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column-reverse;
            flex-direction: column-reverse;
        }

        .form-label-group label {
            position: static;
        }

        .form-label-group input::-ms-input-placeholder {
            color: #777;
        }
    }
</style>
<!-- Custom Style -->

<div class="login-box">
    <div class="flash-data" data-flashdata="<?= session()->get('message') ?>"></div>
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1><b>Jheng Onjheng</b></h1>
            <h5>Admin</h5>
        </div>
        <div class="card-body">
            <form action="login/login" method="post" class="form-signin">
                <?= csrf_field() ?>
                <div class="form-label-group">
                    <input type="text" id="username" class="form-control" placeholder="Username" name="username" autocomplete="off" required autofocus>
                    <label class="font-weight-normal" for="username">Username</label>
                </div>
                <div class="form-label-group">
                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                    <label class="font-weight-normal" for="password">Password</label>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
        <a href="dashboard" type="button" class="btn btn-primary">Dashboard</a>
    </div>
</div>

<?= $this->endSection(); ?>