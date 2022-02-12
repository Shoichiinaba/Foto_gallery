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
                    <li><a href="<?php echo site_url('admin/list_admin'); ?>"><i class="material-icons">store</i> Liat Toko</a></li>
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
                        <div class="button-demo js-modal-buttons">
                            <a type="button" data-toggle="modal" data-target="#smallModal" class="btn bg-deep-purple btn-xs waves-effect">
                                <i class="material-icons">add_shopping_cart</i>
                                <span>Tambah Toko</span>
                            </a>
                        </div>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive js-sweetalert">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Toko (WIlayah)</th>
                                    <th>Dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($list as $g) : $no++; ?>
                                    <tr>
                                        <td><?php echo $g->id; ?></td>
                                        <td><?php echo $g->nama_toko; ?></td>
                                        <td><?php echo $g->dibuat; ?></td>
                                        <td align="center">
                                            <a href="<?php echo site_url('admin/hapus_toko/' . $g->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn bg-orange btn-xs waves-effect" data-toggle="tooltip" data-placement="top" title="Hapus Data Admin" data-type="cancel"><i class="material-icons">delete_sweep</i></i></a>
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
    <!-- Modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Tambah Toko Baru</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('admin/simpan_toko'); ?>" id="form_validation" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_toko" required>
                                <label class="form-label" style="color: indigo;"> Masukkan Name Toko / Wilayah</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link bg-blue waves-effect">Simpan</button>
                    <button type="button" class="btn btn-link bg-orange waves-effect" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir modal -->
</section>