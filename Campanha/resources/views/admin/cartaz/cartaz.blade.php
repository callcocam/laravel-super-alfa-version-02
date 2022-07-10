<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

@php
    // Padroniza caixaalta e baixa

        $produto->descricao_comercial =  mb_strtolower($produto->descricao_comercial);
      //  $produto->descricao_comercial =  ucwords($produto->descricao_comercial);
        $lencountdesc =  strlen($produto->descricao_comercial);
                if($produto->descricao_auxiliar){
                   $produto->descricao_auxiliar =  mb_strtolower($produto->descricao_auxiliar);
                 $produto->descricao_auxiliar =  ucwords($produto->descricao_auxiliar);
                }

        $produto->tipo_embalagem =  mb_strtolower($produto->tipo_embalagem);

    //calcula preço caixa


    if((int)$produto->qde_por_cx){
           $precocaixanormal =  Calcular($produto->preco_normal,$produto->qde_por_cx, '*') ;

          if($produto->preco_app){
              $precocaixaapp =  Calcular($produto->preco_app,$produto->qde_por_cx, '*') ;
          }
      }
     if((int)$produto->qde_por_cx){
        $precocaixapromocional =  Calcular($produto->preco_promocional,$produto->qde_por_cx, '*') ;
     }

    //calcula parcelas app

         if($produto->quantidade_parcelas){

           $parcelas = (int)$produto->quantidade_parcelas;
           $produto->preco_normal = Calcular($produto->preco_normal,$parcelas, '/') ;
           if($produto->preco_app){
                 $produto->preco_app = Calcular($produto->preco_app,$parcelas, '/') ;
           }
         }

   //calcula parcelas promocional

     if($produto->quantidade_parcelas){
         $parcelas = (int)$produto->quantidade_parcelas;
         $produto->preco_promocional_total = $produto->preco_promocional ;
         $produto->preco_promocional = Calcular($produto->preco_promocional,$parcelas, '/') ;
     }
    // separa reais dos centavos

        $preco_promo_reais= Str::before($produto->preco_promocional , ',');
        $preco_promo_centavos= Str::after($produto->preco_promocional , ',');
        $lencountpromocional =  strlen($preco_promo_reais);

         $preco_normal_reais= Str::before($produto->preco_normal , ',');
         $preco_normal_centavos= Str::after($produto->preco_normal , ',');
         $lencountnormal =  strlen($preco_normal_reais);

         $preco_app_reais = Str::before($produto->preco_app , ',');
         $preco_app_centavos = Str::after($produto->preco_app , ',');
         $lencountapp =  strlen($preco_app_reais);

            if($produto->fundobranco==1){
                $bgamarelavertical = null;
                $bgamarelahorizontal = null;
                $bgappvertical = null;
                $bgapphorizontal= null;
            }

@endphp
@if($produto->app ==1)

    @if($produto->vertical ==1)
{{--        @dd('vertical 1')--}}
       @include('campanha::report.blocoappvertical')
    @endif

    @if($produto->horizontal ==1)
         @include('campanha::report.blocoapp')
    @endif

@elseif($produto->promocao ==1)
    @if($produto->vertical ==1)
{{--        @dd($bgamarelavertical)--}}
    @include('campanha::report.blocopromocionalvertical')
    @endif
    @if($produto->horizontal ==1)
        <div class="box-promo-horizontal">
            @include('campanha::report.blocopromocional')
        </div>
    @endif

@endif
<style>
    @page {
        margin: 0px;
    }

    .page-break {
        page-break-after: always;
    }


    @font-face {
        font-family: 'RNS Sanz SC Bold' !important;
        font-style: normal;
        font-weight: normal;
        src: url(https://web.superalfa.coop.br/cartazes/fonts/oficialrnsansbold.ttf);
    }

    .nrsanz {
        font-family: 'RNS Sanz SC Bold' !important;
    }

    .font60 {
        font-size: 60px;
    }
    .font75 {
        font-size: 75px;
    }
</style>
</body>
</html>
