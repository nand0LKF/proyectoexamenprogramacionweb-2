<?php

namespace Tests\Feature;

use App\Models\Vehiculo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehiculoCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_puede_registrar_un_vehiculo(): void
    {
        $response = $this->post(route('vehiculos.store'), $this->datos());

        $response->assertRedirect(route('vehiculos.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('vehiculos', ['placa' => '1234ABC']);
    }

    public function test_valida_los_campos_obligatorios(): void
    {
        $this->post(route('vehiculos.store'), [])
            ->assertSessionHasErrors(['placa', 'marca', 'modelo', 'anio', 'color']);
    }

    public function test_puede_listar_editar_y_actualizar_un_vehiculo(): void
    {
        $vehiculo = Vehiculo::create($this->datos());

        $this->get(route('vehiculos.index'))->assertOk()->assertSee('1234ABC');
        $this->get(route('vehiculos.edit', $vehiculo))->assertOk()->assertSee('Toyota');

        $this->put(route('vehiculos.update', $vehiculo), array_merge($this->datos(), ['color' => 'Negro']))
            ->assertRedirect(route('vehiculos.index'));

        $this->assertDatabaseHas('vehiculos', ['id' => $vehiculo->id, 'color' => 'Negro']);
    }

    public function test_puede_eliminar_un_vehiculo(): void
    {
        $vehiculo = Vehiculo::create($this->datos());

        $this->delete(route('vehiculos.destroy', $vehiculo))
            ->assertRedirect(route('vehiculos.index'));

        $this->assertDatabaseMissing('vehiculos', ['id' => $vehiculo->id]);
    }

    private function datos(): array
    {
        return [
            'placa' => '1234ABC',
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'anio' => 2024,
            'color' => 'Blanco',
        ];
    }
}
