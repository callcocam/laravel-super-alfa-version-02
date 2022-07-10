<?php

use Campanha\Models\Campanha;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/cards/{produto}', function (Request $request, $produto) {
     $dados = $request->input();

    $atualizar = \Campanha\Models\ProdutosCampanha::query()->where('id',$produto)->first();
//    dd($dados);
    if(count($dados)){
        $dados = json_encode($dados);
        $atualizar->card_images_propriates = $dados;
    }else{
        $atualizar->card_images_propriates = null;
    }
    return $atualizar->save();
    return true;
})->name('api.campanhas.cards.save');


Route::post('/stories/{produto}', function (Request $request, $produto) {
    $dados = $request->input();

    $atualizar = \Campanha\Models\ProdutosCampanha::query()->where('id',$produto)->first();
//    dd($dados);
    if(count($dados)){
        $dados = json_encode($dados);
        $atualizar->storie_image_proprietes = $dados;
    }else{
        $atualizar->storie_image_proprietes = null;
    }
    return $atualizar->save();
    return true;
})->name('api.campanhas.stories.save');


Route::post('/lamina/{produto}', function (Request $request, $produto) {
    $dados = $request->input();

    $atualizar = \Campanha\Models\ProdutosCampanha::query()->where('id',$produto)->first();
//  dd($dados);
    if(count($dados)){
        $dados = json_encode($dados);
        $atualizar->lamina_images_propriates = $dados;
    }else{
        $atualizar->lamina_images_propriates = null;
    }
    return $atualizar->save();

})->name('api.campanhas.lamina.save');

Route::post('/encarte/{produto}', function (Request $request, $produto) {
    $dados = $request->input();

    $atualizar = \Campanha\Models\ProdutosCampanha::query()->where('id',$produto)->first();
//  dd($dados);
    if(count($dados)){
        $dados = json_encode($dados);
        $atualizar->banners_image_proprietes = $dados;
    }else{
        $atualizar->banners_image_proprietes = null;
    }
    return $atualizar->save();

})->name('api.campanhas.banners.save');


Route::post('/cardsindividuais/{produto}', function (Request $request, $produto) {
    $dados = $request->input();

    $atualizar = \Campanha\Models\CardIndividual::query()->where('id',$produto)->first();
    if(count($dados)){
        $dados = json_encode($dados);
        $atualizar->card_images_propriates = $dados;
    }else{
        $atualizar->card_images_propriates = null;
    }
    return $atualizar->save();
    return true;
})->name('api.campanhas.cardsindividuais.save');


//Route::post('/excluirlaminas', function (Request $request) {
//    $campanhas = Campanha::query()
//    ->where('type', 'lamina')->where('data_fim', '<', Carbon::yesterday())->get();
//    if($campanhas){
//        foreach ($campanhas as $campanha){
//            $campanha->delete();
//        }
//    }
//    return $request->all();
//});


// Route::get('/campanhas/andamento', function (Request $request) {
//     $campanhas = Campanha::query()->where('status', 'published')
//     ->with(['loja_campanha','produtos_campanha'])->paginate();
//     return response()->json($campanhas);peso_bruto_emb_secundaria
// })->name('api.campanhas.andamento');

/**
 * Geragar o as chaves para o cliente
 * php artisan passport:client --client
 * pegar o token
 * https://web.superalfa.coop.br/oauth/token
 * params
 * grant_type = client_credentials
 * client_id = igual ao client_id gerado
 * client_secret = igual ao client_secret gerado
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/**
 * Listar produtos, fazer uma requisição para:
 * https://domonio/api/produtos
 * Rertona uma coleção no formato de paginação
 * "current_page": 1,
 * "data": [...],
 *  "first_page_url": "https://domonio/api/produtos?page=1",
 *  "from": 1,
 *  "last_page": 46,
 *  "last_page_url": "https://domonio/api/produtos?page=46",
 *  "links": [
 *  {
 *  "url": null,
 *  "label": "&laquo; Anterior",
 *  "active": false
 *  },
 *  {
 *  "url": "https://domonio/api/produtos?page=1",
 *  "label": "1",
 *  "active": true
 *  },
 * ...
 *  "url": "https://domonio/api/produtos?page=10",
 *  "label": "10",
 *  "active": false
 *  },
 *  {
 *  "url": null,
 *  "label": "...",
 *  "active": false
 *  },
 * ...
 *  {
 *  "url": "https://domonio/api/produtos?page=46",
 *  "label": "46",
 *  "active": false
 *  },
 *  {
 *  "url": "https://domonio/api/produtos?page=2",
 *  "label": "Próximo &raquo;",
 *  "active": false
 *  }
 *  ],
 *  "next_page_url": "https://domonio/api/produtos?page=2",
 *  "path": "https://domonio/api/produtos",
 *  "per_page": 15,
 *  "prev_page_url": null,
 *  "to": 15,
 *  "total": 676
 */
