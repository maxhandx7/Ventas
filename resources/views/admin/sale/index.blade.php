@extends('layouts.admin2')
@section('title','Gestión de ventas')
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
            Ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Ventas</h4>
                        <div class="btn-group">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">

                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('sales.create')}}" class="dropdown-item" type="button">Agregar</a>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha de venta</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)

                                <tr>
                                    <th scope="row">
                                        <a href="{{ route('sales.show', $sale)}}"> {{$sale->id }}</a>
                                    </th>
                                    <td> {{$sale->sale_date }} </td>
                                    <td>{{$sale->total }}</td>

                                    @if ($sale->status=='VALID')
                                    <td>
                                    <a class="btn btn-sucess" href="{{ route('change.status.sales', $sale)}}" title="Esta pago">
                                        pagado<i class="fa fa-check"></i>
                                    </a>

                                    </td>

                                    @else
                                    <td>
                                        <a class="btn btn-danger" href="{{ route('change.status.sales', $sale)}}" title="no pago">
                                            No pago<i class="fa fa-times"></i>
                                        </a>
    
                                        </td>
                                        
                                    @endif

                                    

                                    <td style="width:50px;">

                                        {{-- <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{ route('sales.edit', $sale)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a> --}}

                                        {{-- <button class="jsgrid-button jsgrid-delete-button" type="submit"
                                            title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button> --}}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('sales.pdf', $sale)}}"
                                            title="PDF"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                        <a class="jsgrid-button jsgrid-edit-button" title="Imprimir"
                                            href="{{route('sales.print', $sale)}}"> <i class="fa fa-print"
                                                aria-hidden="true"></i></a>
                                        <a class="jsgrid-button jsgrid-edit-button" title="VER"
                                            href="{{ route('sales.show', $sale)}}"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
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