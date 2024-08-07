<?php
  $exibirModal = false;
  if(!isset($_COOKIE["mostrarModal"]))
  {
    $expirar = 3600;
    setcookie('mostrarModal', 'SI', (time() + $expirar));
    $exibirModal = true;
  }
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $business->name }}, {{ $business->description }}">

    <!-- Site title -->
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('image/' . $business->logo) }}" type="image/x-icon" />
    {!! Html::style('galio/assets/css/bootstrap.min.css') !!}
    {!! Html::style('galio/assets/css/font-awesome.min.css') !!}
    {!! Html::style('galio/assets/css/helper.min.css') !!}
    {!! Html::style('galio/assets/css/plugins.css') !!}
    {!! Html::style('galio/assets/css/style.css') !!}
    <style>
        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
            color: #999
        }

        .tt-menu {
            width: 100%;
            margin-top: 4px;
            padding: 4px 0;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }

        .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
        }

        .tt-suggestion.tt-cursor,
        .tt-suggestion:hover {
            color: #f8f8f8;
            background-color: #001123;

        }

        .tt-suggestion p {
            margin: 0;
        }

        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .profile-name {
            margin-left: 10px;
        }

        .navbar {
            padding: 0;
        }
    </style>
    {!! Html::style('bootstrap_star_rating/css/star-rating.css') !!}
    {!! Html::style('bootstrap_star_rating/themes/krajee-fa/theme.css') !!}
    @yield('styles')
    @stack('styles')
</head>

