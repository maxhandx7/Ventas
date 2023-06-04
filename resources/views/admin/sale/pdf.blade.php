<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de venta</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        display: flex;
        align-items: center;
        padding: 20px;
        background-color: #f2f2f2;
    }

    #logo {
        margin-right: 20px;
    }

    #imagen {
        max-width: 150px;
    }

    #empresa {
        flex-grow: 1;
        text-align: center;
    }

    #empresa_nombre {
        font-size: 24px;
        margin: 0;
    }

    #descripcion {
        font-size: 16px;
        margin: 0;
    }

    #datos {
        display: flex;
        justify-content: space-between;
        flex-grow: 1;
        margin-top: 20px;
    }

    #datos_vendedor,
    #datos_cliente {
        padding: 10px;
    }

    #datos_vendedor .label,
    #datos_cliente .label {
        font-size: 18px;
        font-weight: bold;
    }

    #fact {
        font-size: 18px;
    }


    #facproducto {
        width: 100%;
        border-collapse: collapse;
    }

    #fa th {
        background-color: #f2f2f2;
        font-weight: bold;
        padding: 10px;
        text-align: left;
    }

    #fa td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    tfoot th {
        text-align: right;
    }

    tfoot td {
        font-weight: bold;
        border-top: 1px solid #ddd;
    }

    #encabezado {
        font-weight: bold;
    }

    .AF {
        font-size: 12px;
        color: gray;
    }

    .AF2 a {
        color: blue;
        text-decoration: none;
    }
</style>

<body>
    <header>
        <div id="logo">
            <img src="{{asset('image/'.$business->logo)}}" alt="logo empresa" id="imagen">
        </div>
        <div id="empresa">
            <h3 id="empresa_nombre">{{$business->name}}</h3>
            <p id="descripcion">{{$business->description}}</p>
        </div>
        <hr>
        <div id="datos">
            <div id="datos_vendedor">
                <p>
                    <span class="label">DATOS DEL VENDEDOR</span><br>
                    Nombre: {{$sale->user->name}}<br>
                    Email: {{$sale->user->email}}
                </p>
            </div>
            <div id="datos_cliente">
                <p>
                    <span class="label">DATOS DEL CLIENTE</span><br>
                    Nombre: {{$sale->client->name}}<br>
                    Email: {{$sale->client->email}}
                </p>
            </div>
        </div>
        <div id="fact">
            <p>
                NUMERO DE VENTA<br>
                {{$sale->id}}
            </p>
        </div>
    </header>
    <br>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO VENTA(COL)</th>
                        <th>DESCUENTO(%)</th>
                        <th>SUBTOTAL(COL)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                    <tr>
                        <td>{{$saleDetail->quantity}}</td>
                        <td>{{$saleDetail->product->name}}</td>
                        <td>$ {{$saleDetail->price}}</td>
                        <td>{{$saleDetail->discount}}</td>
                        <td>$ {{number_format($saleDetail->quantity*$saleDetail->price - $saleDetail->quantity*$saleDetail->price*$saleDetail->discount/100,2)}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                    <tr>
                        <th colspan="4">
                            <p align="right">SUBTOTAL:</p>
                        </th>
                        <td>
                            <p align="right">$ {{number_format($subtotal,2)}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL IMPUESTO ({{$sale->tax}}%):</p>
                        </th>
                        <td>
                            <p align="right">$ {{number_format($subtotal*$sale->tax/100,2)}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">$ {{number_format($sale->total,2)}}</p>
                        </td>
                    </tr>


                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <div id="datos">
            <p id="encabezado">
                <b>{{$business->name}}</b><br>{{$business->description}}<br>{{$business->mail}}<br>{{$business->address}}
            </p>
        </div>
        <div>
            <span class="AF">Copyright © 2022.
                Todos los derechos reservados.</span>
            <span class="AF2"><a href="https://www.instagram.com/tribie17/">AF</a></span>
        </div>
    </footer>
</body>

</html>