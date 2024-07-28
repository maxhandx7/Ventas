@extends('layouts.web')
@section('meta_description', $business->description)
@section('title', $business->name. " | Mi cuenta")
@section('styles')

@endsection
@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Mi cuenta</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- my account wrapper start -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="{{route('web.myAccount')}}" class="{!! active_class(route('web.myAccount')) !!}"><i class="fa fa-dashboard"></i>
                                        Dashboard</a>
                                    {{--  <a href="#orders"><i class="fa fa-cart-arrow-down"></i> Orders</a>  --}}
                                    <a href="{{route('web.orders')}}"
                                    class="{!! active_class(route('web.orders')) !!}"
                                    ><i class="fa fa-cart-arrow-down"></i> Pedidos</a>
                                    {{--  <a href="#download"><i class="fa fa-cloud-download"></i> Download</a>  --}}
                                    
                                    
    
                                    <a href="{{route('web.address_edit')}}"
                                    class="{!! active_class(route('web.address_edit')) !!}"
                                    ><i class="fa fa-map-marker"></i> Dirección</a>
                                    <a href="{{route('web.account_info')}}"
                                    class="{!! active_class(route('web.account_info')) !!}"
                                    ><i class="fa fa-user"></i> Detalles de la cuenta</a>
                                    <a 
                                    class="{!! active_class(route('web.change_password')) !!}"
                                    href="{{route('web.change_password')}}"><i class="fa fa-credit-card"></i> Cambiar contraseña</a>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>  Cerrar sesión</a>
                                    
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                            @yield('content_tab')
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->

    <!-- brand area start -->
    <div class="brand-area pt-34 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-crop"></i>
                        </div>
                        <h3>Popular Brand</h3>
                    </div> <!-- section title end -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="brand-active slick-padding slick-arrow-style">
                        <div class="brand-item text-center">
                            <a href="#"><img src="galio/assets/img/brand/br1.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="galio/assets/img/brand/br2.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="galio/assets/img/brand/br3.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="galio/assets/img/brand/br4.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="galio/assets/img/brand/br5.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="galio/assets/img/brand/br6.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="galio/assets/img/brand/br4.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand area end -->
@endsection

@section('scripts')

@endsection
