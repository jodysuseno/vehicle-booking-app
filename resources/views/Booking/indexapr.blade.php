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
        @if (session('status'))
          <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                  <button class="close" type="button" data-dismiss="alert">×</button>{{ session('status') }}
              </div>
          </div>    
        @endif
        <a href="{{ route('booking.create') }}" class="btn btn-primary btn-sm"><i class="icon fa fa-plus"></i> Create {{ $title }}</a><br><br>
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
                <th>status</th>
                <th>Action</th>
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
                  <td align="center">
                    <span class="badge
                    @if ($booking->status == 'pending') 
                      badge-warning
                    @elseif ($booking->status == 'approved')
                      badge-success
                    @elseif ($booking->status == 'rejected')
                      badge-danger
                    @elseif ($booking->status == 'done')
                      badge-primary
                    @endif
                    ">{{ $booking->status }}</span>
                  </td>
                  <td align="center">
                    {{-- <a href="/booking/{{ $booking->id }}/edit" class="btn btn-info btn-xs"><i class="icon fa fa-edit"></i> Update</a> --}}
                    {{-- <a href="" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i> Delete</a> --}}
                    <form class="d-inline" action="{{ route('booking.destroy',$booking->id) }}" 
                      method="POST" onsubmit="return confirm('Are you sure to approve this booking?')">
                      @method('patch')
                      @csrf
                      <button class="btn btn-info btn-xs"><i class="icon fa fa-check"></i> Approve</button>
                    </form>
                    <form class="d-inline" action="{{ route('booking.destroy',$booking->id) }}" 
                      method="POST" onsubmit="return confirm('Are you sure to reject this booking?')">
                      @method('patch')
                      @csrf
                      <button class="btn btn-danger btn-xs"><i class="icon fa fa-times-circle"></i> Reject</button>
                    </form>
                  </td>
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