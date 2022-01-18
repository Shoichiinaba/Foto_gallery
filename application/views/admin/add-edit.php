<section class="content">
    <?php if (!empty($error_msg)) { ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <h2><?php echo $title; ?></h2>
            </h2>
        </div>
    </div>
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
                            <label>Kategory:</label>
                            <input type="text" name="title" class="form-control" placeholder="Isi Kategori" value="<?php echo !empty($gallery['title']) ? $gallery['title'] : ''; ?>">
                            <?php echo form_error('title', '<p class="help-block text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Gambar:</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                            <?php if (!empty($gallery['images'])) { ?>
                                <div class="gallery-img">
                                    <?php foreach ($gallery['images'] as $imgRow) { ?>
                                        <div class="img-box" id="imgb_<?php echo $imgRow['id']; ?>">
                                            <img src="<?php echo base_url('uploads/images/' . $imgRow['file_name']); ?>">
                                            <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>

                        <a href="<?php echo base_url('manage_gallery'); ?>" class="btn bg-deep-orange vave-effect"> Batal</a>
                        <input type="hidden" name="id" value="<?php echo !empty($gallery['id']) ? $gallery['id'] : ''; ?>">
                        <input type="submit" name="imgSubmit" class="btn bg-green waves-effect" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>