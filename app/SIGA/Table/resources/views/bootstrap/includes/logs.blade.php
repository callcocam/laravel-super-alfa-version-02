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
</div>
