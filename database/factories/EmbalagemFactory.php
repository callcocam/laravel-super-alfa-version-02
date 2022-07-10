<?php

namespace Database\Factories;

use App\Models\Embalagem;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmbalagemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Embalagem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dun_14' => $this->faker->sentence,
            'qde_na_emb_secundaria' => $this->faker->randomDigit,
            'peso_bruto' => $this->faker->randomDigit,
            'peso_liquido' => $this->faker->randomDigit,
            'altura' => $this->faker->randomDigit,
            'largura' => $this->faker->randomDigit,
            'profundidade' => $this->faker->randomDigit,
            'qde_por_camada' => $this->faker->randomDigit,
            'empilhamento' => $this->faker->randomDigit,
            'qde_no_palete' => $this->faker->randomDigit,
        ];
    }
}
