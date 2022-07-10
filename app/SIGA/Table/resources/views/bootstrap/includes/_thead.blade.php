@foreach($columns as $column)
    @if ($column->isVisible() && $column->isHeadVisible())
        <th {{ $this->merge($this->setTableHeadAttributes($column->getAttribute())) }}
            @if($column->isSortable())
            wire:click="sort('{{ $column->getAttribute() }}')"
            style="cursor:pointer;"
            @endif
            @if($colspan = $column->colspan)
                colspan="{{ $colspan }}"
            @endif
        >
            @if($column->isSortable())
                @include(view_table_include('columns-attributes.sort'))
            @endif
            @lang($column->getText())
           </th>
    @endif
@endforeach
