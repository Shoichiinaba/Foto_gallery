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
                                <div class="list-unstyled row clearfix ">
                                    <?php foreach ($gallery['images'] as $imgRow) { ?>
                                        <div class="img-responsive thumbnail col-lg-2 col-md-4 col-sm-6 col-xs-12" id="imgb_<?php echo $imgRow['id']; ?>">
                                            <img class="img-responsive thumbnail " src="<?php echo base_url('uploads/images/' . $imgRow['file_name']); ?>">
                                            <a href="javascript:void(0);" class="btn-block badge bg-teal" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">Hapus</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>

                        <a href="<?php echo base_url('admin/List_upload'); ?>" class="btn bg-deep-orange vave-effect"> Batal</a>
                        <input type="hidden" name="id" value="<?php echo !empty($gallery['id']) ? $gallery['id'] : ''; ?>">
                        <input type="submit" name="imgSubmit" id="upload" class="btn bg-green waves-effect" data-loading-text=" Loading... Mohon Tunggu Sebentar...!" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function deleteImage(id) {
        var result = confirm("Yakin Ingin Menghapus Gambar?");
        if (result) {
            $.post("<?php echo base_url('Admin/deleteImage'); ?>", {
                id: id
            }, function(resp) {
                if (resp == 'ok') {
                    $('#imgb_' + id).remove();
                    alert('Gambar Berhasil Dihapus Dari gallery');
                } else {
                    alert('Ooops!!! Ada Masalah , Mohon Coba Kembali.');
                }
            });
        }
    }
</script>
<!-- loading button -->
<script>
    $('#upload').on('click', function() {
        var $btn = $(this).button('loading')
        // business logic...
        $btn.button('loading')
    })
</script>