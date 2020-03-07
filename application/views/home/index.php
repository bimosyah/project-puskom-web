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
              <h1 class="m-0 text-dark">Dashboard</h1>
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
                    <h3 class="card-title">Filter</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-8">
                      <form action="Api/Chart/get_today" id="form-filter" method="post" accept-charset="utf-8">
                        <div class="form-group">
                          <label>Pilih Tanggal</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control datepicker" name="datepicker" id="datepicker" onchange="get_by_date()">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Data Hari Ini</label>
                          <button type="button" class="btn btn-block bg-gradient-primary" onclick="today()">Klik</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Grafik Suhu</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Tabel Suhu</h3>
                  <div class="card-tools">                    
                  </div>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Suhu</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
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