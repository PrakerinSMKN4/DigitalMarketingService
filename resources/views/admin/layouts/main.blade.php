<head>
    <title>@yield('title')</title>
    {{-- Plugin --}}
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.13.0/sweetalert2.all.min.js" integrity="sha512-G7XfKG34JP/eVi0qf5fiqOoyIQhA1h+fsruFv89Uag3EUT+WKh5k8Y5OBcVkC/FxAYMh1tbyEU8F7NoytU0jVg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.13.0/sweetalert2.min.css" integrity="sha512-EeZYT52DgUwGU45iNoywycYyJW/C2irAZhp2RZAA0X4KtgE4XbqUl9zXydANcIlEuF+BXpsooxzkPW081bqoBQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">

    {{-- Optional Plugin --}}
    @yield('plugin')
</head>

<body>
    <div class="row h-100 w-100 m-0">

        {{-- Content --}}
        <div class="col" style="background: #DFD9D9;">

            {{-- Search and Header --}}
            <div class="row align-items-center mt-3">
                {{-- Header --}}
                <div class="col-3 offset-1" style="text-align: center;">
                    <h4 class="m-0" style="font-size: 20pt; color: #7c7c7c;">@yield('header')</h4>
                </div>

                {{-- Search --}}
                <form action="#" method="POST" class="col-7 m-0">
                    @csrf
                </form>
            </div>

            @yield('content')
        </div>
        
        {{-- Side Bar --}}
        <div class="row h-100" style="position: fixed;">
            <div id="sideBar" class="col-auto">
                {{-- Logo Perusahaan --}}
                <div class="row mb-5">
                    <div class="col m-3"><img src="" alt="" sizes="" srcset=""></div>
                </div>

                {{-- Menu Menu --}}
                {{-- Dashboard --}}
                <a href="{{route('admin-dashboard')}}" class="sidebar-link @yield('dashboard')">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-home fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Dashboard</div>
                    </div>
                </a>

                {{-- Company Profile
                <a href="{{route('profile')}}" class="sidebar-link @yield('profile')">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-id-card fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Company Profile</div>
                    </div>
                </a>  --}}

                {{-- Menu Setting --}}
                <a href="{{route('admin-user')}}" class="sidebar-link @yield('users')">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-users fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Data User</div>
                    </div>
                </a>

                <a href="{{ route('admin-permohonan') }}" class="sidebar-link @yield('request')">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-clipboard fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Permohonan</div>
                    </div>
                </a>

                {{-- Sign Out --}}
                <form id="logout" method="POST" action="{{route('admin-logout')}}" class="m-0">@csrf</form>
                <a onclick="logout()" href="{{route('admin-logout')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Sign Out</div>
                    </div>
                </a>
            </div>
            <div id="toggle-button" class="col p-0 align-self-center" onclick="openNav()"></div>
        </div>
    </div>
</body>
<script src="{{asset('/js/index.js')}}"></script>
