<head>
    <title>Monitoring</title>

    {{-- Plugin --}}
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/plugin/chart.js/dist/Chart.min.js')}}"></script>

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
                    <h4 class="m-0" style="font-size: 20pt; color: #7c7c7c;"><i class="fa fa-pie-chart mr-2"
                            aria-hidden="true"></i>&nbsp;Monitoring</h4>
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

            {{-- Time Filter --}}
            <div class="row mt-4">
                <div class="col offset-1">{{-- Offset --}}</div>
                <div class="col-2">
                    <div class="form-row justify-content-end">
                        <div class="col-auto align-self-center"><label class="text-muted m-0">Filter :</label></div>
                        <div class="col-auto">
                            <form action="#" method="POST" class="m-0">
                                <select class="form-control-sm" name="timesort">
                                    <option value="day">Daily</option>
                                    <option value="week">Weekly</option>
                                    <option value="month">Monthly</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-1">{{-- Offset --}}</div>
            </div>

            {{-- Statistic Ver 1 --}}
            <div class="row p-3">
                <div class="col offset-1">
                    {{-- Header --}}
                    <div class="row"><label class="text-muted"><i class="fa fa-facebook-square"
                                aria-hidden="true"></i>&nbsp;Facebook (Stats Versi 1)</label></div>
                    {{-- Stats Detail --}}
                    <div class="row">
                        <div class="card col mr-2">
                            <div class="card-body">
                                <h5 class="card-title">Visitor</h5>
                                <canvas class="card-text" id="myChart" width="400" height="400"></canvas>
                                <script>
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });

                                </script>
                            </div>
                        </div>
                        <div class="card col mr-2">
                            <div class="card-body">
                                <h5 class="card-title">Follower</h5>
                                <canvas class="card-text" id="myChart2" width="400" height="400"></canvas>
                                <script>
                                    var ctx = document.getElementById('myChart2').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });

                                </script>
                            </div>
                        </div>
                        <div class="card col">
                            <div class="card-body">
                                <h5 class="card-title">Interaction</h5>
                                <canvas class="card-text" id="myChart3" width="400" height="400"></canvas>
                                <script>
                                    var ctx = document.getElementById('myChart3').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });

                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1">{{-- Offset --}}</div>
            </div>

            {{-- Statistic Ver 2 --}}
            <div class="row p-3" style="color: rgb(92, 128, 170);">
                <div class="col offset-1">
                    {{-- Header --}}
                    <div class="row"><label class="text-muted"><i class="fa fa-instagram"
                                aria-hidden="true"></i>&nbsp;Instagram (Stats Versi 2)</label></div>
                    {{-- Stats Detail --}}
                    <div class="row">
                        {{-- Grafik --}}
                        <div class="card col mr-2">
                            <div class="card-body">
                                <h5 class="card-title">Daily / Weekly / Monthly Statistic</h5>
                                <canvas class="card-text" id="myChart4" width="400" height="200"></canvas>
                                <script>
                                    var ctx = document.getElementById('myChart4').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu',
                                                'Minggu'
                                            ],
                                            datasets: [{
                                                label: 'Followers',
                                                data: [12, 19, 3, 5, 2, 3, 8],
                                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                borderColor: 'rgba(255, 99, 132, 1)',
                                                borderWidth: 1,
                                                fill: false
                                            }, {
                                                label: 'Interaction',
                                                data: [14, 16, 5, 13, 22, 6, 2],
                                                backgroundColor: 'rgba(92, 128, 170, 0.4)',
                                                borderColor: 'rgba(92, 128, 170, 1)',
                                                borderWidth: 1,
                                                fill: false
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });

                                </script>
                            </div>
                        </div>
                        {{-- Data --}}
                        <div class="col-2">
                            <div class="row row-cols-1 h-100">
                                <div class="card w-100 mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title">Visitor</h5>
                                        <h3 class="card-text text-success">25 (+4)</h3>
                                    </div>
                                </div>
                                <div class="card w-100 mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title">Follower</h5>
                                        <h3 class="card-text text-danger">255 (-4)</h3>
                                    </div>
                                </div>
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h5 class="card-title">Interaction</h5>
                                        <h3 class="card-text">100 (0)</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <a href="{{route('monitoring')}}" class="sidebar-link active">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Social Media Monitoring</div>
                    </div>
                </a>

                {{-- Company Profile --}}
                <a href="{{route('profile')}}" class="sidebar-link">
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
