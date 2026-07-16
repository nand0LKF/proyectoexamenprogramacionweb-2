@csrf
@isset($vehiculo)
    @method('PUT')
@endisset

<div class="form-grid">
    <div class="field">
        <label for="placa">Placa</label>
        <input id="placa" name="placa" type="text" maxlength="15" value="{{ old('placa', $vehiculo->placa ?? '') }}" placeholder="Ej. 1234 ABC">
        @error('placa') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="marca">Marca</label>
        <input id="marca" name="marca" type="text" maxlength="80" value="{{ old('marca', $vehiculo->marca ?? '') }}" placeholder="Ej. Toyota">
        @error('marca') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="modelo">Modelo</label>
        <input id="modelo" name="modelo" type="text" maxlength="80" value="{{ old('modelo', $vehiculo->modelo ?? '') }}" placeholder="Ej. Corolla">
        @error('modelo') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label for="anio">Año</label>
        <input id="anio" name="anio" type="number" min="1900" max="{{ date('Y') + 1 }}" value="{{ old('anio', $vehiculo->anio ?? '') }}" placeholder="Ej. {{ date('Y') }}">
        @error('anio') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="field field-full">
        <label for="color">Color</label>
        <input id="color" name="color" type="text" maxlength="50" value="{{ old('color', $vehiculo->color ?? '') }}" placeholder="Ej. Blanco">
        @error('color') <span class="error">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-actions">
    <a class="button button-secondary" href="{{ route('vehiculos.index') }}">Cancelar</a>
    <button class="button button-primary" type="submit">{{ $textoBoton }}</button>
</div>
