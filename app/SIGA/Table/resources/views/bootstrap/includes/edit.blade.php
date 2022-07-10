@if (\Route::has($this->routeEdit()))
    <a {!! $column->merge([
    'class' => 'btn btn-block btn-sm icon btn-warning d-flex justify-content-center px-1',
    'href'=>route($this->routeEdit(), $model)
]) !!}>
        <span class="d-none d-md-block"> <i class="fa fa-edit"></i> {{ __('Editar') }}</span>
        <span class="d-block d-md-none"> <i class="fa fa-edit"></i> </span>
    </a>
@else
    <button wire:click="openUpdated('{{ $model->id }}')" {!! $column->merge([
    'type' => 'button',
    'class' => 'btn btn-block btn-sm icon btn-warning d-flex justify-content-center px-1',
]) !!}>
        <span class="d-none d-md-block"> <i class="fa fa-edit"></i> {{ __('Editar') }}</span>
        <span class="d-block d-md-none"> <i class="fa fa-edit"></i> </span>
    </button>
@endif
