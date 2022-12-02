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

            <h5 class="card-title fw-bolder mb-3">Tambah nelayan</h5>

            <form method="post" action="{{ route('nelayan.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_nelayan" class="form-label">ID Nelayan</label>
                    <input type="text" class="form-control" id="id_nelayan" name="id_nelayan">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Nelayan</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="asal" class="form-label">Asal</label>
                    <input type="text" class="form-control" id="stock" name="asal">
                </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Tambah" />
                </div>
            </form>
        </div>
    </div>

@stop
