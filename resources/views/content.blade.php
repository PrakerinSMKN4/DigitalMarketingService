@extends('layouts.main')

@section('title', 'Profile')

@section('header')
<i class="fa fa-id-card mr-2" aria-hidden="true"></i>&nbsp;Company Profile
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('content_store', ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3 p-3">
        <div class="col offset-1 mr-3" style="background: white;">
            <div class="row justify-content-center m-3">
                <div class="col-auto">
                    <i class="fa fa-id-card fa-2x" aria-hidden="true"></i>
                </div>
            </div>
            <div class="row m-3">
                <div class="form-group">
                    <input type="hidden" class="form-control" style="width:300px" name="id_pages" value="{{ 1}}">
                </div>
            </div>
            {{-- Judul --}}
            <div class="row m-3">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" style="width:300px" name="judul">
                </div>
            </div>
            {{-- Deskripsi --}}
            <div class="row m-3">
                <div class="form-group">
                    <label>Keterangan</label><br>
                    <textarea cols="40" rows="3" style="resize:none" name="keterangan"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <input type="file" name="multimedia" class="form-control">
            </div>
            <div class="row m-4">
                <button class="btn btn-dark mt-4" type="submit" style="width: 30%; height:60%;">SUBMIT</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('profile', 'active')