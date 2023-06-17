@extends('layouts.admin2')
@section('title','Gestión de Categorias')
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
            Categorias
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Categorias</h4>
                        <div class="btn-group">
                            <a href="{{route('categories.create')}}" class="btn btn-success" type="button">
                                <i class="fa fa-plus"></i>
                                Agregar</a>
                        </div>
                    </div>
                    <br>
                    @include('admin.category.message')
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)

                                <tr>
                                    <th scope="row">{{$category->id }}</th>

                                    <td> <a href="{{ route('categories.show', $category )  }}"></a>{{$category->name }} </td>


                                    <td>{{$category->description }}</td>



                                    <td style="width: 110px;">
                                        {!! Form::open(['route'=>['categories.destroy', $category], 'method'=>'DELETE', 'id'=>'delete-form']) !!}
                                        <a class="btn btn-outline-info" href="{{ route('categories.edit', $category)}}" title="Editar">
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