@extends('layouts.admin2')
@section('title','Editar cliente')
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
            Editar cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index') }}">clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar cliente</h4>
                       
                    </div>
                    {!! Form::model($client,['route'=>['clients.update' ,$client], 'method'=>'PUT']) !!}
                    

                    <div class="form-group">
                        <label for="name">Nombre de cliente</label>
                        <input type="text" name="name" id="name" value="{{$client->name}}" class="form-control"  required>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="cc">Cedula</label>
                        <input type="text" name="cc" value="{{$client->cc}}" id="cc" class="form-control" placeholder="Nit de cliente" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="rut">Rut</label>
                        <input type="text" name="rut" id="rut" value="{{$client->rut}}" class="form-control" placeholder="Rut de cliente">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Direccion de cliente</label>
                        <input type="text" name="address" id="address" value="{{$client->address}}" class="form-control" placeholder="Direccion de cliente" >
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="phone">Numero de contacto</label>
                        <input type="number" name="phone" id="phone" value="{{$client->phone}}" class="form-control" placeholder="Telefono" >
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Correo de cliente</label>
                        <input type="email" name="email" id="email" value="{{$client->email}}" class="form-control" placeholder="pepito@email.com">
                    </div>
                    
                    


                    <button type="submit" class="btn btn-primary ">Actualizar</button>
                    <a href="{{route('clients.index') }}" class="btn btn-light mr-2">
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