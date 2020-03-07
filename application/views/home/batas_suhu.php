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
              <h1 class="m-0 text-dark">Batas Suhu</h1>
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
                  <h3>Suhu Bawah : <?php echo $suhu_bawah ?> °C</h3>
                  <h3>Suhu Atas : <?php echo $suhu_atas ?> °C</h3>
                  <h6>Diperbarui pada : <?php echo $diganti ?></h6>
                  <br>
                  <?php echo form_open('update-batas-suhu'); ?>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Suhu Bawah</label>
                        <div class="input-group">
                          <input name="suhu_bawah" type="number" class="form-control">  
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Suhu Atas</label>
                        <div class="input-group">
                          <input name="suhu_atas" type="number" class="form-control">  
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Update Suhu</label>
                        <button type="submit" class="btn btn-block bg-gradient-primary">Klik</button>
                      </div>
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