Route::get('/produtos', function (Request $request) {
    $produtos =  \App\Models\Produto::query()
        ->select([
            'id',
            'status',
            'cod_barras',
            'marca',
            'peso_bruto_da_und',
            'peso_liquido_da_und',
            'altura_da_und',
            'largura_da_und',
            'profundidade_da_und',
            'unidade_medida as unidade_medida',
            'tipo_de_embalagem',
            'volume_de_embalagem',
            'classif_fiscal_ncm',
            'tipo_de_embalagem_secundaria',
            'volume_de_embalagem_secundaria',
            'medida_embalagem_secundaria_id as unidade_medida_embalagem_secundaria',
            'cluster_id as cluster',
//            'coperat_id',
        ])
        ->where('status', 'concluido')
        ->where('integrado_com_erp','não')
        ->paginate($request->query('per_page',50));

        $produtos->map(function ($model){
//           $model->foto =url( \Illuminate\Support\Facades\Storage::url($model->foto));

            if($arquivo = \App\Models\Arquivo::query()->where('slug', $model->cod_barras)->first()){
                $model->imagem = url(\Illuminate\Support\Facades\Storage::url($arquivo->archive));
            }
//            dd($model->cluster);
            if($cluster = \App\Models\Cluster::find($model->cluster)){
                $model->cluster = $cluster->nome;
            }
            if($unidade_de_medida = \App\Models\Medida::find($model->unidade_medida)){
                $model->unidade_medida = $unidade_de_medida->name;
            }

            if($medida_embalagem_secundaria_id = \App\Models\Medida::find($model->unidade_medida_embalagem_secundaria)){
                $model->unidade_medida_embalagem_secundaria = $medida_embalagem_secundaria_id->name;
            }
//            if($conta_cooperat = \App\Models\Coperat::find($model->coperat_id)){
//                $model->conta_cooperat = $conta_cooperat->codigo;
//            }
            if($marketing = \App\Models\Marketing::query()->where('produto_id', $model->id)->first()){
                $model->descricao_comercial = $marketing->descricao_comercial;
                $model->descricao_para_erp = $marketing->descricao_para_erp;
                $model->descricao_para_encarte = $marketing->descricao_para_encarte;
//                if($marketing->contaNivel01) {
//                    $model->categoria_bc_nivel_01 = $marketing->contaNivel01->id_bc;
//                }
//                if($marketing->contaNivel02){
//                    $model->categoria_bc_nivel_02 = $marketing->contaNivel02->id_bc;
//                }
//                if($marketing->contaNivel03) {
//                    $model->categoria_bc_nivel_03 = $marketing->contaNivel03->id_bc;
//                }
                    if($marketing->contaNivel04) {
                        $model->categoria_bc_nivel_04 = $marketing->contaNivel04->id_bc;
                    }
            }

            if($compra = \App\Models\Compra::query()->where('produto_id', $model->id)->first()){
                $model->codigo_interno = $compra->codigo_interno;
                $model->app = $compra->app;
                $model->ecommerce = $compra->ecommerce;
            }
            if($embalagem = \App\Models\Embalagem::query()->where('produto_id', $model->id)->first()){
                $model->dum_14 = $embalagem->dun_14;
                //$model->peso_bruto_emb_secundaria = $embalagem->peso_bruto;
                //$model->peso_bruto_emb_secundaria =  preg_replace("/\D+/", "", form_read($embalagem->peso_bruto));
                $model->peso_bruto_emb_secundaria =  preg_replace("/\D+/", "", form_read($embalagem->peso_bruto));
                //$model->peso_liquido_emb_secundaria = $embalagem->peso_liquido;
                $model->peso_liquido_emb_secundaria =  preg_replace("/\D+/", "", form_read($embalagem->peso_liquido));
                //$model->altura_emb_secundaria = $embalagem->altura;
                $model->altura_emb_secundaria =  preg_replace("/\D+/", "", form_read($embalagem->altura));
                //$model->largura_emb_secundaria = $embalagem->largura;
                $model->largura_emb_secundaria =  preg_replace("/\D+/", "", form_read($embalagem->largura));
                //$model->profundidade_emb_secundaria = $embalagem->profundidade;
                $model->profundidade_emb_secundaria =  preg_replace("/\D+/", "", form_read($embalagem->profundidade));
                $model->qde_por_camada_emb_secundaria = $embalagem->qde_por_camada;
                $model->empilhamento_emb_secundaria = $embalagem->empilhamento;
                $model->qde_no_palete = $embalagem->qde_no_palete;
            }
            return $model;
        });

    return $produtos;
});
//})->middleware("client");

//->select([
//    'segment_name as tipo_embalagem',
//    'id as ids',
//
//])
//})->middleware("client");
/**
 * Pegar um produto, fazer uma requisição para:
 * https://domonio/api/produto/{cod_barras} -> 1234567891254
 * retorna um produto
 */

