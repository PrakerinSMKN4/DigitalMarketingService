{{-- Add Menu --}}
@extends('layouts.main')

@section('title', 'Setting')

@section('header')
<i class="fa fa-clipboard mr-2" aria-hidden="true"></i>&nbsp;Menu Setting
@endsection

@section('content')
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
            @foreach($products as $product)
            <div class="col p-2">
                <div class="card-body" style="background: white;">
                    <h5 class="row card-title m-0">
                        <div class="col-1 align-self-center">
                            <a href="{{route('product_edit',$product->id)}}"><i class="fa fa-bars text-muted"
                                aria-hidden="true">   {{$product->nama}}</i></a>
                            </div>
                            <img src="{{ Storage::url($product->image) }}" alt="" style="max-width: 100%;"></a>
                            <div class="col offset-1">
                            </div> 
                        </h5>
                    </div>
                </div>
                @endforeach 
            </div>
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
            <form action="{{ route('menu_store' ) }}" method="POST" enctype="multipart/form-data">   
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
    
    @section('setting', 'active')
    