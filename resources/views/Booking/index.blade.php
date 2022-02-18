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
        @if (auth()->user()->level == 'admin')
        <a href="{{ route('booking.create') }}" class="btn btn-primary btn-sm"><i class="icon fa fa-plus"></i> Create {{ $title }}</a><br><br>
        @endif
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
                @if (auth()->user()->level == 'admin')
                <th>approver</th>
                @endif
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
                  @if (auth()->user()->level == 'admin')
                  <td>{{ $booking->user_approval_name }}</td>
                  @endif
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
                    @if (auth()->user()->level == 'admin')
                      @if ($booking->status == 'pending')
                        <form class="d-inline" action="{{ route('booking.destroy',$booking->id) }}" 
                          method="POST" onsubmit="return confirm('Are you sure to delete the data?')">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i> Delete</button>
                        </form>
                      @elseif ($booking->status == 'rejected')
                        <form class="d-inline" action="{{ route('booking.destroy',$booking->id) }}" 
                          method="POST" onsubmit="return confirm('Are you sure to delete the data?')">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i> Delete</button>
                        </form>
                      @elseif ($booking->status == 'approved')
                        <form class="d-inline" action="/booking/{{ $booking->id }}/done" 
                          method="POST" onsubmit="return confirm('Are you sure to Confirm this Booking?')">
                          @method('patch')
                          @csrf
                          <button class="btn btn-primary btn-xs"><i class="icon fa fa-check"></i> Confirm</button>
                        </form>
                      @elseif ($booking->status == 'done')
                        <button 
                        class="btn btn-secondary btn-xs"
                        data-toggle="modal" 
                        data-target="#exampleModal" 
                        type="button"
                        id="detail"
                        data-booking_code = "{{ $booking->booking_code }}"
                        data-employee_name = "{{ $booking->employee_name }}"
                        data-start_date = "{{ $booking->start_date }}"
                        data-end_date = "{{ $booking->end_date }}"
                        data-vehicle_name = "{{ $booking->vehicle_name }}"
                        data-driver_name = "{{ $booking->driver_name }}"
                        ><i class="icon fa fa-eye"></i> Detail</button>
                      @endif
                    @elseif (auth()->user()->level == 'approver')
                      @if ($booking->status == 'pending')
                        <form class="d-inline" action="/booking/{{ $booking->id }}/approve" 
                          method="POST" onsubmit="return confirm('Are you sure to approve this booking?')">
                          @method('patch')
                          @csrf
                          <button class="btn btn-info btn-xs"><i class="icon fa fa-check"></i> Approve</button>
                        </form>
                        <form class="d-inline" action="/booking/{{ $booking->id }}/reject" 
                          method="POST" onsubmit="return confirm('Are you sure to reject this booking?')">
                          @method('patch')
                          @csrf
                          <button class="btn btn-danger btn-xs"><i class="icon fa fa-times-circle"></i> Reject</button>
                        </form>
                      @endif
                    @endif
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="sampleTable">
            <tbody>
              <tr>
                <td><b>Booking code</b></td>
                <td><span id="booking_code"></span></td>
              </tr>
              <tr>
                <td><b>Employee Name</b></td>
                <td><span id="employee_name"></span></td>
              </tr>
              <tr>
                <td><b>Date</b></td>
                <td>
                  Start : <span id="start_date"></span><br>
                  End : <span id="end_date"></span>
                </td>
              </tr>
              <tr>
                <td><b>Vehicle</b></td>
                <td><span id="vehicle_name"></span></td>
              </tr>
              <tr>
                <td><b>Driver</b></td>
                <td><span id="driver_name"></span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection