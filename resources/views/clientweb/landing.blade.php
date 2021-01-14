@extends('clientweb.theme.dark')

@section('home', 'active')
@section('service', '')
@section('about', '')

@section('mainContent')
<div class="row jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">{{ $profile->nama_company }}</h1>
        <p class="lead">
            {{ $profile->slogan ? $profile->slogan : "Let's create a new World!" }}
        </p>
        <hr class="my-2">
        <p class="lead pt-2">
            <a class="btn btn-info btn-lg" href="{{ route('/client/about') }}" role="button">Learn More</a>
        </p>
    </div>
</div>

{{-- Header : About --}}
<div class="row mb-3 mt-3">
    <div class="col text-center">
        <h1>Siapakah Kami?</h1>
    </div>
</div>

<div class="row mb-3 row-cols-1 row-cols-sm-2">
    <div class="col m-auto text-center"><img src="{{asset('assets/img/3365131.jpg')}}" class="img-fluid p-5" alt=""
            height="500px" width="500px"></div>
    <div class="col m-auto pr-5 pl-5 pb-3">
        <h5>{{ $profile->description }}</h5>
    </div>
</div>

{{-- Section : Service --}}
<div class="row bg-info p-3">
    <div class="col">
        {{-- Header : Service --}}
        <div class="row mb-3 mt-3 text-white">
            <div class="col text-center">
                <h1>Layanan Terbaru</h1>
            </div>
        </div>

        {{-- Content : Service --}}
        <div class="row mb-3 mt-3">
            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                    
                    @foreach ($services as $service)
                    {{-- Item Example --}}
                    <div class="col mb-3">
                        <div class="card text-center">
                            <img class="card-img-top" width="150" height="300" src="{{ Storage::url($service->gambar_servis) }}" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ $service->nama_servis }}</h4>
                                <p class="card-text">{{ $service->deskripsi_servis }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Section : Product --}}
<div class="row p-3">
    <div class="col">
        {{-- Header : Product --}}
        <div class="row mb-3 mt-3">
            <div class="col text-center">
                <h1>Produk Terbaru</h1>
            </div>
        </div>
        
        {{-- Content : Product --}}
        <div class="row mb-3 mt-3">
            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">

                    @foreach ($products as $product)
                    {{-- Item Example --}}
                    <div class="col mb-3">
                        <div class="card text-center">
                            <img class="card-img-top" width="150" height="300" src="{{ Storage::url($product->image) }}" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ $product->nama }}</h4>
                                <p class="card-text">{{ $product->deskripsi }}</p>
                                <h5 class="card-text">Rp. {{ number_format($product->harga,2,',','.') }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
