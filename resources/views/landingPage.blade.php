
@extends('layouts.landing')

@section('title','DIMAS - Digital Marketing Service')

@section('bg-home','bg-primary')

@section('text-home','text-light')

@section('mainContent')
{{-- JOIN NOW --}}
<div class="landing row">
    <div class="col-1"> {{-- OFFSET--}} </div>
    <div class="col-md m-auto p-5">
        <h1>DIMAS</h1>
        <h3>Digital Marketing Service</h3>
        <p>Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor
            sit amet Lorem Ipsum dolor sit ametLorem Ipsum dolor sit amet</p>
        <a class="btn btn-success" role="button" href="{{route('/register')}}"> Mulai Bersama Kami</a>
    </div>
    <div class="col-md m-auto"><img src="assets/img/vector.png" class="img-fluid"></div>
</div>

{{-- Apa itu Dimas? --}}
<div class="row mt-5 ml-5">
    <h1>Apa Itu Dimas ?</h1>
</div>
<div class="row">
    <div class="col m-auto">
        <img src="assets/img/vector2.png" class="img-fluid">
    </div>
    <div class="col-md text-center m-auto">
        <div class="col-md">
            <h2>Digital Marketing service</h2>
        </div>
        <div class="col-md-12 p-4">
            <p>Digital marketing adalah suatu kegiatan pemasaran atau promosi sebuah brand atau produk
                menggunakan media digital atau internet.
                Tujuan digital marketing adalah untuk menarik konsumen dan calon konsumen secara cepat.
                Seperti yang kita tahu, penerimaan teknologi dan internet di masyarakat sangat luas sehingga
                tidak heran kegiatan pemasaran secara digital dijadikan pilihan utama oleh
                perusahaan-perusahaan.</p>
        </div>
    </div>
</div>

{{-- Our Service : Header--}}
<div class="row row-cols-1">
    <div class="col text-center">
        <h1>Layanan Kami</h1>
    </div>
    <div class="col">
        <hr style="width: 350px; background-color:  #aeebf3; height: 2px;">
    </div>
</div>

{{-- Our Service : Section --}}
<div class="row mt-3 btn-group-toggle" data-toggle="buttons">
    {{-- Social Media Monitoring --}}
    <div class="col-md-3">
        <center>
            <div id="smmm" class="card btn btn-outline-info">
                <input type="radio" name="service" hidden checked>
                <div class="card-body">
                    <h5 class="card-title">Pantauan Social Media</h5>
                    <h6 class="card-subtitle mb-2">Layanan Kami</h6>
                </div>
            </div>
        </center>
    </div>

    {{-- Building Website --}}
    <div class="col-md-3">
        <center>
            <div id="bwm" class="card btn btn-outline-info">
                <input type="radio" name="service" hidden>
                <div class="card-body">
                    <h5 class="card-title">Bangun Website</h5>
                    <h6 class="card-subtitle mb-2">Layanan Kami</h6>
                </div>
            </div>
        </center>
    </div>

    {{-- Thematic Posting --}}
    <div class="col-md-3">
        <center>
            <div id="tpm" class="card btn btn-outline-info">
                <input type="radio" name="service" hidden>
                <div class="card-body">
                    <h5 class="card-title">Unggahan Bertema</h5>
                    <h6 class="card-subtitle mb-2">Layanan Kami</h6>
                </div>
            </div>
        </center>
    </div>

    {{-- Schedule Posting --}}
    <div class="col-md-3">
        <center>
            <div id="spm" class="card btn btn-outline-info">
                <input type="radio" name="service" hidden>
                <div class="card-body">
                    <h5 class="card-title">Jadwal Unggahan</h5>
                    <h6 class="card-subtitle mb-2">Layanan Kami</h6>
                </div>
            </div>
        </center>
    </div>
</div>

