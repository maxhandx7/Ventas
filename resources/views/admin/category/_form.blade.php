<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        placeholder="Nombre de la categoria" required>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="description">Descripcion</label>
    <textarea id="description" class="form-control @error('description') is-invalid @enderror"
        placeholder="Descripcion de la categoria" name="description" rows="3"></textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <div class="form-group">
        <label for="icon">Icono</label>
        <select class="form-control" name="icon" id="icon">
            <option value="1">icon 1</option>
            <option value="2">icon 2</option>
            <option value="3">icon 3</option>
        </select>
    </div>
</div>
