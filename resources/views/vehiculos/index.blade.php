@extends('layouts.app')

@section('title', 'Vehículos registrados')

@section('content')
    <div class="page-heading heading-row">
        <div>
            <p class="eyebrow">Administración</p>
            <h1>Vehículos registrados</h1>
            <p>Consulta y administra los vehículos del taller.</p>
        </div>
        <span class="counter">{{ $vehiculos->count() }} {{ $vehiculos->count() === 1 ? 'vehículo' : 'vehículos' }}</span>
    </div>

    @if (session('success'))
        <div class="alert" role="alert">{{ session('success') }}</div>
    @endif

    <section class="card table-card">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Color</th>
                        <th class="actions-title">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vehiculos as $vehiculo)
                        <tr>
                            <td><span class="plate">{{ $vehiculo->placa }}</span></td>
                            <td>{{ $vehiculo->marca }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->anio }}</td>
                            <td>{{ $vehiculo->color }}</td>
                            <td>
                                <div class="actions">
                                    <a class="button button-edit" href="{{ route('vehiculos.edit', $vehiculo) }}">Editar</a>
                                    <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este vehículo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button button-danger" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-state">
                                <strong>No hay vehículos registrados.</strong>
                                <span>Registra el primer vehículo para comenzar.</span>
                                <a class="button button-primary" href="{{ route('vehiculos.create') }}">Registrar vehículo</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