Route::get('/produto/{code}', function ($code) {
    $prod =  \App\Models\Produto::query()
        ->where('cod_barras', $code)
        ->where('status', 'concluido')
        ->where('integrado_com_erp','não')->first();
//    dd($prod->marketing);

    $model =  \App\Models\Produto::query()
        ->select([
            'id',
            'status',
            'cod_barras',
            'marca',
            'peso_bruto_da_und',
            'peso_liquido_da_und',
            'altura_da_und',
            'largura_da_und',
            'profundidade_da_und',
            'unidade_medida as unidade_medida',
            'tipo_de_embalagem',
            'volume_de_embalagem',
            'classif_fiscal_ncm',
            'tipo_de_embalagem_secundaria',
            'volume_de_embalagem_secundaria',
            'medida_embalagem_secundaria_id as unidade_medida_embalagem_secundaria',
            'cluster_id as cluster',
//            'coperat_id',
        ])
        ->where('cod_barras', $code)
        ->where('status', 'concluido')
        ->where('integrado_com_erp','não')->first();
      if($model){
        if($arquivo = \App\Models\Arquivo::query()->where('slug', $model->cod_barras)->first()){
            $model->imagem = url(\Illuminate\Support\Facades\Storage::url($arquivo->archive));
        }
//            dd($model->cluster);
        if($cluster = \App\Models\Cluster::find($model->cluster)){
            $model->cluster = $cluster->nome;
        }
        if($unidade_de_medida = \App\Models\Medida::find($model->unidade_medida)){
            $model->unidade_medida = $unidade_de_medida->name;
        }

        if($medida_embalagem_secundaria_id = \App\Models\Medida::find($model->unidade_medida_embalagem_secundaria)){
            $model->unidade_medida_embalagem_secundaria = $medida_embalagem_secundaria_id->name;
        }
//            if($conta_cooperat = \App\Models\Coperat::find($model->coperat_id)){
//                $model->conta_cooperat = $conta_cooperat->codigo;
//            }
        if($marketing = \App\Models\Marketing::query()->where('produto_id', $model->id)->first()){
            $model->descricao_comercial = $marketing->descricao_comercial;
            $model->descricao_para_erp = $marketing->descricao_para_erp;
            $model->descricao_para_encarte = $marketing->descricao_para_encarte;
//            if($marketing->contaNivel01) {
//                $model->categoria_bc_nivel_01 = $marketing->contaNivel01->id_bc;
//            }
//            if($marketing->contaNivel02){
//                $model->categoria_bc_nivel_02 = $marketing->contaNivel02->id_bc;
//            }
//            if($marketing->contaNivel03) {
//                $model->categoria_bc_nivel_03 = $marketing->contaNivel03->id_bc;
//            }
            if($marketing->contaNivel04) {
                $model->categoria_bc_nivel_04 = $marketing->contaNivel04->id_bc;
            }
//            $model->categoria_bc_nivel_01 = $marketing->contaNivel01->id_bc;
//            $model->categoria_bc_nivel_02 = $marketing->contaNivel02->id_bc;
//            $model->categoria_bc_nivel_03 = $marketing->contaNivel03->id_bc;
//            $model->categoria_bc_nivel_04 = $marketing->contaNivel04->id_bc;
        }

        if($compra = \App\Models\Compra::query()->where('produto_id', $model->id)->first()){
            $model->codigo_interno = $compra->codigo_interno;
            $model->app = $compra->app;
            $model->ecommerce = $compra->ecommerce;
        }
        if($embalagem = \App\Models\Embalagem::query()->where('produto_id', $model->id)->first()){
            $model->dum_14 = $embalagem->dun_14;
            $model->qde_na_emb_secundaria = $embalagem->qde_na_emb_secundaria;
            $model->peso_bruto_emb_secundaria = $embalagem->peso_bruto;
            $model->peso_liquido_emb_secundaria = $embalagem->peso_liquido;
            $model->altura_emb_secundaria = $embalagem->altura;
            $model->largura_emb_secundaria = $embalagem->largura;
            $model->profundidade_emb_secundaria = $embalagem->profundidade;
            $model->qde_por_camada_emb_secundaria = $embalagem->qde_por_camada;
            $model->empilhamento_emb_secundaria = $embalagem->empilhamento;
            $model->qde_no_palete = $embalagem->qde_no_palete;
        }
      }
        return $model;
});
//})->middleware("client");

/**
 * Atualizar o status do produto para integrado ou não com o ERP
 * fazer uma requisição post para
 * https://domonio/api/produto
 * params:
 * code -> que seria o codigo de barras
 * integrado_com_erp - sim ou não
 */
Route::post('/produto/status/save', function (Request $request) {
    $request->validate([
        "code"=>['required'],
        "integrado_com_erp"=>['required', \Illuminate\Validation\Rule::in(['sim', 'não']),],
    ]);
    \App\Models\Produto::query()->where('cod_barras', $request->input('code'))->update($request->only('integrado_com_erp'));
    return response()->json(["message"=>"Sucesso!"], 201);
})->middleware("client");

