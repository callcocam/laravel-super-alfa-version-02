
@php
    //Prepara dados para box normal

        if($lencountnormal == 1 ):
            $normalreaisfontsize = 'font-size: 750px;height: 530px; width: 560px;  line-height: 480px; text-align: center;letter-spacing: -50px;';
          $normalcentavosfs =' width: 300px; text-align: right; font-size:200px; line-height: 140px;letter-spacing: -10px; ' ;
          $normalembalagemfs = ' width: 300px; text-align: right; font-size: 100px; line-height: 80px;';
        elseif ($lencountnormal == 2 ):
          $normalreaisfontsize = 'font-size: 650px;height: 530px; width: 700px;  line-height: 430px; text-align: center;letter-spacing: -50px;';
          $normalcentavosfs =' width: 270px; text-align: right; font-size:200px; line-height: 140px;letter-spacing: -10px; ' ;
          $normalembalagemfs = ' width: 270px; text-align: right; font-size: 100px; line-height: 80px;';

        elseif ($lencountnormal == 3 ):
           $normalreaisfontsize =  'width: 780px;height: 530px; font-size: 480px;  line-height: 340px; text-align: center;letter-spacing: -40px;';
          $normalcentavosfs = ' width: 180px; text-align: right; font-size: 150px; line-height: 100px;letter-spacing: -10px;';
           $normalembalagemfs = ' width: 180px; text-align: right; font-size: 80px; line-height: 60px;';
        elseif ($lencountnormal >= 4 ):
        $normalreaisfontsize =  'width: 800px;height: 530px; font-size: 500px;  line-height: 340px; text-align: center;letter-spacing: -40px;';
          $normalcentavosfs = ' width: 250px; text-align: right; font-size: 150px; line-height: 100px;letter-spacing: -10px;';
           $normalembalagemfs = ' width: 250px; text-align: right; font-size: 80px; line-height: 60px;';
        endif;

    //Prepara dados para box app
 if($lencountapp == 1 ):
             $appreaisfontsize = 'font-size: 750px;height: 530px; width: 560px; line-height: 480px; text-align: center;letter-spacing: -50px;';
          $appcentavosfs =' width: 300px; text-align: right; font-size:200px; line-height: 140px;letter-spacing: -10px; ' ;
          $appembalagemfs = ' width: 300px; text-align: right; font-size: 100px; line-height: 80px;';
        elseif ($lencountapp == 2 ):
        $appreaisfontsize = 'font-size: 650px ;height: 530px;margin-left:50px; width: 700px;  line-height: 450px; text-align: center;letter-spacing: -50px;';
          $appcentavosfs =' width: 270px; text-align: right; font-size:200px; line-height: 140px;letter-spacing: -10px; ' ;
          $appembalagemfs = ' width: 270px; text-align: right; font-size: 100px; line-height: 80px;';
        elseif ($lencountapp == 3 ):
                $appreaisfontsize =  'width: 780px;height: 530px; font-size: 500px;  line-height: 340px; text-align: center;letter-spacing: -40px;';
          $appcentavosfs = ' width: 180px; text-align: right; font-size: 150px; line-height: 100px;letter-spacing: -10px;';
           $appembalagemfs = ' width: 180px; text-align: right; font-size: 80px; line-height: 60px;';
        elseif ($lencountapp >= 4 ):
               $appreaisfontsize =  'width: 800px;height: 530px; font-size: 500px;  line-height: 340px; text-align: center;letter-spacing: -40px;';
          $appcentavosfs = ' width: 250px; text-align: right; font-size: 150px; line-height: 100px;letter-spacing: -10px;';
           $appembalagemfs = ' width: 250px; text-align: right; font-size: 80px; line-height: 60px;';
        endif;

         if($lencountdesc <= 50):
            $descfs =  'font-size: 85px;line-height: 60px;';
          endif;

          if($lencountdesc > 50 && $lencountdesc <= 70):
              $descfs =   'font-size: 75px !important; line-height: 50px; ';
            endif;

          if($lencountdesc > 70):
            $descfs =   ' font-size: 60px !important; line-height: 45px;';
          endif;

@endphp
<table  style="width: 100%;">
    <tbody>
    <tr style="vertical-align:top;" >
        <td>
