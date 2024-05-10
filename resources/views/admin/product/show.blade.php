@extends('layouts.admin2')
@section('title','Detalles de producto')
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

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
           Detalles
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index') }}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name }}</li>
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
                               
                                <h3>{{$product->name }}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>

                            <div class="py-4">
                                <p class="clearfix">
                                  <span class="float-left">
                                    Estado
                                  </span>
                                  @if ($product->status == 'ACTIVE')
                                  <span class="float-right text-muted">
                                    Activo
                                  </span>
                                  @else
                                  <span class="float-right text-muted">
                                    Inactivo
                                  </span>
                                @endif
                                </p>
                                <p class="clearfix">
                                  <span class="float-left">
                                    Proveedor
                                  </span>
                                  <span class="float-right text-muted">
                                      <a href="{{route('providers.show', $product->provider->id)}}">
                                    {{$product->provider->name }}</a>
                                  </span>
                                </p>
                                <p class="clearfix">
                                  <span class="float-left">
                                    Categoria
                                  </span>
                                  <span class="float-right text-muted">
                                    {{$product->subcategory->name }}
                                  </span>
                                </p>
                               
                              </div>

                            @if ($product->status == 'ACTIVE')
                            <a href="{{ route('change.status.products', $product)}}" onclick="showInfoToast()" class="btn btn-primary btn-block">Activo</a>
                                @else
                                <a href="{{ route('change.status.products', $product)}}" onclick="showInfoToast()" class="btn btn-danger btn-block">Inactivo</a>
                            @endif

                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Informacion de producto</h4>

                                </div>

                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">


                                        <strong> <i class="fas fa-fingerprint mr-1"> Codigo </i> </strong>
                                        <p class="text-muted"> {{$product->code }} </p>
                                        <hr>

                                        <strong> <i class="fas fa-cubes mr-1">  </i>Stock </strong>
                                        <p class="text-muted"> {{$product->stock }} </p>
                                        <hr>

                                        <strong> <i class="fas fa-money-bill mr-1"> Precio </i> </strong>
                                        <p class="text-muted"> {{number_format($product->sell_price) }} </p>
                                        <hr>
                                    </div>

                                    <div class="form-group col-md-6">

                                        <strong> <i class="fas fa-check"> Estado del producto </i> </strong>
                                        @if ($product->status=='ACTIVE')
                                        <p class="text-muted"> Activo </p>
                                        @else
                                        <p class="text-muted"> Inactivo </p>
                                        @endif
                                        <hr>
                                        <strong> <i class="fas fa-list mr-1"> Categoria </i> </strong>
                                        <p class="text-muted"> {{$product->subcategory->name}} </p>
                                        <hr>

                                        <strong> <i class="fas fa-truck mr-1"> Proveedor </i> </strong>
                                        <p class="text-muted"> {{$product->provider->name }} </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-muted">
                  <a href="{{route('products.index') }}" class="btn btn-primary" type="button">Regresar</a>
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