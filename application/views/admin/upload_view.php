<section class="content">
    <div class="container-fluid">
            <div class="block-header">
                <h2>Upload Gambar Ke Gallery</h2>
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
                    <form action="<?php echo base_url('Upload/dragDropUpload/'); ?>" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                                <i class="material-icons">touch_app</i>
                            </div>
                                <h3>Drop files here or click to upload.</h3>
                                <em>(Pilih Foto  <strong>Atau</strong> Block foto Kemudian Tarik ke Dalam Kotak)</em>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>