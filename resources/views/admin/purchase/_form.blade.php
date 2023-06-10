<div class="form-group">
    <label for="provider_id">Proveedor (*)</label>
    <select id="provider_id"  class="form-control js-example-basic-single" name="provider_id">
        <option selected disabled value="">Seleccione Proveedor</option>
        @foreach ($providers as $provider)
        <option value="{{ $provider->id }}">{{$provider->name}}</option>
        @endforeach  
    </select>
</div>

<div class="form-group">
    <label for="product_id">Productos (*)</label>
    <select id="product_id"  class="form-control js-example-basic-single" name="product_id">
        <option selected disabled value="">Seleccione Productos</option>
        @foreach ($products as $product)
        <option value="{{ $product->id }}">{{$product->name}}</option>
        @endforeach  
    </select>
</div>

<div class="form-group">
    <label for="tax">Impuesto (IVA)</label>
    <input type="number" name="tax" id="tax" class="form-control" value="0" placeholder="19%" >
</div>

<div class="form-group">
    <label for="quantity">Cantidad (*)</label>
    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Cantidad" >
</div>

<div class="form-group">
    <label for="price">Precio (*)</label>
    <input type="number" name="price" id="price" class="form-control" placeholder="precio de compra">
</div>
<div class="card text-muted" >
<button type="button" id="agregar" class="btn btn-primary">Agregar</button>

<div class="form-group">
    <h4 class="card-title"></h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(COL)</th>
                    <th>Cantidad</th>
                    <th>Sub total(COL)</th>
                </tr>
            </thead>
            <tfoot>
             <tr>
                <th colspan="4">
                    <p align="right">TOTAL:</p>
                </th>
                <th colspan="4">
                 <p align="right"><span id="total">COL 0.00</span></p>
             </th>
             </tr>
 
             <tr id="dvOcultar">
                 <th colspan="4">
                     <p align="right">IVA (19%)</p>
                 </th>
                 <th colspan="4">
                  <p align="right"><span id="total_impuesto">COL 0.00</span></p>
              </th>
              </tr>
 
              <tr>
                 <th colspan="4">
                     <p align="right">TOTAL PAGAR</p>
                 </th>
                 <th colspan="4">
                  <p align="right"><span align="right" id="total_pagar_html">COL 0.00</span><input type="hidden" name="total" id="total_pagar"></p>
              </th>
              </tr>
 
            </tfoot>
        </table>
    </div>
 </div>
</div>








