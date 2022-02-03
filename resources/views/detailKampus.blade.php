@extends('layouts.main')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@section('content')
<div class="container">
    <div id="buildingData" class="row">
        @foreach($detailKampus as $detailKampus)
        <div class="card " style="width: 15rem;">
                {{-- <div class="inner">
                    <img class="card-img" src="{{ asset('uploads/' . $detailKampus->namaKampus) }}">
                </div> --}}
                <div class="card-body">
                    <span class="e53_74">{{ $detailKampus['namaKampus'] }}</span><br>
                    <span class="e53_74">{{ $detailKampus['alamatKampus'] }}</span><br>
                    <span class="e53_76">{{ $detailKampus['namaKelurahan'] }}</span><br>
                    <span class="e53_77">{{ $detailKampus['namaKecamatan'] }}</span><br>
                </div>
        </div>
        @endforeach
    </div>
</div>
<br>
@endsection