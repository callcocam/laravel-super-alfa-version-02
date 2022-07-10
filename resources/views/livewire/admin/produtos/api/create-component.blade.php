<div class="card">
    <form class="card-body" wire:submit.prevent="saveAndGoBack">
        <x-loader/>
        <div class="divider">
            <div class="divider-text">{{ __('DADOS DO PRODUTO ERP') }}</div>
        </div>
        @if($token)
        <div class="row">
            <div class="col-md-12 mb-2">
               {{ $token }}
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 mb-2">
                @include('laravel-livewire-forms::fields.text',['field'=>$gtin])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                @include('laravel-livewire-forms::fields.select',['field'=>$portal])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                @include('laravel-livewire-forms::fields.select',['field'=>$ordemServico])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                @include('laravel-livewire-forms::fields.select',['field'=>$noAgreement])
            </div>
        </div>
        <div>
            <a  href="{{ route('dashboard') }}" class="btn btn-light-secondary"
                   wire:loading.attr="disabled">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
            </a>
            <x-button type="button" wire:loading.attr="disabled" wire:click="gerarToken">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Gerar novo token') }}</span>
            </x-button>
            <x-button type="submit" wire:loading.attr="disabled">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Buscar') }}</span>
            </x-button>
        </div>
    </form>
</div>
