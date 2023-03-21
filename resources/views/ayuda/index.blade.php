@section('title', 'Académicos')
@section('level-1', 'Informes')
@section('level-2', 'Referenciales')

@extends('layouts.app')

@section('content')
    <div class="row">

        @include('layouts.breadcrumb')

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ayuda Interactiva</h4>
                    <p class="card-title-desc">Aqui podras ver todos los manuales disponibles</p>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                @foreach ($items as $key => $item)
                                    <a class="nav-link mb-2 @if ($key == 0) active @endif" id="v-pills-{{ $item }}-tab" data-bs-toggle="pill"
                                       href="#v-pills-{{ $item }}" role="tab" aria-controls="v-pills-{{ $item }}"
                                       aria-selected="true">{{ $item }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">

                                @foreach ($items as $key => $item)
                                <div class="tab-pane fade show @if ($key == 0) active @endif" id="v-pills-{{ $item }}" role="tabpanel"
                                     aria-labelledby="v-pills-{{ $item }}-tab">
                                    <iframe src="{{ asset("storage/ayuda/$item.pdf#toolbar=0&navpanes=0&scrollbar=0") }}" style="width: 100% !important; height: 100vh !important" frameborder="0"></iframe>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
