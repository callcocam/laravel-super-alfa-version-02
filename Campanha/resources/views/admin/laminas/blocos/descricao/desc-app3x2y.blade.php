<div id="discartSelection{{ $idcard }}" class="rnphysis-medium fst-italic  p-2 d-block" style="
@if($produto->tamanho_fonte_desc_lamina)
    font-size: {{$produto->tamanho_fonte_desc_lamina}}px !important;
@else
    font-size: 25px;
@endif
@if($produto->altura_linha_desc_lamina)
    line-height: {{$produto->altura_linha_desc_lamina}}px !important;
@else
    line-height: 25px;
@endif

        text-align: right;
        text-transform: capitalize;">
    {{ $produto->descricao_comercial }}
    @if($produto->descricao_auxiliar)
        <br/>{{$produto->descricao_auxiliar}}
    @endif
</div>

