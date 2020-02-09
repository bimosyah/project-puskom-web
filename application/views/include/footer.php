<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('assets/js/adminlte.js') ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/demo.js') ?>"></script>
<!-- Data Table -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<!-- Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script>

  $(function(){
    var data_today = [];
    var data_yesterday = [];

    $.getJSON('<?php echo base_url('api/chart/get_today') ?>', function(data) {
      $.each(data, function(index) {
        data_today.push(data[index])
      });
    });

     $.getJSON('<?php echo base_url('api/chart/get_yesterday') ?>', function(data) {
      $.each(data, function(index) {
        data_yesterday.push(data[index])
      });
    });

    today();
    chart(data_today,data_yesterday);
  })

  function chart(data_today,data_yesterday){
    var mode      = 'index'
    var intersect = true;
    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
    var $visitorsChart = $('#visitors-chart')

    var visitorsChart  = new Chart($visitorsChart, {
      data   : {
        labels  : ['00.00', '01.00', '02.00', '03.00', '04.00', '05.00', '06.00',
        '07.00','08.00','09.00','10.00','11.00','12.00','13.00',
        '14.00','15.00','16.00','17.00','18.00','19.00','20.00',
        '21.00', '22.00', '23.00'
        ],
        datasets: [{
          type                : 'line',
          data                : data_today,
          backgroundColor     : 'transparent',
          borderColor         : '#007bff',
          pointBorderColor    : '#007bff',
          pointBackgroundColor: '#007bff',
          fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
      {
        type                : 'line',
        data                : data_yesterday,
        backgroundColor     : 'tansparent',
        borderColor         : '#ced4da',
        pointBorderColor    : '#ced4da',
        pointBackgroundColor: '#ced4da',
        fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: false
        },
        scales             : {
          yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 50
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

  }

  function today(){
    var table = $("#example1").DataTable({
      "ajax":{
        "url": '<?php echo base_url('api/data/getData') ?>',
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
  }




  function filter_by_date(){
      // $("#example").DataTable().destroy();

      // date_search = document.getElementById("datepicker").value
      // table = $("#example").DataTable({
      //   "processing" : true,
      //   "serverSide" : true,
      //   "order" : [],
      //   "ajax" : {
      //     url  : "<?php echo base_url('api/chart/get_by_date') ?>",
      //     type : "POST",
      //     data : {date_search:date_search},
      //     dataSrc:""
      //   }
      // });
    }
  </script>
</html>