<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="d-flex flex-column">
            <div class="modal-header ">
                <h5 class="modal-title">{{ __('Busque o produto que deseja incluir') }}</h5>
                <a class="btn btn-danger" href="javascript:;" wire:click="closeModalForm('{{ $model->id }}')"
                    wire:loading.attr="disabled">{{ __('Fechar') }}</a>
            </div>
            <div class="row mt-2 basic d-flex mx-4">
                <div class="col-sm-12">
                    {{ $model->codigo_interno }} - {{ $model->descricao_comercial }}

                    @if ($model->produto)
                        @if ($produto_familia = $model->produto->familia_produtos->first())
                           - <a target="_blank" href="{{ route('admin.familia-produtos.show', $produto_familia) }}">Ver
                                Familia</a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="row mt-2 basic d-flex mx-4">
                <div class="col-md-7 col-sm-12">
                    <input class="form-control" type="text" wire:model="search" placeholder="Busca por descrição ">
                </div>
                <div class="col-md-5 col-sm-12">
                    <input class="form-control" type="text" wire:model="codigo_interno" placeholder="Por Cód. Interno"
                        title="Por Cód. Interno">
                </div>
            </div>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <table class="table table-sm">
                        @foreach ($this->produtos as $produto)
                            @if ($produto->compra)
                                <tr>
                                    <td class="pb-0">
                                        <a href="javascript:;" title="Selecione este item para como produto único"
                                            wire:click="selectItem('{{ $produto->compra->codigo_interno }}')">{{ $produto->compra->codigo_interno }}
                                            - {{ Str::upper($produto->marketing->descricao_comercial) }}</a>

                                    </td>
                                </tr>
                                @if ($familia_produtos = $produto->familia_produtos)
                                    @foreach ($familia_produtos as $familia_produto)
                                        @if ($produto_familia = $familia_produto->produtos()->where('id', $familia_produto->getOriginal('pivot_produto_id'))->first())
                                            <tr class="border-2">
                                                <td class="py-1 text-danger d-flex justify-content-between">
                                                    <a title="Selecione este item para usar a familia desse produto"
                                                        class="text-danger" href="javascript:;"
                                                        wire:click="selectItem('{{ $produto_familia->compra->codigo_interno }}','{{ $familia_produto->id }}')">
                                                        SELECIONE Á FAMILIA: {{ $familia_produto->name }}
                                                    </a>
                                                    <a target="_blank"
                                                        href="{{ route('admin.familia-produtos.show', $familia_produto) }}">Ver
                                                        Familia</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
