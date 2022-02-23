@extends('temp.main')

@section('container')
<div class="app-title">
  <div>
    <h1><i class="{{ $icon }}"></i> {{ $title }}</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="{{ route('vehicle.update', $vehicle->id) }}">
      @method('patch')
      @csrf
      <div class="tile">
        <div class="tile-body">
          <div class="form-group">
            <label class="control-label">Plat Nomor</label>
            <input class="form-control @error('plate_number') is-invalid @enderror" value="{{ old('plate_number', $vehicle->plate_number) }}" name="plate_number" type="text">
            @error('plate_number')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$vehicle->name) }}" name="name" type="text">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Type</label>
            <select class="form-control @error('type') is-invalid @enderror" value="{{ old('type',$vehicle->type) }}" name="type" id="exampleSelect1">
              <option value="people transportation">people transportation</option>
              <option value="freight transport">freight transport</option>
            </select>
            @error('type')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Ownership</label>
            <select class="form-control @error('ownership') is-invalid @enderror" value="{{ old('ownership',$vehicle->ownership) }}" name="ownership" id="exampleSelect1">
              <option value="has own">has own</option>
              <option value="rent">rent</option>
            </select>
            @error('ownership')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">Tahun</label>
            <input class="form-control @error('years') is-invalid @enderror" value="{{ old('years',$vehicle->years) }}" name="years" type="number">
            @error('years')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
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
