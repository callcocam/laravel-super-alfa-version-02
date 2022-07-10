<div class="modal-dialog modal-dialog-scrollable" role="document">
    <form wire:submit.prevent="saveAndGoBack" class="modal-content">
        <div class="modal-header ">
            <h5 class="modal-title">
            {{ $model->codigo_interno }} - {{ $model->descricao_comercial }}

            @if ($model->produto)
                @if ($produto_familia = $model->produto->familia_produtos->first())
                   - <a target="_blank" href="{{ route('admin.familia-produtos.show', $produto_familia) }}">Ver
                        Familia</a>
                @endif
            @endif
        </h5>
            <a class="btn btn-danger" href="javascript:;" wire:click="closeModalForm('{{ $model->id }}')"
                wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body">
            {{-- @if ($errors->any())
                <div class="row">
                    @foreach ($errors->all() as $key => $error)
                        <span style="padding: 10px 20px ; color:  red">{{ $error }} -
                            {{ $key }}</span>
                    @endforeach
                </div>
            @endif --}}
            <div class="row">
                <div class="col-12 col-md-6  mb-2">
                    @include('laravel-livewire-forms::fields.text', ['field' => $data_inicio])
                </div>
                <div class="col-12 col-md-6 mb-2">
                    @include('laravel-livewire-forms::fields.text', ['field' => $data_fim])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('laravel-livewire-forms::fields.checkbox-loja', [
                        'field' => $lojas,
                    ])
                </div>
            </div>
        </div>
        <div class="modal-footer bg-white justify-content-between">
            <x-button type="submit" wire:loading.attr="disabled">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
            </x-button>
        </div>
    </form>
</div>
