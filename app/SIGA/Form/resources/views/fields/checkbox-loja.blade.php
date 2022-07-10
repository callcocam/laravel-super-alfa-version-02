@isset($search_checkbox)
    <div class="row">
        <div class="col-12 mb-2">
            <input wire:model.debounce.500ms="search_checkbox.{{ $field->name }}" type="search" class="form-control"
                placeholder="Buscar...">
        </div>
    </div>
@endisset
<ul class="list-unstyled mb-0 mt-4">
    @if ($field->options)
        @foreach ($field->options as $key => $value)
            <li class="d-block mb-1 w-full ">
                <div class="form-check">
                    <div class="custom-control custom-checkbox">
                        <input wire:model{{ $field->wire_model }}="{{ $field->key }}.{{ $key }}"
                            {!! $field->merge(['class' => 'form-check-input form-check-primary pl-2']) !!} name="customCheck" id="{{ $key }}">
                        <label
                            class="form-check-label mr-2 {{ isset($search_checkbox[$field->name]) && $search_checkbox[$field->name] && strchr(Str::upper($value), Str::upper($search_checkbox[$field->name])) ? ' text-danger' : '' }}"
                            for="{{ $key }}">{{ $value }}</label>
                    </div>
                </div>
            </li>
        @endforeach
    @else
    <li class="d-inline-block mb-1 w-25 ">Use o campo de busca para pesquisar</li>
    @endif
</ul>
