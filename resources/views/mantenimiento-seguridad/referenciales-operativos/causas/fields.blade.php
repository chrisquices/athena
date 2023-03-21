<div class="row">
    <div class="col-lg-6">
        <div>
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-control select2">
                <option value="">Seleccione un tipo</option>
            </select>
            </div>
    </div>

    <div class="col-lg-6">
        <div>
            <label for="name" class="form-label">Nombre</label>
            <input id="name" name="name" class="form-control" type="text" value="{{ $causa->nombre ?? ''}}">
        </div>
    </div>
</div>
