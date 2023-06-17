@extends('layouts.admin2')
@section('title','Gestión de Productos')
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
            Administrar Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos</h4>
                        <div class="btn-group">
                            <a href="{{route('products.create')}}" class="btn btn-success" type="button">
                                <i class="fa fa-plus"></i>
                                Agregar</a>
                        </div>
                    </div>
                    <br>
                    @include('admin.product.message')
                    <div class="table-responsive">
                        <table id="order-listing" class="table table-striped table-dark">
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
                                        <a class="btn btn-sucess" href="{{ route('change.status.products', $product)}}" title="Activado">
                                            Activo<i class="fa fa-check"></i>
                                        </a>

                                    </td>

                                    @else
                                    <td>
                                        <a class="btn btn-danger" href="{{ route('change.status.products', $product)}}" title="Desactivado">
                                            No activo<i class="fa fa-times"></i>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection