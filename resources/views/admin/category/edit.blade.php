@extends('layouts.admin2')
@section('title', 'Editar Categoria')
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
                Editar Categoria
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="/">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar ategoria</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar categoria</h4>

                        </div>
                        {!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'PUT']) !!}


                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                name="description" rows="3">{{ $category->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="icon">Icono</label>
                                <select class="form-control" name="icon" id="icon">
                                    <option value="user">icon user</option>
                                    <option value="star">icon star</option>
                                    <option value="key">icon key</option>
                                </select>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{ URL::previous() }}" class="btn btn-light mr-2">
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
