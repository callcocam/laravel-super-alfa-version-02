<x-modalbox id="depositActionSheet0Loja12">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Por favor selecione as lojas') }}</h5>
                <a class="btn btn-danger" href="javascript:;" wire:click="closedepositActionSheetLoja"
                    wire:loading.attr="disabled">{{ __('Fechar') }}</a>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 150px);">
                <div class="action-sheet-content">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            @include('laravel-livewire-forms::fields.checkbox-loja', [
                                'field' => $lojas,
                            ])
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer fixed-bottom bg-white justify-content-between">
                <x-button type="button" wire:loading.attr="disabled" wire:click="saveAndGoBackLoja">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Confirmar Lojas') }}</span>
                </x-button>
            </div>
        </div>
    </div>
    <!-- * Deposit Action Sheet -->
</x-modalbox>
