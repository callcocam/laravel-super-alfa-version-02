@if($produto->promo == 1)
    <div class="d-flex">
        <div class="w-50">
            @include('campanha::admin.laminas.blocos.descricao.desc-promo')
        </div>
        <div class="w-50">
           @include('campanha::admin.laminas.blocos.preco.preco-promo')
        </div>
    </div>
@endif
@if($produto->app == 1)
    <div class="d-flex textoapp">
        <div class="w-50">
            @include('campanha::admin.laminas.blocos.descricao.desc-app')
            @include('campanha::admin.laminas.blocos.preco.preco-normal')
        </div>
        <div class="w-50">
            @include('campanha::admin.laminas.blocos.preco.preco-app')
        </div>
    </div>
@endif
@if($produto->app == 1)
    @if($produto->descricao_auxiliar)
    <div class="d-flex">
        <div class="rnphysis-medium fst-italic d-block px-2 py-1" style="
            font-size: 18px;
            line-height: 15px;
            text-align: left;
            text-transform: capitalize;
            background: {{ $midias_config->cor_app }};
            color: #fff;
            border-radius: 5px;
            float: right;
            display: block;
            margin: 8px auto 0;
            ">
            @if($produto->descricao_auxiliar)
                {{$produto->descricao_auxiliar}}
            @endif
        </div>
    </div>
    @endif
@endif
