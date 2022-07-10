<form wire:submit.prevent="saveAndGoBack">
    <div class="row">
        <div class="col-12 col-md-1 mb-2">
            <img class="img-thumbnail h-28 w-32" src="{{ $file->temporaryUrl() }}" alt="Capa">
        </div>
        <div class="col-md-3 mb-2">
            @include('laravel-livewire-forms::fields.hidden', [
                'field' => $produto_id,
            ])
            @include('laravel-livewire-forms::fields.text', [
                'field' => $codigo,
            ])
        </div>
        <div class="col-md-5 mb-2">
            @include('laravel-livewire-forms::fields.text', [
                'field' => $produto_name,
            ])
        </div>
        <div class="col-md-2 mb-2">
            @include('laravel-livewire-forms::fields.select', [
                'field' => $transparent,
            ])
        </div>
        <div class="col-md-1 mb-2  pt-4">
            <x-button type="submit" wire:loading.attr="disabled">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
            </x-button>
        </div>
    </div>
</form>
