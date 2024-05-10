@extends('layouts.admin2')
@section('title', 'Detalles de ' . $category->name)
@section('styles')
@endsection
@section('styles')
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Detalles de {{ $category->name }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="/">Panel de administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fa fa-{{ $category->icon }}"></i>
                            {{ $category->name }}
                        </h4>
                        <ul class="solid-bullet-list">
                            <li>
                                <h5>Descipción
                                    <span
                                        class="float-right text-muted font-weight-normal small mt-2">{{ $category->description }}</span>
                                </h5>
                    </div>

                    <div class="card-footer">
                            {!! Form::open(['route' => ['categories.destroy', $category], 'method' => 'DELETE', 'id' => 'delete-form']) !!}
                            <a class="btn btn-info" href="{{ route('categories.edit', $category) }}" title="Editar">
                                <i class="far fa-edit"></i> Editar
                            </a>

                            <button class="btn btn-danger delete-confirm float-right" type="submit" title="Eliminar"
                                onclick="return confirmDelete()">
                                <i class="far fa-trash-alt"></i> Eliminar
                            </button>
                            {!! Form::close() !!}
                     
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Subcategorias de {{ $category->name }}</h4>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-icon-text mb-3" type="button"
                                    data-toggle="modal" data-target="#exampleModal">
                                    <i class="btn-icon-append fas fa-plus"></i>
                                    Agregar</button>
                            </div>
                        </div>
                        <br>
                        @include('errors.message')
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
                                    @foreach ($subcategories as $subcategory)
                                        <tr>
                                            <th scope="row">{{ $subcategory->id }}</th>

                                            <td> <a href="#products_listing" class="get_products"
                                                    data-artid="{{ $subcategory->id }}">{{ $subcategory->name }}</a>
                                            </td>


                                            <td>{{ $subcategory->description }}</td>



                                            <td style="width: 110px;">
                                                {!! Form::open([
                                                    'route' => ['subcategories.destroy', $subcategory],
                                                    'method' => 'DELETE',
                                                    'id' => 'delete-form',
                                                ]) !!}
                                                <a class="btn btn-outline-info"
                                                    href="{{ route('subcategories.edit', [$category, $subcategory]) }}"
                                                    title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <button class="btn btn-outline-danger delete-confirm" type="submit"
                                                    title="Eliminar" onclick="return confirmDelete()">
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Productos</h4>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table id="products_listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card text-muted">
            <a href="{{ URL::previous() }}" class="btn btn-primary" type="button">Regresar</a>
          </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Registrar nueva subcategoria
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'subcategories.store', 'method' => 'POST']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Nombre de la subcategoria"
                            required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Descripcion de la subcategoria" name="description" rows="3" required></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" name="category_id" value="{{ $category->id }}" id="category_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('melody/js/profile-demo.js') !!}
    {!! Html::script('melody/js/data-table.js') !!}
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal('show');
            });
        </script>
    @endif
    <script>
        $(function() {
            $('.get_products').click(function(event) {
                event.preventDefault();
                var target = $(this).attr("href");
                var targetPosition = $(target).offset().top;
                var elem = $(this);
                $('html, body').animate({
                    scrollTop: targetPosition
                }, 'slow');
                $.ajax({
                    type: "GET",
                    url: "/get_products_by_subcategory",
                    data: "subcategory_id=" + elem.attr('data-artid'),
                    dataType: "json",
                    success: function(data1) {
                        $('#products_listing').dataTable().fnDestroy();

                        $('#products_listing').dataTable({
                            "data": data1.data,
                            columns: [{
                                    "data": "id"
                                },
                                {
                                    "data": "name"
                                },
                                {
                                    "data": "sell_price"
                                },
                                {
                                    "data": "stock"
                                },
                                {
                                    "data": "btn"
                                },
                            ],
                        })

                    }
                });
            });
        });
    </script>

@endsection
