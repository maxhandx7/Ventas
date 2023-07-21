@extends('layouts.admin2')
@section('title', 'Nuevo producto')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    {!! Html::style('melody/vendors/summernote/dist/summernote-bs4.css') !!}
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Nuevo producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="/home">Panel de administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuevo producto</li>
                </ol>
            </nav>
        </div>
        {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('admin.product._form')
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select id="category" class="form-control js-example-basic-single">
                                <option selected disabled value="">Seleccione Categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subcategory_id">Subcategoría</label>
                            <select class="form-control js-example-basic-single" name="subcategory_id" id="subcategory_id"
                                style="width: 100%">
                                <option selected disabled value="">Seleccione Subcategoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select id="provider_id" class="form-control js-example-basic-single" name="provider_id">
                                <option selected disabled value="">Seleccione Proveedor</option>
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <select class="js-example-basic-multiple w-100" name="tags[]" id="tags"
                                style="width: 100%" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Imágenes del producto</h4>
                        <input type="file" name="images[]" class="dropify" multiple />
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Registrar</button>
        <a href="{{ URL::previous() }}" class="btn btn-light">
            Cancelar
        </a>
        {!! Form::close() !!}
    </div>

@endsection
@section('scripts')

    {!! Html::script('melody/js/dropify.js') !!}
    {!! Html::script('melody/vendors/summernote/dist/summernote-bs4.min.js') !!}
    {!! Html::script('melody/js/editorDemo.js') !!}
    {!! Html::script('melody/js/select2.js') !!}
@endsection
