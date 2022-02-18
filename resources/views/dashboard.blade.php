@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-lg-3">
    <div class="widget-small primary coloured-icon"><i class="icon fa fa-th fa-3x"></i>
      <div class="info">
        <h4>Item</h4>
        <p><b>5</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small info coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
      <div class="info">
        <h4>Supplier</h4>
        <p><b>25</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small warning coloured-icon"><i class="icon fa fa-users fa-3x"></i>
      <div class="info">
        <h4>Customer</h4>
        <p><b>10</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small danger coloured-icon"><i class="icon fa fa-user-plus fa-3x"></i>
      <div class="info">
        <h4>Users</h4>
        <p><b>500</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Pemakainan Kendaraan</h3>
      {{-- <div class="embed-responsive embed-responsive-16by9"> --}}
        {{-- <canvas class="embed-responsive-item" id="barChartDemo"></canvas> --}}
        <canvas id="myChart" style="height: 50%"></canvas>
      {{-- </div> --}}
    </div>
  </div>
</div>  
  
<script>
  var xValues = [
    @foreach ($bookings as $booking)
      {{ date_format(date_create($booking->start_date), 'd') }}+'/'+{{ date_format(date_create($booking->start_date), 'm') }}+'/'+{{ date_format(date_create($booking->start_date), 'Y') }},
    @endforeach
  ];

  var yValues = [
    @foreach ($bookings as $booking)
      {{ $booking->jml }},
    @endforeach
  ];


  var barColors = "green";

  new Chart("myChart", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Grafik Pemakainan Kendaraan Perhari"
      }
    }
  });
</script>

@endsection