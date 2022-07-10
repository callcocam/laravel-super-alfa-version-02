@php
    //Prepara dados para box normal

        if($lencountnormal == 1 ):
          $normalreaisfontsize = 'font-size: 900px;  line-height: 590px;text-align: center;letter-spacing: -50px; ';
          $normalcentavosfs =' width: 380px; text-align: right; font-size:300px; line-height: 200px;letter-spacing: -20px';
          $normalembalagemfs = ' width: 380px; text-align: right; font-size: 130px; line-height: 120px;';
        elseif ($lencountnormal == 2 ):
          $normalreaisfontsize = 'font-size: 730px;  line-height: 500px;text-align: center;letter-spacing: -50px;margin-left:-20;';
          $normalcentavosfs = ' width: 300px; text-align: right; font-size: 250px; line-height: 180px;letter-spacing: -25px';
           $normalembalagemfs = ' width: 300px; text-align: right; font-size: 100px; line-height: 70px;';

        elseif ($lencountnormal == 3 ):
           $normalreaisfontsize = 'font-size: 500px;  line-height: 330px; text-align: left;letter-spacing: -35px;margin-top:50px;';
          $normalcentavosfs = ' width: 220px;  text-align: right; font-size: 220px; line-height: 150px;letter-spacing: -20px;margin-top:50px;';
           $normalembalagemfs = ' width: 220px; text-align: right; font-size: 80px; line-height: 60px;';
        elseif ($lencountnormal >= 4 ):
           $normalreaisfontsize ='font-size: 370px;  line-height: 250px; text-align: center;letter-spacing: -30px;margin-top:50px;';
          $normalcentavosfs = ' width: 200px; text-align: right; font-size: 160px; line-height: 130px;letter-spacing: -10px;margin-top:50px';
           $normalembalagemfs =' width: 200px; text-align: right; font-size: 70px; line-height: 50px;letter-spacing: -10px';
        endif;

    //Prepara dados para box app

        if($lencountapp == 1 ):
             $appreaisfontsize = 'font-size: 900px; line-height: 590px;text-align: center;letter-spacing: -50px;margin-left:20px;';
        $appcentavosfs = ' width: 380px; text-align: right; font-size:300px; line-height: 200px;letter-spacing: -20px;';
          $appembalagemfs = ' width: 380px; text-align: right; font-size: 130px; line-height: 120px;';
        elseif ($lencountapp == 2 ):
              $appreaisfontsize =  'font-size: 730px;  line-height: 500px;text-align: center;letter-spacing: -50px; margin-left:20px';
        $appcentavosfs = ' width: 300px; text-align: right; font-size: 250px; line-height: 180px;letter-spacing: -25px;';
           $appembalagemfs = ' width: 300px; text-align: right; font-size: 100px; line-height: 70px;';
        elseif ($lencountapp == 3 ):
              $appreaisfontsize =  'font-size: 500px;  line-height: 330px; text-align: left;letter-spacing: -35px; padding-left:50px;margin-top:50px;';
          $appcentavosfs = ' width: 230px; text-align: right; font-size: 220px; line-height: 150px;letter-spacing: -20px; margin-top:50px;';
           $appembalagemfs = ' width: 230px; text-align: right; font-size: 80px; line-height: 60px;';
        elseif ($lencountapp >= 4 ):
               $appreaisfontsize = 'font-size: 370px;  line-height: 250px; text-align: center;letter-spacing: -30px;  margin-top:50px; padding-left:50px';
         $appcentavosfs = ' width: 200px; text-align: right; font-size: 160px; line-height: 130px;letter-spacing: -10px;margin-top:50px';
           $appembalagemfs = ' width: 200px; text-align: right; font-size: 70px; line-height: 50px;letter-spacing: -10px';
        endif;

@endphp

