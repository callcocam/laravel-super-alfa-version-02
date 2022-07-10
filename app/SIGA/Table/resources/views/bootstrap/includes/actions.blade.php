<div class="d-flex justify-content-end">
    @isset($btn_log)
        @if($btn_log)
            <button
                wire:click="openLog('{{$model->id}}')"
                {!!  $column->merge([
                'title' => 'Visualizar Log',
                'type' => 'button',
                'class' => 'btn btn-sm icon btn-danger d-flex justify-content-center mx-1'
                ]) !!}>
                <span class="d-block "> <i class="fas fa-eye"></i> </span>
            </button>
        @endif
    @endisset
    @if($column->btn_finish)
        <div class=" mx-1">
            <button
                wire:click="finishUpdate('{{$model->id}}')"
                {!!  $column->merge([
                'type' => 'button',
                'class' => 'btn btn-block btn-sm icon btn-warning d-flex justify-content-center mx-1'
                ]) !!}>
                <span class="d-none d-md-block"> <i class="fa fa-save"></i> {{ __("Finalizar") }}</span>
                <span class="d-block d-md-none"> <i class="fa fa-save"></i> </span>
            </button>
        </div>
    @endif

        @isset($btn_concluir)
            @if($btn_concluir)
                <div class=" mx-1">
                   @if($concluir && $concluir == $model->id)
                    <button
                        wire:click="concluirUpdate('{{$model->id}}')"
                        {!!  $column->merge([
                        'type' => 'button',
                        'class' => 'btn btn-block btn-sm icon btn-danger d-flex justify-content-center mx-1'
                        ]) !!}>
                        <span class="d-none d-md-block"> <i class="fa fa-save"></i> {{ __("Confirmar") }}</span>
                        <span class="d-block d-md-none"> <i class="fa fa-save"></i> </span>
                    </button>
                       @else
                        <button
                            wire:click="concluirUpdate('{{$model->id}}')"
                            {!!  $column->merge([
                            'type' => 'button',
                            'class' => 'btn btn-block btn-sm icon btn-warning d-flex justify-content-center mx-1'
                            ]) !!}>
                            <span class="d-none d-md-block"> <i class="fa fa-save"></i> {{ __("Concluir") }}</span>
                            <span class="d-block d-md-none"> <i class="fa fa-save"></i> </span>
                        </button>
                    @endif
                </div>
            @endif
        @endisset
    <div class=" mx-1">
        <a
            target="_blank"
            href="{{ route('admin.produtos.download', $model) }}"
            {!!  $column->merge([
            'type' => 'button',
            'class' => 'btn btn-block btn-sm icon btn-primary d-flex justify-content-center mx-1'
            ]) !!}>
            <span class="d-none d-md-block"> <i class="fa fa-file-pdf"></i> {{ __("Baixar PDF") }}</span>
            <span class="d-block d-md-none"> <i class="fa fa-file-pdf"></i> </span>
        </a>
    </div>
</div>
