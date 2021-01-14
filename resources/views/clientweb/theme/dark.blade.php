@php
    if($profile->whatsapp != ""){
        $data = str_split($profile->whatsapp);
        $data[0] = "62";
        $data = array_merge($data);
        $data = implode('', $data);
        $profile->whatsapp = $data;
    }
@endphp
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/e3dba10297.js" crossorigin="anonymous"></script>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
        @if ($profile->logo)
            <img src="{{ Storage::url($profile->logo) }}" width="50" height="50" alt="">
        @endif 
        {{ $profile->nama_company }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item pl-3 pr-3 @yield('home')">
                    <a class="nav-link" href="{{route('/client/home')}}">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item pl-3 pr-3 @yield('service')">
                    <a class="nav-link" href="{{route('/client/service')}}">Produk & Layanan</a>
                </li>
                <li class="nav-item pl-3 pr-3 @yield('about')">
                    <a class="nav-link" href="{{route('/client/about')}}">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        @yield('mainContent')
    
        {{-- Footer --}}
        <div class="row bg-dark text-white p-4">
            <div class="col-md p-3">
                <h6 class="mb-3">ALAMAT</h6>
                <p class="m-0">Office :</p>
                <p class="text-info font-weight-bold">{{ $profile->alamat }}</p>
            </div>
            <div class="col-md p-3">
                <h6 class="mb-3">EMAIL</h6>
                <a href="mailto:Loremipsum@gmail.com"><p class="text-info font-weight-bold">{{ $user->email }}</p></a>
            </div>
            <div class="col-md p-3">
                <h6 class="mb-3">KONTAK</h6>
                <a href="tel:+{{ $profile->whatsapp }}"><p class="text-info font-weight-bold">{{ $profile->whatsapp }}</p></a>
            </div>
            <div class="col-md p-3">
                <h6 class="mb-3">SOSIAL MEDIA</h6>
                @if($profile->facebook != "") 
                <a href="http://facebook.com/{{ $profile->facebook }}"><p class="text-info font-weight-normal"><i class="fa fa-facebook mr-3" aria-hidden="true"></i>Facebook</p></a>
                @endif
                @if ($profile->twitter != "")
                <a href="http://twitter.com/{{ $profile->twitter }}"><p class="text-info font-weight-normal"><i class="fa fa-twitter mr-2" aria-hidden="true"></i>Twitter</p></a>
                @endif
                @if ($profile->instagram != "")
                <a href="http://instagram.com/{{ $profile->instagram }}"><p class="text-info font-weight-normal"><i class="fa fa-instagram mr-2" aria-hidden="true"></i>Instagram</p></a>    
                @endif
                @if ($profile->whatsapp != "")
                <a href="https://api.whatsapp.com/send?phone={{ $profile->whatsapp }}"><p class="text-info font-weight-normal"><i class="fa fa-whatsapp mr-2" aria-hidden="true"></i>Instagram</p></a>    
                @endif
                
            </div>
        </div>
    </div>
</body>
