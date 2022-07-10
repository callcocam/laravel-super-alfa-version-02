<div>
    <!-- loader -->
    <div style="position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 99999;
    background: rgba(39, 23, 62, 0.29);
    display: none;
    align-items: center;
    justify-content: center;
    text-align: center;" wire:loading wire:target="saveAndGoBack">
        <img src="{{ asset('assets/admin/images/loader.gif') }}" alt="icon" style="margin: calc(100vh - 50%) auto;
    width: 42px;
    height: auto;
    -webkit-animation: loadingAnimation 1s infinite;
    animation: loadingAnimation 1s infinite;">
    </div>
    <div style="position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 99999;
    background: rgba(39, 23, 62, 0.29);
    display: none;
    align-items: center;
    justify-content: center;
    text-align: center;" wire:loading wire:target="marketingStatus">
        <img src="{{ asset('assets/admin/images/loader.gif') }}" alt="icon" style="margin: calc(100vh - 50%) auto;
    width: 42px;
    height: auto;
    -webkit-animation: loadingAnimation 1s infinite;
    animation: loadingAnimation 1s infinite;">
    </div>
    <!-- * loader -->
    <form wire:submit.prevent="saveAndGoBack">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('FICHA CADASTRO DE PRODUTOS-COMPRAS') }}</h5>
            <a class="btn btn-danger" href="javascript:;" wire:click="closeModalForm('openPanelRightUpdate')"
                wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative p-md-5" style="max-height: calc(100vh - 150px);">
            @include('livewire.admin.compras.form-component')
            @if (data_get($form_data, 'ecommerce') === 'SIM')
                <button type="button" class="btn btn-success" wire:click="openModalLojaAction"
                        wire:loading.attr="disabled">
                    <span class="d-none d-sm-block">{{ __('Selecionar Lojas') }}</span>
                </button>
                @error('lojas')
                <div class="d-flex text-danger p-2">
                    {{$message}}
                </div>
                @enderror
            @endif
            <x-jet-validation-errors class="mb-4 text-danger"/>

        </div>

        <div class="modal-footer fixed-bottom bg-white justify-content-between">
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-warning float-start mr-4" wire:click="marketingStatus"
                    wire:loading.attr="disabled">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Enviar para o marketing') }}</span>
                </button>
                @if ($aquivar)
                    <button style="margin-right: 2px; margin-left: 5px" type="button"
                        class="btn btn-danger float-end mr-4" wire:click="arquivarStatus" wire:loading.attr="disabled">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ __('Tem certeza que deseja arquivar/excluir?') }}</span>
                    </button>
                @else
                    <button style="margin-right: 2px; margin-left: 5px" type="button"
                        class="btn btn-info float-end mr-4" wire:click="$set('aquivar', true)"
                        wire:loading.attr="disabled">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ __('Arquivar/Excluir') }}</span>
                    </button>
                @endif
                <button style="margin-right: 5px; margin-left: 5px" type="button" class="btn btn-danger"
                    wire:click="openModalRecusaAction" wire:loading.attr="disabled">
                    <span class="d-none d-sm-block">{{ __('Recusar') }}</span>
                </button>


            </div>
            <div>
                <button type="button" class="btn btn-light-secondary"
                    wire:click="closeModalForm('openPanelRightUpdate')" wire:loading.attr="disabled">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
                </button>

                <x-button type="submit" wire:loading.attr="disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Salvar as alterações') }}</span>
                </x-button>
            </div>
        </div>
    </form>
    <!-- Deposit Action Sheet -->
    <div class="modal fade" id="depositActionSheet011" tabindex="-1" role="dialog">
        <livewire:admin.compras.create-component :model="$model" />
    </div>
</div>
