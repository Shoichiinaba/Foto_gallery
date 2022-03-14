<section class="content">
    <div class="container-fluid">
        <!-- Image Gallery -->
        <div class="block-header text-left">
            <h2>
                <div class=" col-md-4 col-sm-6 col-xs-12"></div>
                GALLERY ( <?php echo !empty($gallery['title']) ? $gallery['title'] : ''; ?> )
                <small class=" ">All pictures</small>
            </h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-purple hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">access_alarm</i>
                    </div>
                    <div class="content">
                        <div class="text">Tanggal Upload</div>
                        <h4><?php echo !empty($gallery['created']) ? $gallery['created'] : ''; ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        </div>
                        <div class="body">
                            <div class="row">
                                <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                    <?php if (!empty($gallery['images'])) { ?>
                                        <?php foreach ($gallery['images'] as $imgRow) { ?>
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                <a href="<?php echo base_url('uploads/images/' . $imgRow['file_name']); ?>" data-sub-html="Foto By: Toko Mas Bintang">
                                                    <img class="img-responsive thumbnail" src="<?php echo base_url('uploads/images/' . $imgRow['file_name']); ?>">
                                                </a>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- <a href="<?php echo base_url('manage_gallery/katalog'); ?>">
                                <button type="button" class="btn bg-deep-orange waves-effect">
                                    <i class="material-icons">call_missed</i>
                                    <span>Back to List</span>
                                </button>
                            </a> -->
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const id = <?= $data->kode_user ?>;
    const result = <?= $data->no_tlp ?>;
    window.url_wa = "https://api.whatsapp.com/send?phone=" + result + "&text=Saya%20tertarik%20untuk%20membeli%20produk%20ini%20segera%20%20http%3A%2F%2Flocalhost%3A8080%2FFoto_gallery%2FManage_gallery%2Fview%2F79%23lg%3D1%26slide%3D0";
</script>