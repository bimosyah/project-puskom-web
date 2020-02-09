    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/core/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assets/js/now-ui-dashboard.min.js?v=1.5.0') ?>" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php //echo base_url('assets/my/js/chart.js') ?>"></script>
  <!-- Data Table -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <!-- Datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <script>

    var data_today = [];

    $.getJSON('<?php echo base_url('api/chart/get_today') ?>', function(data) {
      $.each(data, function(index) {
        data_today.push(data[index])
      });
    });


    function filter_by_date(){
      $("#example").DataTable().destroy();

      date_search = document.getElementById("datepicker").value
      table = $("#example").DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
          url  : "<?php echo base_url('api/chart/get_by_date') ?>",
          type : "POST",
          data : {date_search:date_search},
          dataSrc:""
        }zz
      });
    }

    $(document).ready(function() {


      var table = $("#example").DataTable({
        "ajax":{
          "url": '<?php echo base_url('api/data/getData') ?>',
          "dataSrc" : ""
        },
        "columns": [
        { data: 'no'},
        { data: 'date' },
        { data: 'time' },
        { data: 'suhu' }
        ]
      });

      setInterval( function () {
        table.ajax.reload();
      }, 30000 );
    });





  </script>
</body>
</html>