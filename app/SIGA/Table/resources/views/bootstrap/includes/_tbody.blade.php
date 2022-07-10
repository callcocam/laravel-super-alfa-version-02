@foreach($models as $model)
   @if($this->visible($model))
    <tr {{ $this->merge($this->setTableRowAttributes($model)) }}

        @if ($this->getTableRowUrl($model))
        onclick="window.location = '{{ $this->getTableRowUrl($model) }}';"
        style="cursor: pointer"
        @endif >
        @if($checkbox && $checkbox_side == 'left')
            @include(view_table_include('checkbox-row'))
        @endif
        @foreach($columns as $column)
            @if ($column->isVisible($model))
                <td {!! $this->merge($this->setTableDataAttributes($column->getAttribute(), data_get($model, $column->getAttribute()))) !!} >
                    @if ($column->isFormatted())
                        @if ($column->isRaw())
                            {!! $column->formatted($model, $column) !!}
                        @else
                            {{ $column->formatted($model, $column) }}
                        @endif
                    @elseif($column->isView())
                        @include($column->getView())
                    @else
                        @if ($column->isRaw())
                        {!! data_get($model, $column->getAttribute()) !!}
                        @else
                      {{ data_get($model, $column->getAttribute()) }}
                        @endif
                    @endif
                </td>
            @endif
        @endforeach
            @if($checkbox && $checkbox_side == 'right')
                @include(view_table_include('checkbox-row'))
            @endif
    </tr>
   @endif
@endforeach
