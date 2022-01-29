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
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                            <!-- Nav tabs -->
                            <ul class=" row clearfix nav nav-tabs tab-nav-right p-l-10 p-r-10" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#kat0_animation_1" data-toggle="tab">
                                        <i class="material-icons">camera_roll</i> 75
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#kat1_animation_1" data-toggle="tab">
                                        <i class="material-icons">photo_album</i> 300
                                    </a>
                                </li>
                                <li role="presentation" class="row">
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
                                <!-- tab kategori 0 -->
                                <div role="tabpanel" class="tab-pane animated lightSpeedIn active" id="kat0_animation_1">
                                    <div class="row clearfix">
                                        <div class="row input-group p-l-25">
                                            <div class="form-line">
                                                <input type="text" name="filter" id="filter" placeholder="Pilih Tanggal" class="datepicker form-control" />
                                            </div>
                                        </div>
                                        <!-- Tempat munculnya tabel & looping -->
                                        <div id="result"></div>
                                        <div style="color: both;"></div>
                                    </div>
                                    <!-- akhir konten -->
                                </div>
                                <!-- tab kategori 1 -->
                                <div role="tabpanel" class="tab-pane animated lightSpeedIn" id="kat1_animation_1">
                                    <div class="row clearfix">
                                        <div class="row input-group p-l-25">
                                            <div class="form-line">
                                                <input type="text" name="filter2" id="filter2" placeholder="Pilih Tanggal" class="datepicker form-control" />
                                            </div>
                                        </div>
                                        <!-- Tempat munculnya tabel & looping -->
                                        <div id="result2"></div>
                                        <div style="color: both;"></div>
                                    </div>
                                    <!-- akhir konten -->
                                </div>
                                <!-- tab kategori 2 -->
                                <div role="tabpanel" class="tab-pane animated lightSpeedIn" id="kat2_animation_2">
                                    <!-- Konten-->
                                    <div class="row clearfix">
                                        <div class="row input-group p-l-25">
                                            <div class="form-line">
                                                <input type="text" name="filter3" id="filter3" placeholder="Pilih Tanggal" class="datepicker form-control" />
                                            </div>
                                        </div>
                                        <!-- Tempat munculnya tabel & looping -->
                                        <div id="result3"></div>
                                        <div style="color: both;"></div>
                                    </div>
                                    <!-- akhir konten -->
                                </div>
                                <!-- tab kategori 3 -->
                                <div role="tabpanel" class="tab-pane animated lightSpeedIn" id="kat3_animation_1">
                                    <!-- Konten-->
                                    <div class="row clearfix">
                                        <div class="row input-group p-l-25">
                                            <div class="form-line">
                                                <input type="text" name="filter4" id="filter4" placeholder="Pilih Tanggal" class="datepicker form-control" />
                                            </div>
                                        </div>
                                        <!-- Tempat munculnya tabel & looping -->
                                        <div id="result4"></div>
                                        <div style="color: both;"></div>
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
<!-- Ajax pemanggilan dato ke kontroler kadar 75 -->
<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>Manage_gallery/filter",
                method: "POST",
                dataType: 'html',
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            })
        }
        $('#filter').change(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>

<!-- Ajax pemanggilan dato ke kontroler kadar 300 -->
<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>Manage_gallery/filter2",
                method: "POST",
                dataType: 'html',
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result2').html(data);
                }
            })
        }
        $('#filter2').change(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>

<!-- Ajax pemanggilan dato ke kontroler kadar 420 -->
<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>Manage_gallery/filter3",
                method: "POST",
                dataType: 'html',
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result3').html(data);
                }
            })
        }
        $('#filter3').change(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>
<!-- Ajax pemanggilan dato ke kontroler kadar 700 -->
<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "<?php echo base_url(); ?>Manage_gallery/filter4",
                method: "POST",
                dataType: 'html',
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result4').html(data);
                }
            })
        }
        $('#filter4').change(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>