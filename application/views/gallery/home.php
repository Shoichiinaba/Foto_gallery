<section class="content">
    <div class="row clearfix">
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                <div class="panel panel-col-purple">
                    <div class="panel-heading" role="tab" id="headingOne_17">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseOne_17" aria-expanded="true" aria-controls="collapseOne_17">
                                <center><img src="<?php echo base_url('assets/'); ?>images/lg3.ico" width="48" height="48" alt="User"> Pilih Toko Untuk Melihat Gallery</center>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne_17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_17">
                        <div class="panel-body">
                            <div class="row clearfix">
                                <?php $no = 0;
                                foreach ($toko as $g) : $no++; ?>
                                    <a href="<?php echo site_url('manage_gallery/katalog/'); ?>">
                                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 p-b-10">
                                            <button class="btn bg-purple btn-lg btn-block waves-effect" type="button">
                                                <i class=" material-icons">store</i>
                                                <span><?php echo $g->nama_toko; ?></span>
                                            </button>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>