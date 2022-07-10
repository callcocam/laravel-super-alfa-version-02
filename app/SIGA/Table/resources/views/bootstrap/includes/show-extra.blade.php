<div class="d-flex">
    <a target="_blank"
       href="{{ route('admin.campanhas.produtos.show', $model) }}"

        {!!  $column->merge([
        'type' => 'button',
        'class' => 'btn btn-block btn-sm icon btn-primary d-flex justify-content-center'
        ]) !!}>
        <span> Adicionar Produtos</span>

    </a>
@if(auth()->user()->hasAnyRole('super-admin', 'administrador-do-sistema'))

    <a
       href="{{ route('admin.campanhas.duplicar', $model) }}"

        {!!  $column->merge([
        'type' => 'button',
        'class' => 'btn btn-sm icon btn-info d-flex justify-content-center ms-3'
        ]) !!}>
        <span>Duplicar</span>

    </a>
    @endif

</div>
