@extends('layouts.admin2')
@section('title', 'Editar producto')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    {!! Html::style('melody/vendors/summernote/dist/summernote-bs4.css') !!}
    {!! Html::style('melody/vendors/lightgallery/css/lightgallery.css') !!}
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Edición producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="/home">Panel de administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar producto</li>
                </ol>
            </nav>
        </div>

        {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre (*)</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $product->name) }}" require>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Código de barras</label>
                                    <input type="text" name="code" id="code" class="form-control"
                                        value="{{ old('code', $product->code) }}">
                                    <small id="helpId" class="text-muted">Campo opcional</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sell_price">Precio de venta</label>
                                    <input type="number" name="sell_price" id="sell_price" class="form-control"
                                        aria-describedby="helpId" value="{{ old('sell_price', $product->sell_price) }}"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="short_description">Extracto</label>
                            <textarea class="form-control" name="short_description" id="short_description" rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="long_description">Descripción</label>
                            <textarea class="form-control" name="long_description" id="summernoteExample" rows="10">{{ old('long_description', $product->long_description) }}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select id="category" class="form-control js-example-basic-single" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category')}}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subcategory_id">Subcategoría</label>
                            <select class="form-control js-example-basic-single" name="subcategory_id" id="subcategory_id"
                                style="width: 100%">
                                <option value="0" disabled selected> --Seleccione una categoria-- </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select id="provider_id" class="form-control js-example-basic-single" name="provider_id">
                                <option selected disabled value="">Seleccione Proveedor</option>
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}"
                                        {{ old('provider_id', $product->provider_id) == $provider->id ? 'selected' : '' }}>
                                        {{ $provider->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <select class="js-example-basic-multiple w-100" name="tags[]" id="tags"
                                style="width: 100%" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ collect(old('tags', $product->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}>
                                        {{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <h4 class="card-title">Cargar imagen</h4>
                            <div class="file-upload-wrapper">
                                <div id="fileuploader">Cargar</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
        <a href="{{ URL::previous() }}" class="btn btn-light">
            Cancelar
        </a>
        {!! Form::close() !!}

        <div class="row grid-margin mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Lista de imagenes</h4>
                        <div id="lightgallery" class="row lightGallery">
                            @foreach ($product->images as $image)
                                <a href="{{ $image->url }}" class="image-tile"><img src="{{ $image->url }}"
                                        alt="{{ $product->name }}"></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {!! Html::script('melody/js/dropify.js') !!}
    {!! Html::script('melody/vendors/summernote/dist/summernote-bs4.min.js') !!}
    {!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js') !!}
    {!! Html::script('melody/js/light-gallery.js') !!}
    {!! Html::script('melody/js/editorDemo.js') !!}
    {!! Html::script('melody/js/select2.js') !!}
    <script>
        (function($) {
            'use strict';
            if ($("#fileuploader").length) {
                $("#fileuploader").uploadFile({
                    url: "/upload/product/{{ $product->id }}/image",
                    fileName: "image",
                });
            }
        })(jQuery);
    </script>

    <script>
        var subcategory_id = $('#subcategory_id');
        var category = $('#category');

        category.change(function (){
            $.ajax({
                url:"{{route('get_subcategories')}}",
                method: 'GET',
                data:{
                    category: category.val(),
                },
                success: function(data){
                    subcategory_id.empty();
                    subcategory_id.append('<option disable selected>-- selecciona una categoria ---</ option>');
                    $.each(data, function(index, element){
                        subcategory_id.append('<option value="'+element.id+'">'+element.name+'"</option>"');
                    });


                }
            })
        });


    </script>
@endsection
