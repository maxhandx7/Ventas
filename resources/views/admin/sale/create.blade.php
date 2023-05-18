@extends('layouts.admin2')
@section('title','Nueva venta')
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
            Nueva venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index') }}">ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nueva venta</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">registrar nueva venta</h4>

                    </div>
                    {!! Form::open(['route'=>'sales.store', 'method'=>'POST']) !!}
                    @include('admin.sale._form')

                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary mr-2 ">Guardar</button>
                    <a href="{{route('sales.index') }}" class="btn btn-light mr-2">
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
{!! Html::script('melody/js/alerts.js') !!}
{!! Html::script('melody/js/avgrund.js') !!}

<script>
    $(document).ready(function() {
        $("#agregar").click(function() {
            agregar();
        });
    });
    var cont = 1;
    total = 0;
    subtotal = [];
    $("#guardar").hide();
    $("#product_id").change(mostrarValores);

    function mostrarValores() {
        datosProducto = document.getElementById('product_id').value.split('_');
        $("#price").val(datosProducto[2]);
        $("#stock").val(datosProducto[1]);
    }


    $(document).on('keyup', '#code', function() {
        var valorResultado = $(this).val();
        if (valorResultado != "") {
            obtener_registro(valorResultado);
        } else {
            obtener_registro();
        }
    })

    function agregar() {
        datosProducto = document.getElementById('product_id').value.split('_');
        product_id = datosProducto[0];
        producto = $("#product_id option:selected").text();
        quantity = $("#quantity").val();
        discount = $("#discount").val();
        price = $("#price").val();
        stock = $("#stock").val();
        impuesto = $("#tax").val();
        if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
            if (parseInt(stock) >= parseInt(quantity)) {
                subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila' +
                    cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' +
                    cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="product_id[]" value="' +
                    product_id + '">' + producto + '</td> <td> <input type="hidden" name="price[]" value="' +
                    numeral(price).format('0,0.00') + '"> <input class="form-control" type="number" value="' +
                    numeral(price).format('0,0.00') + '" disabled> </td> <td> <input type="hidden" name="discount[]" value="' +
                    numeral(discount).format('0,0.00') + '"> <input class="form-control" type="number" value="' +
                    numeral(discount).format('0,0.00') + '" disabled> </td> <td> <input type="hidden" name="quantity[]" value="' +
                    quantity + '"> <input type="number" value="' +
                    quantity + '" class="form-control" disabled> </td> <td align="right">s/' +
                    numeral(subtotal[cont]).format('0,0.00') + '</td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'La cantidad a vender supera el stock.',
                })
            }
        } else {
            Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la venta.',
            })
        }
    }

    function limpiar() {
        $("#quantity").val("");
        $("#discount").val("0");
    }

    function totales() {
        $("#total").html("COL " + total.toFixed(2));
        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("COL " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("COL " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        total_impuesto = total * impuesto / 100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("COL" + numeral(total).format('0,0.00'));
        $("#total_impuesto").html("COL" + numeral(total_impuesto).format('0,0.00'));
        $("#total_pagar_html").html("COL" + numeral(total_pagar_html).format('0,0.00'));
        $("#total_pagar").val(numeral(total_pagar_html).format('0,0.00'));
        $("#fila" + index).remove();
        evaluar();
    }
</script>
@endsection