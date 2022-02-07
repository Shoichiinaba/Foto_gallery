<!-- Display status message -->
<div class="row clearfix">
    <?php if (!empty($success_msg)) { ?>
        <div class="col-xs-12 col-lg-12">
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        </div>
    <?php } elseif (!empty($error_msg)) { ?>
        <div class="col-xs-12 col-lg-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
</div>
<section class="content">
    <!-- BREADCRUMBS -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body">
                <ol class="breadcrumb breadcrumb-bg-teal align-right">
                    <li><a href="<?php echo site_url('admin'); ?>"><i class="material-icons">home</i> Dashboard</a></li>
                    <li><a href="<?php echo site_url('admin/list_admin'); ?>"><i class="material-icons">account_box</i> Liat Admin</a></li>
                    <li><a href="<?php echo site_url('admin/tambah_admin'); ?>"><i class="material-icons">account_box</i> Tambah Admin</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- akhir BREADCRUMBS -->
    <div class="container-fluid">
        <div class="row clearfix">
            <!-- card kiri-->
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12"></div>
            <!-- akhir konten signup -->
            <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                <div class="row clearfix">
                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                        <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-col-teal">
                                <div class="panel-heading" role="tab" id="headingOne_17">
                                    <h4 class="panel-title align-center">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseOne_17" aria-expanded="true" aria-controls="collapseOne_17">
                                            <i class="material-icons">perm_contact_calendar</i> Daftar Admin Baru
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne_17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_17">
                                    <div class="panel-body">
                                        <div class="body">
                                            <form action="<?= base_url('admin/tambah_admin') ?>" method="post">
                                                <div class="input-group <?= form_error('nama') ? 'has-error' : null ?>">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">portrait</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="text" name="nama" class="form-control" autofocus="" placeholder="Full name" value="<?= set_value('nama'); ?>">
                                                        <span class="form-control-feedback"></span>
                                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class=" input-group <?= form_error('username') ? 'has-error' : null ?>">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
                                                        <span class="form-control-feedback"></span>
                                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="input-group <?= form_error('email') ? 'has-error' : null ?>">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                                                        <span class="form-control-feedback"></span>
                                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="input-group <?= form_error('password1') ? 'has-error' : null ?>">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="password" name="password1" class="form-control" minlength="6" placeholder="Password">
                                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="input-group <?= form_error('password2') ? 'has-error' : null ?>">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="password" name="password2" class="form-control" minlength="6" placeholder=" Retype password">
                                                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="input-group col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">device_hub</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <select name="role" class="form-control show-tick">
                                                            <option value="">-- Pilih Posisi --</option>
                                                            <option value="75">Admin 75</option>
                                                            <option value="300">Admin 300</option>
                                                            <option value="420">Admin 420</option>
                                                            <option value="700">Admin 700</option>
                                                            <option value="Spv">Super Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button class="btn btn-block btn-lg bg-teal waves-effect" type="submit">DAFTAR</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir konten signup -->
                <!-- card kanan-->
                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12"></div>
            </div>
        </div>
</section>