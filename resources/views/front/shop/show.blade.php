@extends('front.layout.master')
@section('title','Product')
@section('body')



    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>product</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!--product wrapper start-->
    <div class="product_details">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="product_tab fix">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="front/img/products/{{ $product->productImages[0]->path }}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content produc_tab_c">
                        <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="front/img/products/{{ $product->productImages[0]->path }}" alt=""></a>
                                <div class="view_img">
                                    <a class="large_view" href="front/img/products/{{ $product->productImages[0]->path }}"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product_d_right">
                    <h1>{{ $product->name }}</h1>
                    <div class="product_ratting mb-10">
                        <ul>
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $product->avgRating)
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                @else
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                @endif
                            @endfor
                            <span> ({{ count($product->productComments) }}) </span>
                        </ul>
                    </div>
                    <div class="product_desc">
                        <p>{{ $product->content }}</p>
                    </div>

                    <div class="content_price mb-15">
                        @if($product->discount != null)
                            <span>${{ $product->discount }}</span>
                            <span class="old-price">${{ $product->price }}</span>
                        @else
                            <span>${{ $product->price }}</span>
                        @endif
                    </div>
                    <div class="box_quantity mb-20">
                        <form action="#">
                            <label>quantity</label>
                            <input min="0" max="100" value="1" type="number">
                        </form>
                        <a type="submit" href="cart/add/{{$product->id }}"><i class="fa fa-shopping-cart"></i> add to cart</a>
                    </div>
                    <div class="product_d_size mb-20">
                        <label for="group_1">Size</label>

                        <select name="size" id="group_1">
                            @foreach(array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                                <option value="{{ $productSize }}">{{ $productSize }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sidebar_widget color">
                        <h2>Choose Color</h2>
                        <div class="widget_color">
                            <ul>
                                @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)
                                    <li id="{{ $productColor }}" ><a href="#" class="{{ $productColor }}"></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="wishlist-share">
                        <h4>Share on:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--product details end-->


    <!--product info start-->
    <div class="product_d_info">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">More info</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Data sheet</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{ count($product->productComments) }})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="first_child">Styles</td>
                                            <td>{{ $product->productCategory->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Properties</td>
                                            <td>{{ $product->tag }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="product_info_content">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="product_info_inner">
                                <div class="product_ratting mb-10">
                                    @foreach($product->productComments as $productComment)
                                        <ul>
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $product->avgRating)
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                @else
                                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                @endif
                                            @endfor
                                        </ul>
                                        <strong>{{ $productComment->name }}</strong>
                                        <p>{{ date('M d, Y', strtotime($productComment->created_at)) }}</p>
                                        <p>{{ $productComment->message }}</p>
                                    @endforeach
                                </div>
                            </div>

                            <div class="product_review_form">
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id ?? null }}">

                                    <h2>Add a review </h2>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6">
                                            <input id="author" type="text" placeholder="Name" name="name">

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input id="email" type="text" placeholder="Email" name="email">
                                        </div>
                                        <div class="col-12">
                                            <textarea id="review_comment" placeholder="Your review" name="messages"></textarea>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="personal-rating">
                                                    <h6>Your Rating</h6>
                                                    <div class="rate">
                                                        <input type="radio" id="star5" name="rating" value="5" />
                                                        <label for="star5" title="text">5 stars</label>
                                                        <input type="radio" id="star4" name="rating" value="4" />
                                                        <label for="star4" title="text">4 stars</label>
                                                        <input type="radio" id="star3" name="rating" value="3" />
                                                        <label for="star3" title="text">3 stars</label>
                                                        <input type="radio" id="star2" name="rating" value="2" />
                                                        <label for="star2" title="text">2 stars</label>
                                                        <input type="radio" id="star1" name="rating" value="1" />
                                                        <label for="star1" title="text">1 star</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->
    <div class="new_product_area product_page">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                    <h3>    Related Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                @foreach($relatedProducts as $product)
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a href="shop/product/{{ $product->id }}"><img src="front/img/products/{{ $product->productImages[0]->path }}" alt=""></a>
                                <div class="product_action">
                                    <a href="cart/add/{{ $product->id }}"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">${{$product->discount}}</span>
                                <h3 class="product_title"><a href="shop/product/{{ $product->id }}">{{ $product->name }}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
