<section class="content">
    <!-- BREADCRUMBS -->
    <?php if ($userdata->role == 'Spv') { ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <ol class="breadcrumb breadcrumb-bg-indigo align-right">
                        <li><a href="<?php echo site_url('admin'); ?>"><i class="material-icons">home</i> Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>

    <?php } else { ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <ol class="breadcrumb breadcrumb-bg-teal align-right">
                        <li><a href="<?php echo site_url('admin'); ?>"><i class="material-icons">home</i> Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- content -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-light-blue">
                    <h2>
                        Selamat Datang <small>Di Sistem Katolog Gallery</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li>
                            <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="timer" data-loading-color="lightBlue">
                                <i class="material-icons">loop</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row">

                        <?php if ($userdata->role == '') { ?>
                            <!-- dashboard superadmin -->
                        <?php } elseif ($userdata->role == 'Spv') { ?>

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-pink">
                                            <i class="material-icons">store</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Jumlah Toko</div>
                                            <div class="number"><?php echo $jum_toko;  ?> Toko</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-blue">
                                            <i class="material-icons">group_add</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Jumlah Admin</div>
                                            <div class="number"><?php echo $jum_adm;  ?> Orang</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-orange">
                                            <i class="material-icons">iso</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Jumlah Kadar</div>
                                            <div class="number"><?php echo $jum_kdr;  ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-green">
                                            <i class="material-icons">perm_media</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Jumlah Gambar</div>
                                            <div class="number"><?php echo $jum_gbr;  ?> Foto</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <!-- dashboard admin biasa -->
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <!-- <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-indigo">
                                            <i class="material-icons">compare</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Jumlah Gallery</div>
                                            <div class="number"><?php echo $jum_kdr; ?> Gallery</div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-deep-purple">
                                            <i class="material-icons">store</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Toko / Region</div>
                                            <div class="number"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <!-- <div class="info-box hover-zoom-effect">
                                        <div class="icon bg-teal">
                                            <i class="material-icons">perm_media</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Jumlah Gambar</div>
                                            <div class="number"><?php echo $jum_foto;  ?> Foto</div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- #END# Hover Expand Effect -->
                </div>
            </div>
        </div>
    </div>
    <!-- akhir konten -->
</section>