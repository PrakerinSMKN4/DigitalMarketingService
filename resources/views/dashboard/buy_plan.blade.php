@extends('layouts.dashboard')

@section('title', 'DIMAS - Buy a Plan')

@section('content')

<div class="row mt-3">
    <div class="col">
        <div class="btn-group-toggle text-center" data-toggle="buttons">
            <label for="selectPlan" class="btn btn-outline-dark rounded-circle ml-3 mr-3 p-3 active">
                <input type="radio" checked class="planStep" id="selectPlan" name="planStep" value="plan">
                <i class="fa fa-book fa-2x" aria-hidden="true"></i>
            </label>
            <label for="selectTheme" class="btn btn-outline-dark rounded-circle ml-3 mr-3 p-3 disabled">
                <input type="radio" class="planStep" id="selectTheme" name="planStep" value="theme">
                <i class="fa fa-icons fa-2x" aria-hidden="true"></i>
            </label>
            <label for="selectPayment" class="btn btn-outline-dark rounded-circle ml-3 mr-3 p-3 disabled">
                <input type="radio" class="planStep" id="selectPayment" name="planStep" value="payment">
                <i class="fa fa-shopping-bag fa-2x" aria-hidden="true"></i>
            </label>
        </div>
    </div>
</div>

<div class="row" id="plan">
    <div class="col">
        {{-- Content : Plan : Header --}}
        <div class="row p-3">
            <div class="col">
                <h1 class="text-center">Choose your Plan</h1>
                <p class="text-center">Let's Make a deal for your Company</p>
                <div class="btn-group-toggle text-center" data-toggle="buttons">
                    <label for="bundle" class="btn btn-outline-info ml-2 mr-2 active">
                        <input type="radio" checked class="planSelect" id="bundle" name="planSelect"
                            value="sBundle">Bundle
                    </label>
                    <label for="website" class="btn btn-outline-info ml-2 mr-2">
                        <input type="radio" class="planSelect" id="website" name="planSelect" value="sWebsite">Website
                    </label>
                    <label for="medsos" class="btn btn-outline-info ml-2 mr-2">
                        <input type="radio" class="planSelect" id="medsos" name="planSelect" value="sMedsos">Media
                        Social
                    </label>
                </div>
            </div>
        </div>

        <div class="container p-3">

            {{-- Bundle --}}
            <div class="row" id="sBundle">
                {{-- Premium --}}
                <div class="col-md" style="margin-top: 20px;">
                    <label class="card h-100 plan" for="bundlePremium">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">Premium</h5>
                                    <h6 class="card-subtitle text-muted text-center">1 Year Access (Full Access)</h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="card-subtitle mb-2 text-center" style="font-size: 150px;">
                                        5<span style="font-size: 30px;">.5 jt</span>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row row-cols-1 text-center" style="font-size: 20px">
                                            <div class="col">
                                                <p><i class="fas fa-check-circle text-success mr-2"></i>Building Website
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p><i class="fas fa-check-circle text-success mr-2"></i>Thematic Posting
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p><span><i class="fas fa-check-circle text-success mr-2"></i></span>
                                                    Maintanance Website
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p><span><i class="fas fa-check-circle text-success mr-2"></i></span>
                                                    Maintanance Social Media
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p><span><i class="fas fa-check-circle text-success mr-2"></i></span>
                                                    Schedule Posting
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>

                {{-- Gold --}}
                <div class="col-md" style="margin-top: 20px;">
                    <label class="card h-100 plan" for="bundleGold">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">
                                        Gold
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-center">
                                        1 Year Access (Half Access)
                                    </h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="card-subtitle mb-2 text-center" style=" font-size: 150px;">4<span
                                            style="font-size: 30px;">.0 jt</span></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2"><span><i
                                                                    class="fas fa-check-circle text-success mr-2"></i></span>Building
                                                            Website</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-danger text-center mb-2"><span><i
                                                                    class="fas fa-minus-circle mr-2"></i></span>(Without
                                                            Showing Product on
                                                            Website)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Thematic
                                                    Posting</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Maintanance
                                                    Website</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Maintanance
                                                    Social Media</p>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2"><span><i
                                                                    class="fas fa-check-circle text-success mr-2"></i></span>Schedule
                                                            Posting</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-danger text-center mb-2"><span><i
                                                                    class="fas fa-minus-circle mr-2"></i></span>(Without
                                                            Posting on Big Day
                                                            Celebration)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>

                {{-- Regular --}}
                <div class="col-md" style="margin-top: 20px;">
                    <label class="card h-100 plan" for="bundleRegular">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">
                                        Regular
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-center">
                                        1 Year Access (Early Access)
                                    </h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="card-subtitle mb-2 text-center" style=" font-size: 150px;">3<span
                                            style="font-size: 30px;">.0 jt</span></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2"><span><i
                                                                    class="fas fa-check-circle text-success mr-2"></i></span>Building
                                                            Website</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-danger text-center mb-2"><span><i
                                                                    class="fas fa-minus-circle mr-2"></i></span>(Without
                                                            Showing Product and
                                                            Detail on Website)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Thematic
                                                    Posting</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Maintanance
                                                    Website</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Maintanance
                                                    Social Media</p>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2"><span><i
                                                                    class="fas fa-check-circle text-success mr-2"></i></span>Building
                                                            Website</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-center text-danger mb-2"><span><i
                                                                    class="fas fa-minus-circle mr-2"></i></span>(Without
                                                            Posting on Big Day
                                                            Celebration and Upload Every Day)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Website --}}
            <div class="row" id="sWebsite" style="display: none;">
                {{-- Premium --}}
                <div class="col-md" style="margin-top: 20px;">
                    <label class="card h-100 plan" for="webPremium">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">
                                        Premium Web
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-center">
                                        1 Year Access (Full Access)
                                    </h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="card-subtitle mb-2 text-center" style=" font-size: 150px; ">3<span
                                            style="font-size: 30px;">.0 jt</span></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Landing
                                                    Page</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Product
                                                    Show</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Detail
                                                    Webs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                {{-- Gold --}}
                <div class="col-md-4" style="margin-top: 20px;">
                    <label class="card h-100 plan" for="webGold">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">
                                        Gold Web
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-center">
                                        1 Year Access (Half Access)
                                    </h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="card-subtitle mb-2 text-center" style=" font-size: 150px;">2<span
                                            style="font-size: 30px;">.0 jt</span></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Landing
                                                    Page</p>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2"><span><i
                                                                    class="fas fa-check-circle text-success mr-2"></i></span>Product
                                                            Show</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-danger text-center mb-2"><span><i
                                                                    class="fas fa-minus-circle mr-2"></i></span>(Without
                                                            Showing Product on
                                                            Website)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px; text-align: center;"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Detail
                                                    Website</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                {{-- Regular --}}
                <div class="col-md-4" style="margin-top: 20px;">
                    <label class="card h-100 plan" for="webRegular">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">
                                        Regular Web
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-center">
                                        1 Year Access (Early Access)
                                    </h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="card-subtitle mb-2 text-center" style=" font-size: 150px;">1<span
                                            style="font-size: 30px;">.5 jt</span></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p style="font-size: 20px; text-align: center;"><span><i
                                                            class="fas fa-check-circle text-success mb-2"></i></span>Landing
                                                    Page</p>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2"><span><i
                                                                    class="fas fa-check-circle text-success mr-2"></i></span>Product
                                                            Show</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-danger text-center mb-2"><span><i
                                                                    class="fas fa-minus-circle text-danger mr-2"></i></span>(Without
                                                            Showing Product on
                                                            Website)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2"><span><i
                                                                    class="fas fa-check-circle text-success mr-2"></i></span>Detail
                                                            Website</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-danger text-center mb-2">
                                                            <i class="fas fa-minus-circle text-danger mr-2"></i>
                                                            (Without Detail on Website)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Social Media --}}
            <div class="row" id="sMedsos" style="display: none;">
                {{-- Premium --}}
                <div class="col-md-4" style="margin-top: 20px;">
                    <label class="card h-100 plan" for="sosmedPremium">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">
                                        Premium Social Media
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-center">
                                        1 Year Access (Full Access)
                                    </h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="card-subtitle mb-2 text-center" style=" font-size: 150px;">3<span
                                            style="font-size: 30px;">.0 jt</span></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p style="font-size: 20px; text-align: center;"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Landing
                                                    Page</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px; text-align: center;"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Product
                                                    Show</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px; text-align: center;"><span><i
                                                            class="fas fa-check-circle text-success mr-2"></i></span>Detail
                                                    Webs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                {{-- Gold --}}
                <div class="col-md-4" style="margin-top: 20px;">
                    <label class="card h-100 plan" for="sosmedGold">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">
                                        Gold Social Media
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-center">
                                        1 Year Access (Half Access)
                                    </h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="card-subtitle mb-2 text-center" style="font-size: 150px;">2<span
                                            style="font-size: 30px;">.0 jt</span></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center">
                                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                                    Landing Page
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2">
                                                            <i class="fas fa-check-circle text-success mr-2"></i></span>
                                                            Product Show
                                                        </p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-center text-danger mb-2">
                                                            <i class="fas fa-minus-circle text-danger mr-2"></i>
                                                            (Without Showing Product on Website)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center">
                                                    <i class="fas fa-check-circle text-success mr-2"></i>Detail Website
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                {{-- Regular --}}
                <div class="col-md" style="margin-top: 20px;">
                    <label class="card h-100 plan" for="sosmedRegular">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">Regular Social Media</h5>
                                    <h6 class="card-subtitle mb-2 text-center text-muted">1 Year Access (Early Access)
                                    </h6>
                                </div>
                                <div class="col-md-12">
                                    <p class="card-subtitle mb-2 text-center" style=" font-size: 150px;">1<span
                                            style="font-size: 30px;">.5 jt</span></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p style="font-size: 20px;" class="text-center"><span><i
                                                            class="fas fa-check-circle mr-2 text-success"></i></span>Landing
                                                    Page</p>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2"><span><i
                                                                    class="fas fa-check-circle mr-2 text-success"></i></span>Product
                                                            Show</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-center text-danger mb-2"><i
                                                                class="fas fa-minus-circle text-danger mr-2"></i>(Without
                                                            Showing Product on
                                                            Website)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="font-size: 20px;" class="text-center mb-2"><span><i
                                                                    class="fas fa-check-circle mr-2 text-success"></i></span>Detail
                                                            Website</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size: 13px;"
                                                            class="text-center text-danger mb-2"><i
                                                                class="fas fa-minus-circle text-danger mr-2"></i>(Without
                                                            Detail on Website)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="theme" style="display: none;">
    <div class="col">
        {{-- Content : Theme : Header --}}
        <div class="row p-3">
            <div class="col">
                <h1 class="text-center">Choose your Theme</h1>
                <p class="text-center">Let's Paint your Company Profile</p>
            </div>
        </div>

        {{-- Theme Item --}}
        <div class="row p-3">
            {{-- Light --}}
            <div class="col-md p-2">
                <label class="card theme" for="themeLight">
                    <div class="card-body">
                        <h4 class="card-title">Light</h4>
                        <p class="card-text">lightExample.png</p>
                    </div>
                </label>
            </div>
            {{-- Dark --}}
            <div class="col-md p-2">
                <label class="card theme" for="themeDark">
                    <div class="card-body">
                        <h4 class="card-title">Dark</h4>
                        <p class="card-text">darkExample.png</p>
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="row" id="payment" style="display: none;">
    <div class="col">
        {{-- Content : Payment : Header --}}
        <div class="row p-3">
            <div class="col">
                <h1 class="text-center">Payment Confirmation</h1>
                <p class="text-center">Confirm your Planning Transaction</p>
            </div>
        </div>

        {{-- Payment Option --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 p-3">
            {{-- ATM --}}
            <div class="col p-2">
                <label class="card payment" for="payAtm">
                    <img class="card-img-top" src="{{ asset('assets/img/atm.jpg') }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">ATM</h4>
                        <p style="font-size: 15px;">No.Rek : 091-21-31-91</p>
                    </div>
                </label>
            </div>
        </div>

        {{-- Plan Data --}}
        <div class="row p-3">
            <div class="col-md">
                <table class="table">
                    <tbody>
                        <tr>
                            
                        </tr>
                        <tr>
                            <td>Paket Dipilih</td>
                            <td>:</td>
                            <td id="rPlan"></td>
                        </tr>
                        <tr>
                            <td>Tema Dipilih</td>
                            <td>:</td>
                            <td id="rTheme"></td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td>:</td>
                            <td id="rPayment"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><label class="btn btn-success btn-lg" for="submitButton" id="submit">Submit</label></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="d-none">
    <form action="#" method="GET">
        {{-- Plan --}}
        <input type="radio" name="plan" value="Bundle Premium" id="bundlePremium">
        <input type="radio" name="plan" value="Bundle Gold" id="bundleGold">
        <input type="radio" name="plan" value="Bundle Regular" id="bundleRegular">
        <input type="radio" name="plan" value="Web Premium" id="webPremium">
        <input type="radio" name="plan" value="Web Gold" id="webGold">
        <input type="radio" name="plan" value="Web Regular" id="webRegular">
        <input type="radio" name="plan" value="Social Media Premium" id="sosmedPremium">
        <input type="radio" name="plan" value="Social Media Gold" id="sosmedGold">
        <input type="radio" name="plan" value="Social Media Regular" id="sosmedRegular">
        {{-- Theme --}}
        <input type="radio" name="theme" id="themeLight" value="Light Theme">
        <input type="radio" name="theme" id="themeDark" value="Dark Theme">
        {{-- Payment --}}
        <input type="radio" name="payment" id="payAtm" value="ATM">
        <input type="radio" name="payment" id="payPaypal" value="Paypal">
        <input type="radio" name="payment" id="payOffline" value="Offline">
        <button type="submit" id="submitButton">Submit</button>
    </form>
</div>

<script>
    //Step Tab Section
    $('.planStep').change(function () {
        // Content Hide
        $('.planStep').each(function () {
            var name = $(this).attr("value");
            $('#' + name).hide();
        });

        // Selected Step
        $('.planStep:checked').each(function () {
            // Content Show
            var name = $(this).attr("value");
            $('#' + name).show();

            // Hover Activity
            $('.' + name).hover(
            function () {
                if ($(this).hasClass("active")) {} else {
                    $(this).addClass("bg-light");
                }
            },
            function () {
                if ($(this).hasClass("active")) {} else {
                    $(this).removeClass("bg-light");
                }
            });
        });

    }).change();

    // Plan Tab Section
    $('.planSelect').change(function () {
        $('.planSelect').each(function () {
            var name = $(this).attr("value");
            $('#' + name).hide();
        });
        $('.planSelect:checked').each(function () {
            var name = $(this).attr("value");
            $('#' + name).show();
        });
    }).change();


    // Plan Selection
    $('input[name="plan"]').change(function () {
        $('input[name="plan"]').each(function () {
            var name = $(this).attr("id");
            $('label[for=' + name + ']').removeClass("bg-light active");
        });
        $('input[name="plan"]:checked').each(function () {
            var name = $(this).attr("id");
            $('label[for=' + name + ']').addClass("bg-light active");
            $('label[for="selectPlan"]').removeClass("btn-outline-dark");
            $('label[for="selectTheme"]').removeClass("disabled");
            $('label[for="selectPlan"]').addClass("btn-success");
            $('#rPlan').text($(this).attr("value"));
        });
    }).change();

    // Theme Selection
    $('input[name="theme"]').change(function () {
        $('input[name="theme"]').each(function () {
            var name = $(this).attr("id");
            $('label[for=' + name + ']').removeClass("bg-light active");
        });
        $('input[name="theme"]:checked').each(function () {
            var name = $(this).attr("id");
            $('label[for=' + name + ']').addClass("bg-light active");
            $('label[for="selectTheme"]').removeClass("btn-outline-dark");
            $('label[for="selectPayment"]').removeClass("disabled");
            $('label[for="selectTheme"]').addClass("btn-success");
            $('#rTheme').text($(this).attr("value"));
        });
    }).change();
    
    $('input[name="payment"]').change(function () {
        $('input[name="payment"]').each(function () {
            var name = $(this).attr("id");
            $('label[for=' + name + ']').removeClass("bg-light active");
        });
        $('input[name="payment"]:checked').each(function () {
            var name = $(this).attr("id");
            $('label[for=' + name + ']').addClass("bg-light active");
            $('label[for="selectPayment"]').removeClass("btn-outline-dark");
            $('label[for="submitButton"]').removeClass("disabled");
            $('label[for="selectPayment"]').addClass("btn-success");
            $('#rPayment').text($(this).attr("value"));
        });
    }).change();

</script>

<script>
    $(document).ready(function(){
        $('form').on('submit', function(e){
            e.preventDefault();
            if($("#rPayment").text() != ""){
                $("#submit").addClass("disabled").text("Tunggu...");
                
                let paket = $("#rPlan").text();
                let tema = $("#rTheme").text();
                let payment = $("#rPayment").text();
                
                $.ajax({
                    url: "konfirmasi-beli-paket",
                    type: "POST",
                    data: {
                        "paket" : paket,
                        "tema" : tema,
                        "payment" : payment
                    },
                    success : function( data ){
                        Swal.fire(
                            data.keterangan,
                            data.message,
                            data.status
                        )
                        setTimeout(function(){ window.location.href = "{{ route('/dashboard') }}" }, 1000);
                        
                    }
                });
            }else{
                Swal.fire(
                    "Error",
                    "Metode Pembayaran Tidak Boleh Kosong!",
                    "error"
                )
            }
        });
    });
</script>
@endsection
