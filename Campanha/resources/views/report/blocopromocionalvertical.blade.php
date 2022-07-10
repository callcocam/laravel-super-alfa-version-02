@php

            //Prepara dados para cartaz promoção

                                if($lencountpromocional == 1 ):
                                     $promoreaisfs = 'font-size: 1700px;  line-height: 1100px; text-align: center; letter-spacing: -70px; padding:0;';
                                   $promocentavosfs = ' width: 600px; text-align: right; font-size: 490px; line-height: 320px;letter-spacing: -30px;';
                                     $proembalagemfs = ' width: 600px; text-align: right; font-size: 220px; line-height: 100px;';
                                 elseif ($lencountpromocional == 2 ):
                                     $promoreaisfs = ' width: 1300px; font-size: 1350px;  line-height: 915px; text-align: center;  letter-spacing: -80px;';
                                  $promocentavosfs = ' width: 450px; text-align: right; font-size: 350px; line-height: 250px;letter-spacing: -20px;';
                                     $proembalagemfs = ' width: 450px; text-align: right; font-size: 170px; line-height: 120px;';
                                 elseif ($lencountpromocional == 3 ):
                                     $promoreaisfs = 'font-size: 1000px;  line-height: 670px;text-align: center;letter-spacing: -70px;';
                                  $promocentavosfs = ' width: 440px; text-align: right; font-size: 300px; line-height: 230px; letter-spacing: -10px;';
                                     $proembalagemfs = ' width: 440px; text-align: right; font-size: 170px; line-height: 120px;';
                                 elseif ($lencountpromocional >= 4 ):
                                     $promoreaisfs = 'font-size: 750px;  line-height: 520px; text-align: center; letter-spacing: -60px;';
                                     $promocentavosfs = ' width: 390px; text-align: right; font-size: 280px; line-height: 230px';
                                     $proembalagemfs = ' width: 330px; text-align: right; font-size: 170px; line-height: 120px;';
                                 endif;

                           if($lencountdesc <= 30){
                                   $descfspromo = 'font-size: 160px;line-height: 130px';
                              }
                              elseif($lencountdesc > 30 && $lencountdesc <= 50){
                                $descfspromo = 'font-size: 140px !important; line-height: 110px;';
                             }
                              elseif($lencountdesc > 50 ){
                                $descfspromo = 'font-size: 120px !important; line-height: 100px;';
                             }

@endphp
<div class="box-amarelo">
    <div class="conteudo-amarelo nrsanz">
        <table>
            <tbody>
            <tr>
                <td colspan="10"  style="min-height: 400px !important; vertical-align: top; ">
                    <div class="titulo-amarelo" style="{{$descfspromo}};text-transform: capitalize">{{ $produto->descricao_comercial }}
                    </div>
                </td>
            </tr>
            @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
                <tr>
                    <td colspan="10"><span style="font-size: 120px;">{{$produto->quantidade_parcelas}}X DE:</span> </td>
                </tr>
            @endif
            <tr style="vertical-align:top" class="boxgeralpreco">
                <td colspan="1">
                    <div class="amarelo-moeda">
                        R$
                    </div>
                </td>
                <td colspan="9">
                    <div class="amarelo-box-preco">
                        <table>
                            <tbody>
                            <tr style="vertical-align:top">
                                <td width="270">
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
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="5" class="font75">
                    @if($produto->tipo_embalagem)
                        Limite de 24 {{$produto->tipo_embalagem}} por CPF
                    @endif
                    @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")<br/>
                    Valor Total: R$ {{$produto->preco_promocional_total }}
                    @endif
                </td>
                @if($produto->qde_por_cx && is_numeric($produto->qde_por_cx))
                    <td colspan="5" class="font75">Caixa com {{$produto->qde_por_cx}} unidades R$ {{$precocaixapromocional}}</td>
                @endif

            </tr>
            <tr>
                <td colspan="5" class="font75">{{ $produto->descricao_auxiliar }}</td>
            </tr>


            </tbody>
        </table>
    </div>
</div>
<style>


    .box-amarelo{
        width: 2480px;
        height: 3500px;
        display: block;
        float: left;
        padding: 0;
        color: #000;
        @if($bgamarelavertical != null)
            background-image: url('{{$bgamarelavertical}}');
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
    @endif

}

    .conteudo-amarelo{
        width: 2180px;
        height: 1700px;
        margin-left: 150px;
        float: left;
        margin-top: 1150px;
        display: block;
    }
    .amarelo-moeda{
        width: 150px;
        height: 150px;
        font-size: 140px;
        line-height: 110px;
        text-align: left;
        margin-top: 100px;
    }
    .amarelo-box-preco{
        width: 2000px;
        height: 1250px;
        display:block ;
        margin-top: 100px;
    }


</style>
