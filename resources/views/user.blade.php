@extends('layouts.main')

@section('setting', 'active')
@section('title', 'Digital Marketing Service')

@section('header')
<i class="fa fa-clipboard mr-2" aria-hidden="true"></i>&nbsp;Users
@endsection

@section('content')

@if (session('success'))
<div class="alert alert-success" role="alert">
 {{ Session('success')}}
</div>
@endif


{{-- Add Menu --}}
<div class="row mt-4">
    <div class="col-1">{{-- Offset --}}</div>
</div>

<div class="row mt-1 p-3">
    <div class="col offset-1">
        <form action="#" method="POST">
            <table border="2" class=" centered table table-striped table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Role</td>
                        <td>username</td>
                        <td colspan="3">Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->username}}</td>
                    <td>
                        
                        <a href="{{ url('/product',$user->id) }}" class="btn btn-primary"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> Show Product</a>
                    </td>
                    <td>
                        
                        <a href="{{ url('/schedule',$user->id) }}" class="btn btn-primary"> <i class="fa fa-calendar" aria-hidden="true"></i> Show Schedule</a>
                    </td>
                    <td>
                        
                        <a href="{{ url('/profile',$user->id) }}" class="btn btn-primary"> <i class="fa fa-building" aria-hidden="true"></i> Show Company Profile</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
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
            </form>
        </div>
    </div>
</div>
@endsection
