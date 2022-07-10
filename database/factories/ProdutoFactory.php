<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Image\Image;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filePath = storage_path('app/public/produtos');
        $image = sprintf("produtos/%s", $this->faker->image($filePath, 640, 400, null, false));
        $thumb = str_replace("produtos","produtos/thumb", $image);
        Image::load(storage_path('app/public/' . $image))
            ->width(250)
            ->height(250)
            ->save(storage_path('app/public/' . $thumb));

        return [
            'user_id' => User::query()->where('type', 'app')->get()->random()->id,
            'descricao_completa' => $this->faker->sentence,
            'cod_prod_fornecedor' => str_pad($this->faker->randomDigit,7, '0', STR_PAD_LEFT),
            'outras_especificacoes' => $this->faker->sentence,
            'categoria_produto' => $this->faker->word,
            'subcategoria' => $this->faker->word,
            'segmento' => $this->faker->word,
            'subsegmento' => $this->faker->word,
            'marca' => $this->faker->company,
            'cor' => $this->faker->colorName,
            'fragrancia' => $this->faker->name,
            'sabor' => $this->faker->name,
            'modelo' => $this->faker->rgbColor,
            'imagem' => $image,
            'thumb' => $thumb,
            'tamanho' => $this->faker->randomNumber(),
            'mva_interno' => $this->faker->word,
            'mva_ajustado' => $this->faker->word,
            'tipo_de_frete' => $this->faker->randomDigit,
            'classif_fiscal_ncm' => $this->faker->randomNumber(7),
            'cod_barras' => $this->faker->uuid,
            'prazo_de_validade' => $this->faker->randomNumber(3),
            'peso_bruto_da_und' => $this->faker->randomNumber(),
            'peso_liquido_da_und' => $this->faker->randomNumber(),
            'preco_custo_un' => form_w($this->faker->randomDigit),
            'altura_da_und' => $this->faker->randomDigit,
            'largura_da_und' => $this->faker->randomDigit,
            'profundidade_da_und' => $this->faker->randomDigit,
            'qde_por_cx' => $this->faker->randomDigit,
            'status' => ["compras",'criado'][rand(0,1)],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
