@php
    //Prepara dados para box normal

        if($lencountnormal == 1 ):
          $normalreaisfontsize = 'width: 280px; font-size: 410px;  line-height: 270px;text-align: center;letter-spacing: -20px; height: 290px;';
          $normalcentavosfs =' width: 160px; text-align: right; font-size:100px; line-height: 70px';
          $normalembalagemfs = ' width: 160px; text-align: right; font-size: 70px; line-height: 50px;';

        elseif ($lencountnormal == 2 ):
          $normalreaisfontsize = 'width: 450px;  font-size: 410px;  line-height: 270px;text-align: center;letter-spacing: -30px; height: 290px;';
          $normalcentavosfs =' width: 160px; text-align: right; font-size:100px; line-height: 70px';
          $normalembalagemfs = ' width: 160px; text-align: right; font-size: 70px; line-height: 50px;';

        elseif ($lencountnormal == 3 ):
          $normalreaisfontsize = 'width: 490px; font-size: 300px;  line-height: 200px;text-align: center;letter-spacing: -20px; height: 230px;';
          $normalcentavosfs =' width: 160px; text-align: right; font-size:100px; line-height: 70px';
          $normalembalagemfs = ' width: 160px; text-align: right; font-size: 70px; line-height: 50px;';
        elseif ($lencountnormal >= 4 ):
            $normalreaisfontsize = 'font-size: 280px;  line-height: 200px;text-align: center;letter-spacing: -20px; height: 210px;';
          $normalcentavosfs =' width: 160px; text-align: right; font-size:100px; line-height: 70px';
          $normalembalagemfs = ' width: 160px; text-align: right; font-size: 70px; line-height: 50px;';
        endif;

    //Prepara dados para box app

        if($lencountapp == 1 ):
            $appreaisfontsize = 'width: 280px;font-size: 410px;  line-height: 270px;text-align: center;letter-spacing: -20px; height: 290px;';
          $appcentavosfs =' width: 160px; text-align: right; font-size:100px; line-height: 70px;';
          $appembalagemfs = ' width: 160px; text-align: right; font-size: 70px; line-height: 50px;';
        elseif ($lencountapp == 2 ):
             $appreaisfontsize = 'width: 450px; margin-left:50px; font-size: 410px;  line-height: 270px;text-align: center;letter-spacing: -20px; height: 290px;';
          $appcentavosfs =' width: 160px; text-align: right; font-size:100px; line-height: 70px';
          $appembalagemfs = ' width: 160px; text-align: right; font-size: 70px; line-height: 50px;';
        elseif ($lencountapp == 3 ):
              $appreaisfontsize =  'font-size: 280px;  line-height: 200px;text-align: center;letter-spacing: -20px; height: 210px;';
          $appcentavosfs =' width: 160px; text-align: right; font-size:100px; line-height: 70px ;';
          $appembalagemfs = ' width: 160px; text-align: right; font-size: 70px; line-height: 50px;';
        elseif ($lencountapp >= 4 ):
             $appreaisfontsize = 'font-size: 280px;  line-height: 200px;text-align: center;letter-spacing: -20px; height: 210px;padding-left:40px';
          $appcentavosfs =' width: 160px; text-align: right; font-size:100px; line-height: 70px ;';
          $appembalagemfs = ' width: 160px; text-align: right; font-size: 70px; line-height: 50px;';
        endif;

                  if($lencountappdesc <= 50):
                    $descpromofs =  'font-size: 65px;line-height: 50px;';
                  endif;

                  if($lencountappdesc > 50 && $lencountappdesc <= 70):
                      $descpromofs =   'font-size: 55px !important; line-height: 40px;';
                    endif;

                  if($lencountappdesc > 70):
                    $descpromofs =   ' font-size: 50px !important; line-height: 35px;';
                  endif;

@endphp
<table  style="width: 100%; height: 651px; padding: 22px 0; overflow: hidden">
    <tbody>
    <tr>
        <td>

            <div class="conteudo-app nrsanz">

                 <div class="box1">
                    <table>
                        <tbody>
                        <tr>
                            <td colspan="4"  style="height: 200px !important; vertical-align: middle;">
                                <div class="titulo-app" style="{{$descpromofs}}; text-transform: capitalize">{{ $produto->descricao_comercial }}</div>
                            </td>
                        </tr>

                        <tr style="vertical-align:top;">
                            <td colspan="4">
                                <div class="app-box-preco" >
                                    <table>
                                        <tbody>
                                        <tr style="vertical-align:top">
                                            <td width="20" >
                                                @if($produto->quantidade_parcelas && $produto->quantidade_parcelas != "1")
                                                      {{$produto->quantidade_parcelas}}X De: <br/>
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
                        @if($produto->qde_por_cx && is_numeric($produto->qde_por_cx))
                            <tr>
                                <td colspan="4" class="font60" style="vertical-align: middle; padding-top: 10px;font-size: 35px">Caixa com {{$produto->qde_por_cx}}  unidades R$ {{$precocaixanormal}}</td>
                            </tr>
                        @endif
                            <tr>
                               <td colspan="4" style="vertical-align: top; "><span style="margin-top: 10px; font-size: 35px"> {{ $produto->descricao_auxiliar }} </span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box2">
                    <table>
                        <tbody>
                        <tr>
                            <td colspan="4"  style="height: 200px !important;vertical-align: middle;">
                                    <img style="max-width:500px;  padding-left: 40px; " src="{{$setaapp}}">
                            </td>
                        </tr>

                        <tr style="vertical-align:top;">
                            <td colspan="4">
                                <div class="app-box-preco">
                                    <table>
                                        <tbody>
                                        <tr style="vertical-align:top">
                                            <td width="20" >
                                                @if($produto->quantidade_parcelas && $produto->quantidade_parcelas != "1")
                                                    {{$produto->quantidade_parcelas}}X De: <br/>
                                                @endif
                                            </td>
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
                                <td colspan="4" class="font60" style="vertical-align: middle; padding-top: 10px; padding-left: 40px; font-size: 35px">Caixa com {{$produto->qde_por_cx}}  unidades R$ {{$precocaixaapp}}</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="4" style="vertical-align: top; "><span style="margin-top: 10px; font-size: 35px"><span style="margin-left: 40px">
                                        @if($produto->tipo_embalagem)
                                            Limite de 24 {{$produto->tipo_embalagem}} por CPF
                                        @endif
                                    </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>



<style>
    {{--.box-app {--}}
    {{--    background-image: url('{{$bgreguaapp}}');--}}
    {{--    background-size: contain;--}}
    {{--    background-position: center center;--}}
    {{--    background-repeat: no-repeat;--}}
    {{--}--}}
    .conteudo-app{
        width: 1600px;
        height: 650px;
        float: left;
        margin-left: 500px;
        display: block;
        margin-top: 10px;
    }

    .conteudo-app .box1{
        width: 800px;
        height: 630px;
        float: left;
        display: block;
        border-right: 1px solid #000;
        padding-top: 15px;

    }
    .conteudo-app .box2{
        width: 790px;
        height: 630px;
        float: right;
        display: block;
        padding-top: 15px;
    }
    .titulo-app{
        min-height: 100px;
    }

    .app-box-preco{
        height: 300px; display:block;
    }


    .preco-app-imagem{

        height: 200px;

    }

</style>
