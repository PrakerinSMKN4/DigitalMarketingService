 {{-- Plugin --}}
 <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
 <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
 <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>


<center>

<h1> Hi {{ Auth::user()->name }}, Ini Tampilan Dashboard </h1>

<div class="btn btn-danger">     
    <a href="{{ route('logout') }}"><b> Logout </b></a>
</div>
</center>