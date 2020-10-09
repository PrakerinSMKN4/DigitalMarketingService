<head>
    <title>Sign Up</title>

    {{-- Plugin --}}
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>
</head>

<div class="row h-100 w-100 m-0" style="background: #36395a;">
    <div class="container my-auto" style="text-align: center;">
        
        @if(session('error'))
        <div class="alert alert-error">
            {{session('error')}}
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Perhatian</strong>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row justify-content-center">

            {{--Login Forms--}}
            <div class="col-lg-8 rounded" style="background: #ffffff; padding: 3rem;">

                {{-- Header --}}
                <div class="mb-4">
                    <h3>Register</h3>
                </div>

                <div class="mt-4">
                    <form action="{{ route ('register')}}" method="POST">
                        @csrf
                        {{-- Row 1 : Nama & Username --}}
                        <div class="form-row mb-4">
                            {{-- Nama Lengkap --}}
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name">
                                </div>
                            </div>

                            {{-- Username --}}
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-at" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                </div>
                            </div>
                        </div>

                        {{-- Row 2 : Email & No Handphone --}}
                        <div class="form-row mb-4">
                            {{-- Email --}}
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope-o"
                                                aria-hidden="true"></i></div>
                                    </div>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>

                            {{-- Username --}}
                            <div class="col">
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
                            style="margin-top: 10px">Register</button>
                    </form>
                    <a href="{{ route ('login')}}">Already have Account?</a>
                </div>
            </div>
        </div>
    </div>
</div>
