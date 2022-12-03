@extends('nelayan.layout')

@section('content')

<p>Cari Data:</p>
<div class="pb-3">
    <form class="d-flex" action="{{ url('/') }}" method="get">
        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Cari</button>
    </form>
</div>

<h4 class="mt-5">Data Nelayan</h4>


<a href="{{ route('nelayan.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('nelayan.restore') }}" type="button" class="btn btn-success rounded-3">Restore Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Nelayan</th>
        <th>Nama Nelayan</th>
        <th>Asal Nelayan</th>
        <th>Action</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_nelayan }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->asal }}</td>
                <td>
                    <a href="{{ route('nelayan.edit', $data->id_nelayan) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_nelayan }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_nelayan }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('nelayan.delete', $data->id_nelayan) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $data->nama}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#softhapusModal{{ $data->id_nelayan }}">
                        Soft Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="softhapusModal{{ $data->id_nelayan }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('nelayan.softDelete', $data->id_nelayan) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $data->nama}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4 class="mt-5">Data Ikan</h4>

<a href="{{ route('ikan.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('ikan.restore') }}" type="button" class="btn btn-success rounded-3">Restore Data</a>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Ikan</th>
        <th>Nama Ikan</th>
        <th>Berat Ikan</th>
        <th>ID Nelayan</th>
        <th>Action</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($ikans as $ikan)
            <tr>
                <td>{{ $ikan->id_ikan }}</td>
                <td>{{ $ikan->nama_ikan }}</td>
                <td>{{ $ikan->berat_ikan }}</td>
                <td>{{ $ikan->id_nelayan }}</td>
                <td>
                    <a href="{{ route('ikan.edit', $ikan->id_ikan) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal2{{ $ikan->id_ikan }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal2{{ $ikan->id_ikan }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('ikan.delete', $ikan->id_ikan) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $ikan->nama_ikan}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#softhapusModal2{{ $ikan->id_ikan }}">
                        Soft Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="softhapusModal2{{ $ikan->id_ikan }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('ikan.softDelete', $ikan->id_ikan) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $ikan->nama_ikan}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4 class="mt-5">Data Kapal</h4>

<a href="{{ route('kapal.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('kapal.restore') }}" type="button" class="btn btn-success rounded-3">Restore Data</a>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Kapal</th>
        <th>Nama Kapal</th>
        <th>Tahun Kapal</th>
        <th>ID Nelayan</th>
        <th>Action</th>
      </tr>
    </thead>


    <tbody>
        @foreach ($kapals as $kapal)
            <tr>
                <td>{{ $kapal->id_kapal }}</td>
                <td>{{ $kapal->nama_kapal }}</td>
                <td>{{ $kapal->tahun_kapal }}</td>
                <td>{{ $kapal->id_nelayan }}</td>
                <td>
                    <a href="{{ route('kapal.edit', $kapal->id_kapal) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal3{{ $kapal->id_kapal }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal3{{ $kapal->id_kapal }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('kapal.delete', $kapal->id_kapal) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $kapal->nama_kapal}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#softhapusModal3{{ $kapal->id_kapal }}">
                        Soft Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="softhapusModal3{{ $kapal->id_kapal }}" tabindex="-1" aria-labelledby="softhapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softhapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('kapal.softDelete', $kapal->id_kapal) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus {{ $kapal->nama_kapal}} ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4 class="mt-5">Join Nelayan dan Ikan</h4>
<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Nama Nelayan</th>
        <th>Asal Nelayan</th>
        <th>Nama Ikan</th>
        <th>Berat Ikan</th>
      </tr>
    </thead>
<tbody>
    @foreach ($joins as $join)
        <tr>
            <td>{{ $join->nama }}</td>
            <td>{{ $join->asal }}</td>
            <td>{{ $join->nama_ikan }}</td>
            <td>{{ $join->berat_ikan }}</td>
    @endforeach
</tbody>
</table>

<h4 class="mt-5">Join Nelayan dan Kapal</h4>
<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Nama Nelayan</th>
        <th>Asal Nelayan</th>
        <th>Nama Kapal</th>
        <th>Tahun Kapal</th>
      </tr>
    </thead>
<tbody>
    @foreach ($joins2 as $join2)
        <tr>
            <td>{{ $join2->nama }}</td>
            <td>{{ $join2->asal }}</td>
            <td>{{ $join2->nama_kapal }}</td>
            <td>{{ $join2->tahun_kapal }}</td>
    @endforeach
</tbody>
</table>
@stop
