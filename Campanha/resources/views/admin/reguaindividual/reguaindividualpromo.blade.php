<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
@php
    $config = request()->all();

    $data = collect($data)->filter(function ($item){
        return is_array($item);
    })->toArray();

@endphp
@if(isset($config['promocao']) && $config['promocao'] == 1)
    <div class="box-promo-horizontal">
        @foreach($data as $item)
            @if(is_array($item))
                @if(!$loop->last)
                @if($item['validado'])
                    @if(!data_get($item, 'app') || data_get($item, 'app') == "não")
{{--                        @dd($item)--}}
                        @php
                            $produto = new \stdClass;

                            $produto->descricao_comercial =  $item['descricao_comercial'];
                            $produto->descricao_auxiliar =  $item['observacoes'] ;
                            $produto->quantidade_parcelas =  $item['quantidade_parcelas'] ;
                            $produto->qde_por_cx =  $item['qde_por_cx'] ;
                            $produto->tipo_embalagem =  $item['embalagens'] ;
                            $produto->preco_normal =  $item['preco_normal'] ;
                            $produto->preco_promocional =  $item['preco_promocional'] ;
                            $produto->preco_app =  $item['preco_app'] ;

                            $parametros = request()->all();
                               if(isset($parametros['app']) && $parametros['app'] == 1){
                              $produto->app =  1 ;
                              }else{
                                  $produto->app =  0 ;
                              }
                              if(isset($parametros['promocao']) && $parametros['promocao'] == 1){
                                  $produto->promocao =  1 ;
                              }else{
                                  $produto->promocao =  0 ;
                              }

                              if(isset($parametros['vertical']) && $parametros['vertical'] == 1){
                                  $produto->vertical =  1 ;
                              }else{
                                  $produto->vertical =  0 ;
                              }

                              if(isset($parametros['fundobranco']) && $parametros['fundobranco'] == 1){
                                  $produto->fundobranco =  1 ;
                              }else{
                                  $produto->fundobranco =  0 ;
                              }

                              if(isset($parametros['horizontal']) && $parametros['horizontal'] == 1){
                                  $produto->horizontal =  1 ;
                              }else{
                                  $produto->horizontal =  0 ;
                              }
                             if($produto->vertical ==1){
                                    $bgcartaz = \Campanha\Models\BgCartaz::query()->first();
                                    if($bgcartaz){
                                        $bgappvertical = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->app_vertical)));
                                        $bgamarelavertical = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->promo_vertical)));
                                    }
                                    $setaapp = 'data:image/jpeg;base64,'.base64_encode(file_get_contents( public_path('cartazes/app.png')));
                                 }
                                 if($produto->horizontal == 1){

                                    $bgcartaz = \Campanha\Models\BgCartaz::query()->first();
                                    if($bgcartaz){
                                        $bgapphorizontal = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->app_horizontal)));
                                        $bgamarelahorizontal = 'data:image/jpeg;base64,'.base64_encode(file_get_contents(public_path('storage/'.$bgcartaz->promo_horizontal)));
                                    }
                                    $seta = 'data:image/jpeg;base64,'.base64_encode(file_get_contents( public_path('cartazes/appclub.png')));

                                }
                                    if($produto->fundobranco==1){
                                        $bgamarelavertical = null;
                                        $bgamarelahorizontal = null;
                                        $bgappvertical = null;
                                        $bgapphorizontal = null;
                                    }
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

                        @endphp

                        @include('campanha::report.reguapromo')

                    @endif
                @endif
            @endif
            @endif
        @endforeach
    </div>

@endif




{{--@dd('finalll')--}}
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
