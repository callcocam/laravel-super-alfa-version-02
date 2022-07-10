<div class="d-flex align-items-start justify-content-center">
        @if($produto->promo == 1)
            <div class="w-50 d-flex flex-column align-items-start">
                <div id="discartSelection{{ $idcard }}" class="textopromo  rnphysis-medium fst-italic  p-2 d-block"
                     style=" text-align: left; text-transform: capitalize;font-size: 26px;line-height: 25px; padding-right: 10px; text-align: right">
                    {{ $produto->descricao_comercial }}
                    @if($produto->descricao_auxiliar)
                        <br/>{{$produto->descricao_auxiliar}}
                    @endif
                </div>
            </div>
    <div>
        @include('campanha::admin.laminas.blocos.preco.preco-promo2x1y')
    </div>

        @endif


    @if($produto->app == 1)
        <div class="d-flex textoapp pe-3">
            <div class="w-50">
                @include('campanha::admin.laminas.blocos.descricao.desc-app')
                @include('campanha::admin.laminas.blocos.preco.preco-normal')
            </div>
            <div class="w-50">
                @include('campanha::admin.laminas.blocos.preco.preco-app')
            </div>
        </div>
    @endif
 </div>
