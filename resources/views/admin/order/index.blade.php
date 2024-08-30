@extends('layouts.admin2')
@section('title', 'Gestión de Pedidos')
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
                Pedidos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="/home">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Pedidos</h4>

                        </div>
                        <br>
                        @include('errors.message')
                        <div class="table-responsive">
                            <table id="order-listing" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>PEDIDO</th>
                                        <th>FECHA</th>
                                        <th>ESTADO</th>
                                        <th>TOTAL</th>
                                        <th>ACCIÓN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $order)
                                        <tr>
                                            <th scope="row"><a href="{{ route('orders.show', $order) }}">{{ $order->id }}</a></th>

                                 
                                            <td>{{$order->order_date()}}</td>
                                            <td class="second_td">
                                                <a 
                                                href="#" 
                                                id="username" 
                                               
                                                data-type="select" 
                                                data-pk="{{$order->id}}" 
                                                data-url="{{url("/orders_update/$order->id")}}" 
                                                data-title="Estado"
                                                data-value="{{ $order->shipping_status }}"
                                                >{{$order->shipping_status()}}
                                                </a>
                                            </td>
                                            <td>{{ number_format($order->total()) }}</td>


                                            <td style="width: 200px;">
                                                <a class="btn btn-outline-info" href="{{ route('orders.show', $order)}}" title="Ver detalles">
                                                    <i class="far fa-eye"></i>
                                                </a>
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
{{--  {!! Html::script('melody/js/data-table.js') !!}  --}}


<script>
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.ajaxOptions = {type: 'PUT'};
    $.fn.editableform.buttons =
    '<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
    '<i class="fa fa-fw fa-check"></i>' +
    '</button>' +
    '<button type="button" class="btn btn-default btn-sm editable-cancel">' +
    '<i class="fas fa-times"></i>' +
    '</button>';

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        $('#order-listing').DataTable({
            responsive: true,
            "aLengthMenu": [
              [5, 10, 15, -1],
              [5, 10, 15, "All"]
            ],
            "iDisplayLength": 10,
            "language": {
              "info": "_TOTAL_ registros",
              "search": "Buscar",
              "paginate": {
                  "next": "Siguiente",
                  "previous": "Anterior",
              },
              "lengthMenu": 'Mostrar <select class="form-control">' +
                  '<option value="10">10</option>' +
                  '<option value="30">30</option>' +
                  '<option value="50">50</option>' +
                  '<option value="100">100</option>' +
                  '<option value="-1">Todo</option>' +
                  '</select> registros',
              "loadinRecords": "Cargando...",
              "processing": "Procesando...",
              "emptyTable": "No hay datos",
              "zeroRecords": "No hay coincidencias",
              "infoEmpty": "",
              "infoFiltered": "",
            },
      
            "fnRowCallback": function( nRow, mData, iDisplayIndex ) {
            
                $('#order-listing .second_td a').editable({
                    type: 'select',
                    name: 'Type',
                    title: 'Type',
                    source:[
                        {value: "PENDING", text: "PENDIENTE"},
                        {value: "APPROVED", text: "APROBADO"},
                        {value: "CANCELED", text: "CANCELADO"},
                        {value: "DELIVERED", text: "ENTREGADO"},
                    ]
                });
      
              },
          });
    });
</script>

@endsection

