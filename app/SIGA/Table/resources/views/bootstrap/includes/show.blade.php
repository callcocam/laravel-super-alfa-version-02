<button
    wire:click="openUpdated('{{$model->id}}')"
    {!!  $column->merge([
    'type' => 'button',
    'class' => 'btn btn-block btn-sm icon btn-primary d-flex justify-content-center'
    ]) !!}>
    <span class="d-none d-md-block"> <i class="fa fa-eye"></i> {{ __("Visualizar") }}</span>
    <span class="d-block d-md-none"> <i class="fa fa-eye"></i> </span>
</button>