<body>

    <!-- color switcher start -->
    <div class="color-switcher">
        <div class="color-switcher-inner">
            <div class="switcher-icon">
                <i class="fa fa-cog fa-spin"></i>
            </div>

            <div class="switcher-panel-item">
                <h3>Color Schemes</h3>
                <ul class="nav flex-wrap colors">
                    <li class="default active" data-color="default" data-toggle="tooltip" data-placement="top"
                        title="Red"></li>
                    <li class="green" data-color="green" data-toggle="tooltip" data-placement="top" title="Green">
                    </li>
                    <li class="soft-green" data-color="soft-green" data-toggle="tooltip" data-placement="top"
                        title="Soft-Green"></li>
                    <li class="sky-blue" data-color="sky-blue" data-toggle="tooltip" data-placement="top"
                        title="Sky-Blue"></li>
                    <li class="orange" data-color="orange" data-toggle="tooltip" data-placement="top" title="Orange">
                    </li>
                    <li class="violet" data-color="violet" data-toggle="tooltip" data-placement="top" title="Violet">
                    </li>
                </ul>
            </div>

            <div class="switcher-panel-item">
                <h3>Layout Style</h3>
                <ul class="nav layout-changer">
                    <li><button class="btn-layout-changer active" data-layout="wide">Wide</button></li>
                    <li><button class="btn-layout-changer" data-layout="boxed">Boxed</button></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Background Pattern</h3>
                <ul class="nav flex-wrap bgbody-style bg-pattern">
                    <li><img src="galio/assets/img/bg-panel/bg-pettern/1.png" alt="Pettern"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-pettern/2.png" alt="Pettern"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-pettern/3.png" alt="Pettern"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-pettern/4.png" alt="Pettern"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-pettern/5.png" alt="Pettern"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-pettern/6.png" alt="Pettern"></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Background Image</h3>
                <ul class="nav flex-wrap bgbody-style bg-img">
                    <li><img src="galio/assets/img/bg-panel/bg-img/01.jpg" alt="Images"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-img/02.jpg" alt="Images"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-img/03.jpg" alt="Images"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-img/04.jpg" alt="Images"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-img/05.jpg" alt="Images"></li>
                    <li><img src="galio/assets/img/bg-panel/bg-img/06.jpg" alt="Images"></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- color switcher end -->

    <div class="wrapper box-layout">

        <!-- header area start -->
        <header>

            <!-- header top start -->
            <div class="header-top-area bg-gray text-center text-md-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <div class="header-call-action">
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                    {{ $business->mail }}
                                </a>
                                <a href="#">
                                    <i class="fa fa-phone"></i>
                                    {{ $business->phone }}
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-right float-md-right float-none">
                                <nav>
                                    <ul>
                                        <li>
                                            <div class="dropdown header-top-dropdown">
                                                @auth
                                                    <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        {{ Auth::user()->name }}
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="myaccount">
                                                        <a class="dropdown-item" href="{{ route('web.myAccount') }}">mi
                                                            cuenta</a>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Salir</a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                @endauth

                                                @guest
                                                    <a href="{{ route('web.loginRegister') }}">Sesión/Registro</a>

                                                @endguest


                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">Lista de deseos</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('web.cart') }}">Carrito</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('web.checkout') }}">Pasarela de pagos</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle start -->
            <div class="header-middle-area pt-20 pb-20">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand-logo">
                                <a href="/">
                                    <img src="{{ asset('image/' . $business->logo) }}" alt="brand logo">
                                </a>
                            </div>
                        </div> <!-- end logo area -->
                        <div class="col-lg-9">
                            <div class="header-middle-right">
                                <div class="header-middle-shipping mb-20">
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>Horarios</h5>
                                            <span>Lun- Sab: 8:00 - 18:00</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>ENVÍO GRATIS</h5>
                                            <span>En pedidos superiores a $135.000</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>DEVOLUCIÓN DE DINERO 100%</h5>
                                            <span>Dentro de los 30 días posteriores a la entrega</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                </div>
                                <div class="header-middle-block">
                                    <div class="header-middle-searchbox">
                                        <input type="text" placeholder="Buscar...">
                                        <button class="search-btn"><i class="fa fa-search"></i></button>
                                    </div>

                                    @include('layouts._mini_cart')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header middle end -->

            <!-- main menu area start -->
            <div class="main-header-wrapper bdr-bottom1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-header-inner">
                                <div class="category-toggle-wrap">
                                    <div class="category-toggle">
                                        Categorias
                                        <div class="cat-icon">
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div>
                                    <nav class="category-menu category-style-2">
                                        <ul>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-desktop"></i>
                                                    computer</a></li>
                                            <li class="menu-item-has-children"><a
                                                    href="shop-grid-left-sidebar.html"><i class="fa fa-camera"></i>
                                                    camera</a>
                                                <!-- Mega Category Menu Start -->
                                                <ul class="category-mega-menu">
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">Smartphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Samsome</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">GL Stylus</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Uawei</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Cherry Berry</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">headphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Desktop
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Mobile
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Wireless
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">LED Headphone</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">accessories</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Bank</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Data Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Battery</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">headphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Desktop
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Mobile
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Wireless
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">LED Headphone</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul><!-- Mega Category Menu End -->
                                            </li>
                                            <li class="menu-item-has-children"><a
                                                    href="shop-grid-left-sidebar.html"><i class="fa fa-book"></i>
                                                    smart phones</a>
                                                <!-- Mega Category Menu Start -->
                                                <ul class="category-mega-menu">
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">Smartphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Samsome</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">GL Stylus</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Uawei</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Cherry Berry</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">uPhone</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">headphone</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Desktop
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Mobile
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">Wireless
                                                                    Headphone</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">LED Headphone</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Over-ear</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">accessories</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Bank</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Data Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Battery</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">OTG Cable</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="shop-grid-left-sidebar.html">accessories</a>
                                                        <ul>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Bank</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Data Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Power Cable</a>
                                                            </li>
                                                            <li><a href="shop-grid-left-sidebar.html">Battery</a></li>
                                                            <li><a href="shop-grid-left-sidebar.html">OTG Cable</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul><!-- Mega Category Menu End -->
                                            </li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-clock-o"></i>
                                                    watch</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-television"></i>
                                                    electronic</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-tablet"></i>
                                                    tablet</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-book"></i>
                                                    books</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-microchip"></i>
                                                    microchip</a></li>
                                            <li><a href="shop-grid-left-sidebar.html"><i class="fa fa-bullhorn"></i>
                                                    bullhorn</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="active"><a href="{{url('/')}}"><i class="fa fa-home"></i>Home </a>
                                            </li>
                                            <li class="static"><a href="{{route('web.shopGrid')}}">Tienda </a>
                                            </li>
                                            <li><a href="{{route('web.aboutUs')}}">Sobre Nosotros </a>
                                            </li>
                                            <li><a href="{{route('web.blog')}}">Blog </i></a>
                                            </li>
                                            <li><a href="{{route('web.contactUs')}}">Contáctanos</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main menu area end -->

        </header>
        <!-- header area end -->

        @yield('content')

        <!-- footer area start -->
        <footer>
            <!-- footer top start -->
            <div class="footer-top bg-black pt-14 pb-14">
                <div class="container">
                    <div class="footer-top-wrapper">
                        <div class="newsletter__wrap">
                            <div class="newsletter__title">
                                <div class="newsletter__icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="newsletter__content">
                                    <h3>sign up for newsletter</h3>
                                    <p>Duis autem vel eum iriureDuis autem vel eum</p>
                                </div>
                            </div>
                            <div class="newsletter__box">
                                <form id="mc-form">
                                    <input type="email" id="mc-email" autocomplete="off" placeholder="Email">
                                    <button id="mc-submit">subscribe!</button>
                                </form>
                            </div>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                        <div class="social-icons">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i
                                    class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Google-plus"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i
                                    class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer top end -->

            <!-- footer main start -->
            <div class="footer-widget-area pt-40 pb-38 pb-sm-4 pt-sm-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>contact us</h4>
                                </div>
                                <div class="widget-body">
                                    <ul class="location">
                                        <li><i class="fa fa-envelope"></i>{{ $business->mail }}</li>
                                        <li><i class="fa fa-phone"></i>{{ $business->phone }}</li>
                                        <li><i class="fa fa-map-marker"></i>{{ $business->address }}</li>
                                    </ul>
                                    <a class="map-btn" href="contact-us.html">open in google map</a>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>my account</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <li><a href="#">my account</a></li>
                                        <li><a href="{{ route('web.cart') }}">my cart</a></li>
                                        <li><a href="{{ route('web.checkout') }}">checkout</a></li>
                                        <li><a href="#">my wishlist</a></li>
                                        <li><a href="#">login</a></li>
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>short code</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <li><a href="#">gallery</a></li>
                                        <li><a href="#">accordion</a></li>
                                        <li><a href="#">carousel</a></li>
                                        <li><a href="#">map</a></li>
                                        <li><a href="#">tab</a></li>
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>product tags</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <li><a href="#">computer</a></li>
                                        <li><a href="#">camera</a></li>
                                        <li><a href="#">smart phone</a></li>
                                        <li><a href="#">watch</a></li>
                                        <li><a href="#">tablet</a></li>
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                    </div>
                </div>
            </div>
            <!-- footer main end -->

            <!-- footer bootom start -->
            <div class="footer-bottom-area bg-gray pt-20 pb-20">
                <div class="container">
                    <div class="footer-bottom-wrap">
                        <div class="copyright-text d-flex flex-row justify-content-center">
                            <span class="text-muted text-left d-block d-sm-inline-block">Copyright © 2024.
                                Todos los derechos reservados.&nbsp;</span>

                        </div>
                        <div class="copyright-text d-flex flex-row justify-content-center">
                            <span class="text-muted text-right d-block d-sm-inline-block">
                                <b> POWER BY&nbsp;
                                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><i
                                            class="fa fa-code text-dark"></i><b><a
                                                style="text-decoration: none; color:rgb(17, 15, 129);"
                                                href="https://afdeveloper.com/" target="_blank">&nbsp;AF</a> </b>
                                    </span>
                                </b></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer bootom end -->

        </footer>
        <!-- footer area end -->

    </div>


    <!-- Quick view modal start -->

    <!-- Quick view modal end -->

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->




    <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    {!! Html::script('galio/assets/js/vendor/modernizr-3.6.0.min.js') !!}
    <!-- Jquery Min Js -->
    {!! Html::script('galio/assets/js/vendor/jquery-3.3.1.min.js') !!}
    <!-- Popper Min Js -->
    {!! Html::script('galio/assets/js/vendor/popper.min.js') !!}
    <!-- Bootstrap Min Js -->
    {!! Html::script('galio/assets/js/vendor/bootstrap.min.js') !!}
    <!-- Plugins Js-->
    {!! Html::script('galio/assets/js/plugins.js') !!}
    <!-- Ajax Mail Js -->
    {!! Html::script('galio/assets/js/ajax-mail.js') !!}
    <!-- Active Js -->
    {!! Html::script('galio/assets/js/main.js') !!}
    {{--  {!! Html::script('galio/assets/js/main.js') !!}  --}}
    <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
    {!! Html::script('galio/assets/js/switcher.js') !!}

    {!! Html::script('js/typeahead.bundle.min.js') !!}

    {!! Html::script('bootstrap_star_rating/js/star-rating.js') !!}
    {!! Html::script('bootstrap_star_rating/js/locales/es.js') !!}
    {!! Html::script('bootstrap_star_rating/themes/krajee-fa/theme.js') !!}

  

    @yield('scripts')
    @stack('scripts')

    
    @if ($exibirModal === true)
    <script>
        $(document).ready(function()
        {
          $("#modalInicio").modal("show");
        });
    </script>
    @endif  
</body>


</html>
