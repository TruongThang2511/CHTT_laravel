<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <base href="{{asset('/')}}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href=".front/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/plugin.css">
    <link rel="stylesheet" href="front/css/bundle.css">
    <link rel="stylesheet" href="front/css/style.css">
    <link rel="stylesheet" href="front/css/responsive.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="front/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<!-- Add your site or application content here -->

<!--pos page start-->
<div class="pos_page">
    <div class="container">
        <!--pos page inner-->
        <div class="pos_page_inner">
            <!--header area -->
            <div class="header_area">
                <!--header top-->
                <div class="header_top">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="switcher">
                                <ul>
                                    <li class="languages"><a href="#"><img src="front/img/logo/fontlogo.jpg" alt=""> English <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown_languages">
                                            <li><a href="#"><img src="front/img/logo/fontlogo.jpg" alt=""> English</a></li>
                                            <li><a href="#"><img src="front/img/logo/fontlogo2.jpg" alt=""> French </a></li>
                                        </ul>
                                    </li>

                                    <li class="currency"><a href="#"> Currency : $ <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown_currency">
                                            <li><a href="#"> Dollar (USD)</a></li>
                                            <li><a href="#"> Euro (EUR)  </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="header_links">
                                <ul>
                                    <li><a href="contact.html" title="Contact">Contact</a></li>
                                    <li><a href="wishlist.html" title="wishlist">My wishlist</a></li>
                                    <li><a href="my-account.html" title="My account">My account</a></li>
                                    <li><a href="./cart" title="My cart">My cart</a></li>
                                    <li><a href="login.html" title="Login">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header top end-->

                <!--header middel-->
                <div class="header_middel">
                    <div class="row align-items-center">
                        <!--logo start-->
                        <div class="col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="index.html"><img src="front/img/logo/logo.jpg.png" alt=""></a>
                            </div>
                        </div>
                        <!--logo end-->
                        <div class="col-lg-9 col-md-9">
                            <div class="header_right_info">
                                <div class="search_bar">
                                    <form action="shop">
                                        <input name="search" value="{{ request('search') }}" placeholder="Search..." type="text">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="shopping_cart">
                                    <a href="./cart" class="cart-count"><i class="fa fa-shopping-cart"></i> View Cart {{ Cart::count() }}</i></a>
                                </div>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    @foreach(Cart::content() as $cart)
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="front/img/products/{{$cart->options->images[0]->path}}" alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">{{$cart->name}}</a>
                                                <span class="cart-price">${{$cart->price * $cart->qty}}</span>
                                                <span class="quantity">{{$cart->qty}}</span>
                                            </div>
                                            <div class="cart_remove">
                                                <a title="Remove this item" href="#"><i onclick="removeCart('{{$cart->rowId}}')" class="fa fa-times-circle"></i></a>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="total_price">
                                        <span> total </span>
                                        <span class="select-total">  ${{ Cart::total() }}  </span>
                                    </div>
                                    <div class="cart_button">
                                        <a href="./checkout"> Check out</a>
                                    </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--header middel end-->
                <div class="header_bottom">
                    <div class="row">
                        <div class="col-12">
                            <div class="main_menu_inner">
                                <div class="main_menu d-none d-lg-block">
                                    <nav>
                                        <ul>
                                            <li class="{{(request()->segment(1) == '') ? 'active' : ''}}"><a href="/">Home</a>
                                            </li>
                                            <li class="{{(request()->segment(1) == 'shop') ? 'active' : ''}}"><a href="/shop">shop</a>
                                            </li>
                                            <li><a href="#">pages</a>
                                                <div class="mega_menu">
                                                    <div class="mega_top fix">
                                                        <div class="mega_items">
                                                            <h3><a href="#">Column1</a></h3>
                                                            <ul>
                                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                                <li><a href="portfolio-details.html">single portfolio </a></li>
                                                                <li><a href="about.html">About Us </a></li>
                                                                <li><a href="about-2.html">About Us 2</a></li>
                                                                <li><a href="services.html">Service </a></li>
                                                                <li><a href="my-account.html">my account </a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega_items">
                                                            <h3><a href="#">Column2</a></h3>
                                                            <ul>
                                                                <li><a href="blog.html">Blog </a></li>
                                                                <li><a href="blog-details.html">Blog  Details </a></li>
                                                                <li><a href="blog-fullwidth.html">Blog FullWidth</a></li>
                                                                <li><a href="blog-sidebar.html">Blog  Sidebar</a></li>
                                                                <li><a href="faq.html">Frequently Questions</a></li>
                                                                <li><a href="404.html">404</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega_items">
                                                            <h3><a href="#">Column3</a></h3>
                                                            <ul>
                                                                <li><a href="contact.html">Contact</a></li>
                                                                <li><a href="./cart">cart</a></li>
                                                                <li><a href="./cart">Checkout  </a></li>
                                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                                <li><a href="login.html">Login</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><a href="contact.html">contact us</a></li>

                                        </ul>
                                    </nav>
                                </div>
                                <div class="mobile-menu d-lg-none">
                                    <nav>
                                        <ul>
                                            <li {{(request()->segment(1) == '') ? 'active' : ''}}><a href="/">Home</a>
                                            </li>
                                            <li {{(request()->segment(1) == 'shop') ? 'active' : ''}}><a href="/shop">shop</a>
                                            </li>
                                            <li><a href="#">pages</a>
                                                <div>
                                                    <div>
                                                        <div>
                                                            <h3><a href="#">Column1</a></h3>
                                                            <ul>
                                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                                <li><a href="portfolio-details.html">single portfolio </a></li>
                                                                <li><a href="about.html">About Us </a></li>
                                                                <li><a href="about-2.html">About Us 2</a></li>
                                                                <li><a href="services.html">Service </a></li>
                                                                <li><a href="my-account.html">my account </a></li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h3><a href="#">Column2</a></h3>
                                                            <ul>
                                                                <li><a href="blog.html">Blog </a></li>
                                                                <li><a href="blog-details.html">Blog  Details </a></li>
                                                                <li><a href="blog-fullwidth.html">Blog FullWidth</a></li>
                                                                <li><a href="blog-sidebar.html">Blog  Sidebar</a></li>
                                                                <li><a href="faq.html">Frequently Questions</a></li>
                                                                <li><a href="404.html">404</a></li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h3><a href="#">Column3</a></h3>
                                                            <ul>
                                                                <li><a href="contact.html">Contact</a></li>
                                                                <li><a href="./cart">cart</a></li>
                                                                <li><a href="./checkout">Checkout  </a></li>
                                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                                <li><a href="login.html">Login</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><a href="contact.html">contact us</a></li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header end -->

            @yield('body')
        </div>
        <!--pos page inner end-->
    </div>
