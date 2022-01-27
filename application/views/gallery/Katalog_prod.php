<section class="content">
</section>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="block-header">
        <h2> Katalog Product</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#kat1_animation_1" data-toggle="tab">
                                        <i class="material-icons">photo_album</i> 300
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#kat2_animation_2" data-toggle="tab">
                                        <i class="material-icons">photo_filter</i> 420
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#kat3_animation_1" data-toggle="tab">
                                        <i class="material-icons">photo_library</i> 700
                                    </a>
                                </li>

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- tab kategori -->
                                <div role="tabpanel" class="tab-pane animated lightSpeedIn active" id="kat1_animation_1">
                                    <!-- Konten-->
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="body table-responsive">
                                                <table class="table table-condensed">
                                                    <thead>
                                                        <tr class="bg-cyan">
                                                            <th width="10%">Gambar</th>
                                                            <th width="20%">Diupload</th>
                                                            <th width="8%">Action</th>
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
                                                                    <td class="thumbnail"><?php echo $defaultImage; ?></td>
                                                                    <!-- <td><?php echo $row['title']; ?></td> -->
                                                                    <td><?php echo $row['created']; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('Manage_gallery/view/' . $row['id']); ?>" class="btn bg-cyan waves-effect">Lihat</a>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        } else { ?>
                                                            <tr>
                                                                <td colspan="6">Tidak Ada Gallery...</td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir konten -->
                                </div>
                                <!-- tab kategori 2 -->
                                <div role="tabpanel" class="tab-pane animated lightSpeedIn" id="kat2_animation_2">
                                    <!-- Konten-->
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="body table-responsive">
                                                    <table class="table table-condensed">
                                                        <thead>
                                                            <tr class="bg-blue">
                                                                <th width="20%">Gambar</th>
                                                                <th width="15%">Diupload</th>
                                                                <th width="20%">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($gallery2)) {
                                                                $i = 0;
                                                                foreach ($gallery2 as $row) {
                                                                    $i++;
                                                                    $defaultImage = !empty($row['default_image']) ? '<img src="' . base_url() . 'uploads/images/' . $row['default_image'] . '" alt="" />' : '';
                                                                    $statusLink = ($row['status'] == 1) ? site_url('manage_gallery/block/' . $row['id']) : site_url('manage_gallery/unblock/' . $row['id']);
                                                                    $statusTooltip = ($row['status'] == 1) ? 'Click to Inactive' : 'Click to Active';
                                                            ?>
                                                                    <tr>
                                                                        <td class="thumbnail"><?php echo $defaultImage; ?></td>
                                                                        <!-- <td><?php echo $row['title']; ?></td> -->
                                                                        <td><?php echo $row['created']; ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('Manage_gallery/view/' . $row['id']); ?>" class="btn bg-blue waves-effect">Lihat</a>
                                                                        </td>
                                                                    </tr>
                                                                <?php }
                                                            } else { ?>
                                                                <tr>
                                                                    <td colspan="6">Tidak Ada Gallery...</td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir konten -->
                                </div>
                                <!-- tab kategori 3 -->
                                <div role="tabpanel" class="tab-pane animated lightSpeedIn" id="kat3_animation_1">
                                    <!-- Konten-->
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="body table-responsive">
                                                <table class="table table-condensed">
                                                    <thead>
                                                        <tr class="bg-light-blue">
                                                            <th width="20%">Gambar</th>
                                                            <th width="15%">Diupload</th>
                                                            <th width="20%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($gallery3)) {
                                                            $i = 0;
                                                            foreach ($gallery3 as $row) {
                                                                $i++;
                                                                $defaultImage = !empty($row['default_image']) ? '<img src="' . base_url() . 'uploads/images/' . $row['default_image'] . '" alt="" />' : '';
                                                                $statusLink = ($row['status'] == 1) ? site_url('manage_gallery/block/' . $row['id']) : site_url('manage_gallery/unblock/' . $row['id']);
                                                                $statusTooltip = ($row['status'] == 1) ? 'Click to Inactive' : 'Click to Active';
                                                        ?>
                                                                <tr>
                                                                    <td class="thumbnail"><?php echo $defaultImage; ?></td>
                                                                    <!-- <td><?php echo $row['title']; ?></td> -->
                                                                    <td><?php echo $row['created']; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('Manage_gallery/view/' . $row['id']); ?>" class="btn bg-light-blue waves-effect">Lihat</a>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        } else { ?>
                                                            <tr>
                                                                <td colspan="6">Tidak Ada Gallery...</td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir konten -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>