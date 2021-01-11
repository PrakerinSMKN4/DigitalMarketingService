@extends('layouts.landing')

@section('title','DIMAS - Contact')

@section('bg-contact','bg-primary')

@section('text-contact','text-light')

@section('mainContent')
<!-- vector -->
<div class="landing row p-2">
    <div class="col-1"> {{-- OFFSET--}} </div>
    <div class="col-md m-auto p-5">
        <h1>Contact Us</h1>
        <h3>DIMAS</h3>
        <p>Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor</p>
    </div>
    <div class="col-md m-auto"><img src="assets/img/web2.png" class="img-fluid"></div>
</div>
<!-- End of vector -->
<!-- Maps -->
<div class="maps row justify-content-center mt-5">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.670416689219!2d107.60318454971384!3d-6.929940169732509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e89dbf3fb141%3A0x8737705619e90ed6!2sPT.%20Indotama%20Palapa%20Nusantara!5e0!3m2!1sid!2sid!4v1604920060280!5m2!1sid!2sid"
        width="1000" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
        tabindex="0"></iframe>
</div>
<!-- End Maps -->
<!-- Address -->
<div class="address text-center text-md-left">

    <!-- Grid row -->
    <div class="row mt-5">

        {{-- <!-- Grid column -->
        <div class="col-md-3 mx-auto">

            <!-- Links -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

            <ul class="list-unstyled">
                <li>
                    <a href="#!">Very long link 1</a>
                </li>
                <li>
                    <a href="#!">Very long link 2</a>
                </li>
                <li>
                    <a href="#!">Very long link 3</a>
                </li>
                <li>
                    <a href="#!">Very long link 4</a>
                </li>
            </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

            <!-- Links -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

            <ul class="list-unstyled">
                <li>
                    <a href="#!">Link 1</a>
                </li>
                <li>
                    <a href="#!">Link 2</a>
                </li>
                <li>
                    <a href="#!">Link 3</a>
                </li>
                <li>
                    <a href="#!">Link 4</a>
                </li>
            </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

            <!-- Links -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

            <ul class="list-unstyled">
                <li>
                    <a href="#!">Link 1</a>
                </li>
                <li>
                    <a href="#!">Link 2</a>
                </li>
                <li>
                    <a href="#!">Link 3</a>
                </li>
                <li>
                    <a href="#!">Link 4</a>
                </li>
            </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

            <!-- Links -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

            <ul class="list-unstyled">
                <li>
                    <a href="#!">Link 1</a>
                </li>
                <li>
                    <a href="#!">Link 2</a>
                </li>
                <li>
                    <a href="#!">Link 3</a>
                </li>
                <li>
                    <a href="#!">Link 4</a>
                </li>
            </ul>

        </div>
        <!-- Grid column --> --}}

    </div>
    <!-- Grid row -->

</div>
<!-- Footer Links -->
<!-- End Address -->
<!-- start project -->
<div class="row my-3 text-center" style="background-color: #918ABD;">
    <div class="col-md-12 mt-3">
        <h2 style="color: white;">Mulai Project anda bersama kami</h2>
    </div>
    <div class="col-md-12 my-4">
        <a href="{{ route('/login') }}">
        <button class="btn btn-success">
            Mulai Project
        </button>
        </a>
    </div>
</div>
<!-- end -->
@endsection
