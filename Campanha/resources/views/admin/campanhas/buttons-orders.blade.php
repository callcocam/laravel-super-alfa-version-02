<div class="d-flex gap-2">
    @if (\Route::has('admin.campanhas.produtos.order'))
        <a target="_blank"
            class="btn btn-sm icon btn-outline-success d-flex justify-content-center px-1 ms-2 mb-1"
            href="{{ route('admin.campanhas.produtos.order', $model) }}">
            <span class="d-none d-md-block"> {{ __('Ordem por produto') }}</span>
            {{-- <span class="d-block d-md-none"> <i class="fa fa-move"></i> </span> --}}
        </a>
    @endif
    @if (\Route::has('admin.campanhas.produtos.order.categoria'))
        <a target="_blank" class="btn btn-sm icon btn-outline-success  d-flex justify-content-center px-1 mb-1"
            href="{{ route('admin.campanhas.produtos.order.categoria', $model) }}">
            <span class="d-none d-md-block"> {{ __('Ordem por categoria') }}</span>
            {{-- <span class="d-block d-md-none"> <i class="fa fa-move"></i> </span> --}}
        </a>
    @endif
</div>