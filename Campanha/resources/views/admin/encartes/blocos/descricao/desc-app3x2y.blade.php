<div id="discartSelection{{ $idcard }}" class="rnphysis-medium fst-italic  p-2 d-block" style="
         font-size: 25px;
        line-height: 25px;
        text-align: right;
        text-align: right;
        text-transform: capitalize;">
    {{ $produto->descricao_comercial }}
    @if($produto->descricao_auxiliar)
        <br/>{{$produto->descricao_auxiliar}}
    @endif
</div>

