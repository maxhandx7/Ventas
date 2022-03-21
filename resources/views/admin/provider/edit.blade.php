@extends('layouts.admin2')
@section('title','Editar Proveedor')
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
            Editar Proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index') }}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar proveedor</h4>
                       
                    </div>
                    {!! Form::model($provider,['route'=>['providers.update' ,$provider], 'method'=>'PUT']) !!}
                    

                    <div class="form-group">
                        <label for="name">Nombre de Proveedor</label>
                        <input type="text" name="name" id="name" value="{{$provider->name}}" class="form-control"  required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Correo de proveedor</label>
                        <input type="email" name="email" id="email" value="{{$provider->email}}" class="form-control" placeholder="pepito@email.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="nit_number">Nit de proveedor</label>
                        <input type="number" name="nit_number" id="nit_number" value="{{$provider->nit_number}}" class="form-control" placeholder="Nit de proveedor" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Direccion de proveedor</label>
                        <input type="text" name="address" id="address" value="{{$provider->address}}" class="form-control" placeholder="Direccion de proveedor" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Numero de contacto</label>
                        <input type="text" name="phone" id="phone" value="{{$provider->phone}}" class="form-control" placeholder="Telefono"  required>
                    </div>
                    
                    


                    <button type="submit" class="btn btn-primary ">Actualizar</button>
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