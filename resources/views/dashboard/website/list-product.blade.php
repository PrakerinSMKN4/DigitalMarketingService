@extends('layouts.dashboard')

@section('title', 'Dimas - Website')

@section('plugin')

@endsection

@section('content')
    <div>
        <a href="#" data-toggle="modal" data-target="#exampleModal">
        <button class="btn btn-primary my-3" >
            <i class="fas fa-plus"></i>
            Tambah Data
        </button>
        </a>
        <form action="" method="GET">
            <div class="input-group col-md-3 mb-2" style="margin-left: -14px;">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" name="query" value="{{ @$_GET['query'] }}">
            </div>
        </form>
        <table class="table table-striped table-hover text-center" border="1">
            <thead class="bg-dark text-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Tipe Produk</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Detail</th>
                  <th scope="col" >Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($products) > 0)
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    {{-- <td><img src="storage/app/{{$product->image}}" alt="" width="50px" height="50px"></td> --}}
                    <td><img src="{{ Storage::url($product->image) }}" alt="" width="100px" height="100px"></td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->jenis }}</td>
                    <td>{{ $product->deskripsi }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>
                        <div class="row">
                            <div class="col" style="margin: 1px; padding: 0px;">
                                <a href="{{ route('/list-product-edit', $product->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                            </div>
                            <div class="col" style="margin: 1px; padding: 0px;">
                                <form action="{{ route('/list-product-delete', $product->id) }}" method="POST">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="8" style="font-size: 20px; font-weight: bold;">
                            No data
                        </td>
                    </tr>
                @endif
              </tbody>
          </table>
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
            <form action="{{ route('/list-product-store') }}" method="POST" enctype="multipart/form-data">   
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
                        <button type="submit" class="btn btn-primary" data-toggle="modal" id="addMenu" >Add Content</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('website', 'active')