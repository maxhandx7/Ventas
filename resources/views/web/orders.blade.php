@extends('web.myAccount')

@section('content_tab')
    <div class="col-lg-9 col-md-8">

        <div class="myaccount-content">
            <h3>ORDENES</h3>
            <div class="myaccount-table table-responsive text-center">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ORDEN</th>
                            <th>FECHA</th>
                            <th>ESTADO</th>
                            <th>TOTAL</th>
                            <th>ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $key => $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->shipping_status() }}</td>
                                <td>${{ number_format($order->total()) }}</td>
                                <td><a href="cart.html" class="check-btn sqr-btn ">ver</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No hay pedidos</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    @endsection
