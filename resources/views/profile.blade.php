@extends('layouts.app')

@section('title', 'Profile')

@section('header')
<i class="fa fa-id-card mr-2" aria-hidden="true"></i>&nbsp;Company Profile
@endsection

@section('content')
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
                <input type="text" class="form-control" style="width:300px">
            </div>
        </div>
        {{-- Company Adress --}}
        <div class="row m-3">
            <div class="form-group">
                <label>Company Address</label><br>
                <textarea cols="40" rows="3" style="resize:none"></textarea>
            </div>
        </div>
        {{-- Operational Time (OPEN) --}}
        <div class="row m-3">
            <div class="form-group">
                <label>Operational Time (OPEN) :</label>
                <input type="time" class="form-control" style="width:300px;text-align:center">
            </div>
        </div>
        {{-- Operational Time (Closed)--}}
        <div class="row m-3">
            <div class="form-group">
                <label>Operational Time (CLOSED) :</label>
                <input type="time" class="form-control" style="width:300px;text-align:center">
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
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row-md-2 mt-2">
                        <div class="name-ig">
                            <h5><i class="fa fa-instagram mr-2" aria-hidden="true"></i>Instagram :</h5>
                        </div>
                        <div class="input">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row-md-2 mt-2">
                        <div class="name-wa">
                            <h5><i class="fa fa-whatsapp mr-2" aria-hidden="true"></i></i>Whatsapp :</h5>
                        </div>
                        <div class="input">
                            <input type="text" class="form-control">
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
                <textarea cols="70" rows="11" style="resize:none"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-2" style="width:17rem;">
                    <div class="card-body">
                        <h5 class="card-title">Vision :</h5>
                        <textarea cols="30" rows="12" style="resize:none"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-2" style="width:16.5rem;">
                    <div class="card-body">
                        <h5 class="card-title">Mission :</h5>
                        <textarea cols="30" rows="12" style="resize:none"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2" style="width:35rem;">
            <div class="card-body">
                <h5 class="card-title">Type Of Business : 
                    <select id="business">
                        <option value="food">Food</option>
                        <option value="technology">Technology</option>
                        <option value="tranportation">Transportation</option>
                    </select> 
                </h5>
            </div>
        </div>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>
@endsection

@section('profile', 'active')
