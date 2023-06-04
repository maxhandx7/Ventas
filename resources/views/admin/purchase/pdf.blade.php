<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de compra</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        display: flex;
        justify-content: space-between;
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

    #fact {
        text-align: right;
    }

    #fact p {
        margin: 0;
        font-size: 18px;
    }

    #datos {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    #datos th {
        font-size: 18px;
        text-align: left;
        padding: 10px;
        background-color: #f2f2f2;
        border: 1px solid #ddd;
    }

    #datos td {
        font-size: 16px;
        padding: 10px;
        border: 1px solid #ddd;
    }

    #faccomprador {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    #faccomprador th {
        font-size: 18px;
        text-align: left;
        padding: 10px;
        background-color: #f2f2f2;
        border: 1px solid #ddd;
    }

    #faccomprador td {
        font-size: 16px;
        padding: 10px;
        border: 1px solid #ddd;
    }

    #facproducto {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    #facproducto th {
        font-size: 18px;
        text-align: left;
        padding: 10px;
        background-color: #f2f2f2;
        border: 1px solid #ddd;
    }

    #facproducto td {
        font-size: 16px;
        padding: 10px;
        border: 1px solid #ddd;
    }

    #facproducto tfoot th {
        text-align: right;
        background-color: #f2f2f2;
        border: 1px solid #ddd;
        padding: 10px;
    }

    #facproducto tfoot td {
        font-weight: bold;
        border: 1px solid #ddd;
        padding: 10px;
    }

    footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #f2f2f2;
    }

    #encabezado {
        font-weight: bold;
        font-size: 16px;
        margin: 0;
    }

    .AF {
        font-size: 14px;
    }

    .AF2 a {
        text-decoration: none;
        color: #000;
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
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="">DATOS DEL PROVEEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">Nombre: {{$purchase->provider->name}}<br>
                                Dirección: {{$purchase->provider->address}}<br>
                                Teléfono: {{$purchase->provider->phone}}<br>
                                Email: {{$purchase->provider->email}}
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
            <p>NUMERO DE COMPRA<br />
                {{$purchase->id}}
            </p>
        </div>
    </header>
    <br>


    <br>
    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>COMPRADOR</th>
                        <th>FECHA COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$purchase->user->name}}</td>
                        <td>{{$purchase->created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO COMPRA (COL)</th>
                        <th>SUBTOTAL (COL)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseDetails as $purchaseDetail)
                    <tr>
                        <td>{{$purchaseDetail->quantity}}</td>
                        <td>{{$purchaseDetail->product->name}}</td>
                        <td>$ {{$purchaseDetail->price}}</td>
                        <td>$ {{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                    <tr>
                        <th colspan="3">
                            <p align="right">SUBTOTAL:</p>
                        </th>
                        <td>
                            <p align="right">$ {{number_format($subtotal,2)}}
                            <p>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL IMPUESTO ({{$purchase->tax}}%):</p>
                        </th>
                        <td>
                            <p align="right">$ {{number_format($subtotal*$purchase->tax/100,2)}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">$ {{number_format($purchase->total,2)}}
                            <p>
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
        <div class="contenedor-padre">
            <div id="footer">
                <span class="AF">Copyright © 2022. Todos los derechos reservados.</span>
                <span class="AF2"><a href="https://www.instagram.com/tribie17/">AF</a></span>
            </div>
        </div>
    </footer>
</body>

</html>