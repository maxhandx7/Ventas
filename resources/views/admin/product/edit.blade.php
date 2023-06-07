@extends('layouts.admin2')
@section('title','Editar producto')
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
            Editación producto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index') }}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar producto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar producto</h4>
                       
                    </div>
                    

                    {!! Form::model($product,['route'=>['products.update' ,$product], 'method'=>'PUT', 'files'=>true]) !!}

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control" placeholder="Nombre de producto" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="sell_price">Precio</label>
                        <input type="number" name="sell_price" id="sell_price" value="{{$product->sell_price}}" class="form-control" placeholder="Precio de venta" required>
                    </div>
                    
                    <div class="form-group">
                        <label >Categoria</label>
                        <select   class="form-control js-example-basic-single" name="category_id">
                            
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $product->category_id)
                                selected
                            @endif>{{$category->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select id="provider_id"  class="form-control js-example-basic-single" name="provider_id">
                            
                            @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}"
                                @if ($provider->id==$product->provider_id)
                                selected
                            @endif
                                >{{$provider->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    
                    

                    <div class="card-body">
                        <h4 id="image" class="card-title d-flex">Imagen de producto
                          <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                          </small>
                        </h4>
                        <input id="picture" name="picture" type="file" class="dropify" />
                      </div>

                    
                    <hr>
                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('products.index') }}" class="btn btn-light mr-2">
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
    {!!
        Html::script('melody/js/dropify.js')
        !!}
@endsection