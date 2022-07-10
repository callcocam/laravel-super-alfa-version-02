{{--<!doctype html>--}}
{{--<html lang="pt-br">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--</head>--}}
{{--<body>--}}
{{--@if($app==true)--}}
{{--@if($model)--}}
{{--    @if($produtos = $model->produtos()->where('app', 'sim')->where('status','published')->get())--}}
{{--        @dd($produtos->toArray())--}}
{{--        @foreach($produtos as $produto)--}}

{{--            @php--}}
{{--                // Padroniza caixaalta e baixa--}}

{{--                    $produto->descricao_comercial =  mb_strtoupper($produto->descricao_comercial);--}}
{{--                    $lencountdesc =  strlen($produto->descricao_comercial);--}}
{{--                    $produto->tipo_embalagem =  mb_strtolower($produto->tipo_embalagem);--}}


{{--                //calcula preço caixa--}}


{{--                if($produto->qde_por_cx){--}}

{{--                       $precocaixanormal =  Calcular($produto->preco_normal,$produto->qde_por_cx, '*') ;--}}

{{--                      if($produto->preco_app){--}}
{{--                          $precocaixaapp =  Calcular($produto->preco_app,$produto->qde_por_cx, '*') ;--}}
{{--                      }--}}

{{--                     }--}}

{{--                //calcula parcelas--}}

{{--                     if($produto->quantidade_parcelas){--}}

{{--                       $parcelas = (int)$produto->quantidade_parcelas;--}}

{{--                   //    $produto->preco_promocional = Calcular($produto->preco_promocional,$parcelas, '/') ;--}}

{{--                       $produto->preco_normal = Calcular($produto->preco_normal,$parcelas, '/') ;--}}
{{--                       if($produto->preco_app){--}}
{{--                             $produto->preco_app = Calcular($produto->preco_app,$parcelas, '/') ;--}}
{{--                       }--}}

{{--                     }--}}

{{--                // separa reais dos centavos--}}

{{--                    $preco_promo_reais= Str::before($produto->preco_promocional , ',');--}}
{{--                    $preco_promo_centavos= Str::after($produto->preco_promocional , ',');--}}
{{--                     $lencountpromocional =  strlen($preco_promo_reais);--}}

{{--                     $preco_normal_reais= Str::before($produto->preco_normal , ',');--}}
{{--                     $preco_normal_centavos= Str::after($produto->preco_normal , ',');--}}
{{--                     $lencountnormal =  strlen($preco_normal_reais);--}}

{{--                     $preco_app_reais = Str::before($produto->preco_app , ',');--}}
{{--                     $preco_app_centavos = Str::after($produto->preco_app , ',');--}}
{{--                     $lencountapp =  strlen($preco_app_reais);--}}


{{--            @endphp--}}
{{--                @include('campanha::report.blocoappvertical')--}}
{{--            @if(!$loop->last)--}}
{{--                <div class="page-break"></div>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    @endif--}}
{{--@endif--}}
{{--@endif--}}
{{--@if($promocao==true)--}}
{{--    @if($model)--}}

{{--        @if($produtos = $model->produtos()->where('app', 'não')->where('status','published')->get())--}}
{{--            @foreach($produtos as $produto)--}}
{{--                @php--}}
{{--                    // Padroniza caixaalta e baixa--}}

{{--                        $produto->descricao_comercial =  mb_strtoupper($produto->descricao_comercial);--}}

{{--                        $produto->tipo_embalagem =  mb_strtolower($produto->tipo_embalagem);--}}


{{--                    //calcula preço caixa--}}


{{--                    if($produto->qde_por_cx){--}}

{{--                           $precocaixapromocional =  Calcular($produto->preco_promocional,$produto->qde_por_cx, '*') ;--}}

{{--                       //    $precocaixanormal =  Calcular($produto->preco_normal,$produto->qde_por_cx, '*') ;--}}

{{--                        //  if($produto->preco_app){--}}
{{--                         //     $precocaixaapp =  Calcular($produto->preco_app,$produto->qde_por_cx, '*') ;--}}
{{--                        //  }--}}

{{--                         }--}}

{{--                    //calcula parcelas--}}

{{--                         if($produto->quantidade_parcelas){--}}

{{--                           $parcelas = (int)$produto->quantidade_parcelas;--}}

{{--                            $produto->preco_promocional = Calcular($produto->preco_promocional,$parcelas, '/') ;--}}


{{--                         //  $produto->preco_normal = Calcular($produto->preco_normal,$parcelas, '/') ;--}}

{{--                         //  if($produto->preco_app){--}}
{{--                            //     $produto->preco_app = Calcular($produto->preco_app,$parcelas, '/') ;--}}
{{--                          // }--}}

{{--                         }--}}

{{--                    // separa reais dos centavos--}}

{{--                         $preco_promo_reais= Str::before($produto->preco_promocional , ',');--}}
{{--                         $preco_promo_centavos= Str::after($produto->preco_promocional , ',');--}}
{{--                         $lencountpromocional =  strlen($preco_promo_reais);--}}

{{--                      //   $preco_normal_reais= Str::before($produto->preco_normal , ',');--}}
{{--                       //  $preco_normal_centavos= Str::after($produto->preco_normal , ',');--}}
{{--                        // $lencountnormal =  strlen($preco_normal_reais);--}}

{{--                       //  $preco_app_reais= Str::before($produto->preco_app , ',');--}}
{{--                       //  $preco_app_centavos= Str::after($produto->preco_app , ',');--}}
{{--                       //  $lencountapp =  strlen($preco_app_reais);--}}

{{--                @endphp--}}
{{--                    @include('campanha::report.blocopromocionalvertical')--}}

{{--            @endforeach--}}
{{--        @endif--}}
{{--    @endif--}}
{{--@endif--}}
{{--<style>--}}
{{--    @page {--}}
{{--        margin: 0px;--}}
{{--    }--}}

{{--    .page-break {--}}
{{--        page-break-after: always;--}}
{{--    }--}}


{{--    @font-face {--}}
{{--        font-family: 'RNS Sanz SC Bold' !important;--}}
{{--        font-style: normal;--}}
{{--        font-weight: normal;--}}
{{--        src: url(https://testeweb.superalfa.coop.br/cartazes/fonts/RNSSanz-Bold.ttf);--}}
{{--    }--}}

{{--    .nrsanz {--}}
{{--        font-family: 'RNS Sanz SC Bold' !important;--}}
{{--    }--}}

{{--    .font60 {--}}
{{--        font-size: 60px;--}}
{{--    }--}}
{{--    .font75 {--}}
{{--        font-size: 75px;--}}
{{--    }--}}
{{--</style>--}}
{{--</body>--}}
{{--</html>--}}
