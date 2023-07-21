<div class="form-group">
    <label for="name">Nombre (*)</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de producto" require>
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="code">Código de barras</label>
            <input type="text" name="code" id="code" class="form-control">
            <small id="helpId" class="text-muted">Campo opcional</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="sell_price">Precio de venta</label>
            <input type="number" name="sell_price" id="sell_price" class="form-control"
                aria-describedby="helpId" required>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="short_description">Extracto</label>
    <textarea class="form-control" name="short_description" id="short_description"
        rows="3"></textarea>
</div>

<div class="form-group">
    <label for="long_description">Descripción</label>
    <textarea class="form-control" name="long_description" id="summernoteExample"
        rows="10"></textarea>
</div>
