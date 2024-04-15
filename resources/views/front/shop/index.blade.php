@extends('front.layout.master')
@section('title','List Product')
@section('body')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    <!--breadcrumbs area end-->

    <!--pos home section-->
    <div class=" pos_home_section">
        <div class="row pos_home">
                <div class="col-lg-3 col-md-12">
                      <div class="sidebar_widget shop_c">
                                <div class="categorie__titile">
                                    <h4>Categories</h4>
                                </div>
                                <div class="layere_categorie">
                                    <ul>
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="shop/category/{{ $category->name }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                      </div>
                    <!--layere categorie end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--banner slider start-->
                    <div class="banner_slider mb-35">
                        <img src="front/img/banner/bannner10.jpg" alt="">
                    </div>
                    <!--banner slider start-->

                    <!--shop toolbar start-->
                    <div class="shop_toolbar mb-35">

                        <div class="list_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="select_option">
                            <form action="shop">
                                <label>Sort By</label>
                                <select name="sort_by" onchange="this.form.submit();" id="short">
                                    <option {{request('sort_by') == 'latest' ? 'selected' : ''}} value="latest">Latest</option>
                                    <option {{request('sort_by') == 'oldest' ? 'selected' : ''}} value="oldest">Oldest</option>
                                    <option {{request('sort_by') == 'name-ascending' ? 'selected' : ''}} value="name-ascending">Name A-Z</option>
                                    <option {{request('sort_by') == 'name-descending' ? 'selected' : ''}} value="name-descending">Name Z-A</option>
                                    <option {{request('sort_by') == 'price-ascending' ? 'selected' : ''}} value="price-ascending">Price Ascending</option>
                                    <option {{request('sort_by') == 'price-descending' ? 'selected' : ''}} value="price-descending">Price Descending</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <!--shop tab product-->
                    <div class="shop_tab_product">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="large" role="tabpanel">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single_product">
                                                <div class="product_thumb">
                                                    <a href="/shop/product/{{ $product->id }}"><img src="front/img/products/{{ $product->productImages[0]->path }}" alt=""></a>
                                                    <div class="product_action">
                                                        <a href="cart/add/{{$product->id}}"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <span class="product_price">${{ $product->discount }}</span>
                                                    <h3 class="product_title"><a href="/shop/product/{{ $product->id }}">{{$product->name}}</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list" role="tabpanel">

                                @foreach($products as $product)
                                    <div class="product_list_item mb-35">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="product_thumb">
                                                    <a href="/shop/product/{{$product->id}}"><img src="front/img/products/{{ $product->productImages[0]->path }}" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-6 col-sm-6">
                                                <div class="list_product_content">
                                                    <div class="product_ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="list_title">
                                                        <h3><a href="shop/product/{{ $product->id }}">{{ $product->name }}</a></h3>
                                                    </div>

                                                    <div class="content_price">
                                                        <span>${{ $product->discount }}</span>
                                                        <span class="old-price">${{$product->price}}</span>
                                                    </div>
                                                    <div class="add_links">
                                                        <ul>
                                                            <li><a href="cart/add/{{$product->id}}" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <!--shop tab product end-->

                    <div class="phantrang">
                        {{ $products -> links() }}
                    </div>

                </div>
            </div>
    </div>
    <!--pos home section end-->
@endsection
