@extends('nelayan.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Ikan {{ $data->id_ikan }}</h5>

		<form method="post" action="{{ route('ikan.update', $data->id_ikan) }}">
			@csrf
            <div class="mb-3">
                <label for="id_ikan" class="form-label">ID Ikan</label>
                <input type="text" class="form-control" id="id_ikan" name="id_ikan" value="{{ $data->id_ikan }}">
            </div>
			<div class="mb-3">
                <label for="nama_ikan" class="form-label">Nama ikan</label>
                <input type="text" class="form-control" id="nama_ikan" name="nama_ikan" value="{{ $data->nama_ikan }}">
            </div>
            <div class="mb-3">
                <label for="berat_ikan" class="form-label">Berat Ikan</label>
                <input type="text" class="form-control" id="berat_ikan" name="berat_ikan" value="{{ $data->berat_ikan }}">
            </div>
            <div class="mb-3">
                <label for="id_nelayan" class="form-label">ID Nelayan</label>
                <input type="text" class="form-control" id="id_nelayan" name="id_nelayan" value="{{ $data->id_nelayan }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
