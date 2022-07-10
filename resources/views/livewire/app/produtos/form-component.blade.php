@include("includes.alert-atualizacao", ['modelUpdated'=>$model])
{{--<div class="divider">--}}
{{--    <div class="divider-text">{{ __('DADOS DO PRODUTO EM PROCESSO') }}</div>--}}
{{--</div>--}}
{{--<div wire:loading wire:target="saveAndGoBack">--}}
{{--    <div class="alert alert-danger mx-3" role="alert">--}}
{{--        Aguarde...--}}
{{--    </div>--}}
{{--</div>--}}
<div class="align-items-center" id="loader" wire:loading style=" display: none;"  wire:target="saveAndGoBack">
    <img src="{{ asset('assets/admin/images/loader.gif') }}" alt="icon" class="loading-icon">
</div>
{{-- <div class="row">
    <div class="col-md-12">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$type])
    </div>
</div> --}}
<div class="row">
    <div class="col-md-12">
        @include('laravel-livewire-forms::fields.fieldset.file',['field'=>$imagem])
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$descricao_completa])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$cod_prod_fornecedor])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$coperat_id])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$categoria_produto])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$subcategoria])
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
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$fragrancia_sabor])
    </div>
    <div class="col-md-12 col-lg-5 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$segmento])
    </div>
    <div class="col-md-12 col-lg-3 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$subsegmento])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$tipo_de_embalagem])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$volume_de_embalagem])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.select',['field'=>$unidade_medida])
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
        @include('laravel-livewire-forms::fields.fieldset.mask.medidas',['field'=>$peso_bruto_da_und])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.mask.medidas',['field'=>$peso_liquido_da_und])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.text',['field'=>$preco_custo_un])
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.mask.centimetros',['field'=>$altura_da_und])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.mask.centimetros',['field'=>$largura_da_und])
    </div>
    <div class="col-md-12 col-lg-4 mb-2">
        @include('laravel-livewire-forms::fields.fieldset.mask.centimetros',['field'=>$profundidade_da_und])
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
