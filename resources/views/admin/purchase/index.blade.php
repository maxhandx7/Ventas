@extends('layouts.admin2')
@section('title','Gestión de compras')
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
            Compras
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="/">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compras</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Compras</h4>
                        <div class="btn-group">
                            <a href="{{route('purchases.create')}}" class="btn btn-success" type="button">
                                <i class="fa fa-plus"></i>
                                Nueva compra</a>
                        </div>
                    </div>
                    <br>
                    @include('errors.message')
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha de compra</th>
                                    <th>Producto</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width:100px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <th scope="row">
                                        <a href="{{ route('purchases.show', $purchase)}}"> {{$purchase->id }}</a>
                                    </th>
                                    <td> {{$purchase->purchase_date }} </td>

                                    @foreach($purchase->purchaseDetails as $purchaseDetail)
                                    <td> {{$purchaseDetail->product->name}} </td>
                                    @endforeach
                                    <td>{{number_format($purchase->total) }}</td>

                                    @if ($purchase->status=='VALID')
                                    <td>
                                        <a class="badge badge-success" href="{{ route('change.status.purchases', $purchase)}}" title="pagado">
                                            Pagado<i class="fa fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="badge badge-danger" href="{{ route('change.status.purchases', $purchase)}}" title="no pago">
                                            No pago
                                        </a>
                                    </td>
                                    @endif
                                    <td style="width:100px;">
                                        {!! Form::open(['route'=>['purchases.destroy', $purchase], 'method'=>'DELETE', 'id'=>'delete-form']) !!}
                                        <a class="btn btn-outline-info jsgrid-edit-button" href="{{route('purchases.pdf', $purchase)}}" title="PDF"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                                        <a class="btn btn-outline-info jsgrid-edit-button" title="VER" href="{{ route('purchases.show', $purchase)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
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