@if ($field !== $column->getAttribute())
    {{ new \Illuminate\Support\HtmlString($sortDefaultIcon) }}
@elseif ($direction === 'asc')
    {{ new \Illuminate\Support\HtmlString($ascSortIcon) }}
@else
    {{ new \Illuminate\Support\HtmlString($descSortIcon) }}
@endif