<!-- View -->
<div class="row ">
    <!-- Social Media Monitoring -->
    <div class=" col mt-5" id="smm">
        <div class="row">
            <div class="col-md text-center m-auto">
                <img src="{{asset('assets/img/web1.png')}}" class="img-fluid p-5">
            </div>
            <div class="col m-auto">
                <div class="col text-center">
                    <h3>Pantauan Sosial Media</h3>
                </div>
                <div class="colp-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        .</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Building Website -->
    <div class=" col" id="bw" style="display: none;">
        <div class="row">
            <div class="col-md text-center m-auto">
                <img src="{{asset('assets/img/19199025.png')}}" class="img-fluid p-5">
            </div>
            <div class="col m-auto">
                <div class="col text-center">
                    <h3>Bangun Website</h3>
                </div>
                <div class="col p-4">
                    <p>Digital marketing adalah suatu kegiatan pemasaran atau promosi sebuah brand atau
                        produk menggunakan media digital atau internet.
                        Tujuan digital marketing adalah untuk menarik konsumen dan calon konsumen secara
                        cepat. Seperti yang kita tahu, penerimaan teknologi dan internet di masyarakat
                        sangat luas sehingga tidak heran kegiatan pemasaran secara digital dijadikan pilihan
                        utama oleh perusahaan-perusahaan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Thematic Posting -->
    <div class=" col mt-5" id="tp" style="display: none;">
        <div class="row">
            <div class="col-md text-center m-auto">
                <img src="{{asset('assets/img/3410348.jpg')}}" class="img-fluid p-5">
            </div>
            <div class="col m-auto">
                <div class="col text-center">
                    <h3>Unggahan Bertema</h3>
                </div>
                <div class="col p-4">
                    <p>Digital marketing adalah suatu kegiatan pemasaran atau promosi sebuah brand atau
                        produk menggunakan media digital atau internet.
                        Tujuan digital marketing adalah untuk menarik konsumen dan calon konsumen secara
                        cepat. Seperti yang kita tahu, penerimaan teknologi dan internet di masyarakat
                        sangat luas sehingga tidak heran kegiatan pemasaran secara digital dijadikan pilihan
                        utama oleh perusahaan-perusahaan.</p>
                </div>
            </div>
        </div>
    </div>

    <!--  Schedule Posting -->
    <div class=" col mt-5" id="sp" style="display: none;">
        <div class="row">
            <div class="col-md text-center m-auto">
                <img src="{{asset('assets/img/2473674.jpg')}}" class="img-fluid p-5">
            </div>
            <div class="col m-auto">
                <div class="col text-center">
                    <h3>Jadwal Unggahan</h3>
                </div>
                <div class="col p-4">
                    <p>Digital marketing adalah suatu kegiatan pemasaran atau promosi sebuah brand atau
                        produk menggunakan media digital atau internet.
                        Tujuan digital marketing adalah untuk menarik konsumen dan calon konsumen secara
                        cepat. Seperti yang kita tahu, penerimaan teknologi dan internet di masyarakat
                        sangat luas sehingga tidak heran kegiatan pemasaran secara digital dijadikan pilihan
                        utama oleh perusahaan-perusahaan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->
<!-- Introduce Us -->
<div class="row">
    <h1 style="margin-top: 30px; margin-left: 70px;">Introduce Us.</h1>
</div>
<!-- End -->
<!-- Introduce content -->
<div class="row mt-5 mb-5">
    <div class="col-md text-center m-auto">
        <img src="assets/img/rimas.png" width="250" height="250">
    </div>
    <div class="col" style="margin-top: 40px;">
        <div class="col text-center">
            <h3>Digital Marketing Agency</h3>
        </div>
        <div class="col p-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum
                dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                .</p>
        </div>
    </div>
    <!-- End -->
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('#smmm').click(function () {
        $('#smm').show();
        $('#bw').hide();
        $('#tp').hide();
        $('#sp').hide();
    });

    $('#bwm').click(function () {
        $('#bw').show();
        $('#smm').hide();
        $('#tp').hide();
        $('#sp').hide();
    });

    $('#tpm').click(function () {
        $('#tp').show();
        $('#bw').hide();
        $('#smm').hide();
        $('#sp').hide();
    });

    $('#spm').click(function () {
        $('#sp').show();
        $('#bw').hide();
        $('#tp').hide();
        $('#smm').hide();
    });
</script>
@endsection
