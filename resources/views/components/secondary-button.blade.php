<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-light-secondary me-1 mb-1']) }}>
    {{ $slot }}
</button>
