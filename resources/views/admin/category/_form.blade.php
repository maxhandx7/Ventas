<div class="form-group">
    <div id="icon_div">
        <label for="icon">Icono</label>
        <select class="{{-- selectpicker --}} form-control" data-live-search="true" name="icon" id="icon" style="width: 100%">
            <option value="" selected>-- Seleccione un icono --</option>
            @foreach (getIconsArray() as $icon)
            <option value="{{ $icon }}" data-content="<i class='fa {{ $icon }}' aria-hidden='true'></i> {{ $icon }}">
                {{ $icon }}
            </option>
            @endforeach
        </select>
    </div>
</div>
