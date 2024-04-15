@extends('front.layout.master')
@section('title','Result')
@section('body')
     <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>result</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!--Checkout page section-->
    <div class="Checkout_section">
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h4>{{ $notification }}</h4>

                    <a href="./" class="primary-btn mb-20">Countinue shopping</a>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->
@endsection
