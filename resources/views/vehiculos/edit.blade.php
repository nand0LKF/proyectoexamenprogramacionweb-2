@extends('layouts.app')

@section('title', 'Editar vehículo')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Edición</p>
            <h1>Editar vehículo</h1>
            <p>Actualiza los datos del vehículo con placa {{ $vehiculo->placa }}.</p>
        </div>
    </div>

    <section class="card form-card">
        <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
            @include('vehiculos._form', ['textoBoton' => 'Actualizar vehículo'])
        </form>
    </section>
@endsection
