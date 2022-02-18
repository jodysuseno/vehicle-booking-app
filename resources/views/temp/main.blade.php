<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
  <meta property="og:description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <title>Larapos - {{ $title }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('valiadmin/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('valiadmin/css/custom.css')}}">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('valiadmin/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <style>
    .input_custom {
      border: 0px;
      background-color: transparent;
      border: transparent;
    }

    .input_custom:disabled,
    .input_custom[readonly] {
      /* border: 0px; */
      background-color: transparent;
      /* border: transparent; */
    }

    .tblnum tbody {
      counter-reset: row-num;
    }

    .tblnum tbody tr {
      counter-increment: row-num;
    }

    .tblnum tbody tr td:first-child::before {
      content: counter(row-num);
    }
  </style>
</head>

<body class="app sidebar-mini">
  <!-- Navbar-->
  <header class="app-header"><a class="app-header__logo" href="index.html">LaraPos</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
            class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
          <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
          <li><a class="dropdown-item" href="/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
  @include('temp.sidebar')
  <main class="app-content">
    
    @yield('container')

  </main>
  <!-- Essential javascripts for application to work-->
  <script src="{{ asset('valiadmin/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('valiadmin/js/popper.min.js')}}"></script>
  <script src="{{ asset('valiadmin/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('valiadmin/js/main.js')}}"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="{{ asset('valiadmin/js/plugins/pace.min.js')}}"></script>

  <!-- Page specific javascripts-->
  <!-- <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/chart.js')}}"></script> -->
  <!-- Page specific javascripts-->
  <!-- Data table plugin-->

  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <script type="text/javascript">$('#sampleTable1').DataTable();</script>
  <script type="text/javascript">$('#sampleTable2').DataTable();</script>
  <script type="text/javascript">$('#sampleTable3').DataTable();</script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/bootstrap-datepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/select2.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/bootstrap-datepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/dropzone.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdnjs.com/libraries/Chart.js"></script>

  <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
  </script>

  <script type="text/javascript">
    $('#sl').on('click', function () {
      $('#tl').loadingBtn();
      $('#tb').loadingBtn({ text: "Signing In" });
    });

    $('#el').on('click', function () {
      $('#tl').loadingBtnComplete();
      $('#tb').loadingBtnComplete({ html: "Sign In" });
    });

    $('#demoDate').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      todayHighlight: true
    });
    $('#demoDate1').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      todayHighlight: true
    });

    $(document).ready(function() {
      $(document).on('click', '#detail', function() {
        var booking_code = $(this).data('booking_code');
        var employee_name = $(this).data('employee_name');
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');
        var vehicle_name = $(this).data('vehicle_name');
        var driver_name = $(this).data('driver_name');

        $('#booking_code').text(booking_code);
        $('#employee_name').text(employee_name);
        $('#start_date').text(start_date);
        $('#end_date').text(end_date);
        $('#vehicle_name').text(vehicle_name);
        $('#driver_name').text(driver_name);
      });
    });
    

    $('#demoSelect1').select2();
    $('#demoSelect2').select2();
  </script>

  {{-- <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/chart.js')}}"></script>
  <script type="text/javascript">
    var data = {
      labels: ["January", "February", "March", "April", "May"],
      datasets: [
        {
          label: "My First dataset",
          fillColor: "rgba(220,220,220,0.2)",
          strokeColor: "rgba(220,220,220,1)",
          pointColor: "rgba(220,220,220,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [65, 59, 80, 81, 56]
        },
        {
          label: "My Second dataset",
          fillColor: "rgba(151,187,205,0.2)",
          strokeColor: "rgba(151,187,205,1)",
          pointColor: "rgba(151,187,205,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(151,187,205,1)",
          data: [28, 48, 40, 19, 86]
        }
      ]
    };
    var pdata = [
      {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
      },
      {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
      },
      {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
      }
    ]
    
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);
    
    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
    
    var ctxr = $("#radarChartDemo").get(0).getContext("2d");
    var radarChart = new Chart(ctxr).Radar(data);
    
    var ctxpo = $("#polarChartDemo").get(0).getContext("2d");
    var polarChart = new Chart(ctxpo).PolarArea(pdata);
    
    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
    var pieChart = new Chart(ctxp).Pie(pdata);
    
    var ctxd = $("#doughnutChartDemo").get(0).getContext("2d");
    var doughnutChart = new Chart(ctxd).Doughnut(pdata);
  </script>  --}}
  <!-- Google analytics script-->
  <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
          m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>

  
</body>

</html>