@extends('layouts.main')

@section('title', 'Setting')

@section('header')
<i class="fa fa-clipboard mr-2" aria-hidden="true"></i>&nbsp;Menu Setting
@endsection

@section('content')
{{-- Add Menu --}}
<div class="row mt-4">
    <div class="col offset-1">{{-- Offset --}}</div>
    <div class="col-2">
        <div class="form-row justify-content-end">
            <div class="col-auto align-self-center"><a href="#" class="m-0" data-toggle="modal"
                    data-target="#exampleModal"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Menu</a>
            </div>
        </div>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>

<div class="row mt-1 p-3">
    <div class="col offset-1">
        <div class="row row-cols-4">

            {{-- Konten Bertambah Seiringnya Banyak Page --}}
            <div class="col p-2">
                <div class="card-body" style="background: #FFFFFF;">
                    <h5 class="row card-title m-0">
                        <div class="col-1 align-self-center">
                            <a href="{{route('settingDiv')}}"><i class="fa fa-bars text-muted"
                                    aria-hidden="true">Menu</i></a>
                        </div>
                        <div class="col offset-1">
                        </div>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action="{{ url('/setting/store')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-row mb-4">
                    <div class="col-3 align-self-center">
                        Nama Menu
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="keterangan" id="menuName" placeholder="Name">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Jenis Halaman</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="jenis_halaman">
                      <option selected>Pilih...</option>
                      <option value="profile">Profile</option>
                      <option value="products">Products</option>
                      <option value="services">Services</option>
                      <option value="about">About</option>
                    </select>
                  </div>
                  <div class="col">
                    <input type="hidden"  name="id_company" value="{{1 }}">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-toggle="modal" id="addMenu" type="submit">Add Menu</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('setting', 'active')
