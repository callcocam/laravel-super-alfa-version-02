<?php


namespace Campanha\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Midia;
use Campanha\Models\BgCartaz;
use Campanha\Models\Campanha;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Http\Request;
//use \Bkwld\Cloner\Cloneable;



class CampnhaController extends Controller
{
public $produto;
public function cards(Campanha $model){
    $midias_config = Midia::query()->first();
    return view('campanha::admin.cards.index', compact('model', 'midias_config'));
}
    public function stories(Campanha $model){
        $midias_config = Midia::query()->first();

        return view('campanha::admin.stories.index', compact('model', 'midias_config'));
    }
    public function banners(Campanha $model){
        $midias_config = Midia::query()->first();

        return view('campanha::admin.banners.index', compact('model', 'midias_config'));
    }
//"id" => "10f52842-11e5-4b33-aedd-3ddb457fa118"
//"produto_id" => "2c329751-b605-4bf0-b9a0-4572e965fcb1"
//"descricao" => null
//"status" => "published"
//"user_id" => "d7a56ab7-cfa7-4890-8a4c-8e972f37e719"
//"created_at" => "2022-03-24 18:40:43"
//"updated_at" => "2022-03-24 18:40:43"
//"deleted_at" => null
//"campanha_id" => "6511c8d3-7361-4dc4-af84-b36912489871"
//"produtos_campanha_id" => "869ba15a-3469-4cf9-bdb6-5ccb19a59223"
//"type" => "familia"
    public function duplicarCampanha($model){
        $campanha = Campanha::findOrFail($model);
                $modelCampanha = Campanha::factory()->create([
                    "nome" => sprintf("%s-%s Copy",  data_get($campanha->toArray(),'nome'), now()->format("Y-m-d-H-i-s")),
                    "slug" =>data_get($campanha->toArray(),'slug'),
                    "cover" => data_get($campanha->toArray(),'cover'),
                    "quantidade" => data_get($campanha->toArray(),'quantidade'),
                    "quantidade_estimada" => data_get($campanha->toArray(),'quantidade_estimada'),
                    "data_inicio" =>data_get($campanha->toArray(),'data_inicio'),
                    "data_fim" => data_get($campanha->toArray(),'data_fim'),
                    "bg_lamina" => data_get($campanha->toArray(),'bg_lamina'),
                    "selo_mais_desconto" => data_get($campanha->toArray(),'selo_mais_desconto'),
                    "cor_fonte_promo" => data_get($campanha->toArray(),'cor_fonte_promo'),
                    "cor_fonte_app" => data_get($campanha->toArray(),'cor_fonte_app'),
                    "bg_card" => data_get($campanha->toArray(),'bg_card'),
                    "bg_stories" => data_get($campanha->toArray(),'bg_stories'),
                    "bg_encarte" => data_get($campanha->toArray(),'bg_encarte'),
                    "status" =>data_get($campanha->toArray(),'status'),
                    "user_id" => data_get($campanha->toArray(),'user_id'),
                    "created_at" => data_get($campanha->toArray(),'created_at'),
                    "updated_at" => data_get($campanha->toArray(),'updated_at'),
                    "type" => data_get($campanha->toArray(),'type'),
                    "exibir_borda_produto_lamina" =>data_get($campanha->toArray(),'exibir_borda_produto_lamina'),
                    "tamanho_borda_produto_lamina" => data_get($campanha->toArray(),'tamanho_borda_produto_lamina'),
                    "tamanho_arredondamento_produto_lamina" => data_get($campanha->toArray(),'tamanho_arredondamento_produto_lamina'),
                ]);


                foreach ($campanha->lojas as $key => $loja){
                    $modelCampanha->loja()->sync([$key]);
                }

                foreach ($campanha->coperats as $key => $coperat){
                    $modelCampanha->countcoperats()->sync([$key]);
                }

                if($produtos = $campanha->produtos()->orderBy('order')->get()){
                    if($produtos->count()){

                        foreach ($campanha->produtos as $produtocampanha){
                            $modelProduto =  ProdutosCampanha::factory()->create([
                                "descricao_comercial" => data_get($produtocampanha->toArray(),'descricao_comercial'),
                                "slug" => data_get($produtocampanha->toArray(),'slug'),
                                "codigo_interno" => data_get($produtocampanha->toArray(),'codigo_interno'),
                                "codigo_barras" => data_get($produtocampanha->toArray(),'codigo_barras'),
                                "produto_id" => data_get($produtocampanha->toArray(),'produto_id'),
                                "coperat_id" => data_get($produtocampanha->toArray(),'coperat_id'),
                                "descricao_auxiliar" => data_get($produtocampanha->toArray(),'descricao_auxiliar'),
                                "quantidade_parcelas" =>data_get($produtocampanha->toArray(),'quantidade_parcelas'),
                                "qde_por_cx" => data_get($produtocampanha->toArray(),'qde_por_cx'),
                                "tipo_embalagem" =>data_get($produtocampanha->toArray(),'tipo_embalagem'),
                                "preco_custo" => data_get($produtocampanha->toArray(),'preco_custo'),
                                "preco_normal" =>data_get($produtocampanha->toArray(),'preco_normal'),
                                "preco_promocional" => data_get($produtocampanha->toArray(),'preco_promocional'),
                                "preco_desconto" => data_get($produtocampanha->toArray(),'preco_desconto'),
                                "preco_caixa" => data_get($produtocampanha->toArray(),'preco_caixa'),
                                "preco_app" => data_get($produtocampanha->toArray(),'preco_app'),
                                "app" => data_get($produtocampanha->toArray(),'app'),
                                "status" => data_get($produtocampanha->toArray(),'status'),
                                "user_id" => data_get($produtocampanha->toArray(),'user_id'),
                                "campanha_id" => data_get($modelCampanha->toArray(),'id'),
                                "created_at" => data_get($modelCampanha->toArray(),'created_at'),
                                "updated_at" => data_get($modelCampanha->toArray(),'updated_at'),
                                "card_images_propriates" => data_get($produtocampanha->toArray(),'card_images_propriates'),
                                "tipo_descricao" => data_get($produtocampanha->toArray(),'tipo_descricao'),
                                "lamina_images_propriates" => data_get($produtocampanha->toArray(),'lamina_images_propriates'),
                                "template" => data_get($produtocampanha->toArray(),'template'),
                                "altura" => data_get($produtocampanha->toArray(),'altura'),
                                "largura" => data_get($produtocampanha->toArray(),'largura'),
                                "fundo" => data_get($produtocampanha->toArray(),'fundo'),
                                "borda_produto_lamina" => data_get($produtocampanha->toArray(),'borda_produto_lamina'),
                                "cor_borda_produto_lamina" => data_get($produtocampanha->toArray(),'cor_borda_produto_lamina'),
                                "cor_fundo_produto_lamina" => data_get($produtocampanha->toArray(),'cor_fundo_produto_lamina'),
                                "arredondamento_produto_lamina" => data_get($produtocampanha->toArray(),'arredondamento_produto_lamina'),
                                "order" => data_get($produtocampanha->toArray(),'order'),
                            ]);

                            if($grupos_produtos_familia = $produtocampanha->grupos_produtos_familia){
                                if($grupos_produtos_familia->count()){
                                    foreach ($grupos_produtos_familia as $familia){
                                        $modelProduto->grupos()->create([
                                        "produto_id" => data_get($familia->toArray(),'produto_id'),
                                        "descricao" => data_get($familia->toArray(),'descricao'),
                                        "status" => data_get($familia->toArray(),'status'),
                                        "user_id" => data_get($familia->toArray(),'user_id'),
                                        "created_at" => data_get($familia->toArray(),'created_at'),
                                        "updated_at" => data_get($familia->toArray(),'updated_at'),
                                        "campanha_id" => data_get($modelCampanha->toArray(),'id'),
                                        "produtos_campanha_id" => data_get($modelProduto->toArray(),'id'),
                                        "type" =>data_get($familia->toArray(),'type'),
                                        ]);
                                    }
                                }
                            }
                            if($grupos_produtos = $produtocampanha->grupos_produtos){
                                if($grupos_produtos->count()){
                                    foreach ($grupos_produtos as $familia){
                                        $modelProduto->grupos()->create([
                                            "produto_id" => data_get($familia->toArray(),'produto_id'),
                                            "descricao" => data_get($familia->toArray(),'descricao'),
                                            "status" => data_get($familia->toArray(),'status'),
                                            "user_id" => data_get($familia->toArray(),'user_id'),
                                            "created_at" => data_get($familia->toArray(),'created_at'),
                                            "updated_at" => data_get($familia->toArray(),'updated_at'),
                                            "campanha_id" => data_get($modelCampanha->toArray(),'id'),
                                            "produtos_campanha_id" => data_get($modelProduto->toArray(),'id'),
                                            "type" =>data_get($familia->toArray(),'type'),
                                            ]);
                                    }
                                }
                            }
                        }

                    }

                }

        return redirect()->back();
    }

//    public function duplicarCampanha($model){
//     $data = [];
//     $datatemp = [];
//       $campanha = Campanha::findOrFail($model);
//
//       $novacampanha = $campanha->duplicate();
//        $novacampanha->nome = $campanha->nome . ' - Cópia';
//        $novacampanha->save();
//        foreach ($novacampanha->produtos as $produtocampanha){
//            if($produtocampanhafamilia = $produtocampanha->grupos_produtos_familia){
//                foreach ($produtocampanhafamilia as $familia){
//                    dd($familia);
//                    $familia->campanha_id= $novacampanha->id;
//                    $familia->save();
//                }
//            }
//        }
//        return redirect()->back();
//
//    }

