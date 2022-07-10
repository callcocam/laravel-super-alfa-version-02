<?php

namespace Database\Factories;

use App\Models\Medida;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedidaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medida::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id"=>User::all()->random()->id
        ];
    }
}