</div>
<!--pos page end-->

<!--footer area start-->
<div class="footer_area">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>About us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="footer_widget_contect">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  19 Interpro Road Madison, AL 35758, USA</p>

                            <p><i class="fa fa-mobile" aria-hidden="true"></i> (012) 234 432 3568</p>
                            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact@plazathemes.com </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>My Account</h3>
                        <ul>
                            <li><a href="#">Your Account</a></li>
                            <li><a href="#">My orders</a></li>
                            <li><a href="#">My credit slips</a></li>
                            <li><a href="#">My addresses</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>Informations</h3>
                        <ul>
                            <li><a href="#">Specials</a></li>
                            <li><a href="#">Our store(s)!</a></li>
                            <li><a href="#">My credit slips</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                            <li><a href="#">About us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3>extras</h3>
                        <ul>
                            <li><a href="#"> Brands</a></li>
                            <li><a href="#"> Gift Vouchers </a></li>
                            <li><a href="#"> Affiliates </a></li>
                            <li><a href="#"> Specials </a></li>
                            <li><a href="#"> Privacy policy </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <ul>
                            <li><a href="#"> about us </a></li>
                            <li><a href="#">  Customer Service  </a></li>
                            <li><a href="#">  Privacy Policy  </a></li>
                        </ul>
                        <p>Copyright &copy; 2018 <a href="#">Pos Coron</a>. All rights reserved. </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_social text-right">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-wifi" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer area end-->






<!-- all js here -->
<script src="front/js/vendor/jquery-1.12.0.min.js"></script>
<script src="front/js/popper.js"></script>
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/ajax-mail.js"></script>
<script src="front/js/plugins.js"></script>
<script src="front/js/main.js"></script>
<script src="front/js/owlcarousel2-filter.min.js"></script>

</body>
</html>
