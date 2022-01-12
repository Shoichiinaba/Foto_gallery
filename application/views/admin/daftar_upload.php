<!-- Display status message -->
<?php if (!empty($success_msg)) { ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
<?php } elseif (!empty($error_msg)) { ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
<?php } ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><?php echo $title; ?></h2>
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
                        <div class="float-right col-xs-4 col-sm-3 col-md-2 col-lg-2">
                            <a href="<?php echo base_url('manage_gallery/add'); ?>" class="btn bg-teal btn-block btn-xs waves-effect"><i class="plus"></i>New Gallery</a>
                        </div>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="bg-cyan">
                                    <th width="5%">#</th>
                                    <th width="20%"></th>
                                    <th width="20%">Kategori</th>
                                    <th width="15%">Diupload</th>
                                    <th width="8%">Status</th>
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
                                            <td><a href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span class="badge <?php echo ($row['status'] == 1) ? 'btn bg-green btn-lg btn-block waves-effect' : 'btn bg-red btn-lg btn-block waves-effect'; ?>"><?php echo ($row['status'] == 1) ? 'Active' : 'Inactive'; ?></span></a></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/tampil/' . $row['id']); ?>" class="btn btn-primary">Lihat</a>
                                                <a href="<?php echo base_url('manage_gallery/edit/' . $row['id']); ?>" class="btn btn-warning">Ubah</a>
                                                <a href="<?php echo base_url('manage_gallery/delete/' . $row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?true:false;">Hapus</a>
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
    </div>
</section>