<div class="conteudo-app nrsanz">
<table  style="width: 100%;">
    <tbody>
    <tr style="vertical-align:top;" >
        <td>


                <div class="box1">
                    <table>
                        <tbody>
                        <tr>
                            <td colspan="4"  style="vertical-align: top;">
                                <div class="titulo-app" style="{{$descfs}}; text-transform: capitalize">{{ $produto->descricao_comercial }}</div>
                            </td>
                        </tr>


                        <tr style="vertical-align:top;">
                            <td colspan="4">
                                <div class="app-box-preco">
                                    <table>
                                        <tbody>
                                        <tr style="vertical-align:top">
                                                <td width="30" style="vertical-align: top; padding-top:20px; font-size: 80px; line-height: 70px">
                                                    @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
                                                    <span>{{$produto->quantidade_parcelas}}X De:</span>
                                                    @endif
                                                    R$
                                                </td>
                                            <td>
                                                <div style="{{$normalreaisfontsize}};">
                                                    {{$preco_normal_reais}}
                                                </div>
                                            </td>
                                            <td>
                                                <div style="{{$normalcentavosfs}}">
                                                    ,{{$preco_normal_centavos}}
                                                </div>
                                                <div style="{{$normalembalagemfs}}">
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
                            @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
                                @if($produto->preco_normal_total)
                                    <div colspan="4" class="font60" style=" vertical-align: top; padding-top: 20px;">
                                        Valor total: R$ {{ $produto->preco_normal_total }}
                                    </div>
                                @endif
                            @endif
                            <td colspan="4" class="font60" style=" vertical-align: top; padding-top: 20px;">
                                {{ $produto->descricao_auxiliar }}
                            </td>
                        </tr>
                        @if($produto->qde_por_cx && is_numeric($produto->qde_por_cx))
                            <tr>
                                <td colspan="4" class="font60" style="vertical-align: top;">
                                    Caixa com {{$produto->qde_por_cx}}  unidades R$ {{$precocaixanormal}}
                                </td>
                            </tr>
                        @endif


                        </tbody>
                    </table>
                </div>
                <div class="box2">
                    <table>
                        <tbody>
                        <tr>
                            <td colspan="4"  style="vertical-align: top;">
                                <div class="preco-app-imagem">
                                    <img  style="max-width:600px "  src="{{$seta}}">
                                </div>
                            </td>
                            @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
                                <td colspan="4"  style="vertical-align: bottom; font-size: 100px; height: 100px">
                                    <span style="padding-left: 100px">{{$produto->quantidade_parcelas}}X DE:</span>
                                </td>
                            @endif
                        </tr>
                        <tr style="vertical-align:top;">
                            <td colspan="4">
                                <div class="app-box-preco">
                                    <table>
                                        <tbody>
                                        <tr style="vertical-align:top">
                                            <td  style="text-align: center">
                                                <div style="{{$appreaisfontsize}}">
                                                    {{$preco_app_reais}}
                                                </div>
                                            </td>
                                            <td>
                                                <div style="{{$appcentavosfs}}">
                                                    ,{{$preco_app_centavos}}
                                                </div>
                                                <div style="{{$appembalagemfs}}">
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
                            <td colspan="4" class="font60" style="padding-left: 50px; vertical-align: top; padding-top: 20px;">
                                @if($produto->tipo_embalagem)
                                    Limite de 24 {{$produto->tipo_embalagem}} por CPF
                                @endif
                            </td>
                        </tr>
                        @if($produto->qde_por_cx && is_numeric($produto->qde_por_cx))
                            <tr>
                                <td colspan="4" class="font60" style="vertical-align: top; padding-left: 50px;">
                                    Caixa com {{$produto->qde_por_cx}}  unidades R$ {{$precocaixaapp}}
                                </td>
                            </tr>
                        @endif
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
    .box-app{
        width: 2480px;
        height: 3500px;
        display: block;
        float: left;
        padding: 0;
        color: #000;
        @if($bgapphorizontal != null)
            background-image: url('{{$bgapphorizontal}}');
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
    @endif
}
    .conteudo-app{
        width: 2300px;
        height: 1740px;
        margin-left: 100px;
    }
    .conteudo-app .box1{
        width: 1150px;
        height: 1100px;
        float: left;
        display: block;
        border-right: 2px solid #000;
        margin-top: 600px;
    }
    .conteudo-app .box2{
        width: 1148px;
        height: 1100px;
        float: right;
        display: block;
        margin-top: 600px;
    }
    .titulo-app{
        height: 240px;
        width: 100%;

    }


    .app-box-preco{
        height: 600px; display:block;
    }


    .preco-app-imagem{
        padding-left: 100px;
        font-size: 100px;
        height: 240px;
    }

</style>
