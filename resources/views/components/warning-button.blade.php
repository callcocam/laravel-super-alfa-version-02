<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-warning me-1 mb-1']) }}>
    {{ $slot }}
</button>
