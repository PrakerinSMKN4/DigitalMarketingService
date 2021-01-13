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
        @if($errors->all())
        <div class="alert alert-danger text-center">
            <h5>Error</h5>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif
        
        <table class="table table-striped table-hover text-center" border="1">
            <thead class="bg-dark text-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nama Layanan</th>
                  <th scope="col">Deskripsi Layanan</th>
                  <th scope="col" >Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($services) > 0)
                @foreach ($services as $service)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    {{-- <td><img src="storage/app/{{$service->image}}" alt="" width="50px" height="50px"></td> --}}
                    <td><img src="{{ Storage::url($service->gambar_servis) }}" alt="" width="100px" height="100px"></td>
                    <td>{{ $service->nama_servis }}</td>
                    <td>{{ $service->deskripsi_servis }}</td>
                    <td>
                        <div class="row">
                            <div class="col" style="margin: 1px; padding: 0px;">
                                <a href="{{ route('/list-service-edit', $service->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                            </div>
                            <div class="col" style="margin: 1px; margin-right: 4px; padding: 0px;">
                                <form action="{{ route('/list-service-delete', $service->id) }}" method="POST">
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
                    <h5 class="modal-title">Add service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="{{ route('/list-service-store') }}" method="POST" enctype="multipart/form-data">   
                    @csrf
                    <div class="modal-body">
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Service Name
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="nama_servis"  placeholder="Name...">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Description
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="deskripsi_servis"  placeholder="Description...">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-3 align-self-center">
                            Image
                        </div>
                        <div class="col custom-file">
                            <input type="file" class="form-control"  name="gambar_servis">
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