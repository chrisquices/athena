@section('title', 'Mallas Curriculares')
@section('level-1', 'Procesos')
@section('level-2', 'Académicos')

@extends('layouts.app')

@section('content')
<div class="row">

    @include('layouts.breadcrumb')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('mallas-curriculares-store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                            <label for="bachillerato_id" class="form-label">Bachillerato</label>
                            <select name="bachillerato_id" id="bachillerato_id" class="form-control select2" required>
                                <option value="" selected disabled>Seleccione un bachillerato</option>
                                @foreach ($bachilleratos as $bachillerato)
                                <option value="{{ $bachillerato->id }}" @if(old('bachillerato_id')==$bachillerato->id) selected @endif >{{ $bachillerato->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-12 col-sm-12 mb-3">
                            <label for="ano" class="form-label">Año</label>
                            <input type="number" id="ano" name="ano" class="form-control" value="{{ date('Y') }}" required>
                        </div>

                        <div class="col-12">
                            <div class="repeater">
                                <div data-repeater-list="data">
                                    <div data-repeater-item class="row">
                                        <div class="mb-3 col-lg-2">
                                            <label for="name">Plan</label>
                                            <select name="plan[plan]" class="form-control" required>
                                                <option value="" selected disabled>Seleccione un plan</option>
                                                <option value="Comun">Comun</option>
                                                <option value="Especifico">Especifico</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-lg-2 hi">
                                            <label for="area_id">Area</label>
                                            <select name="area_id[area_id]" class="form-control area_id" required>
                                                <option value="" selected disabled>Seleccione un area</option>
                                                @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 col-lg-2 boi asignatura_id_container">
                                            <label for="asignatura_id">Asignatura</label>
                                            <select name="asignatura_id[asignatura_id]" class="form-control asignatura_id" required>
                                                <option value="" selected disabled>Seleccione una asignatura</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-lg-2">
                                            <label for="grado_id">Grado</label>
                                            <select name="grado_id[grado_id]" class="form-control" required>
                                                <option value="" selected disabled>Seleccione un grado</option>
                                                @foreach($grados as $grado)
                                                <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 col-lg-2">
                                            <label for="horas_catedras">Horas Catedras</label>
                                            <input type="number" name="horas_catedras[horas_catedras]" class="form-control" required>
                                        </div>

                                        <div class="col-lg-2 align-self-center">
                                            <div class="d-grid">
                                                <input data-repeater-delete type="button" class="btn btn-primary" value="Remover" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Agregar" />
                            </div>
                        </div>
                    </div>

                    @include('layouts.errors')

                    <div class="row justify-content-between">
                        <div class="col-12 responsive-button-group">
                            <a href="{{ route('mallas-curriculares-index') }}" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Volver</a>
                            <button type="submit" class="btn btn-primary float-end btn-confirmation"><i class="fa fa-check-circle me-2"></i>Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

<script src="{{ asset('assets/js/form-repeater.int.js') }}"></script>

<script>
    $(document).on("change", ".area_id", function() {
        let areaId = $(this).val();
        let elementAsignatura = $(this).parent().next().children('select');

        getAsignaturas(areaId, elementAsignatura);
    });

    function getAsignaturas(areaId, elementAsignatura) {
        $.ajax({
                type: "GET",
                url: `/get/asignaturas`,
                data: {
                    id: areaId,
                },
            })
            .done(function(response) {

                elementAsignatura.empty();

                elementAsignatura.append(`
                    <option value="" selected disabled>Seleccione una asignatura</option>
                `);

                response.forEach(element => {
                    elementAsignatura.append(`
                        <option value="${element.id}">${element.nombre}</option>
                    `);
                });

            })
            .fail(function(response) {
                toastr.error(DEFAULT_ERROR_RESPONSE);
            });
    }
</script>
@endsection