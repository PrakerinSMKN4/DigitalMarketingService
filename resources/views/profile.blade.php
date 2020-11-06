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

            <form action="{{ url('/profile/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                <input type="text" class="form-control" style="width:300px" name="nama_company" value="{{ @$company->nama_company }}">
                            </div>
                        </div>
                        {{-- Company Adress --}}
                        <div class="row m-3">
                            <div class="form-group">
                                <label>Company Address</label><br>
                                <textarea cols="40" rows="3" style="resize:none" name="alamat">{{ @$company->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="form-group">
                                <input type="hidden" class="form-control" style="width:300px" name="id_pemilik" value="{{ Auth::user()->id }}">
                                <input type="hidden" class="form-control" style="width:300px" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        {{-- Operational Time (OPEN) --}}
                        <div class="row m-3">
                            <div class="form-group">
                                <label>Operational Time (OPEN) :</label>
                                <input type="time" class="form-control" style="width:300px;text-align:center" name="operational_time" value="{{ @$company->operational_time }}"> 
                            </div>
                        </div>
                        {{-- Operational Time (Closed)--}}
                        <div class="row m-3">
                            <div class="form-group">
                                <label>Operational Time (CLOSED) :</label>
                                <input type="time" class="form-control" style="width:300px;text-align:center" name="operational_time_close" value="{{ @$company->operational_time_close }}">
                            </div>
                        </div>
                        {{-- Social Media --}}
                        <div class="row m-3">
                            <div class="form-group">
                                <label>Social Media/Contact</label>
                                    <div class="col">
                                        <div class="row-md-2">
                                            <div class="name-f">
                                            <h5><i class="fa fa-facebook-square mr-2" aria-hidden="true"></i>Facebook :</h5>
                                        </div>
                                        <div class="input">
                                            <input type="text" class="form-control" value="{{ @$sosmedAccount['facebook']->username }}">
                                        </div>
                                        </div>
                                        <div class="row-md-2 mt-2">
                                            <div class="name-ig">
                                            <h5><i class="fa fa-instagram mr-2" aria-hidden="true"></i>Instagram :</h5>
                                        </div>
                                        <div class="input">
                                            <input type="text" class="form-control" value="{{ @$sosmedAccount['instagram']->username}}">
                                        </div>
                                        </div>
                                        <div class="row-md-2 mt-2">
                                            <div class="name-wa">
                                            <h5><i class="fa fa-whatsapp mr-2" aria-hidden="true"></i></i>Whatsapp :</h5>
                                        </div>
                                        <div class="input">
                                            <input type="text" class="form-control" value="{{ @$sosmedAccount['whatsapp']->username}}">
                                        </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Section --}}
                    <div class="col">
                    <div class="card" style="width: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title">Description :</h5>
                        <textarea cols="70" rows="11" style="resize:none" name="description">{{ @$company->description }}</textarea>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <div class="card mt-2" style="width:17rem;">
                    <div class="card-body">
                        <h5 class="card-title">Vision :</h5>
                        <textarea cols="30" rows="12" style="resize:none" name="vision">{{ @$company->vision }}</textarea>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card mt-2" style="width:16.5rem;">
                    <div class="card-body">
                        <h5 class="card-title">Mission :</h5>
                        <textarea cols="30" rows="12" style="resize:none" name="mission">{{ @$company->mission }}</textarea>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="card mt-2" style="width:35rem;">
                    <div class="card-body">
                        <h5 class="card-title">Type Of Business : <select id="business">
                            <option value="food">Food</option>
                            <option value="technology">Technology</option>
                            <option value="tranportation">Transportation</option>
                        </select> </h5>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-dark mt-4" type="submit" style="width: 30%; height:60%;">SUBMIT</button>
                    </div>
                    </div>
                    </div>

            </form>
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