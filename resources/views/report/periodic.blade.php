@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <a href="/export" class="btn btn-primary btn-sm"><i class="icon fa fa-file"></i> Export Excel {{ $title }}</a><br><br>
        <div class="table-responsive">
          <table class="table table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Booking Code</th>
                <th>Employee Id</th>
                <th>Employee Name</th>
                <th>Date</th>
                <th>vehicle</th>
                <th>Driver</th>
                <th>approver</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bookings as $booking)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $booking->booking_code }}</td>
                  <td>{{ $booking->employee_id }}</td>
                  <td>{{ $booking->employee_name }}</td>
                  <td>{{ date_format(date_create($booking->start_date),"d/m/Y") }} - {{ date_format(date_create($booking->end_date),"d/m/Y") }}</td>
                  <td>{{ $booking->vehicle_name }}</td>
                  <td>{{ $booking->driver_name }}</td>
                  <td>{{ $booking->user_approval_name }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection