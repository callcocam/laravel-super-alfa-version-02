<?php

namespace Database\Factories;

use App\Models\VolumeEmbalagem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubSegmentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VolumeEmbalagem::class;

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