<button
    wire:click="openUpdated('{{$model->id}}')"
    {{ $attributes->merge([
    'type' => 'button',
    'class' => 'btn icon btn-warning'
    ]) }}>
    {{ $slot }}
</button>
