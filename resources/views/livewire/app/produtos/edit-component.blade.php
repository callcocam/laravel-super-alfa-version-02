<div>
    <!-- loader -->
    <div id="loader" wire:loading wire:target="saveAndGoBack">
        <img src="{{ asset('assets/admin/images/loader.gif') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->
    <form wire:submit.prevent="saveAndGoBack">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('FICHA CADASTRO DE PRODUTOS EM PROCESSO') }}</h5>
            @if ($this->routeEdit())
                <a class="btn btn-danger" href="{{ route('app.produtos') }}">{{ __('VOLTAR') }}</a>
            @else
                <a class="btn btn-danger" href="javascript:;" wire:click="closeModalForm('openPanelRightUpdate')"
                    wire:loading.attr="disabled">{{ __('Fechar') }}</a>
            @endif
        </div>
        <div class="  p-md-5" style="">
            @include('livewire.app.produtos.form-component')
        </div>
        <div class="modal-footer bg-white">
            @if ($this->routeEdit())
                <a class="btn btn-danger" href="{{ route('app.produtos') }}">{{ __('VOLTAR') }}</a>
            @else
                <button type="button" class="btn btn-light-secondary" wire:click="closeModalForm('openPanelRightUpdate')"
                    wire:loading.attr="disabled">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
                </button>
            @endif
            <div>
                <x-warning-button type="button" wire:click.prevent="saveAndStatus" wire:loading.attr="disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Salvar & Enviar') }}</span>
                </x-warning-button>
                <x-button type="submit" wire:loading.attr="disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
                </x-button>
            </div>
        </div>
    </form>
</div>
