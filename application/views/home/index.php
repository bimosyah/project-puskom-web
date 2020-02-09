<?php $this->load->view('include/header'); ?>
<?php //$this->load->view('include/sidebar'); ?>


<div class="container-fluid">
  <div class="content" style="margin-top: 20px">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-tasks">
          <div class="card-header ">
            <h4 class="card-title">Status Suhu</h4>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>Filter</label>
                  <input type="date" id="datepicker" class="form-control" onchange="filter_by_date();">
                </div>
              </div>
            </div>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Suhu</th>
                </tr>
              </thead>
            </table>

          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="now-ui-icons loader_refresh spin"></i> Updated every 30 second
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-tasks">
          <div class="card-header ">
            <h4 class="card-title">Chart</h4>
          </div>
          <div class="card-body ">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('include/footer'); ?>