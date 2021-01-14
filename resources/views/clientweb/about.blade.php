@extends('clientweb.theme.dark')

@section('home', '')
@section('service', '')
@section('about', 'active')

@section('mainContent')
<div class="row">
    <div class="col">
        {{-- Header : About --}}
        <div class="row mt-5">
            <div class="col text-center">
                <h1>Siapakah Kami?</h1>
            </div>
        </div>

        <div class="row mb-3 row-cols-1 row-cols-sm-2">
            <div class="col m-auto text-center"><img src="{{asset('assets/img/3365131.jpg')}}" class="img-fluid p-5"
                    alt="" height="500px" width="500px"></div>
            <div class="col m-auto pr-5 pl-5 pb-3">
                <h5 class="text-justify">{{ $profile->description }}!</h5>
            </div>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-sm-2">
    {{-- Visi --}}
    <div class="col mb-5">
        {{-- Header --}}
        <div class="row">
            <div class="col text-center">
                <h1>Visi Kami</h1>
            </div>
        </div>

        {{-- Content --}}
        <div class="row ml-1 px-5 text-center">
            <h5 >{{ $profile->vision }}.</h5>
        </div>
    </div>

    {{-- Misi --}}
    <div class="col mb-5">
        {{-- Header --}}
        <div class="row">
            <div class="col text-center">
                <h1>Misi Kami</h1>
            </div>
        </div>

        {{-- Content --}}
        <div class="row px-5 text-center">
            <h5 >{{ $profile->mission }}.</h5>
        </div>
    </div>
</div>

<div class="row mt-5 mb-5 justify-content-center pr-4 pl-4">
    <div class="col-md-1"></div>
    <div class="col img-thumbnail p-2">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.670416689219!2d107.60318454971384!3d-6.929940169732509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbf3fb141%3A0x8737705619e90ed6!2sPT.%20Indotama%20Palapa%20Nusantara!5e0!3m2!1sid!2sid!4v1604920060280!5m2!1sid!2sid"
            frameborder="0" height="400px" style="width: 100%;" tabindex="0"></iframe>
    </div>
    <div class="col-md-1"></div>
</div>
@endsection
