<div class="d-flex flex-column align-items-start justify-content-center" style="height:  @if($produto->promo == 1) 100% @else 80% @endif">
    @if($produto->promo == 1)
        <div class="w-75 d-flex flex-column align-items-start">
            <div id="discartSelection{{ $idcard }}" class="textopromo  rnphysis-medium fst-italic  p-2 d-block"
                 style=" text-align: left; text-transform: capitalize;font-size: 23px;line-height: 20px; padding-left: 10px;">
                {{ $produto->descricao_comercial }}
                @if($produto->descricao_auxiliar)
                    <br/>{{$produto->descricao_auxiliar}}
                @endif
            </div>
            <div>
                @include('campanha::admin.laminas.blocos.preco.preco-promo2x1y')

            </div>

        </div>
    @endif
    @if($produto->app == 1)
        <div class="d-flex textoapp pe-3">
            <div>
                <div id="discartSelection{{ $idcard }}" class="produto-lamina-descricao-app  rnphysis-medium fst-italic  p-2 d-block">
                    {{ $produto->descricao_comercial }}
                </div>
                <style>
                    .produto-lamina-descricao-app{
                        font-size: 20px;
                        line-height: 17px;
                        text-align: right;
                        text-align: right;
                        text-transform: capitalize;
                        min-height: 70px;

                    }
                </style>

                @include('campanha::admin.laminas.blocos.preco.preco-normal')

            </div>
            <div>
                @include('campanha::admin.laminas.blocos.preco.preco-app')
            </div>
        </div>

    @endif

</div>
@if($produto->app == 1)
    @if($produto->descricao_auxiliar)
<div class="d-flex">
    <div class="rnphysis-medium fst-italic  mt-4 d-block px-2 py-2" style="
        font-size: 17px;
        line-height: 15px;
        text-align: left;
        text-transform: capitalize;
        background: {{ $midias_config->cor_app }};
        color: #fff;
        border-radius: 5px;
        float: right;
        display: block;
        margin: 0 auto;
        max-width: 500px;
        ">
        @if($produto->descricao_auxiliar)
            {{$produto->descricao_auxiliar}}
        @endif
    </div>
</div>

@endif
@endif
