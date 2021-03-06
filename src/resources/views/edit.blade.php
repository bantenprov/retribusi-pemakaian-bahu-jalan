
@extends('master')
@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <h1>Edit Tarif</h1>
        <hr>
        <div class="card">
          <div class="card-header">
            <strong>Tarif</strong>
          </div>
          <div class="card-body">
            <form action="{{route('tarif.update', $tarif->id)}}" method="post">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}

              <div class="form-group">
								<label for="nama">Uraian</label>
								<input type="text" value="{{ $tarif->uraian }}" class="form-control" id="uraian" name="uraian">
							</div>

              <div class="form-group">
                <label for="satuan">Satuan</label>
                <select id="satuan" name="satuan" class="form-control form-control">
                  <option value="">Please select</option>
                  <option value="m/tahun" {{ ($tarif->satuan == 'm/tahun') ? 'selected' : ''}}>m/tahun</option>
                  <option value="titik/tahun" {{ ($tarif->satuan == 'titik/tahun') ? 'selected' : ''}}>titik/tahun</option>
                  <option value="m2/tahun" {{ ($tarif->satuan == 'm2/tahun') ? 'selected' : ''}}>m2/tahun</option>
                </select>
              </div>
              <div class="form-group">
              <label for="master_tarif_id">Master Tarif</label>
              <select id="master_tarif_id" name="master_tarif_id" class="form-control form-control">
                <option value="">Please select</option>
                @foreach ($mastertarifs as $mastertarif)
                  <option value="{{$mastertarif->id}}" {{ ($mastertarif->id == $tarif->master_tarif_id) ? 'selected' : '' }}>{{$mastertarif->nama}}</option>    
                @endforeach
              </select>
            </div>

              <div class="form-group">
                <input type="checkbox" id="tarif" name="tarif" @if ($tarif->tarif == 1) checked="checked" @else '' @endif />
                <label for="tarif">Ada Tarif</label>
              </div>

              <div class="form-group">
								<label for="wilayah_kota">Wilayah Kota</label>
								<input type="number" class="form-control" id="wilayah_kota" value="{{ $tarif->wilayah_kota }}" name="wilayah_kota">
							</div>

              <div class="form-group">
								<label for="wilayah_kabupaten">Wilayah Kabupaten</label>
								<input type="number" class="form-control" id="wilayah_kabupaten" value="{{ $tarif->wilayah_kabupaten }}" name="wilayah_kabupaten">
							</div>

               @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
