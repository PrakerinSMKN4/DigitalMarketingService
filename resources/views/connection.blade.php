@extends('layouts.main')

@section('title', 'Connection')

@section('header')
<i class="fa fa-user mr-2" aria-hidden="true"></i>&nbsp;Connection
@endsection

@section('content')
<div class="row mt-1 p-3">
    <div class="col offset-1">
        {{-- Konten Bertambah Seiringnya Banyak Page --}}
        <div class="row row-cols-4">
            <div class="card col p-2">
                <div class="card-body" style="background: #FFFFFF;">
                    <h5 class="row card-title m-0">
                        <div class="col-1 align-self-center">
                            <a href="{{route('settingDiv')}}"><i class="fa fa-instagram text-muted" aria-hidden="true"></i></a>
                        </div>
                        <div class="col offset-1">
                            Instagram
                        </div>
                    </h5>
                </div>
            </div>
            <div class="card col p-2 ml-2">
                <div class="card-body" style="background: #FFFFFF;">
                    <h5 class="row card-title m-0">
                        <div class="col-1 align-self-center">
                            <a href="{{route('settingDiv')}}"><i class="fa fa-facebook-official text-muted" aria-hidden="true"></i></a>
                        </div>
                        <div class="col offset-1">
                            Facebook
                        </div>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>
@endsection

@section('connection', 'active')