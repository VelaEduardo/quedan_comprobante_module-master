<?php

namespace Database\Factories;

use App\Models\Comprobante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComprobanteFactory extends Factory
{
    protected $model = Comprobante::class;

    public function definition()
    {
        return [
			'serie' => $this->faker->name,
			'fecha_com' => $this->faker->name,
			'can_total' => $this->faker->name,
			'hiden' => $this->faker->name,
			'fuente_id' => $this->faker->name,
			'proyecto_id' => $this->faker->name,
			'proveedor_id' => $this->faker->name,
        ];
    }
}
