
@include('campanha::admin.encartes.botoes')
<div class="d-flex">
    <div>
        <canvas class="lamina-imagem-box"  id="imagemproduto{{ $idcard }}" width="760px" height="940px" style="z-index: 1000 !important;"></canvas>
    </div>
    <div>
        @include('campanha::admin.encartes.blocos.conteudo3x2y')
    </div>
</div>
@include('campanha::admin.encartes.imagens')
