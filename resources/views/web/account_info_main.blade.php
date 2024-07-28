@extends('web.myAccount')
@section('content_tab')
<style>
    .dashboard-container {
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 10px;
    }
    .dashboard-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }
    .welcome-message {
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }
    .profile-image-section {
        text-align: center;
    }
    .profile-image-section img {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
    .profile-image-section button {
        margin-top: 0.5rem;
    }
</style>
    <div class="col-lg-9 col-md-8"> 
        <!-- Single Tab Content Start -->

        <div class="myaccount-content">
            <h3 class="dashboard-title">Dashboard</h3>

            <div class="container mt-1 dashboard-container">
                <div class="row">
                    <div class="col-4 col-md-4 d-flex justify-content-center align-items-center">
                        <div class="profile-image-section">
                            <img id="profileImage" src="{{ asset('image/' . Auth::user()->profile->image) }}" alt="profile" class="img-lg rounded-circle mb-3" />
                            <input type="file" id="profile_image" name="profile_image" class="d-none" />
                        </div>
                    </div>
                    <div class="col-8 col-md-8"> 
                        <div class="welcome-message">
                            <p>Hola, <strong>{{ Auth::user()->name }}</strong></p>
                        </div>
                        <p>Desde el dashboard, usted puede verificar y ver fácilmente sus pedidos recientes, administrar sus direcciones de envío y facturaciones, editar su contraseña y ver los detalles de su cuenta.</p>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/jquery.js') !!}
@endsection
