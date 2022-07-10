<div {!! $attributes->merge([
    'class' => 'modal fade panelbox panelbox-right',
    'tabindex'=>'-1',
    'role' => 'dialog'
    ]) !!}>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           {{ $slot }}
        </div>
    </div>
</div>
