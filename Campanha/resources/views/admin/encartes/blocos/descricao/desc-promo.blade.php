<div id="discartSelection{{ $idcard }}" class="textopromo  rnphysis-medium fst-italic  p-2 d-block" style="
text-align: right;
        text-transform: capitalize;
        font-size: 23px;
        line-height: 20px;
">
    {{ $produto->descricao_comercial }}
    @if($produto->descricao_auxiliar)
        <br/>{{$produto->descricao_auxiliar}}
    @endif
</div>
