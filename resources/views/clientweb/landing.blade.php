@extends('clientweb.theme.dark')

@section('home', 'active')
@section('service', '')
@section('about', '')

@section('mainContent')
<div class="row jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">Let's Go</h1>
        <p class="lead">Let's create a new World!</p>
        <hr class="my-2">
        <p class="lead pt-2">
            <a class="btn btn-info btn-lg" href="" role="button">Learn More</a>
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
        <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae, provident! Unde illo, officiis
            necessitatibus corporis nostrum esse ad laborum nulla modi, mollitia itaque eaque voluptas nobis veniam eos,
            praesentium harum!</h5>
    </div>
</div>

{{-- Section : Service --}}
<div class="row bg-info p-3">
    <div class="col">
        {{-- Header : Service --}}
        <div class="row mb-3 mt-3 text-white">
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
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                    {{-- Item Example --}}
                    <div class="col mb-3">
                        <div class="card text-center">
                            <img class="card-img-top" src="{{asset('assets/img/produktif.png')}}" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Title 1</h4>
                                <p class="card-text">Desc 1</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col mb-3">
                        <div class="card text-center">
                            <img class="card-img-top" src="{{asset('assets/img/produktif.png')}}" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Title 2</h4>
                                <p class="card-text">Desc 2</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col mb-3">
                        <div class="card text-center">
                            <img class="card-img-top" src="{{asset('assets/img/produktif.png')}}" alt="">
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
