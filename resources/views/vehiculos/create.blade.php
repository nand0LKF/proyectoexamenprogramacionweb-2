@extends('layouts.app')

@section('title', 'Registrar vehículo')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Nuevo registro</p>
            <h1>Registrar vehículo</h1>
            <p>Completa los datos del vehículo que ingresa al taller.</p>
        </div>
    </div>

    <section class="card form-card">
        <form action="{{ route('vehiculos.store') }}" method="POST">
            @include('vehiculos._form', ['textoBoton' => 'Guardar vehículo'])
        </form>
    </section>
@endsection
