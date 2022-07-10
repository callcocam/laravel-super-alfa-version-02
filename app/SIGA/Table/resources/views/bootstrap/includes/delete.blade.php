<button
    wire:click="openDelete('{{$model->id}}')"
    {!! $column->merge([
    'type' => 'button',
    'class' => 'btn btn-block btn-sm icon btn-danger d-flex justify-content-center px-1'
    ]) !!}>
    <span class="d-none d-md-block"> <i class="fa fa-trash"></i> {{ __("Excluir") }}</span>
    <span class="d-block d-md-none"> <i class="fa fa-trash"></i> </span>
</button>
