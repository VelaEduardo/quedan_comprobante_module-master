<?php

namespace Database\Factories;

use App\Models\Comprobantefactura;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComprobantefacturaFactory extends Factory
{
    protected $model = Comprobantefactura::class;

    public function definition()
    {
        return [
			'factura_id' => $this->faker->name,
			'comprobante_id' => $this->faker->name,
			'hiden' => $this->faker->name,
        ];
    }
}
