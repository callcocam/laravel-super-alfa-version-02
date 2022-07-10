<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
@if($app==true)
    @if($model)
        @if($produtos = $model->produtos()->where('app', 'sim')->where('status','published')->get())
            @foreach($produtos->chunk(2) as $itens)
                <div class="box-app">
                    @foreach($itens as $produto)
                                @if($produtosparceiros = $produto->grupos_produtos)
                                    @foreach($produtosparceiros as $prod)
                                        @php
                                            $produto->descricao_comercial = $produto->descricao_comercial . ' ou ' . $prod->produto->marketing->descricao_comercial
                                        @endphp
                                    @endforeach
                                @endif
                @php
                    // Padroniza caixaalta e baixa

                        $produto->descricao_comercial =  mb_strtolower($produto->descricao_comercial);
                        $produto->descricao_comercial =  ucwords($produto->descricao_comercial);
                        (int)$lencountdesc =  strlen($produto->descricao_comercial);

                        if($produto->descricao_auxiliar){
                            $produto->descricao_auxiliar =  mb_strtolower($produto->descricao_auxiliar);
                        $produto->descricao_auxiliar =  ucwords($produto->descricao_auxiliar);
                        }

                       // dd($lencountdesc);

                        $produto->tipo_embalagem =  mb_strtolower($produto->tipo_embalagem);


                    //calcula preço caixa


                    if(is_numeric($produto->qde_por_cx)){

                          // $precocaixapromocional =  Calcular($produto->preco_promocional,$produto->qde_por_cx, '*') ;

                           $precocaixanormal =  Calcular($produto->preco_normal,$produto->qde_por_cx, '*') ;

                          if($produto->preco_app){
                              $precocaixaapp =  Calcular($produto->preco_app,$produto->qde_por_cx, '*') ;
                          }

                         }

                    //calcula parcelas

                         if($produto->quantidade_parcelas){

                           $parcelas = (int)$produto->quantidade_parcelas;

                          // $produto->preco_promocional = Calcular($produto->preco_promocional,$parcelas, '/') ;
                           $produto->preco_normal_total = $produto->preco_normal ;
                           $produto->preco_normal = Calcular($produto->preco_normal,$parcelas, '/') ;


                           if($produto->preco_app){
                                 $produto->preco_app = Calcular($produto->preco_app,$parcelas, '/') ;
                           }

                         }

                    // separa reais dos centavos

                         $preco_promo_reais= Str::before($produto->preco_promocional , ',');
                         $preco_promo_centavos= Str::after($produto->preco_promocional , ',');
                         $lencountpromocional =  strlen($preco_promo_reais);

                         $preco_normal_reais= Str::before($produto->preco_normal , ',');
                         $preco_normal_centavos= Str::after($produto->preco_normal , ',');
                         $lencountnormal =  strlen($preco_normal_reais);

                         $preco_app_reais= Str::before($produto->preco_app , ',');
                         $preco_app_centavos= Str::after($produto->preco_app , ',');
                         $lencountapp =  strlen($preco_app_reais);

                        @endphp
                        @include('campanha::report.blocoapp')
                        @endforeach
                </div>
                @if(!$loop->last)
                    <div class="page-break"></div>
                @endif
            @endforeach
        @endif
    @endif
@endif
@if($promocao==true)
    @if($model)
        @if($produtos = $model->produtos()->where('app', 'não')->where('status','published')->get())
            @foreach($produtos->chunk(2) as $itens)
                <div class="box-promo-horizontal">
                    @foreach($itens as $produto)

                                        @if($produtosparceiros = $produto->grupos_produtos)
                                            @foreach($produtosparceiros as $prod)
                                                @php
                                                    $produto->descricao_comercial = $produto->descricao_comercial . ' ou ' . $prod->produto->marketing->descricao_para_encarte
                                                @endphp
                                            @endforeach
                                        @endif
                        @php
                            // Padroniza caixaalta e baixa

                                $produto->descricao_comercial =  mb_strtolower($produto->descricao_comercial);
                               // $produto->descricao_comercial =  ucwords($produto->descricao_comercial);
                                $lencountdesc =  strlen($produto->descricao_comercial);

                                 if($produto->descricao_auxiliar){
                           $produto->descricao_auxiliar =  mb_strtolower($produto->descricao_auxiliar);
                        $produto->descricao_auxiliar =  ucwords($produto->descricao_auxiliar);
                         }

                                $produto->tipo_embalagem =  mb_strtolower($produto->tipo_embalagem);


                            //calcula preço caixa


                           if(is_numeric($produto->qde_por_cx)){
                                   $precocaixapromocional =  Calcular($produto->preco_promocional,$produto->qde_por_cx, '*') ;
                           }

                            //calcula parcelas


                                 if($produto->quantidade_parcelas){
                                   $parcelas = (int)$produto->quantidade_parcelas;

                                   $produto->preco_promocional_total = $produto->preco_promocional ;
                                   $produto->preco_promocional = Calcular($produto->preco_promocional,$parcelas, '/') ;
                                 }

                            // separa reais dos centavos

                                 $preco_promo_reais= Str::before($produto->preco_promocional , ',');
                                 $preco_promo_centavos= Str::after($produto->preco_promocional , ',');
                                 $lencountpromocional =  strlen($preco_promo_reais);

                        @endphp

                        @include('campanha::report.blocopromocional')
                    @endforeach
                </div>
                @if(!$loop->last)
                    <div class="page-break"></div>
                @endif
            @endforeach
        @endif
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
