@extends('layouts.admin2')
@section('title','Nuevo producto')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Nuevo producto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index') }}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nuevo producto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar nuevo producto</h4>
                       
                    </div>
                    {!! Form::open(['route'=>'products.store', 'method'=>'POST', 'files'=>true ]) !!}
                    @include('admin.product._form')
                    <hr>
                    <button type="submit" class="btn btn-primary mr-2">Agregar</button>
                    <a href="{{route('products.index') }}" class="btn btn-light mr-2">
                        cancelar
                    </a>

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

    {!!
        Html::script('melody/js/dropify.js')
        !!}

@endsection