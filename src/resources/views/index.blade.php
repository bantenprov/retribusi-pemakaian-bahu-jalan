@extends('master')
@section('content')
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Tarif
            <a href="{{ route('tarif.create') }}" class="float-right">
              <button type="button" class="btn btn-warning">Add new</button>
            </a>&nbsp;
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Uraian</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Wilayah Kota</th>
                  <th scope="col">Wilayah Kabupaten</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tarifs as $key=>$tarif)
                <tr>
                  <th scope="row" uuid="{{$tarif->id}}">{{ ++$key }}</th>
                  <td>{{$tarif->uraian}}</td>
                  <td>{{$tarif->satuan}}</td>
                  <td>{{$tarif->wilayah_kota}}</td>
                  <td>{{$tarif->wilayah_kabupaten}}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{ route('opd.add.child',$tarif->id) }}">
                        <button type="button" class="btn btn-primary">Add child</button>
                      </a>&nbsp;                    
                      <a href="{{ route('tarif.edit',$tarif->id) }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                      </a>&nbsp;
                      <form action="{{route('tarif.destroy',$tarif->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <nav>
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!--/.col-->
    </div>
    <!--/.row-->
  </div>
</div>

@endsection
