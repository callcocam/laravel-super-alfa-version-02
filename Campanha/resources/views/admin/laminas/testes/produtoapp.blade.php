<div class="lamina-imagem-box d-flex justify-content-center ">
    <canvas  id="imagemproduto{{$idcard}}" width="466px" height="317px"></canvas>
</div>
<div class="produto-lamina-box1">
    <div  id="discartSelection{{ $idcard }}"  class="produto-lamina-app-descricao rnphysis-medium fst-italic">
        {{ $produto->descricao_comercial }}
            @if($produto->descricao_auxiliar)
                <br/>{{$produto->descricao_auxiliar}}
            @endif
    </div>
    <div class="produto-lamina-preco-normal-app ">
        <div class="produto-lamina-preco-normal-app-moeda rnphysis-bolditalic ">
            R$
        </div>
        <div class="produto-lamina-preco-normal-app-reais bwglennsans-black">
            {{$preco_normal_reais}}
        </div>
        <div class="produto-lamina-preco-normal-app-centavos bwglennsans-black">
            ,{{$preco_normal_centavos}}<br/>
            <div class="produto-lamina-preco-normal-app-embalagem rnphysis-bolditalic">
                {{$produto['tipo_embalagem']}}
            </div>
        </div>
    </div>
</div>
<div class="produto-lamina-box2">
    <div class="produto-lamina-preco-app-tag">
        <img src="{{url('laminas/tag-app.png')}}">
    </div>
    <div class="produto-lamina-preco-app rns_sanzblack">
        <div class="produto-lamina-preco-app-reais  bwglennsans-black">
            {{$preco_app_reais}}
        </div>
        <div class="produto-lamina-preco-app-centavos  bwglennsans-black">
            ,{{$preco_app_centavos}}<br/>
            <div class="produto-lamina-preco-app-embalagem rnphysis-lightitalic">
                {{$produto['tipo_embalagem']}}
            </div>
        </div>
    </div>
</div>
@include('campanha::admin.laminas.imagens')
