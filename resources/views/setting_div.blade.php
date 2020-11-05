@extends('layouts.app')

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
            <div class="col-auto align-self-center"><button type="button" class="btn btn-primary"><i
                        class="fa fa-plus-circle" data-toggle="modal" data-target="#addcontent"></i>&nbsp;Add
                    Content</button></div>
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

                {{-- Foreach --}}
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>1</td>
                    <td>Carousel</td>
                    <td><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                    <td><label class="switch"><input type="checkbox"><span class="slider round"></span></label></td>
                    <td><button class="btn btn-success">Edit</button></td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>
@endsection

@section('setting', 'active')
