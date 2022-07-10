@php

    if($produto->qde_por_cx){
        if(is_numeric($produto->qde_por_cx)){
           $precocaixapromocional =  Calcular($produto->preco_promocional,$produto->qde_por_cx, '*') ;
       }else{
            $precocaixapromocional = null;
       }
    }

           if($lencountpromocional == 1 ):
               $promoreaisfs = 'font-size: 500px;  line-height: 330px;text-align: center;letter-spacing: -20px; height: 360px;';
             $promocentavosfs =' width: 180px; text-align: right; font-size:150px; line-height: 100px;';
             $proembalagemfs = ' width: 180px; text-align: right; font-size: 70px; line-height: 50px;';
           elseif ($lencountpromocional == 2 ):
                $promoreaisfs = 'font-size: 500px;  line-height: 330px;text-align: center;letter-spacing: -20px; height: 360px;';
             $promocentavosfs =' width: 180px; text-align: right; font-size:150px; line-height: 100px;';
             $proembalagemfs = ' width: 180px; text-align: right; font-size: 70px; line-height: 50px;';
           elseif ($lencountpromocional == 3 ):
                 $promoreaisfs = 'font-size: 450px;  line-height: 320px;text-align: center;letter-spacing: -20px; height: 360px;';
             $promocentavosfs =' width: 180px; text-align: right; font-size:150px; line-height: 100px ;';
             $proembalagemfs = ' width: 180px; text-align: right; font-size: 70px; line-height: 50px;';
           elseif ($lencountpromocional >= 4 ):
                $promoreaisfs = 'font-size: 400px;  line-height: 250px;text-align: center;letter-spacing: -20px; height: 360px ';
             $promocentavosfs =' width: 180px; text-align: right; font-size:150px; line-height: 100px ;';
             $proembalagemfs = ' width: 180px; text-align: right; font-size: 70px; line-height: 50px;';
           endif;

        if($lencountdesc <= 50):
                    $descfs =  'font-size: 90px;line-height: 70px;';
                  endif;

                  if($lencountdesc > 50 && $lencountdesc <= 70):
                      $descfs =   'font-size: 75px !important; line-height: 57px; ';
                    endif;

                  if($lencountdesc > 70 && $lencountdesc <= 90):
                    $descfs =   ' font-size: 70px !important; line-height: 50px;';
                  endif;

                  if($lencountdesc > 90):
                    $descfs =   ' font-size: 50px !important; line-height: 38px;';
                  endif;

@endphp
<table  style="width: 100%; height: 870px;">
    <tbody>
    <tr>
        <td>
            <div class="conteudo-promo nrsanz">

                <table style="width: 100%">
                    <tbody>
                    <tr>
                        <td>
                            <div class="box-titulo-promo">
                                <div class="titulo-promo" style="{{$descfs}}; text-transform: capitalize">{{ $produto->descricao_comercial }}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="box-preco">
                                <table style="width: 100%">
                                    <tbody>
                                    <tr style="vertical-align:top;" >
                                        <td colspan="1" width="150px">
                                            @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
                                                <div class="qtd-parcelas">{{$produto->quantidade_parcelas}}X DE:</div>
                                            @endif
                                            <div class="amarelo-moeda">
                                                R$
                                            </div>
                                        </td>
                                        <td colspan="9">
                                            <table>
                                                <tbody>
                                                <tr style="vertical-align:top;" >
                                                    <td>
                                                        <div style="{{$promoreaisfs}}">
                                                            {{$preco_promo_reais}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="{{$promocentavosfs}}">
                                                            ,{{$preco_promo_centavos}}
                                                        </div>
                                                        <div style="{{$proembalagemfs}}">
                                                            {{$produto->tipo_embalagem}}
                                                        </div>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="box-rodape">
                                <table style="width: 100%">
                                    <tbody>
                                    <tr class="box-rodape">
                                        <td style="font-size: 45px;">
                                            @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
                                                @if($produto->preco_promocional_total)
                                                    <div style=" width: 550px">
                                                        Valor total: R$ {{ $produto->preco_promocional_total }}
                                                    </div>
                                                @endif
                                            @endif
                                            <div style=" width: 550px">
                                                {{ $produto->descricao_auxiliar }}
                                            </div>
                                        </td>
                                        <td style="font-size: 45px">
                                            <div style="width: 650px">
                                                @if($produto->qde_por_cx)
                                                    @if($precocaixapromocional)
                                                       Caixa com {{$produto->qde_por_cx}} unidades R$ {{$precocaixapromocional}}
                                                    @endif
                                                @endif
                                                @if($produto->tipo_embalagem)
                                                       Limite de 24 {{$produto->tipo_embalagem}} por CPF
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
    </tbody>
</table>



<style>
    {{--.box-app {--}}
    {{--    background-image: url('{{$bgreguapromo}}');--}}
    {{--    background-size: contain;--}}
    {{--    background-position: center center;--}}
    {{--    background-repeat: no-repeat;--}}
    {{--}--}}
    .conteudo-promo{
        width: 1200px;
        height: 875px;
        float: right;
        margin-right: 30px;
        display: block;

    }
    .box-titulo-promo{
        width: 100%;
        height: 200px;
        margin-top: 60px;

    }

     .box-preco{
        width: 100%;
    }
    .qtd-parcelas{
        font-size: 60px;
        text-align: left;
        line-height: 40px;
    }
    .amarelo-moeda{
        font-size: 80px;
        line-height: 50px;
        text-align: left;
        margin-top: 50px;

    }

    .box-rodape{
        vertical-align:top;
        width: 100%;
        height: 200px;
        margin-top: 30px;
    }


</style>
