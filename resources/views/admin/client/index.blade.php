@extends('layouts.admin2')
@section('title','Gestión de clientes')
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
            Administrar clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">clientes</h4>
                        <div class="btn-group">
                            <a class="dropdown-toggle btn btn-success cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-plus"></i>
                                Nuevo
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('clients.create')}}" class="dropdown-item" type="button">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    @if(session('success'))
                    <div id="success-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id }}</th>
                                    <td> <a href="{{ route('clients.show', $client )  }}"> {{$client->name }} </a></td>
                                    <td>{{$client->email }}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['clients.destroy', $client], 'method'=>'DELETE']) !!}
                                        <a class="btn btn-outline-info" href="{{ route('clients.edit', $client)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="btn btn-outline-danger delete-confirm" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{!!
Html::script('melody/js/data-table.js')
!!}
@endsection