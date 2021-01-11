@php
    checkHasLogin();
@endphp

@extends('layouts.landing')

@section('title','DIMAS - Login')

@section('mainContent')
<div class="landing row">
    <div class="col-md m-auto"><img src="assets/img/webw.png" class="img-fluid p-5"></div>
    <div class="col-md m-auto">
        <div class="col rounded card bg-white p-4">
            {{-- Header --}}
            <div class="mb-4 text-center">
                <h4>Login</h4>
            </div>

            @if(session('error'))
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ session('error') }} 
            </div>
            @endif

            <div class="text-center">
                <form action="" method="POST" id="myForm">
                    @csrf

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    {{-- Email --}}
                    <div class="col mb-4">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-at" aria-hidden="true"></i></div>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="col mb-4">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <input type="hidden" name="recaptcha" id="recaptcha">
                    <button type="submit" class="btn btn-primary btn-block" data-action="submit" style="margin-top: 10px" id="btnSubmit">Login</button>
                </form>

                <a href="{{route('/register')}}" class="mb-3">Doesn't have an account? Register</a>
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
