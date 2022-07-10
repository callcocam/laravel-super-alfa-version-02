<?php

namespace Database\Factories;

use App\Models\Bc;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BcFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bc::class;

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
