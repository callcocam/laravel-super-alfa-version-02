<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary me-1 mb-1']) }}>
    {{ $slot }}
</button>
