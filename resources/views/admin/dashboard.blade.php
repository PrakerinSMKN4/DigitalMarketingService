@extends('admin.layouts.main')

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
                    <h5 class="card-title ml-3 mt-2">Pemasukan Bulanan</h5>
                    <canvas class="col" id="socialMedia" width="300" height="100"></canvas>
                    <script>

                        $.ajax({
                            url:"/getDashboardData",
                            type:"POST",
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(data){
                                console.log(parseDataByKeyColumn(data.list_data, 'total_pemasukan'));
                                console.log(data);
                                $("#totalUser").text(data.indep_data.jmlh_user);
                                $("#totalPending").text(data.indep_data.jmlh_request_pending);
                                $("#totalSelesai").text(data.indep_data.jmlh_request_lunas);
                                var ctx = document.getElementById('socialMedia').getContext('2d');
                                myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: parseDataByKeyColumn(data.list_data, 'nama_bulan'),
                                        datasets: [{
                                            label: 'Pemasukan',
                                            data: parseDataByKeyColumn(data.list_data, 'total_pemasukan'),
                                            backgroundColor: 'rgba(0, 153, 0, 0.6)',
                                            borderColor: 'rgba(0, 153, 0, 1)',
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
                            }
                        });

                        function parseDataByKeyColumn(array, key){
                            let data = [];
                            
                            if(array != null && typeof array != "undefined" ){
                                array.forEach(element => {
                                    if(element[key] == null){
                                        data.push("");
                                    }else{
                                        data.push(element[key]);
                                    }
                                    
                                });
                            }

                            return data;
                        }

                    </script>
                </div>

                <div class="row">
                    {{-- Gender Visitor --}}
                    <div class="card col mr-2 p-2">
                        <div class="card-body">
                            <h5 class="card-title">Total Klien</h5>
                            <h2>
                                <p class="card-text" >
                                    <i class="fa fa-user mt-5" aria-hidden="true"></i> <i style="font-style: normal;" id="totalUser">0</i><i style="font-style: normal; font-size: 15px;"> Orang</i>
                                </p>
                            </h2>
                            <a href="{{ url('/admin/user') }}" class="btn btn-primary mt-5">Detail</a>
                          </div>
                    </div>
                    {{-- Age Visitor --}}
                    <div class="card col mr-2 p-2">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi Pending</h5>
                            <h2>
                                <p class="card-text" >
                                    <i class="fa fa-money mt-5" aria-hidden="true"></i> <i style="font-style: normal;" id="totalPending">0</i><i style="font-style: normal; font-size: 15px;"> Transaksi</i>
                                </p>
                            </h2>
                            <a href="{{ url('/admin/permohonan?query=pending') }}" class="btn btn-primary mt-5">Detail</a>
                          </div>
                    </div>
                    {{-- Hour Traffic --}}
                    <div class="card col p-2">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi Selesai</h5>
                            <h2>
                                <p class="card-text" >
                                    <i class="fa fa-money mt-5" aria-hidden="true"></i> <i style="font-style: normal;" id="totalSelesai">0</i><i style="font-style: normal; font-size: 15px;"> Transaksi</i>
                                </p>
                            </h2>
                            <a href="{{ url('/admin/permohonan?query=selesai') }}" class="btn btn-primary mt-5">Detail</a>
                          </div>
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