<main role="main">
  <section class=" text-center">
    <div class="container">
      <h1>Daftar Gallery Foto</h1>
      <a href="#" class="btn btn-primary my-3"><?php echo $title; ?></a>
    </div>
  </section>
  <!-- Display status message -->
  <?php if (!empty($success_msg)) { ?>
    <div class="col-xs-12">
      <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
  <?php } elseif (!empty($error_msg)) { ?>
    <div class="col-xs-12">
      <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
  <?php } ?>

  <!-- Custom Content -->
  <section class="content">
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>
              Katalog Gallery
            </h2>
          </div>
          <div class="body">
            <div class="row">
              <?php if (!empty($gallery)) {
                $i = 0;
                foreach ($gallery as $row) {
                  $i++;
                  $defaultImage = !empty($row['default_image']) ? '<img src="' . base_url() . 'uploads/images/' . $row['default_image'] . '" alt="" />' : '';
                  $statusLink = ($row['status'] == 1) ? site_url('manage_gallery/block/' . $row['id']) : site_url('manage_gallery/unblock/' . $row['id']);
              ?>
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <img src=""><?php echo $defaultImage; ?>
                      <div class="caption">
                        <h3><?php echo $i; ?>. <?php echo $row['title']; ?></h3>
                        <p>
                        <h3 class="text-muted"><?php echo $row['created']; ?></h3>
                        </p>
                        <p>
                          <a href="<?php echo base_url('manage_gallery/view/' . $row['id']); ?>" class="btn btn-primary waves-effect" role="button">Lihat Isi Thumnail</a> <span class="badge <?php echo ($row['status'] == 1) ? 'btn-success' : 'btn-danger'; ?>"><?php echo ($row['status'] == 1) ? 'Ready' : 'Not Ready'; ?></span>
                        </p>
                      </div>
                    </div>
                  </div>
                <?php }
              } else { ?>
                <tr>
                  <td colspan="6">Tidak Ada Gallery...</td>
                </tr>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- #END# Custom Content -->
</main>