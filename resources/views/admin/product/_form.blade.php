<div class="form-group">
    <label for="name">Nombre (*)</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de producto" require>
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="sell_price">Precio (*)</label>
    <input type="number" name="sell_price" id="sell_price" class="form-control" placeholder="Precio de venta" require>
    @error('sell_price')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="category_id">Categoria</label>
    <select id="category_id" class="form-control" name="category_id">
        <option selected disabled value="">Seleccione Categoria</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{$category->name}}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="provider_id">Proveedor</label>
    <select id="provider_id" class="form-control" name="provider_id">
        <option selected disabled value="">Seleccione Proveedor</option>
        @foreach ($providers as $provider)
        <option value="{{ $provider->id }}">{{$provider->name}}</option>
        @endforeach

    </select>
</div>

<div class="card-body">
    <h4 id="image" class="card-title d-flex">Imagen de producto
        <small class="ml-auto align-self-end">
            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
        </small>
    </h4>
    <input id="picture" name="picture" type="file" class="dropify" />
</div>