<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | <?= $title ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/') ?>images/gal.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap/css/bootstrap.css">
    <!-- Waves Effect Css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/node-waves/waves.css">
    <!-- Animation Css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/animate-css/animate.css">
    <!-- Light Gallery Plugin Css -->
    <link href="<?= base_url('assets/'); ?>plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/'); ?>plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="<?= base_url('assets/'); ?>plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="<?= base_url('assets/'); ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="<?= base_url('assets/'); ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/themes/all-themes.css">
    <!--WaitMe Css-->
    <link href="<?= base_url('assets/'); ?>plugins/waitme/waitMe.css" rel="stylesheet">
    <!-- Sweetalert Css -->
    <link href="<?= base_url('assets/'); ?>plugins/sweetalert/sweetalert2.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
</head>

<?php if ($userdata->role == '300') { ?>

    <body class="theme-teal">
    <?php } elseif ($userdata->role == '420') { ?>

        <body class="theme-green">
        <?php } elseif ($userdata->role == '700') { ?>

            <body class="theme-light-green">
            <?php } elseif ($userdata->role == '75') { ?>

                <body class="theme-deep-purple">
                <?php } else { ?>

                <?php } ?>
                <div class="wrapper">
                    <!-- Page Loader -->
                    <div class="page-loader-wrapper">
                        <div class="loader">
                            <div class="preloader">
                                <div class="spinner-layer pl-red">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                            <p>Please wait...</p>
                        </div>
                    </div>
                    <!-- #END# Page Loader -->
                    <!-- Overlay For Sidebars -->
                    <div class="overlay"></div>
                    <!-- #END# Overlay For Sidebars -->
                    <div>
                </body>

</html>
<!-- Jquery Core Js -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Light Gallery Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/light-gallery/js/lightgallery-all.js"></script>

<!-- Custom Js -->
<script src="<?= base_url('assets/'); ?>js/pages/medias/image-gallery.js"></script>
<script src="<?= base_url('assets/'); ?>js/pages/tables/jquery-datatable.js"></script>

<!-- Moment Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/momentjs/moment.js"></script>
<script src="<?= base_url('assets/'); ?>js/admin.js"></script>
<!-- <script src="<?= base_url('assets/'); ?>js/pages/forms/basic-form-elements.js"></script> -->

<!-- Autosize Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/autosize/autosize.js"></script>
<!-- Dropzone Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/dropzone/dropzone.js"></script>
<!-- Wait Me Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/waitme/waitMe.js"></script>
<!-- Validation Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-validation/jquery.validate.js"></script>
<!-- SweetAlert Plugin Js -->
<!-- <script src="<?= base_url('assets/'); ?>plugins/sweetalert/sweetalert2.min.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/'); ?>js/pages/ui/dialogs.js"></script>
<!-- Bootstrap Notify Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>