<section class="content">
  <!-- alert -->
  <!-- Display status message -->
  <div class="row clearfix">
    <?php if ($this->session->flashdata('sukses')) : ?>
      <div class="col-xs-12 col-lg-12">
        <div class="alert alert-success"><?php echo $this->session->flashdata('sukses'); ?></div>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('pas')) : ?>
      <div class="col-xs-12 col-lg-12">
        <div class="alert bg-green alert-dismissible" role="alert"><?php echo $this->session->flashdata('pas'); ?></div>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
      <div class="col-xs-12 col-lg-12">
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
      </div>
    <?php endif; ?>
  </div>
  <!-- akhir alert -->
  <!-- BREADCRUMBS -->
  <?php if ($userdata->role == 'Spv') { ?>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <ol class="breadcrumb breadcrumb-bg-indigo align-right">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="material-icons">home</i> Dashboard</a></li>
            <li><a href="<?php echo site_url('admin/list_admin'); ?>"><i class="material-icons">contacts</i> Profil</a></li>
          </ol>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <ol class="breadcrumb breadcrumb-bg-teal align-right">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="material-icons">home</i> Dashboard</a></li>
            <li><a href="<?php echo site_url('admin/list_admin'); ?>"><i class="material-icons">contacts</i> Profil</a></li>
          </ol>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-- content -->
  <div class="row">
    <!-- content profil -->
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header bg-indigo">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/'); ?>images/<?php echo $userdata->foto; ?>" alt="User profile picture">
            <h3 class="profile-username text-center"> <?php echo $userdata->nama; ?></h3>
            <p class="text-center"> <b class="align-left">Posisi :</b> &nbsp; <?php echo $userdata->role; ?></p>
          </div>
        </div>
        <div class="body">
          <li class="list-group-item">
            <b class="align-left">Username :</b> <a class="align-right"> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $userdata->username; ?></a>
          </li>
        </div>
      </div>
    </div>
    <!-- akhir profil -->
    <!-- content setting ubah password -->
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="card">
        <div class="body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#profile" data-toggle="tab">SETTING</a></li>
            <li role="presentation"><a href="#password" data-toggle="tab">UBAH PASSWORD</a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="profile">
              <form class="form-horizontal" action="<?php echo base_url('Profile/update') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $userdata->username; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputNama" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Name" name="nama" value="<?php echo $userdata->nama; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputNama" class="col-sm-2 control-label">No. Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="No. Phone" name="no_tlp" value="<?php echo $userdata->no_tlp; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputFoto" class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" placeholder="Foto" name="foto">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="m-l-15">
                    <button type="submit" class="btn bg-indigo waves-effect">
                      <i class="material-icons">save</i>
                      <span>SAVE</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="password">
              <form class="form-horizontal" action="<?php echo base_url('Profile/ubah_password') ?>" method="POST">
                <div class="form-group row">
                  <label for="passLama" class="col-sm-2 control-label">Password Lama</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Password Lama" name="passLama">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="m-l-15">
                    <button type="submit" class="btn bg-indigo waves-effect">
                      <i class="material-icons">save</i>
                      <span>SAVE</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- akhir konten setting -->
  </div>
  <!-- akhir konten -->
</section>