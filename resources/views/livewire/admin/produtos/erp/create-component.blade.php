<div class="card">
    <form class="card-body" wire:submit.prevent="saveAndGoBack">
        <x-loader/>
        <div class="divider">
            <div class="divider-text">{{ __('DADOS DO PRODUTO ERP') }}</div>
        </div>
        <div class="row">
            <div class="col-md-5 mb-2">
                @include('laravel-livewire-forms::fields.text',['field'=>$codigo_interno])
            </div>
            <div class="col-md-7 mb-2">
                @include('laravel-livewire-forms::fields.text',['field'=>$cod_barras])
            </div>
            <div class="col-md-5 mb-2">
                @include('laravel-livewire-forms::fields.select',['field'=>$codigo])
            </div>            
            <div class="col-md-7 mb-2">
                @include('laravel-livewire-forms::fields.select',['field'=>$user_id])
            </div>                       
            <div class="col-md-12 mb-2">
                @include('laravel-livewire-forms::fields.textarea',['field'=>$descricao_completa])
            </div>               
            <div class="col-md-12 mb-2">
                @include('laravel-livewire-forms::fields.textarea-encart',['field'=>$descricao_para_encarte])
            </div>
        </div>
        <div>
            <a  href="{{ route('dashboard') }}" class="btn btn-light-secondary"
                   wire:loading.attr="disabled">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
            </a>

            <x-button type="submit" wire:loading.attr="disabled">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Salvar as alterações') }}</span>
            </x-button>
        </div>
    </form>
</div>
