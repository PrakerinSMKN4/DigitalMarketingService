@extends('layouts.main')

@section('title', 'Dashboard')

@section('plugin')
<script src="{{asset('/plugin/chart.js/dist/Chart.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('/plugin/fullcalendar/main.css')}}">
<script src="{{asset('/plugin/fullCalendar/main.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                start: 'title',
                center: '',
                end: 'prev,next'
            },
            initialView: 'dayGridMonth',
            fixedWeekCount: false,
            expandRows: true
        });
        calendar.render();
    });

</script>
@endsection

@section('header')
<i class="fa fa-home mr-2" aria-hidden="true"></i>&nbsp;Dashboard
@endsection

@section('content')
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
</div>
@endsection

@section('dashboard', 'active')