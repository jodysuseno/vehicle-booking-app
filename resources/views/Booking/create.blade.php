@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="{{ route('booking.store') }}">
      @csrf
      <div class="tile">
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Booking Code</label>
            <input class="form-control @error('booking_code') is-invalid @enderror" value="{{ old('booking_code') }}" name="booking_code" value="" type="text">
          </div>
          @error('booking_code')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Employee Id</label>
            <input class="form-control @error('employee_id') is-invalid @enderror" value="{{ old('employee_id') }}" name="employee_id" type="text">
          </div>
          @error('employee_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Employee Name</label>
            <input class="form-control @error('employee_name') is-invalid @enderror" value="{{ old('employee_name') }}" name="employee_name" type="text">
          </div>
          @error('employee_name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Start Date</label>
            <input class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" id="demoDate" type="text" name="start_date" placeholder="Select Date">
          </div>
          @error('start_date')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">End Date</label>
            <input class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" id="demoDate1" type="text" name="end_date" placeholder="Select Date">
          </div>
          @error('end_date')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="exampleSelect2">Vehicle</label>
          <select name="vehicle_id" class="form-control selectpicker @error('vehicle_id') is-invalid @enderror" value="{{ old('vehicle_id') }}" data-live-search="true">
            @foreach ($vehicles as $vehicle)
              <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleSelect2">Driver</label>
          <select name="driver_id" class="form-control selectpicker @error('driver_id') is-invalid @enderror" value="{{ old('driver_id') }}" data-live-search="true">
            @foreach ($drivers as $driver)
              <option value="{{ $driver->id }}">{{ $driver->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleSelect2">Approver</label>
          <select name="user_approval_id" class="form-control selectpicker @error('user_approval_id') is-invalid @enderror" value="{{ old('user_approval_id') }}" data-live-search="true">
            @foreach ($approvers as $approver)
              <option value="{{ $approver->id }}">{{ $approver->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="tile-footer">
          <button class="btn btn-primary" type="sublit"><i
              class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
          &nbsp;&nbsp;&nbsp;
          <button class="btn btn-primary" type="reset"><i
              class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
          {{-- <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a> --}}
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