    public function regua(Campanha $model){
//dd($model);
//          $bgreguaapp = 'data:image/jpeg;base64,'.base64_encode(file_get_contents( public_path('cartazes/regua-app.jpg')));
//        $bgreguapromo = 'data:image/jpeg;base64,'.base64_encode(file_get_contents( public_path('cartazes/regua-promo.jpg')));

        $app = request()->query('app');
        $promocao = request()->query('promocao');
        if($app == 1){
            $app = true;
        }elseif($app == null){
            $app = false;
        }
        if($promocao == 1){
            $promocao = true;
        }elseif($promocao == null){
            $promocao = false;
        }
        if($promocao == true){
            $itens = ProdutosCampanha::query()->where('campanha_id', $model->id)->where('app', 'não')->where('status','published')->get();
        }
        $setaapp = null;
        if($app == true){
            $setaapp = 'data:image/jpeg;base64,'.base64_encode(file_get_contents( public_path('cartazes/appclub.png')));

            $itens = ProdutosCampanha::query()->where('campanha_id', $model->id)->where('app', 'sim')->where('status','published')->get();
        }

        $pdf = \PDF::loadView('campanha::report.regua', compact('itens', 'app', 'promocao', 'setaapp'))
//            ->setPaper('letter')
            ->setPaper([0, 0, 595.27 ,841.88 ])
            ->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->stream();

    }
    public function horizontal(Campanha $model){
        /**
         * @var  $pdf \Barryvdh\DomPDF\PDF
         */
        $bgapphorizontal = null;
        $bgamarelahorizontal = null;
        $app = request()->query('app');
        $fundobranco = request()->query('fundobranco');
        if($app == 1){
            $app = true;
            $promocao = false;
        }elseif($app == null){
            $promocao = true;
            $app = false;
        }
        if($fundobranco == null){
            $bgcartaz = BgCartaz::query()->first();
            if($bgcartaz){
                $bgapphorizontal = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->app_horizontal)));
                $bgamarelahorizontal = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->promo_horizontal)));

            }
        }elseif($fundobranco == 1){
            $bgapphorizontal = null;
            $bgamarelahorizontal = null;
        }
        $seta = 'data:image/jpeg;base64,'.base64_encode(file_get_contents( public_path('cartazes/appclub.png')));

        $pdf = \PDF::loadView('campanha::report.cartazhorizontal', compact('model', 'bgamarelahorizontal', 'bgapphorizontal', 'seta' , 'app', 'promocao'))
            ->setPaper('a4')
            ->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->stream();
    }

    public function vertical(Campanha $model){

        /**
         * @var  $pdf \Barryvdh\DomPDF\PDF
         */

        $app = request()->query('app');
        $fundobranco = request()->query('fundobranco');
        if($app == 1){
            $app = true;
            $promocao = false;
        }elseif($app == null){
            $promocao = true;
            $app = false;
        }
        if($fundobranco == null){
            $bgcartaz = BgCartaz::query()->first();
            if($bgcartaz){
                $bgappvertical = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->app_vertical)));
                $bgamarelavertical = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->promo_vertical)));
            }
        }elseif($fundobranco == 1){
            $bgappvertical = null;
            $bgamarelavertical = null;
        }
        $setaapp = 'data:image/jpeg;base64,'.base64_encode(file_get_contents( public_path('cartazes/appclub.png')));

        $pdf = \PDF::loadView('campanha::report.cartazvertical', compact('model', 'bgamarelavertical', 'bgappvertical', 'setaapp', 'app', 'promocao'))
            ->setPaper('a4')
            ->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->stream();
    }
}

