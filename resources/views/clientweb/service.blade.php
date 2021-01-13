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
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                    {{-- Item Example --}}
                    <div class="col mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Title 1</h4>
                                <p class="card-text">Desc 1</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Title 2</h4>
                                <p class="card-text">Desc 2</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Title 3</h4>
                                <p class="card-text">Desc 3</p>
                            </div>
                        </div>
                    </div>
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
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mb-3">
                    {{-- Item Example --}}
                    <div class="col mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Title 1</h4>
                                <p class="card-text">Desc 1</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Title 2</h4>
                                <p class="card-text">Desc 2</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Title 3</h4>
                                <p class="card-text">Desc 3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
