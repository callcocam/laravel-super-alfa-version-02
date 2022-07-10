<div>
    <form wire:submit.prevent="saveAndGoBack">
        @include("includes.alert-atualizacao", ['modelUpdated'=>$model])
        <div class="modal-header">
            <h5 class="modal-title">{{ __('FICHA CADASTRO DE PRODUTOS') }}</h5>
            <a class="btn btn-danger" href="javascript:;"
               wire:click="closeModalForm('openPanelRightUpdate')" wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative p-md-5" style="max-height: calc(100vh - 150px);">
            <x-loader/>
            <div class="divider">
                <div class="divider-text">{{ __('DADOS DO PRODUTO') }}</div>
            </div>
            @if($model->recusado_motivo)
            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.textarea',['field'=>$recusado_motivo])
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$imagem])
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$descricao_completa])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$cod_prod_fornecedor])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$categoria_produto])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$subcategoria])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$coperat])
                </div>
                <div class="col-md-12 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$tipo_de_embalagem])
                </div>
                <div class="col-md-12 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$volume_de_embalagem])
                </div>
                <div class="col-md-12 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$unidade_medida])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$fragrancia_sabor])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$segmento])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$subsegmento])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-5 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$marca])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$modelo])
                </div>
                <div class="col-md-12 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$cor])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$outras_especificacoes])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$mva_interno])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$mva_ajustado])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$tipo_de_frete])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$classif_fiscal_ncm])
                </div>
                <div class="col-md-12 col-lg-6 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$qde_por_cx])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-7 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$cod_barras])
                </div>
                <div class="col-md-12 col-lg-5 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$prazo_de_validade])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$peso_bruto_da_und])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$peso_liquido_da_und])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$preco_custo_un])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$altura_da_und])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$largura_da_und])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$profundidade_da_und])
                </div>
            </div>
            <div class="divider">
                <div class="divider-text">{{ __('DADOS LOGISTICOS e/ou EMBALAGENS SECUNDÁRIAS') }}</div>
            </div>
            <div class="row">
                @isset($embalagens)
                    @foreach($embalagens->array_fields as $array_field)
                        <div class="col-md-12 col-lg-{{ $array_field->span }} mb-2">
                            @include(sprintf('laravel-livewire-forms::fields.array.%s', $array_field->view))
                        </div>
                    @endforeach
                @endisset
            </div>
            <div class="divider">
                <div class="divider-text">{{ __('DADOS COMPRAS') }}</div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$compras->array_fields['margem_do_produto']])
                </div>
                <div class="col-sm-12 col-md-6 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$compras->array_fields['quantidade_minima_de_tranf']])
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$compras->array_fields['n_do_deposito_cd']])
                </div>
                <div class="col-sm-12 col-md-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$compras->array_fields['entrega_cd_ou_na_filial']])
                </div>
                <div class="col-sm-12 col-md-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$compras->array_fields['item_e_c_d']])
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$compras->array_fields['inclusao_na_linha_ou_substituicao_de_produto']])
                </div>
            </div>

            <div class="divider">
                <div class="divider-text">{{ __('DADOS MARKETING') }}</div>
            </div>
            <div class="row">
                @isset($marketings)
                    @foreach($marketings->array_fields as $array_field)
                        <div class="col-md-12 col-lg-{{ $array_field->span }} mb-2">
                            @include(sprintf('laravel-livewire-forms::fields.array.%s', $array_field->view))
                        </div>
                    @endforeach
                @endisset
            </div>
            <div class="row">
                <div class="col-sm-12 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$codigo_interno])
                </div>
            </div>
        </div>
        <div class="modal-footer fixed-bottom bg-white justify-content-between">
            <div>
                <button type="button" class="btn btn-light-secondary" wire:click="closeModalForm('openPanelRightUpdate')"  wire:loading.attr="disabled">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
                </button>
                <a class="btn btn-primary" target="_blank" href="{{ route('admin.produtos.download', $model) }}">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Baixar PDF') }}</span>
                </a>
            </div>
        </div>
    </form>
</div>
