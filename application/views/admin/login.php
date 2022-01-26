<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Admin Gallery</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/') ?>images/lg3.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/'); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/'); ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/'); ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b> Gallery</b></a>
            <small>Katalog Gallery - Toko Mas Bintang</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="<?= site_url('Auth/login') ?>" method="post" method="POST">
                    <!-- Alert -->
                    <?php
                    if (validation_errors() || $this->session->flashdata('result_login')) {
                    ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('result_login'); ?>
                        </div>
                    <?php } ?>

                    <?php
                    $data = $this->session->flashdata('sukses');
                    if ($data != "") { ?>
                        <div class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
                    <?php } ?>
                    <!-- Akhir Alert -->
                    <div class="msg">Masukan Username Dan Password</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="customCheck" class="filled-in chk-col-pink">
                            <label for="customCheck">Show Password</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-danger waves-effect" type="submit">
                                <i class="material-icons">screen_share</i>
                                <span>SIGN IN</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/'); ?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url('assets/'); ?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/'); ?>js/admin.js"></script>
    <script src="<?= base_url('assets/'); ?>js/pages/examples/sign-in.js"></script>
    <!-- show password -->
    <script>
        $(document).ready(function() {
            $('#customCheck').click(function() {
                if ($(this).is(':checked')) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            });
        });
    </script>
</body>

</html>