<div id="discartSelection{{ $idcard }}" class="produto-lamina-descricao-app  rnphysis-medium fst-italic  px-2 py-1 d-block">
    {{ $produto->descricao_comercial }}
{{--    @if($produto->descricao_auxiliar)--}}
{{--        <br/>{{$produto->descricao_auxiliar}}--}}
{{--    @endif--}}
</div>
<style>
    .produto-lamina-descricao-app{
        @if($produto->tamanho_fonte_desc_lamina)
        font-size: {{(int)$produto->tamanho_fonte_desc_lamina}}px !important;
        @else
          font-size: 20px;
        @endif
        @if($produto->altura_linha_desc_lamina)
            line-height: {{(int)$produto->altura_linha_desc_lamina}}px !important;
        @else
          line-height: 17px;
        @endif
        text-align: right;
        text-transform: capitalize;
        min-height: 70px;

    }
</style>
