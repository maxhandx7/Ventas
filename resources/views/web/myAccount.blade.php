@extends('layouts.web')
@section('meta_description', '')
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
                                <li class="breadcrumb-item active" aria-current="page">my account</li>
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
                                    <a href="#dashboad"><i class="fa fa-dashboard"></i>
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
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->


                            {{-- <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>
                                            <div class="welcome">
                                                <p>Hola, <strong>{{ Auth::user()->profile->first_name ." ".Auth::user()->profile->last_name }}</strong> 
                                            </div>
                                            <p class="mb-0">Desde el dashboard, 
                                                usted puede verificar y ver fácilmente sus pedidos recientes, 
                                                administrar sus direcciones de envío y facturaciónes, editar su contraseña y 
                                                ver los detalles de su cuenta.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Aug 22, 2018</td>
                                                            <td>Pending</td>
                                                            <td>$3000</td>
                                                            <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>July 22, 2018</td>
                                                            <td>Approved</td>
                                                            <td>$200</td>
                                                            <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>June 12, 2017</td>
                                                            <td>On Hold</td>
                                                            <td>$990</td>
                                                            <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="download" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Downloads</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Date</th>
                                                            <th>Expire</th>
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Haven - Free Real Estate PSD Template</td>
                                                            <td>Aug 22, 2018</td>
                                                            <td>Yes</td>
                                                            <td><a href="#" class="check-btn sqr-btn "><i
                                                                        class="fa fa-cloud-download"></i> Download
                                                                    File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>HasTech - Profolio Business Template</td>
                                                            <td>Sep 12, 2018</td>
                                                            <td>Never</td>
                                                            <td><a href="#" class="check-btn sqr-btn "><i
                                                                        class="fa fa-cloud-download"></i> Download
                                                                    File</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Payment Method</h3>
                                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Billing Address</h3>
                                            <address>
                                                <p><strong>Alex Tuntuni</strong></p>
                                                <p>1355 Market St, Suite 900 <br>
                                                    San Francisco, CA 94103</p>
                                                <p>Mobile: (123) 456-7890</p>
                                            </address>
                                            <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i>
                                                Edit Address</a>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Account Details</h3>
                                            <div class="account-details-form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="first-name" class="required">First
                                                                    Name</label>
                                                                <input type="text" id="first-name"
                                                                    placeholder="First Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">Last
                                                                    Name</label>
                                                                <input type="text" id="last-name"
                                                                    placeholder="Last Name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="display-name" class="required">Display
                                                            Name</label>
                                                        <input type="text" id="display-name"
                                                            placeholder="Display Name" />
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email
                                                            Addres</label>
                                                        <input type="email" id="email"
                                                            placeholder="Email Address" />
                                                    </div>
                                                    <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="single-input-item">
                                                            <label for="current-pwd" class="required">Current
                                                                Password</label>
                                                            <input type="password" id="current-pwd"
                                                                placeholder="Current Password" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New
                                                                        Password</label>
                                                                    <input type="password" id="new-pwd"
                                                                        placeholder="New Password" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm
                                                                        Password</label>
                                                                    <input type="password" id="confirm-pwd"
                                                                        placeholder="Confirm Password" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn ">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
                                </div>
                            </div> --}} 
                            @yield('content_tab')
                            
                            <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
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
