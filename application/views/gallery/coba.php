<div class="container">
    <div class="row">
        <!-- Data list table -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-info text-center">
                    <th width="5%">#</th>
                    <th width="20%"></th>
                    <th width="25%">Title</th>
                    <th width="15%">Diupload</th>
                    <th width="8%">Status</th>
                    <th width="18%">Action</th>
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
                            <td><a href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span class="badge <?php echo ($row['status'] == 1) ? 'btn-success' : 'btn-danger'; ?>"><?php echo ($row['status'] == 1) ? 'Ready' : 'Not Ready'; ?></span></a></td>
                            <td>
                                <a href="<?php echo base_url('manage_gallery/view/' . $row['id']); ?>" class="btn btn-primary">view</a>
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


<div class="col-md-4">
    <div class="card mb-4 box-shadow"><span class="badge <?php echo ($row['status'] == 1) ? 'btn-success' : 'btn-danger'; ?>"><?php echo ($row['status'] == 1) ? 'Ready' : 'Not Ready'; ?></span>
        <td class="card-img-top" alt="Card image cap"> <?php echo $defaultImage; ?> </td>
        <div class="card-body">
            <p class="card-text"><?php echo $row['title']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="<?php echo base_url('manage_gallery/view/' . $row['id']); ?>" class="btn btn-sm btn-outline-secondary">View</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary"><?php echo $i; ?></button>
                </div>
                <small class="text-muted"><?php echo $row['created']; ?></small>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($gallery)) {
    $i = 0;
    foreach ($gallery as $row) {
        $i++;
        $defaultImage = !empty($row['default_image']) ? '<img src="' . base_url() . 'uploads/images/' . $row['default_image'] . '" alt="" />' : '';
        $statusLink = ($row['status'] == 1) ? site_url('manage_gallery/block/' . $row['id']) : site_url('manage_gallery/unblock/' . $row['id']);
?>
        <div class="card mb-6 box-shadow">
            <!-- Konten -->
            <button type="badge" class="btn btn-sm btn-outline-secondary"><?php echo $i; ?></button>
            <td class="card-img-top rounded float-left" alt="Card image cap"> <?php echo $defaultImage; ?> </td>
            <span class="badge <?php echo ($row['status'] == 1) ? 'btn-success' : 'btn-danger'; ?>"><?php echo ($row['status'] == 1) ? 'Ready' : 'Not Ready'; ?></span>
            <div class="card-body">
                <p class="card-text"><?php echo $row['title']; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="<?php echo base_url('manage_gallery/view/' . $row['id']); ?>" class="btn btn-sm btn-outline-info">Lihat Isi Thumnail</a>
                    </div>
                    <small class="text-muted"><?php echo $row['created']; ?></small>
                </div>
            </div>
        <?php }
        
} else { ?>
        <tr>
            <td colspan="6">No gallery found...</td>
        </tr>
    <?php } ?>
        </div>