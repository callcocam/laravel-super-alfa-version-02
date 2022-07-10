<?php

namespace Database\Seeders;

use App\Models\Compra;
use App\Models\Embalagem;
use App\Models\Marketing;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()->where('slug','fornecedor')->first();
        Produto::factory(5)->create([
            "user_id"=>$user->id,
            'status'=>'criado',
        ])->each(function ($model){
            $data = Embalagem::factory(1)->make([
                "user_id"=>$model->user_id,
                "created_at"=>now(),
                "updated_at"=>now(),
            ])->toArray();
            $model->embalagem()->create($data[0]);

            $model->compra()->create([
                'user_id' => $model->user_id,
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>$model->status,
            ]);
            $model->marketing()->create([
                'user_id' => $model->user_id,
                'created_at'=>now(),
                'updated_at'=>now(),
                'status'=>$model->status,
            ]);
        });
    }
}
