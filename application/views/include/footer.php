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
  var table = "";
  var base_cname = "<?php echo base_url() ?>";
  var data_today = [];
  var data_yesterday = [];
  var isToday = true;

  var mode      = 'index'
  var intersect = true;
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  $(function(){
    today();
    datepick();
  })

  var canvas = $('#visitors-chart')
  var chart  = new Chart(canvas, {
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
    });

  function datepick(){
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    })
  }

  function loadChart(data_today){
    chart  = new Chart(canvas, {
      data   : {
        labels  : ['00.00', '01.00', '02.00', '03.00', '04.00', '05.00', '06.00',
        '07.00','08.00','09.00','10.00','11.00','12.00','13.00',
        '14.00','15.00','16.00','17.00','18.00','19.00','20.00',
        '21.00', '22.00', '23.00'
        ],
        datasets: [
        {
          type                : 'line',
          data                : data_today,
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

  function loadChartToday() {
    chart.destroy();
    $.getJSON('<?php echo base_url('api/chart/get_today') ?>', function(data) {
      $.each(data, function(index) {
        data_today.push(data[index])
      });
    });
    loadChart(data_today);
  }

  function today(){
    isToday = true;
    loadChartToday();
    var table = $("#example1").DataTable({
      "destroy" : true,
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

    if (isToday) {
      setInterval( function () {
        table.ajax.reload();
        // loadChartToday();
      }, 30000 );
    }
  }

  function get_by_date(){
    var date_search = $("input[name='datepicker']").val();
    if (date_search == "") {

    }else {
      isToday = false;
      $.ajax({
       type: "POST",
       url: '<?php echo base_url('api/chart/get_by_date') ?>',
       data: {date_search:date_search},
       success: function(response){
        var json = $.parseJSON(response);
        date_today = [];
        chart.destroy();
        loadChart(json.chart);

        var table = $("#example1").DataTable({
          "destroy" : true,
          "data": json.table,
          "dataSrc": "table",
          "columns": [
          { data: 'no'},
          { data: 'date' },
          { data: 'time' },
          { data: 'suhu' }
          ]
        });
      }
    });
    }
  }

</script> 

</html>