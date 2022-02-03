@extends('layouts.main')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@section('content')
<div class="container">
    <h3>Hasil Pencarian</h3>
    <div id="buildingData" class="row">
        @foreach($bangunan as $bangunan)
        <div class="card " style="width: 15rem;">
            <a href="/detail/{{ $bangunan->building_id }}" style="text-decoration: none;">
                <div class="inner">
                    <img class="card-img" src="{{ asset('uploads/' . $bangunan->gambar1) }}">
                </div>
                <div class="card-body">
                    <span class="e53_74">{{ $bangunan->harga }}</span><br>
                    <span class="e53_74">{{ $bangunan->nama_tipe }}</span><br>
                    <span class="e53_76">{{ $bangunan->alamat }}</span><br>
                    <span class="e53_77">{{ $bangunan->published_date }}</span><br>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection