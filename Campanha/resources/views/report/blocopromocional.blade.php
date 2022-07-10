@php
    //Prepara dados para cartaz promoção

                        if($lencountpromocional == 1 ):
                              $promoreaisfs = 'width: 740px; font-size: 900px;height: 630px; line-height: 590px;text-align: center;letter-spacing: -60px;';
                            $promocentavosfs = ' width: 440px; text-align: right; font-size: 300px; line-height: 230px; letter-spacing: -10px;';
                             $proembalagemfs = ' width: 440px; text-align: right; font-size: 170px; line-height: 120px;';
                         elseif ($lencountpromocional == 2 ):
                             $promoreaisfs = 'width: 1000px; font-size: 820px;height: 600px;  line-height: 550px;text-align: center;letter-spacing: -60px;';
                          $promocentavosfs = ' width: 440px; text-align: right; font-size: 300px; line-height: 230px; letter-spacing: -10px;';
                             $proembalagemfs = ' width: 440px; text-align: right; font-size: 170px; line-height: 120px;';
                         elseif ($lencountpromocional == 3 ):
                             $promoreaisfs = 'width: 1100px; font-size: 700px; line-height: 450px;text-align: center;letter-spacing: -30px; padding-left:50px; ';
                          $promocentavosfs = ' width: 400px; text-align: right; font-size: 250px; line-height: 180px; letter-spacing: -10px;';
                             $proembalagemfs = ' width: 400px; text-align: right; font-size: 140px; line-height: 100px;';
                         elseif ($lencountpromocional >= 4 ):
                             $promoreaisfs = 'width: 1400px;font-size: 650px;  line-height: 450px; text-align: center; letter-spacing: -40px;';
                             $promocentavosfs = ' width: 390px; text-align: right; font-size: 240px; line-height: 180px; letter-spacing: -10px;';
                             $proembalagemfs = ' width: 390px; text-align: right; font-size: 140px; line-height: 100px;';
                         endif;
                          if($lencountdesc <= 30){
                               $descfspromo = 'font-size: 140px;line-height:';
                          }
                          elseif($lencountdesc > 30 && $lencountdesc <= 50){
                            $descfspromo = 'font-size: 110px !important; line-height: 80px;';
                         }
                          elseif($lencountdesc > 50 && $lencountdesc <= 70){
                            $descfspromo = 'font-size: 100px !important; line-height: 80px;';
                         }elseif($lencountdesc > 70 && $lencountdesc <= 90){
                          $descfspromo = 'font-size: 90px !important; line-height: 70px;';
                         }elseif($lencountdesc > 90){
                          $descfspromo = 'font-size: 70px !important; line-height: 50px;';
                         }


@endphp
<table  style="width: 100%;  height: 1745px;">
    <tbody>
    <tr style="vertical-align:top;" >
        <td>
            <div class="conteudo-promo-horizontal nrsanz">
                <table style="width: 100%;">
                    <tbody>
                    <tr>

                        <td>
                            <div class="box-titulo-promo">
                                <div class="titulo-promo" style="{{$descfspromo}}; text-transform: capitalize">{{ $produto->descricao_comercial }}</div>
                            </div>
                        </td>
                    </tr>
                                <tr>
                                    <td>
                                        <div class="box-preco">
                                            <table style="width: 100%">
                                                <tbody>
                                                <tr style="vertical-align:top;" >
                                                    <td colspan="1" width="300px">
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

                                                    <td style=" width: 750px;">
                                                        @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
                                                            @if($produto->preco_promocional_total)
                                                                <div style="font-size: 65px;">
                                                                    Valor total: R$ {{ $produto->preco_promocional_total }}
                                                                </div>
                                                            @endif
                                                        @endif
                                                        <div style="font-size: 65px;">
                                                            {{ $produto->descricao_auxiliar }}
                                                        </div>
                                                    </td>
                                                    <td style="width: 750px;">
                                                        <div style="font-size: 65px; ">
                                                            @if($produto->qde_por_cx && is_numeric($produto->qde_por_cx))
                                                                Caixa com {{$produto->qde_por_cx}} unidades R$ {{$precocaixapromocional}}  <br/>
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


    .box-promo-horizontal{
        width: 2480px;
        height: 3500px;
        display: block;
        float: left;
        padding: 0;
        color: #000;
        @if($bgamarelahorizontal != null)
            background-image: url('{{$bgamarelahorizontal}}');
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
    @endif

}

    .conteudo-promo-horizontal{
        width: 2300px;
        height: 1100px;
        margin-left: 100px;
        margin-top: 600px;
    }
    .box-titulo-promo{
        width: 100%;
        height: 200px;

    }

     .box-preco{
        width: 100%;
        height: 680px;
    }
    .qtd-parcelas{
        font-size: 80px;
        text-align: left;
    }
    .amarelo-moeda{

        font-size: 100px;
        line-height: 80px;
        text-align: left;
        margin-top: 50px;
    }



    .box-rodape{
        vertical-align:top;
        width: 100%;
        height: 205px;
        overflow: hidden;
    }

</style>
