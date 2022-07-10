<div>
    <form wire:submit.prevent="saveAndGoBack">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('CAMPANHA EDITAR') }}</h5>
            <a class="btn btn-danger" href="javascript:;" wire:click="closeModalForm('openPanelRightUpdate')" wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative" style="max-height: calc(100vh - 150px);">
            <x-loader />
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8 mb-2">
                            @include('laravel-livewire-forms::fields.text',['field'=>$nome])
                        </div>
                        <div class="col-md-4 mb-2">
                            @include('laravel-livewire-forms::fields.select',['field'=>$type])
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
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-2">
                            @include('laravel-livewire-forms::fields.checkbox',['field'=>$coperats])
                        </div>
                        <div class="col-12 col-md-6 mb-2">
                            @include('laravel-livewire-forms::fields.checkbox-loja',['field'=>$lojas])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            @include('laravel-livewire-forms::fields.select',['field'=>$exibir_borda_produto_lamina])
                        </div>
                        <div class="col-md-4 mb-2">
                            @include('laravel-livewire-forms::fields.text',['field'=>$tamanho_borda_produto_lamina])
                        </div>
                        <div class="col-md-4 mb-2">
                            @include('laravel-livewire-forms::fields.text',['field'=>$tamanho_arredondamento_produto_lamina])
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 mb-2">
                            @include('laravel-livewire-forms::fields.radio',['field'=>$status])
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer fixed-bottom bg-white justify-content-between">
                <x-button type="submit" wire:loading.attr="disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
                </x-button>
            </div>
        </div>
    </form>
</div>