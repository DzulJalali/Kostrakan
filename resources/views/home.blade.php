@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/littlebar.css')}}">
<link rel="stylesheet" href="{{asset('css/styles.css')}}">


<!-- Pencari wilayah -->
<div class="container-fluid">
    <center>
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
            <h2>Cari Kontrakan dan kosan</h2>
            <p class="p"> obat hati ada lima perkaranya
                yg pertama, baca Qur’an dan maknanya
                yang kedua, sholat malam dirikanlah
                yg ketiga, berkumpullah dng orang sholeh
                yg keempat, perbanyaklah berpuasa
                yg kelima, dzikir malam perpanjanglah
                salah satunya siapa bisa menjalani
                moga-moga Gusti Allah mencukupi!
            </p>
            <div class="search-form wow pulse px-3 d-flex justify-content-center" data-wow-delay="0.8s">
                <form action="" class=" form-inline">
                    <div class="form-group px-3">
                        <input type="text" class="form-control" placeholder="Keyword">
                    </div>
                    <div class="form-group px-3">
                        <select id="basic" class="selectpicker show-tick form-control">
                            <option selected="selected">-Kota/Daerah-</option>
                            @foreach ($cities as $cities)
                            <option>{{ $cities->nama_kk }}</option>
                            @endforeach
                            <!-- DISINI NTAR BUAT DATABASE WILAYAH -->
                        </select>
                    </div>
                    <div class="form-group px-3">
                        <select id="basic" class="selectpicker show-tick form-control">
                            <option selected="selected">-Kategori-</option>
                            @foreach ($tipeBangunan as $tipeBangunan)
                            <option>{{ $tipeBangunan->nama_tipe }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </center>
</div>
<!-- End Pencari wilayah -->

@auth
<div class="container">
    <h3>Rekomendasi Tempat</h3>
    <div class="container">
        <div class="row">
            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                            @foreach($dataDaerah as $dataDaerah)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Daerah : {{ $dataDaerah['nama_daerah'] }}</h4>
                                            <p class="card-text">Kecamatan : {{ $dataDaerah['nama_kecamatan'] }}</p>
                                            <p class="card-text">Kelurahan : {{ $dataDaerah['nama_kelurahan'] }}</p>
                                            <p class="card-text">Dekat Dengan : {{ $dataDaerah['nearBy'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach   
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth

<div class="container">
    <h3>Kontrakan Dan Kos-Kosan</h3>
    <div class="row">
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
