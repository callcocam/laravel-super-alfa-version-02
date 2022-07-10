
<div class="card-imagem d-flex justify-content-center ">
    <canvas  id="imagemproduto{{$idcard}}" width="550px" height="550px"></canvas>
</div>
<div  id="discartSelection{{$idcard}}" class="card-conteudo textopromo d-flex justify-content-center flex-column">
    <div class="card-app-desc  rnphysis-lightitalic">
        {{$produto['descricao_comercial']}}
        @if($produto->descricao_auxiliar)
            <br/>{{$produto->descricao_auxiliar}}
        @endif
    </div>
    <div class="card-app-preco-normal d-flex mt-4 ">
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
    <img class="mt-4" width="250" src="{{url('/cards/tag.png')}}">

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
    <div style="width: 800px;">
        <div class="card-promo-obs rnphysis-bolditalic">
            BEBA COM MODERAÇÃO
        </div>
    </div>
@endif
@include('campanha::admin.cards.imagens')

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
        padding-right: 30px;
        text-transform: capitalize;

    }
    .card-app-preco-normal-moeda{
        font-size: 30px;
        margin-left: -50px;
        /*background: #a0aec0;*/
        line-height: 30px;
        width: 40px;
        height: 30px;
    }

    .card-app-preco-app-embalagem{
        font-size: 34px;
        text-align: right;
        line-height: 25px;
        text-transform: lowercase;

    }
    .card-app-validade{
        width: 560px;
        margin-left: 85px;
         margin-top: 60px;
        float: left;
        display: block;
        font-size: 20px;
        line-height: 23px;

    }
    .card-app-obs{
        margin-left: 85px;
        margin-top: 15px;
        float: left;
        display: block;
        font-size: 15px;
        background: {{ $corpromo }};
        color: #fff;
        padding: 10px 20px;
        border-radius: 7px;
    }
</style>
