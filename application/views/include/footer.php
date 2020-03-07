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
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<!-- Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script>
  var table = "";
  var data_today = [];
  var label = [];
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
          },
          ticks    : $.extend({
            
            stepSize: 1.0
          }, ticksStyle)
        }],
        xAxes: [{
          gridLines: {
            display: true
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

  function loadChart(data_today,label){
    // chart.destroy();
    chart  = new Chart(canvas, {
      data   : {
        labels  : label,
        datasets: [
        {
          type                : 'line',
          data                : data_today,
          backgroundColor     : '#FF6384',
          borderColor         : '#FF6384',
          fill                : false
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
          },
          ticks    : $.extend({
            stepSize: 1.00
          }, ticksStyle)
        }],
        xAxes: [{
          gridLines: {
            display: true
          },
          ticks    : ticksStyle
        }]
      }
    }
  })


  }

  function loadChartToday() {
    // chart.destroy();
    // $.getJSON('<?php echo base_url('api/chart/get_today') ?>', function(data) {
    //   $.each(data, function(index) {
    //     data_today.push(data[index])
    //   });
    // });
    $.ajax({
        url: '<?php echo base_url('api/chart/get_today') ?>',
        type: "GET",
        dataType: 'JSON',
        success: function (data) {
            for (var x = 0; x < data.length; x++) {
                // content = data[x].Id;
                data_today.push(data[x].suhu)
                label.push(data[x].label);
               // updateListing(data[x]);
            }
            loadChart(data_today,label);
        }
    });
  }

  function today(){
    $("input[name='datepicker']").val("");
    data_today = [];
    label = [];
    isToday = true;
    loadChartToday();
    var table = $("#example1").DataTable({
      dom: 'Bfrtip',
      buttons: ['excel', 'pdf', 'print'],
      "destroy" : true,
      "processing": true,
      "ajax":{
        "url": '<?php echo base_url('api/chart/getData') ?>',
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
        data_today = [];
        label = [];
        chart.destroy();
        table.ajax.reload();
        loadChartToday();
      }, 1000 * 60 * 60 );
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
        loadChart(json.chart,json.label);

        var table = $("#example1").DataTable({
          "destroy" : true,
          "processing": true,
          dom: 'Bfrtip',
          buttons: ['excel', 'pdf', 'print'],
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