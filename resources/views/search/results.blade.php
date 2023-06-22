@extends('layouts.admin2')
@section('title','Resultado de la busqueda')
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
            Resultado
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">busqueda</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">busqueda</h4>
                        <div class="btn-group">
                        </div>
                    </div>
                    <br>
                    @include('errors.message')

                    @if ($products->count() > 0)
                    <hr>
                    <h4 class="card-title">Productos</h4>
                    <div class="table-responsive">
                        <table  class="table table-info">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-image"></i></th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Categoria</th>
                                    <th style="width: 100px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)

                                <tr>
                                    <td class="py-1">
                                        <img src="{{asset('image/'.$product->image) }}" alt="image" />
                                    </td>
                                    <td> <a href="{{ route('products.show', $product )  }}"> {{$product->name }} </a></td>

                                    <td>{{$product->stock }}</td>
                                    @if ($product->status=='ACTIVE')
                                    <td>
                                        <a class="badge badge-success" href="{{ route('change.status.products', $product)}}" title="Activado">
                                            Activo<i class="fa fa-check"></i>
                                        </a>

                                    </td>

                                    @else
                                    <td>
                                        <a class="badge badge-danger" href="{{ route('change.status.products', $product)}}" title="Desactivado">
                                            No activo
                                        </a>

                                    </td>

                                    @endif

                                    <td>{{$product->category->name }}</td>

                                    <td style="width: 100px;">
                                        {!! Form::open(['route'=>['products.destroy', $product], 'method'=>'DELETE', 'id'=>'delete-form']) !!}
                                        <a class="btn btn-outline-info" href="{{ route('products.edit', $product)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="btn btn-outline-danger delete-confirm" type="submit" title="Eliminar" onclick="return confirmDelete()">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @if ($users->count() > 0)
                    <hr>
                    <h4 class="card-title">Usuarios</h4>
                    <div class="table-responsive">
                        <table  class="table table-success">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th style="width: 100px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)

                                <tr>
                                    <th scope="row">{{$user->id }}</th>

                                    <td>
                                        <a href="{{route('users.show',$user)}}">{{$user->name}}</a>
                                    </td>


                                    <td>{{$user->email }}</td>



                                    <td style="width: 100px;">
                                        {!! Form::open(['route'=>['users.destroy', $user], 'method'=>'DELETE', 'id'=>'delete-form']) !!}
                                        <a class="btn btn-outline-info" href="{{ route('users.edit', $user)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="btn btn-outline-danger delete-confirm" type="submit" title="Eliminar" onclick="return confirmDelete()">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($clients->count() > 0)
                    <hr>
                    <h4 class="card-title">Clientes</h4>
                    <div class="table-responsive">
                        <table  class="table table-warning">
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
                                    <td style="width: 110px;">
                                        {!! Form::open(['route'=>['clients.destroy', $client], 'method'=>'DELETE', 'id'=>'delete-form', 'id'=>'delete-form']) !!}
                                        <a class="btn btn-outline-info" href="{{ route('clients.edit', $client)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="btn btn-outline-danger delete-confirm" type="submit" title="Eliminar" onclick="return confirmDelete()">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($providers->count() > 0)
                    <hr>
                    <h4 class="card-title">Proveedores</h4>
                    <div class="table-responsive">
                        <table  class="table table-danger">
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
                                        {!! Form::open(['route'=>['providers.destroy', $provider], 'method'=>'DELETE', 'id'=>'delete-form']) !!}
                                        <a class="btn btn-outline-info" href="{{ route('providers.edit', $provider)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="btn btn-outline-danger delete-confirm" type="submit" title="Eliminar" onclick="return confirmDelete()">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @if ($products->count() === 0 && $users->count() === 0 && $clients->count() === 0 && $providers->count() === 0)
                    <div class="alert alert-fill-danger">
                    <i class="fa fa-exclamation-triangle"></i>    
                    No hubo resultados para "{{$query}}"</div>
                    @endif
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