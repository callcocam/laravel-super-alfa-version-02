<tr>
    @if ($arrayFields = Arr::get($fields, $modal))
        <td class="align-middle p-1 mb-1" scope="row">
            @if ($field = Arr::get($arrayFields->array_fields, 'codigo_interno'))
                <button type="button" class="btn btn-primary btn-sm"
                    wire:click="openShow('{{ $modal }}')">+</button>
                <div class="modal fade" id="{{ $modal }}" tabindex="-1" role="dialog">
                    @livewire("admin.cartaz.produtos-component",['modal'=>$modal])
                </div>
            @endif
        </td>
        <td class="align-middle p-1 m-1">
            @if ($field = Arr::get($arrayFields->array_fields, 'codigo_barras'))
                <input type="text" readonly class="{{ $field->class }}" id="{{ $field->key }}"
                    name="{{ $modal }}[{{ $field->name }}]"
                    wire:model{{ $field->wire_model }}="{{ $field->key }}">
                <x-input-help :message="$field->help" />
                <x-input-error :for="$field->key" />
            @endif
            @if ($field = Arr::get($arrayFields->array_fields, 'produto_id'))
                <input type="hidden" class="{{ $field->class }}" id="{{ $field->key }}"
                    name="{{ $modal }}[{{ $field->name }}]"
                    wire:model{{ $field->wire_model }}="{{ $field->key }}">
            @endif
                @if ($field = Arr::get($arrayFields->array_fields, 'validado'))
                    <input type="hidden" class="{{ $field->class }}" id="{{ $field->key }}"
                           name="{{ $modal }}[{{ $field->name }}]"
                           wire:model{{ $field->wire_model }}="{{ $field->key }}">
                @endif
        </td>
        <td class="align-middle p-1 mb-1" style="width: 120px;" scope="row">
            @if ($field = Arr::get($arrayFields->array_fields, 'descricao_comercial'))
                <input type="text" readonly class="{{ $field->class }}" id="{{ $field->key }}"
                    name="{{ $modal }}[{{ $field->name }}]"
                    wire:model{{ $field->wire_model }}="{{ $field->key }}">
                <x-input-help :message="$field->help" />
                <x-input-error :for="$field->key" />
            @endif
        </td>
        <td class="align-middle p-1 m-1">
            @if ($field = Arr::get($arrayFields->array_fields, 'observacoes'))
                <input type="text" class="{{ $field->class }}" id="{{ $field->key }}"
                    name="{{ $modal }}[{{ $field->name }}]"
                    wire:model{{ $field->wire_model }}="{{ $field->key }}">
                <x-input-help :message="$field->help" />
                <x-input-error :for="$field->key" />
            @endif
        </td>
        <td class="align-middle p-1 m-1">
            @if ($field = Arr::get($arrayFields->array_fields, 'qde_por_cx'))
                <input type="text" class="{{ $field->class }}" id="{{ $field->key }}"
                    name="{{ $modal }}[{{ $field->name }}]"
                    wire:model{{ $field->wire_model }}="{{ $field->key }}">
                <x-input-help :message="$field->help" />
                <x-input-error :for="$field->key" />
            @endif
        </td>
        <td class="align-middle p-1 m-1">
            @if ($field = Arr::get($arrayFields->array_fields, 'quantidade_parcelas'))
                <input type="text" class="{{ $field->class }}" id="{{ $field->key }}"
                    name="{{ $modal }}[{{ $field->name }}]"
                    wire:model{{ $field->wire_model }}="{{ $field->key }}">
                <x-input-help :message="$field->help" />
                <x-input-error :for="$field->key" />
            @endif
        </td>
        <td class="align-middle p-1 m-1">
            @if ($field = Arr::get($arrayFields->array_fields, 'embalagens'))
                <div class="form-group">
                    <select class="{{ $field->class }}" id="{{ $field->key }}"
                        name="{{ $modal }}[{{ $field->name }}]"
                        wire:model{{ $field->wire_model }}="{{ $field->key }}">
                        <option value="">=={{ __('Selecione') }}==</option>
                        @if ($field->options)
                            @foreach ($field->options as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        @endif
                    </select>
                    <x-input-help :message="$field->help" />
                    <x-input-error :for="$field->key" />
                </div>
            @endif
        </td>

        <td class="align-middle p-1 m-1">
            @if ($field = Arr::get($arrayFields->array_fields, 'preco_normal'))
                <x-mask-input-currency name="{{ $modal }}[{{ $field->name }}]" ref="{{ $field->name }}">
                    <input x-ref="{{ $field->name }}"
                        x-on:change="$dispatch('{{ $modal }}{{ $field->name }}', $refs.{{ $field->name }}.value)"
                        onfocus="this.select();" class="{{ $field->class }}" id="{{ $field->key }}"
                        name="{{ $modal }}[{{ $field->name }}]"
                        wire:model{{ $field->wire_model }}="{{ $field->key }}" />
                </x-mask-input-currency>
                <x-input-help :message="$field->help" />
                <x-input-error :for="$field->key" />
            @endif
        </td>

        <td class="align-middle p-1 m-1">
            @if ($field = Arr::get($arrayFields->array_fields, 'preco_promocional'))
                <x-mask-input-currency name="{{ $modal }}[{{ $field->name }}]" ref="{{ $field->name }}">
                    <input x-ref="{{ $field->name }}"
                        x-on:change="$dispatch('{{ $modal }}{{ $field->name }}', $refs.{{ $field->name }}.value)"
                        onfocus="this.select();" class="{{ $field->class }}" id="{{ $field->key }}"
                        name="{{ $modal }}[{{ $field->name }}]"
                        wire:model{{ $field->wire_model }}="{{ $field->key }}" />
                </x-mask-input-currency>
                <x-input-help :message="$field->help" />
                <x-input-error :for="$field->key" />
            @endif
        </td>
        <td class="align-middle p-1 m-1">
            @if ($field = Arr::get($arrayFields->array_fields, 'app'))
                @if ($field->options)
                    <ul class="list-unstyled mb-0">
                        @foreach ($field->options as $key => $value)
                            <li class="d-inline-block ms-2 mb-1">
                                <div class="form-check">
                                    <div class="custom-control custom-checkbox">
                                        <input type="radio" class="form-check-input form-check-primary"
                                            id="{{ $field->key }}" name="{{ $modal }}[{{ $field->name }}]"
                                            wire:model="{{ $field->key }}" value="{{ $key }}">
                                        <label class="form-check-label"
                                            for="{{ $key }}">{{ $value }}</label>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            @endif
        </td>
        <td class="align-middle p-1 m-1">
            @if ($field = Arr::get($arrayFields->array_fields, 'preco_app'))
                <x-mask-input-currency name="{{ $modal }}[{{ $field->name }}]" ref="{{ $field->name }}">
                    <input x-ref="{{ $field->name }}"
                        x-on:change="$dispatch('{{ $modal }}{{ $field->name }}', $refs.{{ $field->name }}.value)"
                        onfocus="this.select();" class="{{ $field->class }}" id="{{ $field->key }}"
                        name="{{ $modal }}[{{ $field->name }}]"
                        wire:model{{ $field->wire_model }}="{{ $field->key }}" />
                </x-mask-input-currency>
                <x-input-help :message="$field->help" />
                <x-input-error :for="$field->key" />
            @endif
        </td>
        <td class="align-middle p-1 m-1">
            @if (data_get($form_data, sprintf('%s.produto_id', $modal)))
                <button type="button" class="btn btn-success btn-sm"
                    wire:click="openShow('{{ $modal }}-chidren')">+</button>
                <div class="modal fade" id="{{ $modal }}-chidren" tabindex="-1" role="dialog">
                    @livewire("admin.cartaz.children-component", compact('form_data','modal'))
                </div>
            @endif
        </td>
{{--        <td>--}}
{{--            <button class="btn btn-sm m-1 p-1 btn-primary" wire:click="saveAndGoBack" type="button"--}}
{{--                    wire:loading.attr="disabled">--}}
{{--                <i class="bx bx-check d-block d-sm-none"></i>--}}
{{--                <span class="d-none d-sm-block">{{ __('Validar') }}</span>--}}
{{--            </button>--}}
{{--        </td>--}}
    @endif
</tr>
