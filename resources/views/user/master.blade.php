<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="@yield('description')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | @yield('description')</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ url('user/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ url('user/css/core-style.css')}}">
    <link rel="stylesheet" href="{{ url('user/css/style.css')}}">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    @include('user.block.search')
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
        
        <div class="main-content-wrapper d-flex clearfix">

            <!-- Mobile Nav (max width 767px)-->
            <div class="mobile-nav">
                <!-- Navbar Brand -->
                <div class="amado-navbar-brand">
                    <a href="index.html"><img src="{{ url('user/img/core-img/logo.png')}}" alt=""></a>
                </div>
                <!-- Navbar Toggler -->
                <div class="amado-navbar-toggler">
                    <span></span><span></span><span></span>
                </div>
            </div>

            <!-- Header Area Start -->
            <header class="header-area clearfix">
                <!-- Close Icon -->
                <div class="nav-close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>
                <!-- Logo -->
                <div class="logo">
                    <a href="index.html"><img src="{{ url('user/img/core-img/logo.png')}}" alt=""></a>
                </div>
                <!-- Amado Nav -->
                <nav class="amado-nav">
                    <ul>
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="product-details.html">Product</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </nav>
                <!-- Button Group -->
                <div class="amado-btn-group mt-30 mb-100">
                    <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                    <a href="#" class="btn amado-btn active">New this week</a>
                </div>
                <!-- Cart Menu -->
                <div class="cart-fav-search mb-100">
                    <a href="cart.html" class="cart-nav"><img src="{{ url('user/img/core-img/cart.png')}}" alt=""> Cart <span>(0)</span></a>
                    <a href="#" class="fav-nav"><img src="{{ url('user/img/core-img/favorites.png')}}" alt=""> Favourite</a>
                    <a href="#" class="search-nav"><img src="{{ url('user/img/core-img/search.png')}}" alt=""> Search</a>
                </div>
                <!-- Social Button -->
                <div class="social-info d-flex justify-content-between">
                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>
            </header>
            <!-- Header Area End -->

            <!-- Product Catagories Area Start -->
            @yield('content')
            <!-- Product Catagories Area End -->
        </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
        @include('user.block.newsletter')
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
        @include('user.block.footer')
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{ url('user/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{ url('user/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ url('user/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ url('user/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{ url('user/js/active.js')}}"></script>
    <script src="{{ url('user/js/custom.js')}}"></script>

</body>

</html>