<div>
    <!-- loader -->
    <div id="loader" wire:loading wire:target="saveAndGoBack">
        <img src="{{ asset('assets/admin/images/loader.gif') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->
    <form wire:submit.prevent="saveAndGoBack">
        <x-jet-validation-errors :errors="$errors" />
        <div class="modal-header">
            <h5 class="modal-title">{{ __('FICHA CADASTRO DE PRODUTOS-MARKETING') }}</h5>
            <a class="btn btn-danger" href="javascript:;" wire:click="closeModalForm('openPanelRightUpdate')"
                wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative p-md-5" style="max-height: calc(100vh - 150px);">
            @include("livewire.admin.marketing.form-component")
        </div>
        <div class="modal-footer fixed-bottom bg-white justify-content-between">
            <div class="justify-content-between">
                <button type="button" class="btn btn-warning float-start" wire:click="cadastroStatus"
                    wire:loading.attr="disabled">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Enviar para o cadastro') }}</span>
                </button>
                @if ($aquivar)
                    <button style="margin-right: 2px; margin-left: 5px" type="button"
                        class="btn btn-danger float-end mr-4" wire:click="arquivarStatus" wire:loading.attr="disabled">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ __('Tem certeza que deseja arquivar?') }}</span>
                    </button>
                @else
                    <button style="margin-right: 2px; margin-left: 5px" type="button"
                        class="btn btn-info float-end mr-4" wire:click="$set('aquivar', true)"
                        wire:loading.attr="disabled">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ __('Arquivar') }}</span>
                    </button>
                @endif
                <button style="margin-right: 2px; margin-left: 5px" type="button" class="btn btn-danger mr-4"
                    wire:click="openModalRecusaAction">
                    <span class="d-none d-sm-block">{{ __('Recusar') }}</span>
                </button>
                <button style="margin-right: 2px; margin-left: 5px" type="button" class="btn btn-success mr-4"
                    wire:click="openModalOploadAction">
                    <span class="d-none d-sm-block">{{ __('Alterar Foto') }}</span>
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
        <livewire:admin.marketing.create-component :model="$model" />
    </div>
    <!-- Deposit Action Sheet -->
    <div class="modal fade" id="depositActionSheet012" tabindex="-1" role="dialog">
        <livewire:admin.marketing.upload-component :model="$model" />
    </div>
</div>
