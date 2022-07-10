<div class="d-flex gap-2">
    @if (\Route::has($this->routeOrderCategory()))
        <a {!! $column->merge([
    'class' => 'btn btn-block btn-sm icon btn-success d-flex justify-content-center px-1',
    'href' => route($this->routeOrderCategory(), $model),
]) !!}>
            <span class="d-none d-md-block"> <i class="fa fa-move"></i> {{ __('Ordem') }}</span>
            <span class="d-block d-md-none"> <i class="fa fa-move"></i> </span>
        </a>
    @endif
    @if (\Route::has($this->routeOrder()))
        <a {!! $column->merge([
    'class' => 'btn btn-block btn-sm icon btn-success d-flex justify-content-center px-1',
    'href' => route($this->routeOrder(), $model),
]) !!}>
            <span class="d-none d-md-block"> <i class="fa fa-move"></i> {{ __('Ordem') }}</span>
            <span class="d-block d-md-none"> <i class="fa fa-move"></i> </span>
        </a>
    @endif
</div>
