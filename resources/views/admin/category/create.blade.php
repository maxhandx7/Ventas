@extends('layouts.admin2')
@section('title','Nueva Categoria')
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
            Nueva Categoria
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nueva ategoria</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar nueva categoria</h4>
                       
                    </div>
                    {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
                    @include('admin.category._form')
                    <button type="submit" class="btn btn-primary mr-2">Agregar</button>
                    <a href="{{route('categories.index') }}" class="btn btn-light mr-2">
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