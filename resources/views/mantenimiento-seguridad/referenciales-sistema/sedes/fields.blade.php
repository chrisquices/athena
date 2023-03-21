<div class="row">
    <div class="col-lg-6 mb-3">
        <div>
            <label for="name" class="form-label">Nombre</label>
            <input id="name" name="name" class="form-control" type="text" value="{{ $sede->nombre ?? ''}}">
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div>
            <label for="acronimo" class="form-label">Acrónimo</label>
            <input id="acronimo" name="acronimo" class="form-control" type="text" value="{{ $sede->acronimo ?? ''}}">
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div>
            <label for="telefono" class="form-label">Teléfono</label>
            <input id="telefono" name="telefono" class="form-control" type="text" value="{{ $sede->telefono ?? ''}}">
        </div>
    </div>

    <div class="col-lg-6 mb-3">
        <div>
            <label for="telefono_alternativo" class="form-label">Teléfono Alternativo</label>
            <input id="telefono_alternativo" name="telefono_alternativo" class="form-control" type="text" value="{{ $sede->telefono_alternativo ?? ''}}">
        </div>
    </div>

    <div class="col-lg-6">
        <div>
            <label for="direccion" class="form-label">Dirección</label>
            <input id="direccion" name="direccion" class="form-control" type="text" value="{{ $sede->direccion ?? ''}}">
        </div>
    </div>
</div>
