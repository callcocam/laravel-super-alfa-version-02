@include('campanha::admin.encartes.botoes')
<div class="d-flex">
    <div>
        <canvas class="lamina-imagem-box"  id="imagemproduto{{ $idcard }}" width="464px" height="570px" style="z-index: 1000 !important;"></canvas>
    </div>
    <div>
        @include('campanha::admin.encartes.blocos.conteudo2x1y')
    </div>
</div>
@include('campanha::admin.encartes.imagens')
