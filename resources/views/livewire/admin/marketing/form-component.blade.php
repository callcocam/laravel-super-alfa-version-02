<x-loader/>
<div class="divider">
    <div class="divider-text">{{ __('DADOS DO PRODUTO!') }}</div>
</div>
@include("includes.alert-atualizacao", ['modelUpdated'=>$model->produto])
@if($model->produto->recusado_motivo)
    <div class="row border border-warning m-2 p-2">
        <div class="col-md-12">
           {{$model->produto->recusado_motivo}}
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['imagem']])
    </div>
{{--    <div class="col-md-2">--}}
{{--        <button type="button" class="btn btn-warning"--}}
{{--                wire:click="copiarParaArquivos()" wire:loading.attr="disabled">--}}
{{--            <i class="bx bx-x d-block d-sm-none"></i>--}}
{{--            <span class="d-none d-sm-block">{{ __('Copiar ppara arquivos') }}</span>--}}
{{--        </button>--}}
{{--    </div>--}}
</div>
<div class="row">
    <div class="col-md-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['descricao_completa']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['cod_prod_fornecedor']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['categoria_produto']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['subcategoria']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-5 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$produtos->array_fields['tipo_de_embalagem']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['volume_de_embalagem']])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$produtos->array_fields['unidade_medida']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['fragrancia_sabor']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['segmento']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['subsegmento']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-5 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['marca']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['modelo']])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['cor']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['outras_especificacoes']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['mva_interno']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['mva_ajustado']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['tipo_de_frete']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-6 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['classif_fiscal_ncm']])
    </div>
    <div class="col-md-12 col-lg-6 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['qde_por_cx']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-7 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['cod_barras']])
    </div>
    <div class="col-md-12 col-lg-5 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['prazo_de_validade']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['peso_bruto_da_und']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['peso_liquido_da_und']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['preco_custo_un']])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['altura_da_und']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['largura_da_und']])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$produtos->array_fields['profundidade_da_und']])
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
    @isset($compras)
        @foreach($compras->array_fields as $array_field)
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
    <div class="col-md-12 col-lg-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$produtos->array_fields['coperat_id']])
    </div>
    </div>
<div class="row">
    <div class="col-md-12 col-lg-12 mb-2 position-relative">
        @include('laravel-livewire-forms::fields.fieldset.textarea-erp',['field'=>$descricao_para_erp])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.textarea-com',['field'=>$descricao_comercial])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.textarea-encart',['field'=>$descricao_para_encarte])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$conta_nivel04])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$conta_nivel03])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$conta_nivel02])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$conta_nivel01])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$atributo01])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$atributo02])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$atributo03])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$atributo04])
    </div>
</div>
