@extends('layouts.main')

@section('title', 'Profile')

@section('header')
<i class="fa fa-id-card mr-2" aria-hidden="true"></i>&nbsp;Company Profile
@endsection

@section('content')
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
                    <input type="text" class="form-control" style="width:300px" name="nama_company"
                        value="{{ @$company->nama_company }}">
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
                    <input type="hidden" class="form-control" style="width:300px" name="id_pemilik"
                        value="{{ Auth::user()->id }}">
                    <input type="hidden" class="form-control" style="width:300px" name="email"
                        value="{{ Auth::user()->email }}">
                </div>
            </div>
            {{-- Operational Time (OPEN) --}}
            <div class="row m-3">
                <div class="form-group">
                    <label>Operational Time (OPEN) :</label>
                    <input type="time" class="form-control" style="width:300px;text-align:center"
                        name="operational_time" value="{{ @$company->operational_time }}">
                </div>
            </div>
            {{-- Operational Time (Closed)--}}
            <div class="row m-3">
                <div class="form-group">
                    <label>Operational Time (CLOSED) :</label>
                    <input type="time" class="form-control" style="width:300px;text-align:center"
                        name="operational_time_close" value="{{ @$company->operational_time_close }}">
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
                                <input type="text" class="form-control"
                                    value="{{ @$sosmedAccount['facebook']->username }}">
                            </div>
                        </div>
                        <div class="row-md-2 mt-2">
                            <div class="name-ig">
                                <h5><i class="fa fa-instagram mr-2" aria-hidden="true"></i>Instagram :</h5>
                            </div>
                            <div class="input">
                                <input type="text" class="form-control"
                                    value="{{ @$sosmedAccount['instagram']->username}}">
                            </div>
                        </div>
                        <div class="row-md-2 mt-2">
                            <div class="name-wa">
                                <h5><i class="fa fa-whatsapp mr-2" aria-hidden="true"></i></i>Whatsapp :</h5>
                            </div>
                            <div class="input">
                                <input type="text" class="form-control"
                                    value="{{ @$sosmedAccount['whatsapp']->username}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Section --}}
        <div class="col">
            <div class="card" style="height: 40%">
                <div class="card-body" style="height: 40%">
                    <h5 class="card-title">Description :</h5>
                    <textarea class="col" style="resize:none" name="description">{{ @$company->description }}</textarea>
                </div>
            </div>
            <div class="row" style="height: 40%">
                <div class="col pr-1">
                    <div class="card mt-2" style="height: 95%">
                        <div class="card-body">
                            <h5 class="card-title">Vision :</h5>
                            <textarea class="col" style="resize:none;" name="vision">{{ @$company->vision }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col pl-1">
                    <div class="card mt-2" style="height: 95%">
                        <div class="card-body">
                            <h5 class="card-title">Mission :</h5>
                            <textarea class="col" style="resize:none" name="mission">{{ @$company->mission }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="height: 20%">
                <div class="card-body">
                    <h5 class="card-title">Type Of Business : <select id="business">
                            <option value="food">Food</option>
                            <option value="technology">Technology</option>
                            <option value="tranportation">Transportation</option>
                        </select> </h5>
                        <div class="row-md-1">
                            <div class="col p-0">
                                <button class="btn btn-dark mt-4" type="submit">SUBMIT</button>
                            </div>
                            <div class="col p-0" style="float: left">
                                <a href="{{route('profile_edit') }}" class="btn btn-success">EDIT</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="col-1">{{-- Offset --}}</div>
@endsection

@section('profile', 'active')