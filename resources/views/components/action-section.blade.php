<div class="card" {{ $attributes }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="card-body">
        <div class="card-content">
            {{ $content }}
        </div>
    </div>
</div>
