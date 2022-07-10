<div class="lamina-imagem-box-promo d-flex justify-content-center" >
    <canvas id="imagemproduto{{ $idcard }}" width="466px" height="317px" style="z-index: 1000 !important;"></canvas>
</div>
{{--<div class="lamina-selo" id="lamina-selo">--}}
{{--    <span class="lamina-selo-titulo">OFERTA EXCLUSIVA</span>--}}
{{--    <span class="lamina-selo-subtitulo">CHAPECÓ MATRIZ</span>--}}
{{--</div>--}}
<div class="produto-lamina-promo">
    <div id="discartSelection{{ $idcard }}" class="produto-lamina-promo-descricao  rnphysis-medium fst-italic">

        <div class="ps-2">{{ $produto->descricao_comercial }}
            @if($produto->descricao_auxiliar)
                <br/>{{$produto->descricao_auxiliar}}
            @endif
        </div>
    </div>


    <div class="produto-lamina-box-preco">
        @if($produto->quantidade_parcelas && $produto->quantidade_parcelas  != "1")
            {{--        INICIA PARCELAMENTO--}}

            <div class="produto-lamina-preco-parcelado bwglennsans-black">
                <div class="produto-lamina-box-preco-parcelas bwglennsans-black w-100">
                    {{$produto->quantidade_parcelas}}X
                </div>
                <div class="d-flex justify-content-start w-100">
                    <div class="produto-lamina-preco-parcelado-reais  bwglennsans-black">
                        {{ $preco_promo_reais }}
                    </div>
                    <div class="produto-lamina-preco-parcelado-centavos">
                        ,{{ $preco_promo_centavos }}<br />
                        <div class="produto-lamina-preco-parcelado-embalagem rnphysis-lightitalic"  style="text-transform: lowercase !important;">
                            {{ $produto['tipo_embalagem'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="produto-lamina-preco-parcelado-cartao  rnphysis-medium">
                No cartão de crédito
            </div>

            @if($produto->preco_promocional_total)
                <div class="produto-lamina-preco-parcelado-total  d-flex justify-content-start  bwglennsans-black">
                    <div class="produto-lamina-preco-parcelado-total-rs">R$</div>
                    <div class="produto-lamina-preco-parcelado-total-reais">
                        {{ $preco_total_reais }}
                    </div>
                    <div class="produto-lamina-preco-parcelado-total-centavos">
                        ,{{ $preco_total_centavos }}<br />
                        <div class="produto-lamina-preco-parcelado-total-embalagem rnphysis-lightitalic"  style="text-transform: lowercase !important;">
                            {{ $produto['tipo_embalagem'] }}
                        </div>
                    </div>
                </div>
            @endif

        @else
            @if($tipo_campanha == 'lamina_ofertas_arrasadoras')
                <div class="produto-lamina-preco-ofertas_arrasadoras ms-2">
                    <div class="preco_normal bwglennsans-black text-white px-3">DE R$ {{$produto->preco_normal}}</div>
                    <span class="preco_normal_riscado"></span>
                </div>
            @endif
            <div class="produto-lamina-preco-promo d-flex
           @if($tipo_campanha == 'lamina_ofertas_arrasadoras')justify-content-start ps-2 @else justify-content-center @endif
                ">
                <div class="produto-lamina-preco-promo-reais  bwglennsans-black">
                    {{ $preco_promo_reais }}
                </div>
                <div class="produto-lamina-preco-promo-centavos  bwglennsans-black">
                    ,{{ $preco_promo_centavos }}<br />
                    <div class="produto-lamina-preco-promo-embalagem rnphysis-lightitalic">
                        {{ $produto['tipo_embalagem'] }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<style>
    .produto-lamina-box-preco{
        width: 230px;
        height: 140px;
        float: right;
        padding-left:10px ;

    }
    .produto-lamina-box-preco-parcelas{
        width: 50px;
        float: left;
        height: 20px;
        font-size: 20px;
        text-align: left;
        margin-top: -20px;
        padding: 0;
    }
    .produto-lamina-preco-parcelado{
        width: 220px;
        height: 75px;
        float: left;

    }
    .produto-lamina-preco-parcelado-reais{
        font-size: 75px;
        padding-top: 5px;
        height: 60px;
        line-height: 60px;
        letter-spacing: -2px;

    }
    .produto-lamina-preco-parcelado-centavos{
        font-size: 35px;
        line-height: 30px;
        padding-top: 10px;
    }
    .produto-lamina-preco-parcelado-embalagem{
        float: right;
        font-size: 15px;
    }
    .produto-lamina-preco-parcelado-cartao{
        background: {{ $corpromo }};
        color: #fff;
        width: 130px;
        float: left;
        border-radius: 4px;
        padding: 1px 5px;
        text-align: center;
        font-size: 12px;
        margin: 3px 0;
    }
    .produto-lamina-preco-parcelado-total{
        width: 200px;
        height: 40px;
        float: left;
    }
    .produto-lamina-preco-parcelado-total-rs{
        font-size: 12px;
        padding-top: 5px;
    }
    .produto-lamina-preco-parcelado-total .produto-lamina-preco-parcelado-total-reais{
        font-size: 40px;
        line-height: 40px;
    }
    .produto-lamina-preco-parcelado-total-centavos{
        font-size: 18px;
        line-height: 16px;
        padding-top: 5px;
    }
    .produto-lamina-preco-parcelado-total-embalagem{
        font-size: 10px;
        text-align: right;
    }
</style>
@include('campanha::admin.laminas.imagens')

