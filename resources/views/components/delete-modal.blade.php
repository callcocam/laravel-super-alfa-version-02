<div {!! $attributes->merge([
    'class' => 'modal fade text-left',
    'tabindex'=>'-1',
    'role' => 'dialog',
    'id' => 'openPanelRightDelete',
    'aria-labelledby' => 'openPanelRightDelete',
    'aria-hidden' => 'true',
    ]) !!}>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
         role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white" id="myModalLabel4">{{ __('Excluir o registro') }}</h5>
                <button type="button" class="close" aria-label="Close"  wire:click="closeModalForm('openPanelRightDelete')">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    {{ $slot }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"  wire:click="closeModalForm('openPanelRightDelete')">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
                </button>
                <button type="button" class="btn btn-primary ml-1" wire:click="deleteModel">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Confirmar') }}</span>
                </button>
            </div>
        </div>
    </div>
</div>
