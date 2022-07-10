<div class="modal-dialog modal-dialog-scrollable" role="document">
    <form class="modal-content" wire:submit.prevent="saveAndGoBack">
        <div class="modal-header ">
            <h5 class="modal-title">{{ $model->name }}</h5>
            <a class="btn btn-danger" href="javascript:;" wire:click="closeModalForm('{{ $model->id }}')"
                wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body">
            <x-jet-validation-errors :errors="$errors" />
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col-md-12 py-2">
                    @include('laravel-livewire-forms::fields.checkbox-default', [
                        'field' => $fracionado,
                    ])
                </div>
            </div>
            @if ($selos = $this->selos)
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($selos as $selo)
                        <div class="col-2" style="cursor: pointer">
                        @if (\Arr::has($form_data, sprintf('selo.%s', $selo->id)))
                                <img wire:click="removeSelo('{{ $selo->id }}')" src="{{ \Storage::url($selo->cover) }}"
                                    class="img-thumbnail border-success" alt="{{ $selo->name }}">
                            @else
                                <img wire:click="selectSelo('{{ $selo->id }}')"
                                    src="{{ \Storage::url($selo->cover) }}"
                                    class="img-thumbnail" alt="{{ $selo->name }}">
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="modal-footer">
            <x-button type="submit" wire:loading.attr="disabled">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Salvar as alterações') }}</span>
            </x-button>
        </div>
    </form>
</div>
