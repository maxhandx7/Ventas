@extends('layouts.admin2')
@section('title','Nueva compra')
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
            Nueva compra
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index') }}">compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nueva compra</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">registrar nueva compra</h4>
                       
                    </div>
                    {!! Form::open(['route'=>'purchases.store', 'method'=>'POST']) !!}
                    @include('admin.purchase._form') 
                    
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary mr-2 ">Guardar</button>
                <a href="{{route('purchases.index') }}" class="btn btn-light mr-2">
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

{!! Html::script('select/dist/js/bootstrap-select.min.js') !!}
<script>
    $(document).ready(function () {
        $("#agregar").click(function () {
            agregar();
        });
    });
    
    var cont = 0;
    total = 0;
    subtotal = [];
    
    $("#guardar").hide();
   
    
    function agregar() {
    
        product_id = $("#product_id").val();
        producto = $("#product_id option:selected").text();
        quantity = $("#quantity").val();
        price = $("#price").val();
        impuesto = $("#tax").val();
    
        if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
            subtotal[cont] = quantity * price;
            total = total + subtotal[cont];
            
            var fila = '<tr class="selected" id="fila'+
            cont+'"><td><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar('+
            cont+');"><i class="fa fa-times-circle"></i></button></td> <td><input type="hidden" name="product_id[]" value="'+
            product_id+'">'+
            producto+'</td> <td> <input type="hidden" id="price[]" name="price[]" value="' + 
            numeral(price).format('0,0.00') + '"> <input class="form-control" type="number" id="price[]" value="' + 
            numeral(price).format('0,0.00') + '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + 
            quantity + '"> <input class="form-control" type="number" value="' + 
            quantity + '" disabled> </td> <td align="right">s/' + 
            numeral(subtotal[cont]).format('0,0.00') + ' </td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {
            Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la compras',
    
            })
        }
    }
    
    function limpiar() {
        $("#quantity").val("");
        $("#price").val("");
    }
    
    function totales() {
        $("#total").html("COL " + numeral(total).format('0,0.00'));
        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("COL " + numeral(total_impuesto).format('0,0.00'));
        $("#total_pagar_html").html("COL " + numeral(total_pagar).format('0,0.00'));
        $("#total_pagar").val(total_pagar);
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
        $("#total").html("COL" + total);
        $("#total_impuesto").html("COL" + total_impuesto);
        $("#total_pagar_html").html("COL" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        evaluar();
    }
    
</script>
@endsection