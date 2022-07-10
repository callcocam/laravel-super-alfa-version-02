<form class="card" wire:submit.prevent="saveAndGoBack">
    <div class="card-header">
        <h5 class="card-title">{{  $model->descricao_comercial }}</h5>
    </div>
    <div class="card-body">
        <x-loader/>
        <div class="row">
            <div class="col-md-2 mb-2">
                @include('laravel-livewire-forms::fields.text',['field'=>$altura])
            </div>
            <div class="col-md-2 mb-2">
                @include('laravel-livewire-forms::fields.text',['field'=>$largura])
            </div>
            <div class="col-md-2">
                @include('laravel-livewire-forms::fields.select',['field'=>$borda_produto_lamina])
            </div>
            <div class="col-md-2 mb-2">
                @include('laravel-livewire-forms::fields.color',['field'=>$cor_borda_produto_lamina])
            </div>
            <div class="col-md-2 mb-2">
                @include('laravel-livewire-forms::fields.color',['field'=>$cor_fundo_produto_lamina])
            </div>
            <div class="col-md-2 mb-2">
                @include('laravel-livewire-forms::fields.text',['field'=>$arredondamento_produto_lamina])
            </div>
            <div class="col-md-2 mb-2">
                @include('laravel-livewire-forms::fields.text',['field'=>$concatenacao_produto])
            </div>
            <div class="col-md-2">
                @include('laravel-livewire-forms::fields.select',['field'=>$template])
            </div>
            <div class="col-md-2">
                @include('laravel-livewire-forms::fields.file-fundoproduto',['field'=>$fundo])
            </div>

            <div class="col-md-1">
                <x-button type="button" wire:click="ressetImageBg" wire:loading.attr="disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Ressetar Imagem') }}</span>
                </x-button>
                <x-button type="submit" wire:loading.attr="disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
                </x-button>
            </div>
        </div>
    </div>
</form>

