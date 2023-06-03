@extends('layouts.admin2')
@section('title','Detalles de proveedor')
@section('styles')
@endsection
@section('styles')

@section('create')
<li class="nav-item d-none d-lg-flex">
    <a href="{{ route('categories.create') }}" class="nav-link">
    <span class="btn btn-primary"> crear nuevo</span>
    </a>
</li>
@endsection
@section('preference')
@endsection
@section('content')


<!-- partial -->

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
           Detalles
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index') }}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$provider->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>{{$provider->name }}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">

                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        sobre proveedor
                                    </button>

                                    <button type="button" class="list-group-item list-group-item-action">
                                        Productos
                                    </button>

                                    <button type="button" class="list-group-item list-group-item-action">
                                        Registrar producto
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Informacion de proveedor</h4>

                                </div>

                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">

                                        <strong> <i class="fab fa-product-hunt mr-1"> Nombre </i> </strong>
                                        <p class="text-muted"> {{$provider->name }} </p>
                                        <hr>

                                        <strong> <i class="far fa-id-card mr-1">  </i>Nit </strong>
                                        <p class="text-muted"> {{$provider->nit_number }} </p>
                                        <hr>

                                        <strong> <i class="fas fa-address-card mr-1"> Correo Electronico </i> </strong>
                                        <p class="text-muted"> {{$provider->email }} </p>
                                        <hr>
                                    </div>

                                    <div class="form-group col-md-6">

                                        <strong> <i class="fas fa-phone"> Telefono </i> </strong>
                                        <p class="text-muted"> {{$provider->phone }} </p>
                                        <hr>
                                        <strong> <i class="fas fa-map-marked-alt mr-1"> Dirección </i> </strong>
                                        <p class="text-muted"> {{$provider->address }} </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-muted">
                  <a href="{{route('providers.index') }}" class="btn btn-primary" type="button">Regresar</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection