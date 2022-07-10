<div>
    <!-- loader -->
    <div id="loader" wire:loading wire:target="saveAndGoBack">
        <img src="{{ asset('assets/admin/images/loader.gif') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Por favor imformar código de barras do produto') }}</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <div class="card">
                        <form class="card-body" wire:submit.prevent="saveAndGoBack">
                            @if (auth()->user()->isAdmin())
                                @if ($token)
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            {{ $token }}
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @if ($field = $gtin)
                                <div class="input-group">
                                    <input wire:model{{ $field->wire_model }}="{{ $field->key }}"
                                        {!! $field->merge(['class' => $field->class, 'id' => $field->name]) !!}>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit"
                                            wire:loading.attr="disabled">{{ __('Buscar') }}</button>
                                        <button class="btn btn-outline-danger" wire:click="closedepositActionSheet"
                                            wire:loading.attr="disabled" type="button"> {{ __('Cancelar') }}</button>
                                    </div>
                                </div>
                                <x-input-help :message="$field->help" :link="$field->link" />
                                <x-input-error :for="$field->key" />
                            @endif
                            <div>
                                @if (auth()->user()->isAdmin())
                                    <x-button type="button" wire:loading.attr="disabled" wire:click="gerarToken">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">{{ __('Gerar novo token') }}</span>
                                    </x-button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Deposit Action Sheet -->
</div>
