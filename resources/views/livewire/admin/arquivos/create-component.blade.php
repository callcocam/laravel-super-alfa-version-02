<div>
    <form wire:submit.prevent="saveAndGoBack">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('ARQUIVOS ADICIONAR') }}</h5>
            <a class="btn btn-light-secondary" href="javascript:;"
               wire:click="closeModalForm('openPanelRightCreate')" wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative p-md-5" style="max-height: calc(100vh - 150px);">
            <x-loader/>
            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('laravel-livewire-forms::fields.text',['field'=>$produto_id])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('laravel-livewire-forms::fields.text',['field'=>$name])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('laravel-livewire-forms::fields.file-default',['field'=>$archive])
                </div>
            </div>
        </div>
        <div class="modal-footer fixed-bottom bg-white justify-content-between">
            <button type="button" class="btn btn-light-secondary" wire:click="closeModalForm('openPanelRightCreate')">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
            </button>
            <x-button type="submit" wire:loading.attr="disabled">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
            </x-button>
        </div>
    </form>
</div>

