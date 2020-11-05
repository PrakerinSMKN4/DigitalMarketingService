@extends('layouts.app')

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
            {{-- Foreach --}}
            <?php
            $data = ['Home'];
            foreach ($data as $key) {
            ?>
            <div class="col p-2">
                <div class="card-body" style="background: #FFFFFF;">
                    <h5 class="row card-title m-0">
                        <div class="col-1 align-self-center">
                            <a href="{{route('settingDiv')}}"><i class="fa fa-bars text-muted"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="col offset-1">
                            <?php echo $key ?>
                        </div>
                    </h5>
                </div>
            </div>
            <?php
            }
            ?>
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
            <div class="modal-body">
                <div class="form-row mb-4">
                    <div class="col-3 align-self-center">
                        Nama Menu
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="menuName" id="menuName" placeholder="Name">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-toggle="modal" id="addMenu">Add Menu</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#addMenu').click(function () {
            var nama = $('#menuName').val();
            if (nama != '') {
                data.push(nama);
                $('#exampleModal').modal('hide');
            }
        });
    });

</script>
@endsection

@section('setting', 'active')
