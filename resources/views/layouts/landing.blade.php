<head>
    {{--CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{asset('rimas.ico')}}" type="image/x-icon"> 
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e3dba10297.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    @yield('plugin')

    <style rel="text/css">
        .landing {
            background-image: url("assets/img/web.png");
            background-size: cover;
        }
    </style>
</head>

<body class="container-fluid">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-danger fixed-top p-0">
        <a class="navbar-brand text-white ml-4 p-2" href="{{route('/')}}"><img class="image mb-2" src="{{asset('assets/img/rimas.png')}}" width="30" height="30"> IMAS</a>
        
        <button class="navbar-toggler p-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars p-1 text-info" aria-hidden="true"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item pl-5 pr-5 p-2 text-center @yield('bg-home')">
                    <a class="nav-link @yield('text-home')" href="{{route('/')}}">Beranda</a>
                </li>
                <li class="nav-item pl-5 pr-5 p-2 text-center @yield('bg-about')">
                    <a class="nav-link @yield('text-about')" href="{{route('/about')}}">Tentang Kami</a>
                </li>
                <li class="nav-item pl-5 pr-5 p-2 text-center @yield('bg-layanan')">
                    <a class="nav-link @yield('text-layanan')" href="{{route('/service')."#first"}}">Layanan</a>
                </li>
                <li class="nav-item pl-5 pr-5 p-2 text-center @yield('bg-contact')">
                    <a class="nav-link @yield('text-contact')" href="{{route('/contact')}}">Kontak</a>
                </li>

                @if (Auth::user() == null)
                {{-- Kalo belum Login --}}
                <li class="nav-item pl-5 pr-5 p-2 text-center @yield('bg-login')">
                    <a class="nav-link @yield('text-login')" href="{{route('/login')}}">Masuk</a>
                </li>
                @else
                {{-- Kalo sudah Login --}}
                <li class="nav-item pl-5 pr-5 p-2 text-center @yield('bg-dashboard')">
                    <a class="nav-link @yield('text-dashboard')" href="{{route('/dashboard')}}">Dashboard</a>
                </li>
                @endif
                
                
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-danger p-0" id="first">
        <div class="ml-4">
            <a class="navbar-brand text-white" href="{{route('/')}}"><img class="image mb-2" src="assets/img/rimas.png" width="30" height="30"> IMAS</a>
        </div>
        <button class="navbar-toggler p-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <!-- End of Navbar -->

        @yield('mainContent')
        <div class="row page-footer pt-4">
            <div class="col-md p-3">
                <h5 class="mb-4">ALAMAT</h5>
                <p class="m-0">Office :</p>
                <p class="text-info font-weight-bold">Jl. Rd. Dewisartika No.108 Pungkur, Regol, Bandung, Jawa Barat</p>
            </div>
            <div class="col-md p-3">
                <h5 class="mb-4">EMAIL</h5>
                <p class="text-info font-weight-bold">Loremipsum@gmail.com</p>
            </div>
            <div class="col-md p-3">
                <h5 class="mb-4">KONTAK</h5>
                <p class="text-info font-weight-bold">+62 123-1231-123</p>
            </div>
            <div class="col-md p-3">
                <h5 class="mb-4">SOSIAL MEDIA</h5>
                <a href=""><p class="text-info font-weight-normal"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i> DIMAS</p></a>
                <a href=""><p class="text-info font-weight-normal"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i> DIMAS</p></a>
            </div>
        </div>
</body>

<!-- script display -->
@yield('script')