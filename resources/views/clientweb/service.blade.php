@extends('clientweb.theme.dark')

@section('home', '')
@section('service', 'active')
@section('about', '')

@section('mainContent')

{{-- Section : Service --}}
<div class="row p-3">
    <div class="col">
        {{-- Header : Service --}}
        <div class="row mb-3 mt-3">
            <div class="col text-center">
                <h1>Layanan Kami</h1>
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
                <h1>Produk Kami</h1>
            </div>
        </div>
        
        {{-- Content : Product --}}
        <div class="row mb-3 mt-3">
            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 mb-4">

                    @foreach ($products as $product)
                    {{-- Item Example --}}
                    <div class="col mb-3">
                        <div class="card text-center">
                            <img class="card-img-top" width="150" height="300" src="{{ Storage::url($product->image) }}" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ $product->nama }}</h4>
                                <p class="card-text">{{ $product->deskripsi }}</p>
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
