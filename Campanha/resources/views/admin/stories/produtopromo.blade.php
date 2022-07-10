
<div class="card-imagem d-flex justify-content-center ">
    <canvas  id="imagemproduto{{$idcard}}" width="800px" height="700px"></canvas>
</div>
<div id="discartSelection{{$idcard}}" class="card-conteudo textopromo">
    <div class="row">
        <div class=" col card-promo-desc rnphysis-lightitalic">
            {{$produto['descricao_comercial']}}
            @if($produto->descricao_auxiliar)
                <br/>{{$produto->descricao_auxiliar}}
            @endif
            @if($tipo_campanha == 'lamina_ofertas_arrasadoras')
                <br/>
            <div class="d-flex flex-column justify-content-end align-items-end ">
                <div class="de-por bwglennsans-black px-2">DE: <span class="text-white">R$</span> </div>

                <div class="produto-storie-preco-ofertas_arrasadoras">
                    <div class="preco_normal bwglennsans-black text-white px-3 py-1">{{$produto->preco_normal}}</div>
                    <span class="preco_normal_riscado"></span>
                </div>
            </div>

            @endif
        </div>
        <div class=" col card-promo-preco-normal mt-3 d-flex ">
            <div class="card-promo-preco-normal-moeda rnssanz-bold">
                R$
            </div>
            <div class="bwglennsans-black " style="{{$promoreaisfontsize}}">
                {{$preco_promo_reais}}
            </div>
            <div class="bwglennsans-black " style="{{$promocentavosfs}}">
                ,{{$preco_promo_centavos}}<br/>
                <div class="card-promo-preco-normal-embalagem rnphysis-lightitalic">
                    {{$produto['tipo_embalagem']}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-promo-validade textopromo rnphysis-bolditalic">
    Ofertas válidas
    @if($model->data_inicio != $model->data_fim)
        de {{ date_carbom_format($model->data_inicio)->format('d/m') }} a
        {{ date_carbom_format($model->data_fim)->format('d/m/Y') }}
    @else
        para {{ date_carbom_format($model->data_fim)->format('d/m/Y') }},
    @endif
    @if($model->loja)
        para

        @foreach($model->loja as $loja)
            @php
                $nome =   mb_strtolower($loja->nome);
            @endphp
            <span style="text-transform: capitalize">{{$nome}}</span>@if(!$loop->last),  @endif
            @if($loop->last)
                ou enquanto durarem os estoques.
            @endif
        @endforeach
    @endif
</div>
@if($bebacommoderacao == 1)
    <div style="width: 900px;float: left">
        <div class="card-promo-obs rnphysis-bolditalic">
            BEBA COM MODERAÇÃO
        </div>
    </div>
@endif
@include('campanha::admin.stories.imagens')

<style>


    .card-promo-desc{
        font-size: 38px;
        margin-bottom: 5px;
        line-height: 35px;
        padding-right: 10px;
        text-transform: capitalize;
        text-align: right;
        padding-top: 10px;
    }
    .card-promo-preco-normal-moeda{
        font-size: 30px;
        /*background: #a0aec0;*/
        line-height: 30px;
        width: 40px;
        height: 30px;
    }
    .card-promo-preco-normal-embalagem{
        font-size: 34px;
        line-height: 25px;
        margin-top: 10px;
        text-transform: lowercase;
    }

    .card-promo-validade{
        width: 730px;
        margin-left: 85px;
        margin-top: 25px;
        float: left;
        display: block;
        font-size: 25px;
        line-height: 26px;
        text-align: center;
    }
    .card-promo-obs{
        margin: 15px auto;
        display: block;
        font-size: 15px;
        background: {{ $corpromo }};
        color: #fff;
        padding: 10px 20px;
        border-radius: 7px;
        width: 230px;
    }
    .ararelo-ofertas-arrasadoras{
        color: #F7AF14;
    }
    .produto-storie-preco-ofertas_arrasadoras{
        float: left;
        background: #F7AF14;
        border-radius: 5px;
        display: block;
        margin: 10px 0;
        width: 140px;

    }
    .produto-storie-preco-ofertas_arrasadoras .preco_normal{
        font-size: 35px;

    }
    .produto-storie-preco-ofertas_arrasadoras .preco_normal_riscado{
        width: 120px; height: 1px;
        border-bottom: 3px solid #3e883c;
        display: block;
        float: left;
        transform: rotate(150deg);
        margin-top: -25px;
        margin-left: 10px;
    }
    .de-por{
        color: #F7AF14;
        border: 1px solid #F7AF14;
        border-radius: 5px;
        display: block;
        float: left;
        width: 85px;
        margin-top: 15px;
        font-size: 20px;

    }
</style>
