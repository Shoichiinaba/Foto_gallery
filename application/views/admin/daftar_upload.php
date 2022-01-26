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
    <!-- BREADCRUMBS -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body">
                <ol class="breadcrumb breadcrumb-bg-teal align-right">
                    <li><a href="<?php echo site_url('admin'); ?>"><i class="material-icons">home</i> Dashboard</a></li>
                    <li><a href="<?php echo site_url('admin/add'); ?>"><i class="material-icons">perm_media</i> <?php echo $title; ?></a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- With Material Design Colors -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Katalog Gallery
                    </h2>
                    <!-- Add link -->
                    <div class=" icon-and-text-button-demo text-right">
                        <a href="<?php echo base_url('admin/add'); ?>" class="btn bg-teal btn-xs waves-effect"><i class="material-icons">camera_enhance</i><span>Tambah Gallery</span></a>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="bg-cyan">
                                <th width="5%">#</th>
                                <th width="25%"></th>
                                <th width="20%">Kategori</th>
                                <th width="15%">Diupload</th>
                                <!-- <th width="8%">Status</th> -->
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($gallery)) {
                                $i = 0;
                                foreach ($gallery as $row) {
                                    $i++;
                                    $defaultImage = !empty($row['default_image']) ? '<img src="' . base_url() . 'uploads/images/' . $row['default_image'] . '" alt="" />' : '';
                                    $statusLink = ($row['status'] == 1) ? site_url('manage_gallery/block/' . $row['id']) : site_url('manage_gallery/unblock/' . $row['id']);
                                    $statusTooltip = ($row['status'] == 1) ? 'Click to Inactive' : 'Click to Active';
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td class="thumbnail"><?php echo $defaultImage; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['created']; ?></td>
                                        <!-- <td><a href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span class="badge <?php echo ($row['status'] == 1) ? 'btn bg-green btn-lg btn-block waves-effect' : 'btn bg-red btn-lg btn-block waves-effect'; ?>"><?php echo ($row['status'] == 1) ? 'Active' : 'Inactive'; ?></span></a></td> -->
                                        <td>
                                            <a href="<?php echo base_url('admin/tampil/' . $row['id']); ?>" class="btn btn-primary">Lihat</a>
                                            <a href="<?php echo base_url('admin/edit/' . $row['id']); ?>" class="btn btn-warning">Ubah</a>
                                            <a href="<?php echo base_url('admin/delete/' . $row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?true:false;">Hapus</a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6">No gallery found...</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>