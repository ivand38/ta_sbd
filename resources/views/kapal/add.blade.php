@extends('nelayan.layout')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body">

            <h5 class="card-title fw-bolder mb-3">Tambah Kapal</h5>

            <form method="post" action="{{ route('kapal.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_kapal" class="form-label">ID Kapal</label>
                    <input type="text" class="form-control" id="id_kapal" name="id_kapal">
                </div>
                <div class="mb-3">
                    <label for="nama_kapal" class="form-label">Nama Kapal</label>
                    <input type="text" class="form-control" id="nama_kapal" name="nama_kapal">
                </div>
                <div class="mb-3">
                    <label for="tahun_kapal" class="form-label">Tahun Kapal</label>
                    <input type="text" class="form-control" id="tahun_kapal" name="tahun_kapal">
                </div>
                <div class="mb-3">
                    <label for="id_nelayan" class="form-label">ID Nelayan</label>
                    <input type="text" class="form-control" id="id_nelayan" name="id_nelayan">
                </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop
