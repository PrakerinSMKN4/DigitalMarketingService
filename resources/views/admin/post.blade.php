@extends('admin.layouts.admin')

@section('title', 'DIMAS - Post')

@section('plugin')
<link rel="stylesheet" href="{{asset('assets/croppie/croppie.css')}}" />
<script src="{{asset('assets/croppie/croppie.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js" crossorigin="anonymous">
</script>
<script>
    // File Name Reader
    $(document).ready(function () {
        bsCustomFileInput.init();
    })

    // Image Preview
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src)
        }
    };

    // Image Cropper
    // var uploadCrop = $('#output').croppie({
    //     viewport: {
    //         width: 200,
    //         height: 200,
    //     },
    //     boundary: {
    //         width: 300,
    //         height: 300
    //     }
    // });

    // uploadCrop.bind({
    //     url: document.getElementById('output');
    // });
    // WORK IN PROGRESS

</script>
@endsection

@section('mainContent')
<div class="row h-100">
    <div class="col-1 m-3 h3">
        <a href="{{ url('schedule/' . $user->id) }}">
            <i class="fas fa-arrow-left"></i>
        </a>
        
    </div>
    <div class="col m-5">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="/schedule/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <table class="table table-light rounded">
                <tr>
                    {{-- Name --}}
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nama</span>
                            </div>
                            <input type="text" class="form-control text-muted" name="name" value="{{ $user->name }}" readonly>
                        </div>
                    </td>

                    {{-- Date --}}
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tanggal</span>
                            </div>
                            <input type="text" class="form-control text-muted" name="date" value="{{ @$schedule->tanggal }}" readonly>
                            <input type="hidden" name="start" id="" value="{{ $schedule->start }}">
                            <input type="hidden" name="end" id="" value="{{ $schedule->end }}">
                            <input type="hidden" name="id" id="" value="{{ $schedule->id }}">
                            <input type="hidden" name="page" value="edit page">
                        </div>
                    </td>
                </tr>

                <tr>
                    {{-- Username --}}
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Sosmed</span>
                            </div>
                            <input type="text" class="form-control text-muted" name="socmed" value="{{ @$user->socmed }}" readonly>
                        </div>
                    </td>

                    {{-- Title --}}
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Judul</span>
                            </div>
                            <input type="text" class="form-control" name="title" value="{{ $schedule->title }}" placeholder="Title">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Deskripsi</span>
                            </div>
                            <textarea class="form-control" name="description" placeholder="Description"> {{ $schedule->deskripsi }}</textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Images</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" accept="image/*" onchange="loadFile(event)" name="gambar"
                                    class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="row row-cols-2">
                <div class="col-auto"><img id="output" src="{{ Storage::url($schedule->gambar) }}" class="img-fluid" height="200" width="200" /></div>
            </div>
            <div class="row">
                <div class="col text-right">
                    <a class="btn btn-danger" href="{{ URL::previous() }}">Cancel</a>
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-1"></div>
</div>
@endsection
