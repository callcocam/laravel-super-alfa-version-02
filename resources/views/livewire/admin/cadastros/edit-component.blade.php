<div>
    <form wire:submit.prevent="saveAndGoBack">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('FICHA CADASTRO DE PRODUTOS') }}</h5>
            <a class="btn btn-light-secondary" href="javascript:;"
               wire:click="closeModalForm('openPanelRightUpdate')" wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative p-md-5" style="max-height: calc(100vh - 150px);">
            @include("includes.alert-atualizacao", ['modelUpdated'=>$model])
            <x-loader/>
            <div class="divider">
                <div class="divider-text">{{ __('DADOS DO PRODUTO') }}</div>
            </div>
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
                <div class="col-md-12 col-lg-6 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$tipo_de_embalagem_secundaria])
                </div>
                <div class="col-md-12 col-lg-6 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$volume_de_embalagem_secundaria])
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$medida_embalagem_secundaria_id])
                </div>
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

            <div class="row">
                <div class="col-md-12 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text', ['field' =>$compras->array_fields['app']])
                </div>
                <div class="col-md-12 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text', ['field' =>$compras->array_fields['ecommerce']])
                </div>
                <div class="col-md-12 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text', ['field' =>$maximo_de_unidade_por_compra])
                </div>
                <div class="col-md-12 col-lg-3 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text', ['field' =>$quantidade_minima_para_compra])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text', ['field' =>$fracao_da_unidade_de_venda])
                </div>

                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text', ['field' =>$percentual_sobre_estoque])
                </div>
                <div class="col-md-12 col-lg-4 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text', ['field' =>$estoque_mínimo_para_loja_fisica])
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text', ['field' =>$quantidade_fixa_de_estoque])
                </div>
                <div class="col-md-12 col-lg-6 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.checkbox-ecommerce', ['field' =>$integrar_estoque_com_quantidade_fixa])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-4 mb-2">
                    @if ($lojas = $model->lojas)
                        <h5>
                              LOJAS ECOMMERCE
                        </h5>
                        @foreach ($lojas as $loja)
                                <li>
                                    {{ $loja }}
                                </li>
                        @endforeach
                    @endif
                </div>
                    <div class="col-md-12 col-lg-4 mb-2">
                        @include('laravel-livewire-forms::fields.fieldset.select', [
                            'field' => $cluster_id,
                        ])
                    </div>
            </div>
{{--         se é app--}}
{{--            se é ecomerce--}}

{{--            <span>Máximo de unidade por compra:</span>--}}
{{--            {{ $produto->maximo_de_unidade_por_compra }}--}}

{{--            <span>Quantidade mínima para compra:</span>--}}
{{--            {{ $produto->quantidade_minima_para_compra }}--}}

{{--            <span>Fração da unidade de venda:</span>--}}
{{--            {{ $produto->fracao_da_unidade_de_venda }}--}}

{{--            <span>Quantidade fixa de estoque:</span>--}}
{{--            {{ $produto->quantidade_fixa_de_estoque }}--}}

{{--            <span>Percentual sobre estoque:</span>--}}
{{--            {{ $produto->percentual_sobre_estoque }}--}}

{{--            <span>Estoque mínimo para loja física:</span>--}}
{{--            {{ $produto->estoque_mínimo_para_loja_fisica }}--}}

{{--            <span>Integrar Estoque com quantidade fixa:</span>--}}
{{--            {{ $produto->integrar_estoque_com_quantidade_fixa }}--}}




            <div class="divider">
                <div class="divider-text">{{ __('DADOS MARKETING') }}</div>
            </div>
            <div class="row">
                @isset($marketing)
                    @foreach($marketing->array_fields as $array_field)
                        <div class="col-md-12 col-lg-{{ $array_field->span }} mb-2">
                            @include(sprintf('laravel-livewire-forms::fields.array.%s', $array_field->view))
                        </div>
                    @endforeach
                @endisset
            </div>
            <div class="row">
                <div class="col-sm-12 mb-2">
                    @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$compras->array_fields['codigo_interno']])
                </div>
            </div>
        </div>
        <div class="modal-footer fixed-bottom bg-white justify-content-between">
            <button type="button" class="btn btn-warning float-start" wire:click="estoqueStatus"  wire:loading.attr="disabled">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Finalizar cadastro') }}</span>
            </button>
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
