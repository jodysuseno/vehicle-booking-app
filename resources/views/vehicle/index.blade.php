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
        <a href="/vehicle/create" class="btn btn-primary btn-sm"><i class="icon fa fa-plus"></i> Create {{ $title }}</a><br><br>
        <div class="table-responsive">
          <table class="table table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Number Plate</th>
                <th>Name</th>
                <th>Type</th>
                <th>Owenership</th>
                <th>Years</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($vehicles as $vehicle)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $vehicle->plate_number }}</td>
                  <td>{{ $vehicle->name }}</td>
                  <td>{{ $vehicle->type }}</td>
                  <td>{{ $vehicle->ownership }}</td>
                  <td>{{ $vehicle->years }}</td>
                  <td>
                    <a href="/vehicle/{{ $vehicle->id }}/edit" class="btn btn-info btn-xs"><i class="icon fa fa-edit"></i> Update</a>
                    {{-- <a href="" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i> Delete</a> --}}
                    <form class="d-inline" action="{{ route('vehicle.destroy',$vehicle->id) }}" 
                      method="POST" onsubmit="return confirm('Are you sure to delete the data?')">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i> Delete</button>
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