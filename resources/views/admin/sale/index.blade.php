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
                <li class="breadcrumb-item"><a href="/">Panel administrador</a></li>
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
                            <a href="{{route('sales.create')}}" class="btn btn-success" type="button">
                                <i class="fa fa-plus"></i>
                                Nueva venta</a>
                        </div>
                    </div>
                    <br>
                    @include('admin.sale.message')
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha de venta</th>
                                    <th>cliente</th>
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
                                    <td>{{$sale->client->name}}</td>
                                    <td>{{number_format($sale->total) }}</td>

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



                                    <td style="width:110px;">
                                        {!! Form::open(['route'=>['sales.destroy', $sale], 'method'=>'DELETE', 'id'=>'delete-form']) !!}
                                        <a class="btn btn-outline-info jsgrid-edit-button" href="{{route('sales.pdf', $sale)}}" title="PDF"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                        <!-- <a class="btn btn-outline-info jsgrid-edit-button" title="Imprimir" href="{{route('sales.print', $sale)}}"> <i class="fa fa-print" aria-hidden="true"></i></a> -->
                                        <a class="btn btn-outline-info jsgrid-edit-button" title="VER" href="{{ route('sales.show', $sale)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <button class="btn btn-outline-danger jsgrid-delete-button" type="submit" title="Eliminar" onclick="return confirmDelete()">
                                            <i class="fa fa-trash-alt"></i>
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