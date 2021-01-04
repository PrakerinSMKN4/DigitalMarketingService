@section('setting', 'active')
@extends('layouts.main')

@section('title', 'Setting - NamaMenu')

@section('header')
<i class="fa fa-clipboard mr-2" aria-hidden="true"></i>&nbsp;Product
@endsection

@section('content')

{{-- @if (session('success'))
<div class="alert alert-success" role="alert">
 {{ Session('success')}}
</div>
@endif --}}

{{-- Add Menu --}}
<div class="row mt-4">

    <div class="col-1">{{-- Offset --}}</div>
</div>

<div class="row mt-1 p-3">
    <div class="col offset-1">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
         {{ Session('success')}}
        </div>
        @endif  
            <table border="2" class="col centered table table-striped table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Foto</td>
                        <td>Nama Produk</td>
                        <td>Keterangan</td>
                        <td>Harga</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ Storage::url($product->gambar) }}" alt=""></td>
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
