<?php $this->load->view('include/header'); ?>
<?php //$this->load->view('include/sidebar'); ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    </nav>
    

  <?php $this->load->view('include/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">SMS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">

            <div class="col-lg-12">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                  </div>
                </div>
                <div class="card-body">
                  <h3>Nomor hp saat ini : <?php echo $nomer_hp ?></h3>
                  <h6>Diperbarui pada : <?php echo $diganti ?></h6>
                  <br>
                  <div class="row">
                    <div class="col-lg-8">
                      <?php echo form_open('sms/update'); ?>
                        <div class="form-group">
                          <label>Isi nomor yang baru (62xxx)</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-phone-alt"></i>
                              </span>
                            </div>
                            <input name="nomer_hp" type="number" class="form-control">  
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Ganti nomor</label>
                          <button type="submit" class="btn btn-block bg-gradient-primary">Klik</button>
                        </div>
                      </div>
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.2
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->
  <?php $this->load->view('include/footer'); ?>