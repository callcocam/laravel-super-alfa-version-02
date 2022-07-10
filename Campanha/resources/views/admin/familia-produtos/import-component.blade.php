<form wire:submit.prevent="saveAndGoBack">
    <div class="modal-header">
        <h5 class="modal-title">Importar exel</h5>
    </div>
    <div class="modal-body p-md-5">
        <div class="row">



            @if ($field = \Arr::get($fields, 'arquivo'))
                <div class="col-sm-12 col-md-{{ $field->span }}">
                    <x-label fo="{{ $field->name }}">{{ __($field->label) }}:
                        @if (\Illuminate\Support\Str::contains('required', $field->rules))
                            <span class="text-danger">*</span>
                        @endif
                    </x-label>
                    <div class="form-group" x-data="{}">
                        <input wire:model{{ $field->wire_model }}="{{ $field->key }}" type="file"
                            id="{{ $field->name }}" ref="{{ $field->name }}">
                        <x-input-help :message="$field->help" />
                        <x-input-error :for="$field->key" />
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light-secondary">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
        </button>
        <x-button type="submit">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
        </x-button>
    </div>
</form>
