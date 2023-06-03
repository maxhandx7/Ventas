<div class="form-group">
    <label for="name">Nombre de cliente *</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de cliente" required>
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="cc">Cedula</label>
    <input type="text" name="cc" id="cc" class="form-control" placeholder="Cedula de cliente">
    @error('cc')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="rut">Rut</label>
    <input type="text" name="rut" id="rut" class="form-control" placeholder="Rut de cliente">
    @error('rut')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="address">Direccion de cliente</label>
    <input type="text" name="address" id="address" class="form-control" placeholder="Direccion de cliente">
    @error('address')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    <label for="phone">Numero de contacto</label>
    <input type="number" name="phone" id="phone" class="form-control" placeholder="Telefono">
    @error('phone')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="email">Correo de cliente</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="pepito@email.com">
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>