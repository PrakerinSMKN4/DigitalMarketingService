@extends('layouts.dashboard')

@section('title', 'Dimas - Website')

@section('plugin')

@endsection
    
@if ($website)
@section('content')
<div class="row m-3">
 <div class="col-4">
    <div class="list-group">
        <span class="list-group-item active" aria-current="true"><b>List Crud Website</b></span>
        <a class="list-group-item list-group-item-action" href="{{ url('/company-profile') }}"><i class="fas fa-building"></i> Profile perusahaan</a>
        <a class="list-group-item list-group-item-action" href="{{ route('/list-product') }}"><i class="fas fa-shopping-bag"></i> Produk perusahaan</a>
        <a class="list-group-item list-group-item-action" href="{{ route('/list-service') }}"><i class="fa fa-user-md" aria-hidden="true"></i> Layanan Perusahaan</a>
      </div>
 </div>
</div>
@endsection
@else
@section('content')
<div class="alert alert-danger col-5 text-center m-3">
    <h5>
        {{ $message }}
    </h5>
</div>
@endsection
@endif


@section('website', 'active')