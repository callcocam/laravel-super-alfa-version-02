
{{--Conteúdo para descrição em cima--}}
<div class="d-flex flex-column align-items-start justify-content-center h-100">
    @if($produto->promo == 1)
        <div class="w-75 d-flex flex-column align-items-start">
            <div id="discartSelection{{ $idcard }}" class="textopromo  rnphysis-medium fst-italic  p-2 d-block"
                 style=" text-align: left; text-transform: capitalize;font-size: 32px;line-height: 30px; padding-left: 10px;">
                {{ $produto->descricao_comercial }}
                @if($produto->descricao_auxiliar)
                    <br/>{{$produto->descricao_auxiliar}}
                @endif
            </div>
            <div>
        @include('campanha::admin.laminas.blocos.preco.preco-promo3x2y')

</div>

        </div>
    @endif
    @if($produto->app == 1)
        <div class="d-flex textoapp pe-3">
            <div class="w-50">
                @include('campanha::admin.laminas.blocos.descricao.desc-app3x2y')
                @include('campanha::admin.laminas.blocos.preco.preco-normal')
            </div>
            <div class="w-50">
                @include('campanha::admin.laminas.blocos.preco.preco-app3x2y')
            </div>
        </div>
    @endif

</div>
