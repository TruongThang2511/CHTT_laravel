@extends('front.layout.master')

@section('title','Home')
@section('body')
    <!--pos home section-->
    <div class=" pos_home_section">
        <div class="row pos_home">
            <div class="col-lg-3 col-md-8 col-12">
                <!--sidebar banner-->
                <div class="sidebar_widget banner mb-35">
                    <div class="banner_img mb-35">
                        <a href="#"><img src="front/img/banner/banner5.jpg" alt=""></a>
                    </div>
                    <div class="banner_img">
                        <a href="#"><img src="front/img/banner/banner6.jpg" alt=""></a>
                    </div>
                </div>
                <!--sidebar banner end-->


                <!--wishlist block start-->
                <div class="sidebar_widget wishlist mb-35">
                    <div class="block_title">
                        <h3><a href="#">Wishlist</a></h3>
                    </div>
                    <div class="cart_item">
                        <div class="cart_img">
                            <a href="#"><img src="front/img/cart/cart.jpg" alt=""></a>
                        </div>
                        <div class="cart_info">
                            <a href="#">lorem ipsum dolor</a>
                            <span class="cart_price">$115.00</span>
                            <span class="quantity">Qty: 1</span>
                        </div>
                        <div class="cart_remove">
                            <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                        </div>
                    </div>
                    <div class="cart_item">
                        <div class="cart_img">
                            <a href="#"><img src="front/img/cart/cart2.jpg" alt=""></a>
                        </div>
                        <div class="cart_info">
                            <a href="#">Quisque ornare dui</a>
                            <span class="cart_price">$105.00</span>
                            <span class="quantity">Qty: 1</span>
                        </div>
                        <div class="cart_remove">
                            <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                        </div>
                    </div>
                    <div class="block_content">
                        <p>2  products</p>
                        <a href="#">» My wishlists</a>
                    </div>
                </div>
                <!--wishlist block end-->

                <!--popular tags area-->
                <div class="sidebar_widget tags mb-35">
                    <div class="block_title">
                        <h3>popular tags</h3>
                    </div>
                    <div class="block_tags">
                        <a href="#">ipod</a>
                        <a href="#">sam sung</a>
                        <a href="#">apple</a>
                        <a href="#">iphone 5s</a>
                        <a href="#">superdrive</a>
                        <a href="#">shuffle</a>
                        <a href="#">nano</a>
                        <a href="#">iphone 4s</a>
                        <a href="#">canon</a>
                    </div>
                </div>
                <!--popular tags end-->

                <!--newsletter block start-->
                <div class="sidebar_widget newsletter mb-35">
                    <div class="block_title">
                        <h3>newsletter</h3>
                    </div>
                    <form action="#">
                        <p>Sign up for your newsletter</p>
                        <input placeholder="Your email address" type="text">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
                <!--newsletter block end-->

                <!--sidebar banner-->
                <div class="sidebar_widget bottom ">
                    <div class="banner_img">
                        <a href="#"><img src="front/img/banner/banner9.jpg" alt=""></a>
                    </div>
                </div>
                <!--sidebar banner end-->



            </div>
            <div class="col-lg-9 col-md-12">
                <!--banner slider start-->
                <div class="banner_slider slider_1">
                    <dviv class="slider_active owl-carousel">
                        <div class="single_slider" style="background-image: url(front/img/slider/slide_1.png)">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                    <h1>Women's Fashion</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_slider" style="background-image: url(front/img/slider/slider_2.png)">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                    <h1>New Collection</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_slider" style="background-image: url(front/img/slider/slider_3.png)">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                    <h1>Best Collection</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                    </dviv>
                </div>
                <!--banner slider start-->

                <!--new product area start-->
                <div class="new_product_area">
                    <div class="block_title">
                        <h3>Women Products</h3>
                    </div>
                    <div class="row">
                        <div class="product_active owl-carousel">
                            @foreach($featuredProducts['women'] as $womenProduct)
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="shop/product/{{ $womenProduct->id }}"><img src="front/img/products/{{ $womenProduct->productImages[0]->path }}" alt=""></a>
                                            <div class="product_action">
                                                <a href="cart/add/{{$womenProduct->id }}"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <span class="product_price">${{ $womenProduct->discount }}</span>
                                            <h3 class="product_title"><a href="shop/product/{{ $womenProduct->id }}">{{ $womenProduct->name }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--new product area start-->

                <!--featured product start-->
                <div class="featured_product">
                    <div class="block_title">
                        <h3>Men Products</h3>
                    </div>
                    <div class="row">
                        <div class="product_active owl-carousel">
                            @foreach($featuredProducts['men'] as $menProduct)
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="shop/product/{{ $menProduct->id }}"><img src="front/img/products/{{ $menProduct->productImages[0]->path }}" alt=""></a>
                                            <div class="product_action">
                                                <a href="cart/add/{{$menProduct->id }}"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <span class="product_price">${{ $menProduct->discount }}</span>
                                            <h3 class="product_title"><a href="shop/product/{{ $menProduct->id }}">{{ $menProduct->name }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--featured product end-->

                <!--banner area start-->
                <div class="banner_area mb-60">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner">
                                <a href="#"><img src="front/img/banner/banner7.jpg" alt=""></a>
                                <div class="banner_title">
                                    <p>Up to <span> 40%</span> off</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner">
                                <a href="#"><img src="front/img/banner/banner8.jpg" alt=""></a>
                                <div class="banner_title title_2">
                                    <p>sale off <span> 30%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--banner area end-->

                <!--brand logo strat-->
                <div class="brand_logo mb-60">
                    <div class="block_title">
                        <h3>Brands</h3>
                    </div>
                    <div class="row">
                        <div class="brand_active owl-carousel">
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="front/img/brand/brand1.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="front/img/brand/brand2.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="front/img/brand/brand3.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="front/img/brand/brand4.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="front/img/brand/brand5.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="front/img/brand/brand6.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--brand logo end-->
            </div>
        </div>
    </div>
    <!--pos home section end-->





@endsection
