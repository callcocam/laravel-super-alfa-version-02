<div>
    <form wire:submit.prevent="saveAndGoBack">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('FOTOS ADICIONAR') }}</h5>
            <a class="btn btn-light-secondary" href="javascript:;"
               wire:click="closeModalForm('openPanelRightUpdate')" wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative p-md-5" style="max-height: calc(100vh - 150px);">
            <x-loader/>
            <div class="row">
                <div class="col-md-4 col-sm-12 mb-2">
                    @include('laravel-livewire-forms::fields.hidden',['field'=>$produto_id])
                    @include('laravel-livewire-forms::fields.text',['field'=>$codigo])
                </div>

                <div class="col-md-8 col-sm-12 mb-2">                
                    @include('laravel-livewire-forms::fields.text',['field'=>$produto_name])
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12 mb-2">
                    @include('laravel-livewire-forms::fields.file-default',['field'=>$archive])
                </div>

                <div class="col-md-4 col-sm-12 mb-2">
                    @include('laravel-livewire-forms::fields.select',['field'=>$transparent])

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 mb-2">
                    @if ($file)
                    <img style="background: #b0ecc9" class="img-thumbnail" src="{{$file->temporaryUrl()}}" alt="Capa">
                    @else
                    <img  style="background: #b0ecc9" class="img-thumbnail" src="{{\Storage::url($model->archive)}}" alt="Capa">
                    @endif
                </div>
            </div>

        </div>
        <div class="modal-footer fixed-bottom bg-white justify-content-between">
            <button type="button" class="btn btn-light-secondary" wire:click="closeModalForm('openPanelRightUpdate')">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
            </button>
            <x-button type="submit" wire:loading.attr="disabled">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Editar Foto') }}</span>
            </x-button>
        </div>
    </form>
</div>

