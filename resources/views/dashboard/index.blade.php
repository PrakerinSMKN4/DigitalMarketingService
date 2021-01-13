@php
    session_start();
@endphp
@extends('layouts.dashboard')

@section('title', 'DIMAS - Dashboard')

@section('dashboard-link', 'd-none')

@section('clock', 'd-block')

@section('plugin')
<script src="{{asset('/assets/chart.js/dist/Chart.min.js')}}"></script>
@endsection

@section('content')

<div class="row p-4 border-bottom">
    {{-- Profile Icon --}}
    <div class="col-auto m-auto"><i class="fa fa-user-circle fa-3x text-black-50" aria-hidden="true"></i></div>
    {{-- Welcome & Plan --}}
    <div class="col">
        <div class="row">
            <h5>Selamat Datang, {{ Auth::user()->name }}!</h5>
        </div>
        <div class="row">
            <h5 class="text-muted">{{ (!empty($paket) && (@$paket->status == 'active' || @$paket->status_pembayaran = 'pending' || @$paket->status_pembayaran == ''))? "#" . $paket->paket : "No plan yet!" }}</h5>
        </div>
    </div>
    {{-- Buy / Recharge Plan --}}
    @if (empty($paket) || (@$paket->status_pembayaran == '' && @$paket->status == 'inactive'))
    <a class="col m-auto text-right" href="{{route('/plan')}}"><button class="btn-primary rounded p-2 pr-3 pl-3">Beli Paket</button></a>
    @elseif($paket)
    <a class="col m auto text-right" href="{{ route('invoice') }}"><button class="btn btn-secondary">Detail Invoice</button></a>
    @endif
    
</div>

<div class="row p-4">
    {{-- Left Section : Activity & Package Info --}}
    <div class="col-md mr-3">
        {{-- Account Activity --}}
        <div class="row">
            <div class="col mb-3 card">
                <h5 class="card-title mt-3 pl-2 pb-2 border-bottom">Aktivitas Akun</h5>
                <canvas class="col" id="accountActivity" width="300" height="100"></canvas>
                <script>
                    var ctx = document.getElementById('accountActivity').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            datasets: [{
                                label: 'Followers',
                                data: [],
                                borderWidth: 1,
                                fill: false
                            }, {
                                label: 'Following',
                                data: [],
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
                    $.getJSON('https://www.instagram.com/{{ Auth::user()->socmed }}/?__a=1', function(data) {
                        console.log(data);
                        if(data.graphql){
                            myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels:["{{ Auth::user()->socmed }}"],
                                    datasets: [{
                                        label: 'Followers',
                                        data: [data.graphql.user.edge_followed_by.count],
                                        backgroundColor: 'rgba(0, 255, 0, 0.4)',
                                        borderColor: 'rgba(0, 153, 0, 1)',
                                        borderWidth: 1,
                                        fill: false
                                    }, {
                                        label: 'Following',
                                        data: [data.graphql.user.edge_follow.count],
                                        backgroundColor: 'rgba(0, 0, 255, 0.4)',
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
                   
                </script>
            </div>
        </div>

        {{-- Package Information --}}
        @if (!empty($paket))
        <div class="row">
            <div class="col card mb-3">
                <h5 class="card-title mt-3 pl-2 pb-2 border-bottom">Informasi Paket</h5>
                <div class="card-text">
                    <h4>{{ $paket->nama }} </h4>( {{ $paket->created_at->format('d-M-Y') }} - {{ $paket->created_at->addYear()->format('d-M-Y')  }} )
                    <p>{{ $paket->deskripsi }}</p>
                </div>
            </div>
        </div>
        @endif
    </div>

    {{-- Right Section : Last Log --}}
    <div class="col-md mr-3 card">
        <h5 class="card-title mt-3 pl-2 pb-2 border-bottom">Terakhir Login DMS</h5>
        <div class="card-text"> {{ !empty($_SESSION['last_login']) ? date('d F Y', strtotime($_SESSION['last_login'])). " " . date('H:i',strtotime($_SESSION['last_login'])) : date('d F Y', strtotime(Auth::user()->last_login)). " " .date('H:i:s',strtotime(Auth::user()->last_login)) }} </div>
    </div>
</div>
@endsection

@section('home', 'active')
@section('schedule', '')
