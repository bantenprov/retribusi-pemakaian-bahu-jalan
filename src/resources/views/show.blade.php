@extends('master')
@section('content')
<div class="jumbotron text-center">
  <h1>{{ $customer->nama }}</h1>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><h2>{{ $customer->nama }}</h2></h5>
    <h6 class="card-subtitle mb-2 text-muted">Created : {{ $customer->created_at }}</h6>
    <hr />
    {{-- <p class="card-text">{{ $customer->description }}.</p> --}}

    <a href="{{ route('daftar-retribusi.create') }}">
      <button type="button" class="btn btn-success">Add New</button>
    </a>
    <a href="{{ route('daftar-retribusi.edit',$customer->id) }}">
      <button type="button" class="btn btn-warning">Edit</button>
    </a>
  </div>
</div>
@endsection
