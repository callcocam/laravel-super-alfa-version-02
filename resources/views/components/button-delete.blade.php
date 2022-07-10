<button
    wire:click="openDelete('{{$model->id}}')"
    {{ $attributes->merge([
    'type' => 'button',
    'class' => 'btn icon btn-danger'
    ]) }}>
    {{ $slot }}
</button>
