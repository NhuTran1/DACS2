

<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="description" content="TXT Shoes Shop">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | ShoesShop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
    <style>
        #error {
            width: 310px;
            background-color: rgb(250, 103, 103);
            color: white;
        }
        #success {
            width: 260px;
            background-color: #31AF8C;
            color: white;
        }
        .internet {
            font-size: 15px;
            position: fixed;
            bottom: 20px;
            left: 50px;
            font-family: system-ui !important;
            display: block;
            border-radius: 10px;
            animation: showAlert 0.5s ease-in-out 1;
            display: none;
            z-index: inherit;
            z-index: 4;
        }
        .success, .error{
            font-size: small;
        }
        .internet .close {
            top: 5px !important;
        }
        @keyframes showAlert{
            from{
                opacity: 0;
                transform: translate(0, 100px);
            } to {
                  opacity: 1;
                  transform: translate(0, 0);
              }
        }
    </style>
</head>

<body>
<!-- Start coding here -->

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class="fa fa-envelope"></i>
                    tqnshoesshop@gmail.com
                </div>
                <div class="phone-service">
                    <i class="fa fa-phone"></i>
                    +84 364.287.702
                </div>

            </div>

            <div class="ht-right">

                @if(Auth::check())
                    <a href="./account/logout" class="login-panel">
                        <i class="fa fa-user"></i>
                        {{ Auth::user()->name }} - Logout
                    </a>
                @else
                    <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>Login</a>
                @endif

                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width: 300px;">
                        <option value="yu" data-image="front/img/flag-3.jpg" data-imagecss="flag yu"
                                data-title="Vietnam">Vietnam</option>
                        <option value="yt" data-image="front/img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                    </select>
                </div>
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./">
                            <img src="front/img/lg.png" height="30" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">

                    <form action="shop">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input name="search" value="{{ request('search') }}" type="text" placeholder="What do you need?">
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-3 col-md-3 text-right">
                    <ul class="nav-right">

                        <li class="cart-icon">
                            <a href="./cart">
                                <i class="icon_bag_alt"></i>
                                <span class="cart-count">{{ Cart::count() }}</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>

                                        @foreach(Cart::content() as $cart)
                                            <tr data-rowId="{{ $cart->rowId }}">
                                                <td class="si-pic">
                                                    <img style="height: 70px;" src="front/img/products/{{ $cart->options->images[0]->path }}" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>{{ $cart->price }}đ x {{ $cart->qty }}</p>
                                                        <h6>{{ $cart->name }}</h6>
                                                    </div>
                                                </td>
                                                <td class="close-td first-row">
                                                    <i onclick="removeCart('{{ $cart->rowId }}')" class="ti-close"></i>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5 class="cart-price">{{ Cart::total() }}đ</h5>
                                </div>
                                <div class="select-button">
                                    <a href="./cart" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="./checkout" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">{{ Cart::total() }}đ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All departments</span>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Home</a></li>
                    <li class="{{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="./shop">Shop</a></li>
                    <li class="{{ (request()->segment(1) == 'collection') ? 'active' : '' }}"><a href="">Collection</a>
                        <ul>
                            <ul class="dropdown">
                                @foreach($categories as $category)
                                    <li><a href="shop/category/{{ $category->name }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </ul>
                    </li>
                    <li class="{{ (request()->segment(1) == 'blog') ? 'active' : '' }}"><a href="./blog">Blog</a></li>
                    <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}"><a href="./contact">Contact</a></li>
                    <li><a href="">Pages</a>
                        <ul>
                            <ul class="dropdown">
                                <li><a href="./account/my-order">My Order</a></li>
                                <li><a href="./cart">Shopping Cart</a></li>
                                <li><a href="./checkout">Checkout</a></li>
                                <li><a href="./account/register">Register</a></li>
                                <li><a href="./account/login">Login</a></li>
                            </ul>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header Section End -->

<div class="alert alert-danger alert-dismissible internet" id="error">
    <strong><i class="fa fa-exclamation-triangle"></i>&emsp;Internet disconnect!</strong> <br>
    <span class="error">&emsp;&nbsp;&nbsp;&nbsp;&nbsp;Trang web có thể chứa một số lỗi. </span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="alert alert-success alert-dismissible internet" id="success">
    <i class="fa fa-wifi"></i><strong>&emsp;Internet connected!</strong><br>
    <span class="success">&emsp;&nbsp;&nbsp;&nbsp;&nbsp;Đã kết nối thành công!!</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@yield('body')



<!-- Patner Logo Section Begin -->


<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img height="45px" src="front/img/logo-carousel/logo-1.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img height="45px" src="front/img/logo-carousel/logo-2.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img height="45px" src="front/img/logo-carousel/logo-3.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img height="45px" src="front/img/logo-carousel/logo-4.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img height="45px" src="front/img/logo-carousel/logo-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Patner Logo Section End -->


<!-- Footer Logo Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="./">
                            <img src="front/img/ft-logo.png" height="25" alt="">
                        </a>
                    </div>
                    <ul>
                        <li>440 Trần Đại Nghĩa</li>
                        <li>Phone: +84 036.898.8762</li>
                        <li>Email: nhuobt@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="./account/login">Login</a></li>
                        <li><a href="./account/register">Register</a></li>
                        <li><a href="./account/my-order">My Order</a></li>
                        <li><a href="./blog">Blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="./shop">Shop</a></li>
                        <li><a href="./contact">Contact</a></li>
                        <li><a href="./cart">Shopping Cart</a></li>
                        <li><a href="./checkout">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Join Our Newsletter Now</h5>
                    <p>Nếu có thắc mắc gì hoặc muốn thay đổi ảnh đại diện hãy nhắn tôi biết nhé</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter Your Mail">
                        <button type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        Copyright <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">TQNShoesShop</a>
                    </div>
                    <div class="payment-pic">
                        <img src="front/img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Logo Section End -->

<script>
    window.addEventListener('offline', function(){
        document.getElementById('success').style.display = 'none';
        document.getElementById('error').style.display = 'block';
    });
    window.addEventListener('online', function(){
        document.getElementById('error').style.display = 'none';
        document.getElementById('success').style.display = 'block';
    });
</script>

<!-- Js Plugins -->
<script src="front/js/jquery-3.3.1.min.js"></script>
<script src="front/js/bootstrap.min.js"></script>
<script src="front/js/jquery-ui.min.js"></script>
<script src="front/js/jquery.countdown.min.js"></script>
<script src="front/js/jquery.nice-select.min.js"></script>
<script src="front/js/jquery.zoom.min.js"></script>
<script src="front/js/jquery.dd.min.js"></script>
<script src="front/js/jquery.slicknav.js"></script>
<script src="front/js/owl.carousel.min.js"></script>
<script src="front/js/owlcarousel2-filter.min.js"></script>
<script src="front/js/main.js"></script>
</body>

</html>
