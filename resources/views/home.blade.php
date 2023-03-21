@section('title', 'Página Principal')

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Datos del usuario</h4>
                <div class="text-center">
                    <div class="avatar-lg mx-auto mb-4">
                        <img src="{{ asset('storage/users/' . Auth::user()->photo) }}" class="img-fluid rounded-circle" alt="emblema de la institucion">
                    </div>
                    <p class="font-16 text-muted mb-2"></p>
                    <h5><a href="javascript: void(0);" class="text-dark">{{ $user->name }} {{ $user->lastname }}</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{ asset('assets/js/pages/home.js') }}"></script>
@endsection
