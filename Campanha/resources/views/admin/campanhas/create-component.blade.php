<div>
    <form wire:submit.prevent="saveAndGoBack">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('CAMPANHAS ADICIONAR') }}</h5>
            <a class="btn btn-danger" href="javascript:;" wire:click="closeModalForm('openPanelRightCreate')" wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative p-md-5" style="max-height: calc(100vh - 150px);">
            <x-loader />
            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('laravel-livewire-forms::fields.text',['field'=>$nome])
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4  mb-2">
                    @include('laravel-livewire-forms::fields.text',['field'=>$data_inicio])
                </div>
                <div class="col-12 col-md-4 mb-2">
                    @include('laravel-livewire-forms::fields.text',['field'=>$data_fim])
                </div>
                <div class="col-12 col-md-4 mb-2">
                    @include('laravel-livewire-forms::fields.text',['field'=>$quantidade_estimada])
                </div>
                <div class="col-12 col-md-4 mb-2">
                    @include('laravel-livewire-forms::fields.select',['field'=>$status])
                </div>
                <div class="col-12 col-md-8 mb-2">
                    @include('laravel-livewire-forms::fields.select',['field'=>$type])
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-2">
                    @include('laravel-livewire-forms::fields.checkbox',['field'=>$coperats])
                </div>
                <div class="col-12 col-md-6 mb-2">
                    @include('laravel-livewire-forms::fields.checkbox-loja',['field'=>$lojas])
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