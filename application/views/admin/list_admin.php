<section class="content">
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
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body">
                <ol class="breadcrumb breadcrumb-bg-indigo align-right">
                    <li><a href="<?php echo site_url('admin'); ?>"><i class="material-icons">home</i> Dashboard</a></li>
                    <li><a href="<?php echo site_url('admin/list_admin'); ?>"><i class="material-icons">account_box</i> Liat Admin</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- content table-->
    <di class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        List Admin
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="<?php echo site_url('Admin/tambah_admin'); ?>" type="button" class="btn bg-deep-purple btn-xs waves-effect">
                            <i class="material-icons">person_add</i>
                            <span>Tambah Admin</span>
                        </a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive js-sweetalert">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Dibuat</th>
                                    <th>Diubah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($list as $g) : $no++; ?>
                                    <tr>
                                        <td><?php echo $g->id; ?></td>
                                        <td><?php echo $g->username; ?></td>
                                        <td><?php echo $g->nama; ?></td>
                                        <td><?php echo $g->email; ?></td>
                                        <td><?php echo $g->dibuat; ?></td>
                                        <td><?php echo $g->diubah; ?></td>
                                        <td align="center">
                                            <a href="<?php echo site_url('admin/hapus_admin/' . $g->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn bg-orange btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Hapus Data Admin" data-type="cancel"><i class="material-icons">delete_sweep</i></i></a>
                                            <!-- <a href="<?php echo site_url('admin/ubah/' . $g->id); ?>" class="btn bg-indigo btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Ubah Data Admin"><i class="material-icons">edit</i></i></a> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </di>
    <!-- akhir konten table -->
</section>