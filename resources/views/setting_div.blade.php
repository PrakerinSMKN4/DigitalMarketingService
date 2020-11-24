@extends('layouts.main')

@section('title', 'Setting - NamaMenu')

@section('header')
<i class="fa fa-clipboard mr-2" aria-hidden="true"></i>&nbsp;Menu Setting
@endsection

@section('content')
{{-- Add Menu --}}
<div class="row mt-4">
    <div class="col offset-1" style="font-size: 18pt;">Menu : Home</div>
    <div class="col-2">
        <div class="form-row justify-content-end">
            <div class="col-auto align-self-center"><a href="#" data-toggle="modal" data-target="#exampleModal"><button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Add Content</button></a></div>
        </div>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>

<div class="row mt-1 p-3">
    <div class="col offset-1">
        <form action="#" method="POST">
            <table border="1" class="col centered">
                <tr>
                    <td><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td>No</td>
                    <td>Content</td>
                    <td>Filling</td>
                    <td>Control</td>
                    <td colspan="2">Action</td>
                </tr>
                @php
                $i = 0;
                @endphp
                @foreach ($itempages as $itempage)
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>{{ ++$i }}</td>
                    <td>{{ $itempage->judul }}</td>
                    <td>{{ $itempage->keterangan }}</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider round"></span></label></td>
                    <td>
                        <a href="{{ url('setting/edit',$itempage->id) }}" class="btn btn-success">Edit</a>
                    </td>
                    <form action="{{ url('setting/destroy', $itempage->id) }} " method="POST">
                        @csrf
                        @method('delete')
                        <td>
                            <button class="btn btn-danger" type="submit"> Delete</button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </table>
        </form>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="{{ route('content_store' ) }}" method="POST" enctype="multipart/form-data">   
                    @csrf
                <div class="modal-body">
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Content Name
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="judul" id="menuName" placeholder="Name">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Pilih Halaman</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="id_pages">
                            @foreach($data as $pilihan)
                            <option selected>Pilih...</option>
                            <option value="{{$pilihan->id}}">{{$pilihan->keterangan}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <input type="hidden" class="form-control" style="width:300px" name="id_pages" value="{{ }}">
                    </div> --}}
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Content Filling
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="keterangan" id="menuName" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Filling
                        </div>
                        <div class="col custom-file">
                            <input type="file" class="form-control" id="customFile" name="multimedia">
                            {{-- <input type="file" name="multimedia" class="form-control" > --}}
                            {{-- <label class="custom-file-label" for="customFile"></label> --}}
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-toggle="modal" id="addMenu" >Add Content</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('setting', 'active')