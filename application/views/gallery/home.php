<section class="content">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Pilih Toko Untuk Melihat Gallery
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <?php $no = 0;
                        foreach ($toko as $g) : $no++; ?>
                            <a href="<?php echo site_url('manage_gallery/katalog/'); ?>">
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <button class="btn bg-purple btn-lg btn-block waves-effect" type="button"><?php echo $g->nama_toko; ?></button>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# With Material Design Colors -->
</section>