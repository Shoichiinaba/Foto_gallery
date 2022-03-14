<section class="content">
    <!-- Alert -->
    <div class="clearfix">
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
                    <li><a href="<?php echo site_url('admin/add'); ?>"><i class="material-icons">backup</i> <?php echo $title; ?></a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Content -->
    <!-- File Upload | Drag & Drop OR With Click & Choose -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        FILE UPLOAD - DRAG & DROP OR WITH CLICK & CHOOSE
                    </h2>
                </div>
                <div class="body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Gambar:</label>
                            <input type="file" name="images[]" class="form-control" max="80" multiple required="">
                            <?php if (!empty($gallery['images'])) { ?>
                                <div class="gallery-img">
                                    <?php foreach ($gallery['images'] as $imgRow) { ?>
                                        <div class="img-box" id="imgb_<?php echo $imgRow['id']; ?>">
                                            <img class="img-responsive thumbnail" src="<?php echo base_url('uploads/images/' . $imgRow['file_name']); ?>">
                                            <a href="<?php echo base_url('admin/deleteImage/' . $imgRow['id']); ?>" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>

                        <a href="<?php echo base_url('admin/add'); ?>" class="btn bg-deep-orange vave-effect"> Batal</a>
                        <input type="hidden" name="id" value="<?php echo !empty($gallery['id']) ? $gallery['id'] : ''; ?>">
                        <input type="submit" name="imgSubmit" id="upload" class="btn bg-green waves-effect" data-loading-text=" Loading... Mohon Tunggu Sebentar...!" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- loading button -->
<script>
    $('#upload').on('click', function() {
        var $btn = $(this).button('loading')
        // business logic...
        $btn.button('loading')
    })
</script>