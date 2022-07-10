<?php


namespace Campanha\Http\Controllers;


use App\Http\Controllers\Controller;
use Campanha\Models\BgCartaz;
use Campanha\Models\Campanha;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Http\Request;
//use \Bkwld\Cloner\Cloneable;



class CartazesIndividuaisController extends Controller
{
public $produto;



    public function cartaz(Request $request){
        $data = $request->all();
//        dd($data);
        $pdf = \PDF::loadView('campanha::admin.cartaz.pdf.cartaz-individual', compact('data'))
            ->setPaper('a4')
            ->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->stream();
//        $produto = new \stdClass;

//        $produto->descricao_comercial =  $data['descricao_comercial'];
//        $produto->descricao_auxiliar =  $data['observacoes'] ;
//        $produto->quantidade_parcelas =  $data['quantidade_parcelas'] ;
//        $produto->qde_por_cx =  $data['qde_por_cx'] ;
//        $produto->tipo_embalagem =  $data['embalagens'] ;
//        $produto->preco_normal =  $data['preco_normal'] ;
//        $produto->preco_promocional =  $data['preco_promocional'] ;
//        $produto->preco_app =  $data['preco_app'] ;
//        if(isset($data['app']) && $data['app'] == "sim"){
//            $produto->app =  1 ;
//        }else{
//            $produto->app =  0 ;
//        }
//
//        if(isset($data['promocao']) && $data['promocao'] == 1){
//            $produto->promocao =  1 ;
//        }else{
//            $produto->promocao =  0 ;
//        }
//
//        if(isset($data['vertical']) && $data['vertical'] == 1){
//            $produto->vertical =  1 ;
//        }else{
//            $produto->vertical =  0 ;
//        }
//
//        if(isset($data['fundobranco']) && $data['fundobranco'] == 1){
//            $produto->fundobranco =  1 ;
//        }else{
//            $produto->fundobranco =  0 ;
//        }
//
//        if(isset($data['horizontal']) && $data['horizontal'] == 1){
//            $produto->horizontal =  1 ;
//        }else{
//            $produto->horizontal =  0 ;
//        }


        if($produto->vertical ==1){
            $bgcartaz = BgCartaz::query()->first();
            if($bgcartaz){
                $bgappvertical = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->app_vertical)));
                $bgamarelavertical = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->promo_vertical)));
            }
        $setaapp = 'data:image/jpeg;base64,'.base64_encode(file_get_contents( public_path('cartazes/app.png')));

            $pdf = \PDF::loadView('campanha::admin.cartaz.cartaz', compact('produto','bgappvertical', 'bgamarelavertical', 'setaapp'))
                ->setPaper('a4')
                ->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            return $pdf->stream();
        }
        if($produto->horizontal == 1){
            $bgcartaz = BgCartaz::query()->first();
            if($bgcartaz){
                $bgapphorizontal = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->app_horizontal)));
                $bgamarelahorizontal = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->promo_horizontal)));
            }
            $seta = 'data:image/jpeg;base64,'.base64_encode(file_get_contents( public_path('cartazes/appclub.png')));

            $pdf = \PDF::loadView('campanha::admin.cartaz.cartaz', compact('produto','bgapphorizontal','bgamarelahorizontal', 'seta'))
                ->setPaper('a4')
                ->setOptions(['dpi' => 300, 'defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

            return $pdf->stream();
        }

    }

}

