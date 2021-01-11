@php
    checkHasLogin();
@endphp
@extends('layouts.landing')

@section('title','DIMAS - Register')

@section('mainContent')
<div class="landing row">
    <div class="col-md m-auto"><img src="assets/img/webw.png" class="img-fluid p-5"></div>
    <div class="col-md m-auto">
        <div class="col rounded card bg-white p-4">
            {{-- Header --}}
            <div class="mb-4 text-center">
                <h3>Registrasi</h3>
            </div>

            @if(session('error'))
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ session('error') }} 
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

            <div class="text-center">
                <form action="{{ route('post.register') }}" method="POST" id="myForm">
                    @csrf
                    {{-- Row 1 : Nama & Username --}}
                    <div class="form mb-2">
                        {{-- Nama Lengkap --}}
                        <div class="my-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                            </div>
                        </div>
 
                        {{-- Email --}}
                        <div class="my-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope-o"
                                            aria-hidden="true"></i></div>
                                </div>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>

                        {{-- Username --}}
                        <div class="my-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <input type="tel" class="form-control" name="no_hp" placeholder="Phone Number">
                            </div>
                        </div>

                    </div>

                    {{-- Row 3 : Password & Confirm Password --}}
                    <div class="form-row mb-4">
                        {{-- Password --}}
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" name="confirmPassword"
                                    placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"
                        style="margin-top: 10px;" data-action='submit' id="btnSubmit">Register</button>
                    <input type="hidden" name="recaptcha" id="recaptcha">
                </form>
                <a href="{{ route ('/login')}}">Already have Account? Log In</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#btnSubmit").click(function(e){
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'submit'}).then(function(token) {
                if (token) {
                    document.getElementById('recaptcha').value = token;
                    $('#myForm').submit();
                }
                });
            });
        });
    });
</script>
<!-- End of vector -->
@endsection