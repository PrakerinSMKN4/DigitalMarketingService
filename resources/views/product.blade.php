@section('setting', 'active')
@extends('layouts.main')

@section('title', 'Setting - NamaMenu')

@section('header')
<i class="fa fa-clipboard mr-2" aria-hidden="true"></i>&nbsp;Menu Setting
@endsection

@section('content')

{{-- @if (session('success'))
<div class="alert alert-success" role="alert">
 {{ Session('success')}}
</div>
@endif --}}

{{-- Add Menu --}}
<div class="row mt-4">
    <div class="col offset-1" style="font-size: 18pt;">Menu : Home</div>
    <div class="col-2">
        <div class="form-row justify-content-end">
            <div class="col-auto align-self-center"><a href="#" data-toggle="modal" data-target="#exampleModal"><button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Add Product</button></a></div>
        </div>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>

<div class="row mt-1 p-3">
    <div class="col offset-1">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
         {{ Session('success')}}
        </div>
        @endif  
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
                @foreach ($products as $product)
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>
                        <a href="{{ url('product/edit',$product->id) }}" class="btn btn-success">Edit</a>
                    </td>
                    <form action="{{ url('product/destroy', $product->id) }}" method="POST">
                        @csrf
                    @method('delete')
                    <td>
                        <button class="btn btn-danger" type="submit" style="width: 30%; height:60%;">DELETE</button>
                    </td>
                </form>
                </tr>
                @endforeach
            </table>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('product_store' ) }}" method="POST" enctype="multipart/form-data">   
                    @csrf
                <div class="modal-body">
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Product Name
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="name"  placeholder="Name">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Product Detail
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="detail" placeholder="Detail">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Product Type
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="type"  placeholder="Type">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Price
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="price"  placeholder="Price">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Description
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="description"  placeholder="description">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Image
                        </div>
                        <div class="col custom-file">
                            <input type="file" class="form-control"  name="image">
                        </div>
                    </div> 
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control" style="width:300px" name="id_user"
                        value="{{$id_user}}">
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-toggle="modal" id="addMenu" >Add Product</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
