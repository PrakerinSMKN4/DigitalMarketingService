<head>
    <title>About</title>

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
                <h2>Hello {{ Auth::user()->username }}</h2>
    
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

            <div class="row">
                {{-- Put your Code Here --}}
            </div>
        </div>

        {{-- Side Bar --}}
        <div class="row h-100" style="position: absolute;">
            <div id="sideBar" class="col-auto">
                {{-- Logo Perusahaan --}}
                <div class="row mb-5">
                    <div class="col m-3"><img src="" alt="" sizes="" srcset=""></div>
                </div>

                {{-- Menu Menu --}}
                {{-- Dashboard --}}
                <a href="#" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-home fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Dashboard</div>
                    </div>
                </a>
                
                {{-- Social Media Monitoring --}}
                <a href="#" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Social Media Monitoring</div>
                    </div>
                </a>
                
                {{-- Company Profile --}}
                <a href="#" class="sidebar-link active">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-id-card fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Company Profile</div>
                    </div>
                </a>

                {{-- Menu Setting --}}
                <a href="#" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-clipboard fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Menu Setting</div>
                    </div>
                </a>

                {{-- Connected Social Media --}}
                <a href="#" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-user fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Connected Social Media</div>
                    </div>
                </a>

                {{-- Schedule --}}
                <a href="#" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Schedule</div>
                    </div>
                </a>

                {{-- Sign Out --}}
                <a href="#" class="sidebar-link">
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