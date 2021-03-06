<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?= base_url('assets/'); ?>images/<?php echo $userdata->foto; ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $userdata->nama; ?></div>
                <div class="email"><?php echo $userdata->email; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="<?php echo base_url() ?>Profile"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo base_url() ?>Auth/logout"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <?php if ($userdata->role == '75') { ?>
                    <li class="active">
                        <a href="<?php echo site_url('admin'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">cloud_upload</i>
                            <span>Upload Foto</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo site_url('Admin/add'); ?>">Upload</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Admin/List_upload'); ?>">Daftar Foto</a>
                            </li>
                        </ul>
                    </li>
                <?php } elseif ($userdata->role == '300') { ?>
                    <li class="active">
                        <a href="<?php echo site_url('admin'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">cloud_upload</i>
                            <span>Upload Foto</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo site_url('Admin/add'); ?>">Upload</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Admin/List_upload'); ?>">Daftar Foto</a>
                            </li>
                        </ul>
                    </li>
                <?php } elseif ($userdata->role == '420') { ?>
                    <li class="active">
                        <a href="<?php echo site_url('admin'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">cloud_upload</i>
                            <span>Upload Foto</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo site_url('Admin/add'); ?>">Upload</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Admin/List_upload'); ?>">Daftar Foto</a>
                            </li>
                        </ul>
                    </li>
                <?php } elseif ($userdata->role == '700') { ?>
                    <li class="active">
                        <a href="<?php echo site_url('admin'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">cloud_upload</i>
                            <span>Upload Foto</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo site_url('Admin/add'); ?>">Upload</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Admin/List_upload'); ?>">Daftar Foto</a>
                            </li>
                        </ul>
                    </li>
                <?php } elseif ($userdata->role == 'Spv') { ?>
                    <li class="active">
                        <a href="<?php echo site_url('admin'); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">cloud_upload</i>
                            <span>Upload Foto</span>
                        </a>
                        <ul class="ml-menu">
                            <!-- <li>
                                <a href="<?php echo site_url('Admin/add'); ?>">Upload</a>
                            </li> -->
                            <li>
                                <a href="<?php echo site_url('Admin/List_uploadspv'); ?>">Daftar Foto</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>Toko (Wilayah)</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo site_url('Admin/list_toko'); ?>">Daftar Toko</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>Admin</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo site_url('Admin/list_admin'); ?>">Daftar Admin</a>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>

                <?php } ?>
            </ul>
        </div>
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <?= date('Y') ?> <a href="https://sisolusi.id/web/">Foto Gallery V.1.0</a>.
            </div>
            <div class="version">
                <b>Version: </b> (Insider)
            </div>
        </div>
        <!-- #Footer -->
    </aside>
</section>