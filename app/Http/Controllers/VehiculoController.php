<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehiculoController extends Controller
{
    public function index(): View
    {
        $vehiculos = Vehiculo::latest()->get();

        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create(): View
    {
        return view('vehiculos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Vehiculo::create($this->validar($request));

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo registrado correctamente.');
    }

    public function edit(Vehiculo $vehiculo): View
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo): RedirectResponse
    {
        $vehiculo->update($this->validar($request, $vehiculo));

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy(Vehiculo $vehiculo): RedirectResponse
    {
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo eliminado correctamente.');
    }

    private function validar(Request $request, ?Vehiculo $vehiculo = null): array
    {
        return $request->validate([
            'placa' => ['required', 'string', 'max:15', 'unique:vehiculos,placa,'.($vehiculo?->id ?? 'NULL')],
            'marca' => ['required', 'string', 'max:80'],
            'modelo' => ['required', 'string', 'max:80'],
            'anio' => ['required', 'integer', 'min:1900', 'max:'.(date('Y') + 1)],
            'color' => ['required', 'string', 'max:50'],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'placa.unique' => 'La placa ya está registrada.',
            'anio.integer' => 'El año debe ser un número entero.',
            'anio.min' => 'El año debe ser igual o posterior a 1900.',
            'anio.max' => 'El año ingresado no es válido.',
        ]);
    }
}
