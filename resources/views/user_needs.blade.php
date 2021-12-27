@extends('layouts_user.main')

@section('content')
<div class="search-form wow pulse px-3 d-flex justify-content-center" data-wow-delay="0.8s">
<form action="{{ route('rekomendasi') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <p class="paragraf">Pilih Tipe Bangunan Yang ingin Dicari:</p>
        <div class="form-group px-3">
            <select name="tipe_id" class="selectpicker show-tick form-control">
                <option selected="selected">-Tipe-</option>
                @foreach ($tipeBangunan as $tipeBangunan)
                <option value="{{ $tipeBangunan->tipe_id }}">{{ $tipeBangunan->nama_tipe }}</option>
                @endforeach
            </select>
        </div>
        
    <p class="paragraf">Pilih Kota Mana yang Ingin Dicari</p>
        <div class="form-group px-3">
            <select name="kk_id" class="selectpicker show-tick form-control">
                <option selected="selected">-Kota/Daerah-</option>
                @foreach ($cities as $cities)
                <option value="{{ $cities->kk_id }}"> {{ $cities->nama_kk   }}</option>
                @endforeach
            </select>
        </div>   
    <p class="paragraf">Masukan Harga Minumum dan Maksimum</p>
    <div class="slider-harga"><span>from
        <input name="minval" type="number" value="5000" min="0" max="99999999"/> to
        <input name="maxval" type="number" value="50000" min="0" max="99999999"/></span>
        <input value="25000" min="0" max="99999999" step="500" type="range"/>
        <input value="50000" min="0" max="99999999" step="500" type="range"/>
        <svg width="100%" height="24">
            <line x1="4" y1="0" x2="300" y2="0" stroke="#212121" stroke-width="12" stroke-dasharray="1 28"></line>
        </svg>
    </div>
        
        <div class="form-group">
            <label for="keterangan_fasilitas">Fasilitas</label>
            <input class="form-control " type="text" name="keterangan_fasilitas" id="keterangan_fasilitas" placeholder="Masukan Fasilitas" />
            <div class="invalid-feedback">
            </div>
        </div>

    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<script src="{{ asset('js/price-range.js') }}"></script>

@endsection
