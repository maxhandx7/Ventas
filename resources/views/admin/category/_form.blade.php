<div class="form-group">
    <div id="icon_div">
        <label for="icon">Icono</label>
        <select class="form-control" name="icon" id="icon" style="width: 100%">
            <option value="" selected>-- Seleccione un icono --</option>
            @foreach (getIconsArray() as $icon)
            <option value="{{ $icon }}" data-icon="fa {{ $icon }}">
                {{ $icon }}
            </option>
            @endforeach
        </select>
    </div>
</div>
