@include('campanha::admin.laminas.botoes')
<div class="d-flex">
    <div>
        <canvas class="lamina-imagem-box"  id="imagemproduto{{ $idcard }}" width="950px" height="463px" style="z-index: 1000 !important;"></canvas>
    </div>
    <div>
        @include('campanha::admin.laminas.blocos.conteudo3x1y')
    </div>
</div>
@include('campanha::admin.laminas.imagens')
