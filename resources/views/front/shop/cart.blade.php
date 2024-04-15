@extends('front.layout.master')
@section('title','Cart')
@section('body')
     <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Shopping Cart</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->



     <!--shopping cart area start -->
    <div class="shopping_cart_area">
        <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table-responsive">
                                <table class="table-responsive">
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product_price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $cart)
                                <tr data-rowid="{{$cart->rowId}}">
                                    <td class="product_remove"><a href="#">
                                            <i onclick="removeCart('{{$cart->rowId}}')" class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="front/img/products/{{$cart->options->images[0]->path}}" alt=""></a></td>
                                    <td class="product_name"><a href="#">{{ $cart->name }}</a></td>
                                    <td class="product_price">${{ number_format($cart->price,2) }}</td>
                                    <td class="product_quantity">
                                        <input min="0" max="100" value="{{ $cart->qty }}" type="text" data-rowId="{{$cart->rowId}}">
                                    </td>
                                    <td class="product_total">${{ number_format($cart->price * $cart->qty,2) }}</td>
                                </tr>
                            @endforeach
                             </tbody>
                        </table>
                            </div>
                            <div class="cart_submit">
                                <button type="submit">update cart</button>
                            </div>
                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Subtotal</p>
                                       <p class="cart_amount">${{ $total }}</p>
                                   </div>

                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p class="cart_amount">${{ $total }}</p>
                                   </div>
                                   <div class="checkout_btn">
                                       <a href="./checkout">Proceed to Checkout</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
     </div>
     <!--shopping cart area end -->
@endsection
