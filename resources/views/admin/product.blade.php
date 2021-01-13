@extends('admin.layouts.main')
@section('setting', 'active')

@section('title', 'Setting - NamaMenu')

@section('users', 'active')

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

</div>

<div class="row mt-1 p-3">
    <div class="col offset-1">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
         {{ Session('success')}}
        </div>
        @endif 
        <form action="" method="GET">
            <div class="input-group col-md-3 mb-2" style="margin-left: -14px;">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" name="query" value="{{ @$_GET['query'] }}">
            </div>
        </form>
            <table class="col centered table table-striped table-hover table-bordered">
                <thead class="bg-dark text-light fw-bold">
                    <tr>
                        <td>No</td>
                        <td>Foto</td>
                        <td>Nama Produk</td>
                        <td>Detail</td>
                        <td>Keterangan</td>
                        <td>Harga</td>
                        <td>Action</td>
                    </tr>
                </thead>
                @if (count($products) > 0)
                    
                
                @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ Storage::url($product->image) }}" alt="" width="100px" height="100px"></td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>{{ $product->deskripsi }}</td>
                    <td>{{ $product->harga }}</td>
                    <form action="{{ url('product/destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <td>
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </td>
                </form>
                </tr>
                @endforeach

                @else
                <tr>
                    <td colspan="7">
                        <h5>No Data</h5>
                    </td>
                </tr>

                @endif
            </table>
    </div>

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
