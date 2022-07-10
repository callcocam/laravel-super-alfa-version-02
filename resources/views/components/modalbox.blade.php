<div {!! $attributes->merge([
    'class' => 'modal fade modalbox',
    'tabindex'=>'-1',
    'role' => 'dialog'
    ]) !!}>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
