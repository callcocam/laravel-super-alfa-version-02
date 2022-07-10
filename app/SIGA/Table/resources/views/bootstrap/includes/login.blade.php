<button
    wire:click="login('{{$model->id}}')"
    {!!  $column->merge([
    'type' => 'button',
    'class' => 'btn btn-block btn-sm icon btn-success d-flex justify-content-center'
    ]) !!}>
    <span class="d-none d-md-block"> <i class="fa fa-user-alt"></i> {{ __("Logar") }}</span>
    <span class="d-block d-md-none"> <i class="fa fa-user-alt"></i> </span>
</button>
