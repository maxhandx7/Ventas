@extends('layouts.admin2')
@section('title','Nuevo Proveedor')
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
            Nuevo Proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index') }}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nuevo Proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar nuevo proveedor</h4>
                       
                    </div>
                    {!! Form::open(['route'=>'providers.store', 'method'=>'POST']) !!}
                    @include('admin.provider._form')
                    <button type="submit" class="btn btn-primary mr-2">Agregar</button>
                    <a href="{{route('providers.index') }}" class="btn btn-light mr-2">
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

@endsection