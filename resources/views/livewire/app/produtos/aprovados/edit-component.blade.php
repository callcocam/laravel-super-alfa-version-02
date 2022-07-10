<div>
    <form wire:submit.prevent="saveAndGoBack">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('FICHA CADASTRO DE PRODUTOS APROVADOS') }}</h5>
            <a class="btn btn-danger" href="javascript:;"
               wire:click="closeModalForm('openPanelRightUpdate')" wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative p-md-5" style="max-height: calc(100vh - 150px);">
            @include("livewire.app.produtos.form-component")
        </div>
        <div class="modal-footer fixed-bottom bg-white">
            <button type="button" class="btn btn-light-secondary" wire:click="closeModalForm('openPanelRightUpdate')"  wire:loading.attr="disabled">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
            </button>
          <div>
              <x-warning-button type="button" wire:click.prevent="saveAndStatus"  wire:loading.attr="disabled">
                  <i class="bx bx-check d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">{{ __('Salvar & Enviar') }}</span>
              </x-warning-button>
              <x-button type="submit"  wire:loading.attr="disabled">
                  <i class="bx bx-check d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
              </x-button>
          </div>
        </div>
    </form>
</div>