<div class="box-app nrsanz">
    <div class="conteudo-app">
                    <div class="box1">
                        <table>
                            <tbody>
                            <tr>
                                <td colspan="4"  style="height: 335px !important; vertical-align: top;">
                                    <div class="titulo-app"  style="text-transform: capitalize">{{ $produto->descricao_comercial }}</div>
                                </td>
                            </tr>
                            @if($produto->quantidade_parcelas && $produto->quantidade_parcelas != "1")
                            <tr>
                                <td colspan="4"  style="vertical-align: top;font-size: 100px; height: 180px;">

                                        <span>{{$produto->quantidade_parcelas}}X DE:</span>

                                </td>
                            </tr>
                            @endif
                            <tr style="vertical-align:top;">
                                <td colspan="4">
                                    <div class="app-box-preco" >
                                        <table>
                                            <tbody>
                                            <tr style="vertical-align:top">
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
                            @if($produto->qde_por_cx && is_numeric($produto->qde_por_cx))
                                <tr>
                                    <td colspan="4" class="font60" style="vertical-align: middle;width: 700px; padding-top: 80px;">Caixa com {{$produto->qde_por_cx}}  unidades <br/> R$ {{$precocaixanormal}}</td>
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
                                        <img style="max-width:800px " src="{{$setaapp}}">
                                    </div>
                                </td>
                            </tr>
                            @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
                                <tr>
                                <td colspan="4"  style="vertical-align: bottom; font-size: 100px; height: 180px">
                                        <span style="padding-left: 100px">{{$produto->quantidade_parcelas}}X DE:</span>
                                </td>
                            </tr>
                            @endif
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
                            @if($produto->qde_por_cx && is_numeric($produto->qde_por_cx))
                            <tr>
                                <td colspan="4" class="font60" style="vertical-align: top; ; width: 700px; padding-left: 110px; padding-top: 80px;">Caixa com {{$produto->qde_por_cx}}  unidades <br/> R$ {{$precocaixaapp}}</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
            </tbody>
        </table>
    </div>
    <div class="conteudo-app-rodape">
        <table  style="width: 100%;">
            <tr>
                <td  width="280"  style="vertical-align: top; "><span style="margin-left: 70px;"> {{ $produto->descricao_auxiliar }} </span></td>
            </tr>
            <tr>
                <td  width="280"   style="vertical-align: top;"><span style="margin-left: 70px">
                       @if($produto->tipo_embalagem)
                            Limite de 24 {{$produto->tipo_embalagem}} por CPF
                        @endif
                    </span> </td>
            </tr>
        </table>
    </div>
</div>

<style>
    .box-app{
        width: 2480px;
        height: 3500px;
        display: block;
        float: left;
        padding: 0;
        color: #000;
        @if($bgappvertical != null)
            background-image: url('{{$bgappvertical}}');
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
    @endif
}
    .conteudo-app{
        width: 2284px;
        height: 1400px;
        float: left;
        margin-top: 1300px;
        margin-left: 100px;
        display: block;
    }
    .conteudo-app-rodape{
        width: 2284px;
        height: 200px;
        margin-right: 100px;
        float: right;
        bottom: 450px;
        position: fixed;
    }
    .conteudo-app .box1{
        width: 1100px;
        height: 1200px;
        float: left;
        display: block;
        border-right: 2px solid #000;
        margin-left: 40px;
    }
    .conteudo-app .box2{
        width: 1140px;
        height: 900px;
        float: right;
        display: block;
    }
    .titulo-app{
        min-height: 300px;
    }

    @if($lencountdesc <= 50)
    .titulo-app{
        font-size: 100px;
        line-height: 70px;
    }
    @endif
     @if($lencountdesc > 50)
    .titulo-app{
        font-size: 80px !important;
        line-height: 60px;
    }
    @endif
    .app-box-preco{
        height: 600px; display:block;
    }


    .preco-app-imagem{
        padding-left: 100px;
        font-size: 100px;
        height: 330px;
    }

</style>
