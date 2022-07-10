@if($produto->promo == 1)
    <div class="d-flex">
        <div class="w-50">
            @include('campanha::admin.encartes.blocos.descricao.desc-promo')
        </div>
        <div class="w-50">
           @include('campanha::admin.encartes.blocos.preco.preco-promo')
        </div>
    </div>
@endif
@if($produto->app == 1)
    <div class="d-flex textoapp">
        <div class="w-50">
            @include('campanha::admin.encartes.blocos.descricao.desc-app')
            @include('campanha::admin.encartes.blocos.preco.preco-normal')
        </div>
        <div class="w-50">
            @include('campanha::admin.encartes.blocos.preco.preco-app')
        </div>
    </div>
@endif
