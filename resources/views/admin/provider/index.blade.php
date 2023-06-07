@extends('layouts.admin2')
@section('title','Gestión de Proveedor')
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
            Administrar Proveedores
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Proveedores</h4>
                        <div class="btn-group">
                            <a href="{{route('providers.create')}}" class="btn btn-success" type="button">
                                <i class="fa fa-plus"></i>
                                Agregar</a>
                        </div>
                    </div>
                    <br>
                    @include('admin.provider.message') <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Correo electronico</th>
                                    <th>Telefono/Celular</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)

                                <tr>
                                    <th scope="row">{{$provider->id }}</th>

                                    <td> <a href="{{ route('providers.show', $provider )  }}"> {{$provider->name }} </a></td>
                                    <td>{{$provider->email }}</td>
                                    <td>{{$provider->phone }}</td>

                                    <td style="width: 110px;">
                                        {!! Form::open(['route'=>['providers.destroy', $provider], 'method'=>'DELETE']) !!}
                                        <a class="btn btn-outline-info" href="{{ route('providers.edit', $provider)}}" title="Editar">
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
{!! Html::script('melody/js/data-table.js') !!}
@endsection