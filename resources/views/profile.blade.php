<head>
    <title>Profile</title>

    {{-- Plugin --}}
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
</head>

<body>
    <div class="row h-100 w-100 m-0">

        {{-- Content --}}
        <div class="col" style="background: #DFD9D9;">
            
            {{-- Search and Header --}}
            <div class="row align-items-center mt-3">
                {{-- Header --}}
                <div class="col-3 offset-1" style="text-align: center;">
                    <h4 class="m-0" style="font-size: 20pt; color: #7c7c7c;"><i class="fa fa-id-card mr-2" aria-hidden="true"></i>&nbsp;Company Profile</h4>
                </div>
                
                {{-- Search --}}
                <form action="#" method="POST" class="col-7 m-0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></div>
                        </div>
                        <input type="text" class="form-control" name="#" placeholder="Search">
                    </div>
                </form>
            </div>

            <div class="row mt-3 p-3">

                {{-- Left Section --}}
                <div class="col offset-1 mr-3" style="background: white;">
                    {{-- Icon --}}
                    <div class="row justify-content-center m-3">
                        <div class="col-auto">
                            <i class="fa fa-id-card fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                    {{-- Company Name --}}
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    {{-- Company Adress --}}
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Company Address</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    {{-- Operational Time --}}
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Operational Time</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Operational Time</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    {{-- Social Media --}}
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Social</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>

                {{-- Right Section --}}
                <div class="col">
                    <div class="row p-3" style="background: white;">Description</div>
                    <div class="row mt-3 p-3" style="background: white;">
                        <div class="col">Vision</div>
                        <div class="col">Mission</div>
                    </div>
                    <div class="row mt-3 p-3" style="background: white;">
                        <div class="col">Type of Business</div>
                    </div>
                </div>

                <div class="col-1">{{-- Offset --}}</div>
            </div>
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
                <a href="{{route('dashboard')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-home fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Dashboard</div>
                    </div>
                </a>
                
                {{-- Social Media Monitoring --}}
                <a href="{{route('monitoring')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Social Media Monitoring</div>
                    </div>
                </a>
                
                {{-- Company Profile --}}
                <a href="{{route('profile')}}" class="sidebar-link active">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-id-card fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Company Profile</div>
                    </div>
                </a>

                {{-- Menu Setting --}}
                <a href="{{route('setting')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-clipboard fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Menu Setting</div>
                    </div>
                </a>

                {{-- Connected Social Media --}}
                <a href="{{route('connection')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-user fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Connected Social Media</div>
                    </div>
                </a>

                {{-- Schedule --}}
                <a href="{{route('schedule')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Schedule</div>
                    </div>
                </a>

                {{-- Sign Out --}}
                <form id="logout" method="POST" action="{{route('logout')}}" class="m-0">@csrf</form>
                <a onclick="logout()" href="{{route('logout')}}" class="sidebar-link">
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