<head>
    <title>Dashboard</title>

    {{-- Plugin --}}
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('/plugin/chart.js/dist/Chart.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/plugin/fullcalendar/main.css')}}">
    <script src="{{asset('/plugin/fullCalendar/main.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                fixedWeekCount: false,
                expandRows: true
            });
            calendar.render();
        });

    </script>

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
                    <h4 class="m-0" style="font-size: 20pt; color: #7c7c7c;"><i class="fa fa-home mr-2"
                            aria-hidden="true"></i>&nbsp;Dashboard</h4>
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
                <div class="col offset-1">
                    <div class="row">
                        <div class="col mr-2">
                            {{-- Social Media Interaction --}}
                            <div class="row card mb-2">
                                <h5 class="card-title ml-3 mt-2">Social Media Interaction</h5>
                                <canvas class="col" id="socialMedia" width="300" height="100"></canvas>
                                <script>
                                    var ctx = document.getElementById('socialMedia').getContext('2d');
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

                            <div class="row">
                                {{-- Gender Visitor --}}
                                <div class="card col mr-2 p-2">
                                    <h5 class="card-title ml-3 mt-2">Gender Visitor</h5>
                                    <canvas class="col p-1" id="gender" width="400" height="400"></canvas>
                                    <script>
                                        var ctx = document.getElementById('gender').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'pie',
                                            data: {
                                                datasets: [{
                                                    data: [12, 19],
                                                    backgroundColor: ["rgb(255, 99, 132)",
                                                        "rgb(54, 162, 235)"
                                                    ],
                                                    borderWidth: 0
                                                }],
                                                labels: ['Female', 'Male']
                                            },
                                            options: {
                                                legend: {
                                                    position: 'right'
                                                }
                                            }
                                        });

                                    </script>
                                </div>
                                {{-- Age Visitor --}}
                                <div class="card col mr-2 p-2">
                                    <h5 class="card-title ml-3 mt-2">Age Visitor</h5>
                                    <canvas class="col p-1" id="age" width="400" height="400"></canvas>
                                    <script>
                                        var ctx = document.getElementById('age').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['18', '19', '20', '21', '22', '23'],
                                                datasets: [{
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
                                                },
                                                legend: {
                                                    display: false
                                                }
                                            }
                                        });

                                    </script>
                                </div>
                                {{-- Hour Traffic --}}
                                <div class="card col p-2">
                                    <h5 class="card-title ml-3 mt-2">Hour Traffic</h5>
                                    <canvas class="col p-1" id="traffic" width="400" height="400"></canvas>
                                    <script>
                                        var ctx = document.getElementById('traffic').getContext('2d');
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
                                                },
                                                legend: {
                                                    display: false
                                                }
                                            }
                                        });

                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="card col-4 p-3">
                            <div id="calendar" class="w-100 h-100"></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-1">Offset</div> --}}
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
                <a href="{{route('dashboard')}}" class="sidebar-link active">
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
