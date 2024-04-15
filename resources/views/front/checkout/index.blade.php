@extends('front.layout.master')
@section('title','Checkout')
@section('body')
     <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>checkout</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!--Checkout page section-->
    <div class="Checkout_section">

        <div class="checkout_form">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                        <h3>Billing Details</h3>
                        <div class="row">

                            <div class="col-lg-6 mb-30">
                                <label>First Name <span>*</span></label>
                                <input type="text" id="fir" name="first_name">
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label>Last Name  <span>*</span></label>
                                <input type="text" id="last" name="last_name">
                            </div>
                            <div class="col-12 mb-30">
                                <label>Company Name</label>
                                <input type="text" id="cun_name" name="company_name">
                            </div>
                            <div class="col-12 mb-30">
                                <label for="country">country <span>*</span></label>
                                <input type="text" id="cun" name="country">
                            </div>

                            <div class="col-12 mb-30">
                                <label>Street address  <span>*</span></label>
                                <input id="street" placeholder="House number and street name" type="text" name="street_address">
                            </div>
                            <div class="col-12 mb-30">
                                <label>Postcode / CIP <span>*</span></label>
                                <input type="text" id="zip" name="postcode_zip">
                            </div>
                            <div class="col-12 mb-30">
                                <label>Town / City <span>*</span></label>
                                <input type="text" id="town" name="town_city">
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label>Phone<span>*</span></label>
                                <input type="text" id="phone" name="phone">

                            </div>
                            <div class="col-lg-6 mb-30">
                                <label> Email Address   <span>*</span></label>
                                <input type="text" id="email" name="email">

                            </div>

                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive mb-30">
                            <table>
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td> {{ $cart->name }} <strong> × {{ $cart->qty }}</strong></td>
                                        <td> ${{ $cart->price * $cart->qty }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>${{ $subtotal }}</td>
                                </tr>
                                <tr class="order_total">
                                    <th>Order Total</th>
                                    <td><strong>${{ $total }}</strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                                <input id="payment" name="check_method" value="pay_later" type="radio" data-target="createp_account">
                                <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Pay Later</label>
                            </div>
                            <div class="panel-default">
                                <input id="payment_defult" name="check_method" value="online_payment"  type="radio" data-target="createp_account">
                                <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Online payment</label>
                            </div>
                            <div class="order_button">
                                <button type="submit">Proceed to PayPal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Checkout page section end-->
@endsection
