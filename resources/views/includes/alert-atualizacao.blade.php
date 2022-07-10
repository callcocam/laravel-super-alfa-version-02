@if($modelUpdated->type == "edit")
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="alert alert-light-warning color-warning">
                <i class="bi bi-exclamation-triangle"></i>
                Esse produto é uma atualização do produto
                @if($modelUpdated->ajustado)
                   <span class="font-bold uppercase"> {{ $modelUpdated->ajustado->descricao_completa }} - CÓDIGO DE BARRAS:{{$modelUpdated->ajustado->cod_barras}}</span>
                @endif

            </div>
        </div>
    </div>
@endif
