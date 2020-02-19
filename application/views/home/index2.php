<?php $this->load->view('include/header'); ?>
<?php //$this->load->view('include/sidebar'); ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
        </li>
      </ul>
    </nav>
    

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="<?php echo base_url() ?>" class="brand-link">
        <img src="<?php echo base_url('assets/img/AdminLTELogo.png"') ?>"class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url('assets/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?php echo base_url() ?>" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

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
                      <!-- <form action="http://dp3akabupatenmalang.com/dp3a/Dashboard/get_table_pengaduan" id="form-filter" method="post" accept-charset="utf-8"> -->
                        <?php echo form_open('Api/Chart/get_today'); ?>
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
                          <button type="submit" class="btn btn-block bg-gradient-primary" id="dashboard-submit">Klik</button>
                        </div>
                      </div>
                      <?php form_close(); ?>
                      <!-- </form> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Grafik Suhu</h3>
                      <a href="javascript:void(0);">Lihat Laporan</a>
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
                    <h3 class="card-title">Tabel Suhu Hari Ini</h3>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                      </a>
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                      </a>
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
    <script>
      var table = "";
      var base_cname = <?php echo base_url(); ?>;
      $(document).ready(function(){

        var table_url = $('#table-data').data('url');
        table = $('#table-data').DataTable({
          orderCellsTop : true,
          responsive : true,
          dom: "'B<'row'<'col-6'l><'col-6'f>>rtip'",
          scrollY: true,
          scrollX: true,
          buttons: [
          {
            extend: 'excelHtml5',
            className : 'mb-2',
            title : 'Report Pengaduan Kategori ' + id_kategori + ' Pada Tahun ' + '\n' + waktu_lapor,
          },
          {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            className : 'mb-2',
            title: 'Report Pengaduan Kategori ' + id_kategori + ' Pada Tahun ' + '\n' + waktu_lapor,
            customize: function(doc) {
              doc.styles.title = {
                alignment: 'center'
              }
            }
          },
          ],
          "ajax": {
            'url': table_url,
          },
          "columns": [
          {
            "title" : "No",
            "width" : "15px",
            "data": null,
            "class": "text-center",
            render: (data, type, row, meta) => {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { 
            "title" : "Nama Kategori",
            data : (data, type, row, meta) => {
              ret = "";
              if(data.id_kategori == '1'){
                ret += 'Fisik';
              }else 
              if(data.id_kategori == '2'){
                ret += 'Psikis';
              }else 
              if(data.id_kategori == '3'){
                ret += 'Seksual';
              }else 
              if(data.id_kategori == '4'){
                ret += 'Eksploitasi';
              }else 
              if(data.id_kategori == '5'){
                ret += 'Trafficking';
              }else 
              if(data.id_kategori == '6'){
                ret += 'Penelantaran';
              }else{
                ret += 'Lainnya';
              }
              return ret;
            } 
          },
          { 
            "title" : "Sudah Teratasi",
            "class": "text-center",
            "data": "jumlah_direspon" 
          },
          { 
            "title" : "Belum Direspon",
            "class": "text-center",
            "data": "jumlah_blm_direspon" 
          },
          ]
        });

        $("form#form-filter").submit(function(e) {
          e.preventDefault();
          var formData = new FormData(this);
          var url = $(this).attr('action');
          $.ajax({
            url : url,
            type: 'POST',
            data: formData,
            success: function (data) {
              var json = $.parseJSON(data);
              reload_table(json.data);
            },
            cache: false,
            contentType: false,
            processData: false
          });
        });

        $('#dashboard-submit').click();
        $( "#dashboard-submit" ).click(function() {
          draw_chart($(this).val());
        });

        var reload_table = (data) => {
          table.clear();
          table.rows.add(data);
          table.draw();
        } 
      });

      var draw_chart = () => {

        var kategori = document.getElementById("select-kategori");
        var id_kategori = kategori.options[kategori.selectedIndex].value;
        var nama_kategori = "";
        if(id_kategori == 1){
          nama_kategori = "Fisik";
        } else if(id_kategori == 2){
          nama_kategori = "Psikis";
        } else if(id_kategori == 3){
          nama_kategori = "Seksual";
        } else if(id_kategori == 4){
          nama_kategori = "Eksploitasi";
        } else if(id_kategori == 5){
          nama_kategori = "Trafficking";
        } else if(id_kategori == 6){
          nama_kategori = "Penelantaran";
        } else if(id_kategori == 7){
          nama_kategori = "Lainnya";
        } else if(id_kategori == 0){
          nama_kategori = "Semua Kategori";
        } 

        var tahun = document.getElementById("select-tahun");
        var waktu_lapor = tahun.options[tahun.selectedIndex].value;
        var nama_tahun = "";
        if(waktu_lapor != 0){
          nama_tahun = tahun.options[tahun.selectedIndex].value;
        } else {
          nama_tahun = "Semua";
        }

        $.ajax({
          url: base_cname+"/get_chart_pengaduan",
          type: 'POST',
          data: {id_kategori:id_kategori,waktu_lapor:waktu_lapor},
          success: function (data) {
            var json = $.parseJSON(data);
            var ctx = document.getElementById('bar_pengaduan').getContext('2d');

            var datasets = [];
            Object.keys(json.label).forEach(function(key) {
              datasets.push({
                label: json.label[key],
                backgroundColor: json.backgroundColor[key],
                borderColor: json.borderColor[key],
                data: json.data[key],
                borderWidth : 1,
              });
            })

            var optionBar = {
              title: {
                display: true,
                text: ['Grafik Pengaduan Kategori ' + nama_kategori,'Tahun ' + nama_tahun ],
                fontSize: 14,
                lineHeight: 2,
              },
              tooltips: {
                mode: 'index',
                intersect: false
              },
              responsive: true,
              scales: {
                xAxes: [{
                  stacked: true,
                }],
                yAxes: [{
                  ticks: {
                    stepSize: 1
                  },
                  stacked: true
                }]
              },

            }
            var data = {
              labels: json.labels,
              datasets: datasets,
            };

            if(window.chart1 != undefined){
              window.chart1.destroy(); 
            }

            window.chart1 = new Chart(ctx, {
              type: 'bar',

              data: data,

              options: optionBar
            });

          }
        });
      }

      var reload_table = (data) => {
        table.clear();
        table.rows.add(data);
        table.draw();
      }

    </script>