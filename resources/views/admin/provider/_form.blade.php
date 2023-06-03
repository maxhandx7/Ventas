<div class="form-group">
    <label for="name">Nombre de proveedor (*)</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de proveedor" required>
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="email">Correo de proveedor</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="pepito@email.com">
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="nit_number">Nit de proveedor</label>
    <input type="text" name="nit_number" id="nit_number" class="form-control" placeholder="Nit de proveedor">
    @error('nit_number')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="address">Direccion de proveedor</label>
    <input type="text" name="address" id="address" class="form-control" placeholder="Direccion de proveedor">
    @error('address')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="phone">Numero de contacto</label>
    <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono">
    @error('phone')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>