@extends('layouts_admin.main')

@section('title')
Edit Kecamatan {{$dataKecamatan['nama_kecamatan']}}
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <a href="{{route('kecamatan')}}" class="d-flex align-items-baseline">
        <i class="fas fa-long-arrow-alt-left"></i>
        <p class="ml-1">Back</p>
    </a>

    <!-- Page Heading -->

    <!-- Content Row -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card shadow">
        <div class="card-body">
            <form action="/kecamatan/update/{{$dataKecamatan['id_kecamatan']}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama_kecamatan">Nama Kecamatan</label>
                    <input type="text" class="form-control" name="nama_kecamatan" placeholder="Masukan Nama Kecamatan"
                        value="{{ $dataKecamatan['nama_kecamatan']}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection