@extends('layouts.admin2')
@section('title','Detalles de Compra')
@section('styles')
@endsection
@section('styles')

@section('create')
<li class="nav-item d-none d-lg-flex">
    <a href="{{ route('categories.create') }}" class="nav-link">
    <span class="btn btn-primary"> crear nuevo</span>
    </a>
</li>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')


<!-- partial -->

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
           Detalle de compra #{{$purchase->id}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index') }}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$purchase->id }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="nombre"><strong>Proveedor</strong></label>
                            <p>{{$purchase->provider->name}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Número Compra</strong></label>
                            <p>{{$purchase->id}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Comprador</strong></label>
                            <p>{{$purchase->user->name}}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group">
                        <h4 class="card-title"></h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Producto</th>
                                        <th>Precio(COL)</th>
                                        <th>Cantidad</th>
                                        <th>Sub total(COL)</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">SUBTOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($subtotal,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">TOTAL IMPUESTO ({{$purchase->tax}}%):</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($subtotal*$purchase->tax/100,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($purchase->total,2)}}</p>
                                        </th>
                                    </tr>
                    
                                </tfoot>
                                <tbody>
                                    @foreach($purchaseDetails as $purchaseDetail)
                                    <tr>
                                        <td>{{$purchaseDetail->product->name }}</td>
                                        <td>s/{{$purchaseDetail->price}}</td>
                                        <td>{{$purchaseDetail->quantity}}</td>
                                        <td>s/{{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    


                
                </div>
                <div class="card text-muted">
                  <a href="{{route('purchases.index') }}" class="btn btn-primary" type="button">Regresar</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
{!! Html::script('melody/js/alerts.js') !!}
{!! Html::script('melody/js/avgrund.js') !!}

{!! Html::script('select/dist/js/bootstrap-select.min.js') !!}
@endsection