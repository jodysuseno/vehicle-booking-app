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
        <a href="/driver/create" class="btn btn-primary btn-sm"><i class="icon fa fa-plus"></i> Create {{ $title }}</a><br><br>
        <div class="table-responsive">
          <table class="table table table-sm table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Id Card</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($drivers as $driver)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $driver->id_card }}</td>
                  <td>{{ $driver->name }}</td>
                  <td>{{ $driver->phone }}</td>
                  <td>{{ $driver->address }}</td>
                  <td>
                    <a href="/driver/{{ $driver->id }}/edit" class="btn btn-info btn-xs"><i class="icon fa fa-edit"></i> Update</a>
                    {{-- <a href="" class="btn btn-danger btn-xs"><i class="icon fa fa-trash"></i> Delete</a> --}}
                    <form class="d-inline" action="{{ route('driver.destroy',$driver->id) }}" 
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