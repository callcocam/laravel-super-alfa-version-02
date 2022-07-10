<div class="divider">
    <div class="divider-text">{{ __('DADOS DO PRODUTO') }}</div>
</div>
@include('includes.alert-atualizacao', ['modelUpdated' => $model->produto])
<div class="row">
    <div class="col-md-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['imagem'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['descricao_completa'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['cod_prod_fornecedor'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['categoria_produto'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['subcategoria'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-5 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['tipo_de_embalagem'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['volume_de_embalagem'],
        ])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['unidade_medida'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['fragrancia_sabor'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['segmento'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['subsegmento'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-5 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['marca'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['modelo'],
        ])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['cor'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['outras_especificacoes'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['mva_interno'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['mva_ajustado'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['tipo_de_frete'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-6 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['classif_fiscal_ncm'],
        ])
    </div>
    <div class="col-md-12 col-lg-6 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['qde_por_cx'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-7 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['cod_barras'],
        ])
    </div>
    <div class="col-md-12 col-lg-5 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['prazo_de_validade'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['peso_bruto_da_und'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['peso_liquido_da_und'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['preco_custo_un'],
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['altura_da_und'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['largura_da_und'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', [
            'field' => $produtos->array_fields['profundidade_da_und'],
        ])
    </div>
</div>
<div class="divider">
    <div class="divider-text">{{ __('DADOS LOGISTICOS e/ou EMBALAGENS SECUNDÁRIAS') }}</div>
</div>
<div class="row">
    @isset($embalagens)
        @foreach ($embalagens->array_fields as $array_field)
            <div class="col-md-12 col-lg-{{ $array_field->span }} mb-2">
                @include(sprintf('laravel-livewire-forms::fields.array.%s', $array_field->view))
            </div>
        @endforeach
    @endisset
</div>
<div class="divider">
    <div class="divider-text">{{ __('PREENCHIMENTO COOPERALFA') }}</div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-8 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select', [
            'field' => $produtos->array_fields['coperat_id'],
        ])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select', [
            'field' => $produtos->array_fields['cluster_id'],
        ])
    </div>
    @if ($model->produto->type == 'edit')
        <div class="col-md-12 col-lg-4 mb-2">
            @include('laravel-livewire-forms::fields.fieldset.text', ['field' => $codigo_interno])
        </div>
    @endif
    {{-- <div class="col-md-12 col-lg-6 mb-2"> --}}
    {{-- @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$conta_de_estoque_cooperate]) --}}
    {{-- </div> --}}
</div>

{{-- <div class="row">
    <div class="col-md-12 col-lg-6 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['tipo_de_embalagem_secundaria']])
    </div>
    <div class="col-md-12 col-lg-6 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['volume_de_embalagem_secundaria']])
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$produtos->array_fields['medida_embalagem_secundaria_id']])
    </div>
</div> --}}
<div class="row">
    <div class="col-md-12 col-lg-6 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', ['field' => $margem_do_produto])
    </div>
    <div class="col-md-12 col-lg-6 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', ['field' => $quantidade_minima_de_tranf])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-5 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', ['field' => $n_do_deposito_cd])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text', ['field' => $entrega_cd_ou_na_filial])
    </div>
    <div class="col-sm-12 col-md-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select', ['field' => $item_e_c_d])
    </div>
</div>
<div class="row">

    <div class="col-md-12 col-lg-6 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select', [
            'field' => $inclusao_na_linha_ou_substituicao_de_produto,
        ])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select', ['field' => $app])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select', ['field' => $ecommerce])
    </div>
</div>
@if (data_get($form_data, 'ecommerce') === 'SIM')
    <div class="row">
        <div class="col-md-12 mb-2">
            @include('laravel-livewire-forms::fields.fieldset.text', [
                'field' => $produtos->array_fields['maximo_de_unidade_por_compra'],
            ])
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-8  mb-2">
            <div class="row">
                @if (\Str::upper(data_get($form_data, 'produtos.unidade_medida')) === 'KG')
                    <div class="col-md-12 col-lg-6">
                        @include('laravel-livewire-forms::fields.fieldset.mask.klg', [
                            'field' => $produtos->array_fields['quantidade_minima_para_compra'],
                        ])
                    </div>
                    <div class="col-md-12 col-lg-6">
                        @include('laravel-livewire-forms::fields.fieldset.mask.klg', [
                            'field' => $produtos->array_fields['fracao_da_unidade_de_venda'],
                        ])
                    </div>


                @else
                    <div class="col-md-12 col-lg-12 mb-2">
                        @include('laravel-livewire-forms::fields.fieldset.text', [
                            'field' => $produtos->array_fields['estoque_mínimo_para_loja_fisica'],
                        ])
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 mb-2">
                @include('laravel-livewire-forms::fields.fieldset.text', [
                    'field' => $produtos->array_fields['percentual_sobre_estoque'],
                ])
            </div>
            <div class="col-sm-12 col-md-4 mb-2">
                @include('laravel-livewire-forms::fields.fieldset.text', [
                    'field' => $produtos->array_fields['quantidade_fixa_de_estoque'],
                ])
            </div>
            <div class="col-md-4 col-lg-4 mb-2">
                @include('laravel-livewire-forms::fields.fieldset.checkbox-ecommerce', [
                    'field' => $produtos->array_fields['integrar_estoque_com_quantidade_fixa'],
                ])
            </div>
            @error('error-add-group')
            <div class="col-md-12">
                 <span class="text-danger"> Você deve preencher o <b>Quantidade fixa de estoque</b> ou<b>Fração da unidade de venda</b> :(</span>
            </div>
            @enderror

        </div>
    </div>

@endif
@isset($form_data['inclusao_na_linha_ou_substituicao_de_produto'])
    @if ($form_data['inclusao_na_linha_ou_substituicao_de_produto'])
        <div class="row">
            <div class="col-md-12">
                @include('laravel-livewire-forms::fields.fieldset.text', [
                    'field' => $codigo_do_produto_a_ser_substituído,
                ])
            </div>
        </div>
    @endif
@endisset

<div class="row">
    <div class="col-md-12 mb-2">
        <livewire:admin.compras.lojas-component :model="$model" />
    </div>
</div>
