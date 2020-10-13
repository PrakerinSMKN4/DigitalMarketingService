<head>
    <title>Login</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Plugin --}}
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/ajax.js')}}"> </script>
</head>

{{--@if(session('error'))
    <div class="alert alert-error">
        {{session('error')}}
</div>
@endif --}}


<div class="row h-100 w-100 m-0" style="background: #36395a;">
    <div class="container my-auto" style="text-align: center;">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <div class="row">
            {{-- Vector, Etc --}}
            <div class="col-8 rounded-left" style="background: #f6af09;">
                <div class="row h-100">
                    <div class="m-auto">
                        <img src="{{asset('/assets/default/3972337.png')}}" alt="" height="400em">
                    </div>
                </div>
            </div>

            {{--Login Forms--}}
            <div class="col rounded-right" style="background: #ffffff; padding: 3rem;">

                {{-- Header --}}
                <div class="mb-4">
                    <h4>WELCOME!</h4>
                    <h4>Let's do your change</h4>
                </div>

                {{-- Error Validation --}}
                @if(session('error'))
                <i style="color: red;" class="text-danger ml-3 mb-3"> {{ session('error') }} </i>
                @endif

                <div class="mt-4">
                    {{-- <form action="/postlogin" method="POST"> --}}
                    <form action="{{ route ('login')}}" method="POST">
                        @csrf

                        {{-- Username --}}
                        <div class="form-row mb-4">
                            <div class="col-2 align-self-center">
                                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                        </div>

                        {{-- Password--}}
                        <div class="form-row mb-4">
                            <div class="col-2 align-self-center">
                                <i class="fa fa-lock fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                        </div>

                        {{-- Remember Me --}}
                        <div class="form-group form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="rememberPassword">
                            <label class="form-check-label" for="rememberPassword">Remember Password</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px">Login</button>
                    </form>

                    <a href="{{route('register')}}" class="btn btn-info btn-block mb-3" role="button">Register</a>
                    {{-- Google Sign In --}}
                    <a class="btn btn-danger btn-block mb-4" href="{{ route('login.provider','google') }}"
                        role="button"><i class="fa fa-google-plus fa-1x" aria-hidden="true"></i>&nbsp;Google</a>
                    <button type="button" class="btn btn-transparant" data-toggle="modal" data-target="#exampleModal">
                        Forgot Password
                    </button>
                    {{-- Forgot Password Modal--}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Forgot Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- Email --}}
                                    <div class="alert-success mb-4">
                                        <center><b id="messageEmail"></b></center>
                                    </div>
                                    <div class="form-row mb-4">

                                        <div class="col-2 align-self-center">
                                            <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="Email" id="emailForgot"
                                                placeholder="Email">
                                        </div>
                                        <button type="button" class="btn btn-primary" id="sendOTP">Send OTP</button>
                                    </div>

                                    {{-- OTP --}}
                                    <div class="form-row mb-4">
                                        <div class="col-2 align-self-center">
                                            <i class="fa fa-lock fa-2x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col">
                                            <input type="password" class="form-control" id="OTP" name="OTP"
                                                placeholder="OTP">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        id="confirmOTP">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Insert New Password--}}
<div class="modal fade" id="newPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert New Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- New Password --}}
                <div class="mb-4" id="divMessage">
                    <center><b id="message"></b></center>
                </div>
                <div class="form-row mb-4">
                    <div class="col-2 align-self-center">
                        <i class="fa fa-lock fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" id="npass" name="New Password"
                            placeholder="New Password">
                    </div>
                </div>

                {{-- Password Confirmation --}}
                <div class="form-row mb-4">
                    <div class="col-2 align-self-center">
                        <i class="fa fa-lock fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" id="cpass" name="Cpass"
                            placeholder="Confirm Password">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submitChange" class="btn btn-primary" data-toggle="modal"
                    data-target="#">Change</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var targetEmail;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#sendOTP").click(function () {
            targetEmail = $("#emailForgot").val();

            $.ajax({
                url: "/sendOTP",
                type: 'POST',
                data: {
                    email: targetEmail
                },
                success: function (response) {
                    if (response.status) {
                        $("#messageEmail").text("Kode Berhasil Dikirim!");
                    }
                },
            });

        });

        $("#confirmOTP").click(function () {
            var code = $("#OTP").val();
            $.ajax({
                url: "/confirmOTP",
                type: 'POST',
                data: {
                    otp: code
                },
                success: function (response) {
                    if (response.status == true) {
                        $("#exampleModal").modal("hide");
                        $("#newPass").modal("show");
                        $("#submitChange").click(function () {
                            validateInput();
                        });

                    }
                },
            });
        });

        function validateInput() {
            var newPass = $("#npass").val();
            var confirmPass = $("#cpass").val();
            if (newPass == confirmPass) {
                $.ajax({
                    url: "/changePass",
                    type: 'POST',
                    data: {
                        email: targetEmail,
                        password: newPass
                    },
                    success: function (response) {
                        if (response.status) {
                            $("#divMessage").addClass("alert-success");
                            $("#message").text(response.message + ", silakan login");
                            $("#npass").prop('disabled', true);
                            $("#cpass").prop('disabled', true);
                        } else {
                            $("#divMessage").addClass("alert-danger");
                            $("#message").text(response.message);
                        }
                    },
                });
            }
        }
    });

</script>
