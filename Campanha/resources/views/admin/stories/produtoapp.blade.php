<div class="card-imagem d-flex justify-content-center ">
    <canvas  id="imagemproduto{{$idcard}}" width="800px" height="700px"></canvas>
</div>
<div  id="discartSelection{{$idcard}}" class="card-conteudo textopromo">
    <div class="row">
        <div class="col">
            <div class="card-app-desc  rnphysis-lightitalic">
                {{$produto['descricao_comercial']}}
                @if($produto->descricao_auxiliar)
                    <br/>{{$produto->descricao_auxiliar}}
                @endif
            </div>
            <div class="card-app-preco-normal d-flex mt-4 justify-content-end pe-3">
                <div class="card-app-preco-normal-moeda rnssanz-bold">
                    R$
                </div>
                <div class="bwglennsans-black" style="{{$normalreaisfontsize}}">
                    {{$preco_normal_reais}}
                </div>
                <div class="bwglennsans-black" style="{{$normalcentavosfs}}">
                    ,{{$preco_normal_centavos}}

                </div>
            </div>
        </div>
        <div class="col">
            <img class="mt-2" width="200" src="{{url('/cards/tag.png')}}">

            <div class="card-app-preco-app textoapp d-flex mt-4">
                <div class="bwglennsans-black " style="{{$appreaisfontsize}}">
                    {{$preco_app_reais}}
                </div>
                <div class="bwglennsans-black "style="{{$appcentavosfs}}">
                    ,{{$preco_app_centavos}}<br/>
                    <div class="card-app-preco-app-embalagem rnphysis-lightitalic">
                        {{$produto['tipo_embalagem']}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card-app-validade textopromo rnphysis-bolditalic">
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

    @if($tipo_campanha == "lamina_ofertas_arrasadoras")
    .textopromo{
        color: #fff!important;
    }
    @endif
    .card-app-desc{
        font-size: 34px;
        margin-bottom: 5px;
        line-height: 35px;
        padding-right: 20px;
        text-transform: capitalize;
        text-align: right;

    }
    .card-app-preco-normal-moeda{
        font-size: 30px;
        line-height: 30px;
        width: 40px;
        height: 30px;
    }

    .card-app-preco-app-embalagem{
        font-size: 34px;
        text-align: right;
        line-height: 25px;
        margin-top: 5px;
        text-transform: lowercase;
    }
    .card-app-validade{
        width: 700px;
        margin-left: 100px;
        float: left;
        margin-top: 25px;
        display: block;
        font-size: 25px;
        line-height: 25px;
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
</style>
