<div>
    <!-- loader -->
    <div id="loader" wire:loading  wire:target="saveAndGoBackRecusa">
        <img src="{{ asset('assets/admin/images/loader.gif') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Por favor imformar motivo da recusa') }}</h5>
            </div>
            <div class="modal-body" style="max-height: 50%">
                <div class="action-sheet-content">
                    <form>
                        <div class="form-group basic">
                            @include('laravel-livewire-forms::fields.textarea',['field'=>$content])
                        </div>
                        <div class="form-group basic">
                            <button type="button" class="btn btn-secondary btn-text-secondary btn-lg" wire:click="closedepositActionSheet" wire:loading.attr="disabled">
                                {{ __('Cancelar') }}</button>
                            <button type="button" wire:click="saveAndGoBackRecusa" class="btn btn-primary btn-lg" wire:loading.attr="disabled">{{ __('Salvar e Enviar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- * Deposit Action Sheet -->
</div>
