<tr  wire:sortable.item="{{ $model->id }}" wire:key="task-{{ $model->id }}"
class="table-{{
    $model->app == 'sim'?'success':''
    }}
    border border-{{
    $model->status != 'published'?'danger':''
    }}
    ">
   <td style="width: 10px;"  wire:sortable.handle>
        <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer"
        fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2" width="15">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
        </svg>
   </td>
    <td class="align-middle d-flex p-1 mb-1" style="width: 150px;" scope="row">
        @if ($this->created)
            <button class="btn btn-sm btn-primary me-2" wire:click="openShow('modal-{{ $model->id }}')">
                +
            </button>
            <div class="modal fade" id="modal-{{ $model->id }}" tabindex="-1" role="dialog">
                @livewire("admin.campanhas.produtos.show-component", ["model"=>$model], key(uniqid('codigo')))
            </div>
            {{-- <input  wire:model="form_data.codigo_interno" class="form-control" name="codigo_interno"  readonly/> --}}
            @if (isset($form_data['codigo_interno']) && $form_data['codigo_interno'])
                {{ $form_data['codigo_interno'] }}
            @endif
        @else
            <input readonly class="form-control" name="codigo_interno" autocomplete="of"
                wire:model.lazy="form_data.codigo_interno" />
        @endif
        @error('codigo_interno')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
        @if (isset($form_data['codigo_barras']) && $form_data['codigo_barras'])
          <br>  {{ $form_data['codigo_barras'] }}
        @endif
    </td>
    {{-- <td class="align-middle p-1 m-1">
        @if (isset($form_data['codigo_barras']) && $form_data['codigo_barras'])
            {{ $form_data['codigo_barras'] }}
        @endif
    </td> --}}
    <td class="align-middle p-1 m-1">
        {{-- @if ($this->edit_descricao) --}}
        {{-- @dd($this) --}}
        {{-- <input readonly  autocomplete="of" class="form-control"  name="descricao_comercial" id="descricao_comercial" wire:model.lazy="form_data.descricao_comercial"> --}}
        {{-- @else --}}
        @if (isset($form_data['descricao_comercial']) && $form_data['descricao_comercial'])
            {{ $form_data['descricao_comercial'] }}
        @endif
        {{-- @endif --}}
    </td>
    <td class="align-middle p-0 m-1">
        <textarea style="font-size: 12px!important;" class="form-control"
            wire:model.defer="form_data.descricao_auxiliar"></textarea>
        @error('form_data.descricao_auxiliar')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td>
    <td class="align-middle p-0 m-1">
        <input type="number" style="font-size: 12px!important;" step="1" min="0" class="form-control"
            wire:model.defer="form_data.qde_por_cx" />
        @error('form_data.qde_por_cx')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td>
    <td class="align-middle p-0 m-1">
        <input type="number" max="10" style="font-size: 12px!important;" rows="1" class="form-control"
            wire:model.defer="form_data.quantidade_parcelas" />
        @error('form_data.quantidade_parcelas')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td>
    <td class="align-middle p-0 m-1">
        {{-- {{data_get($form_data , 'tipo_embalagem')}} --}}
        <select style="font-size: 12px!important;" class="form-select" wire:model.lazy="form_data.tipo_embalagem">
            <option value="">==Selecione==</option>
             @if ($medidas)
                @foreach ($medidas as $medida)
                    <option value="{{ $medida['name'] }}">{{ $medida['name'] }}</option>
                @endforeach
            @endif
        </select>
        @error('form_data.tipo_embalagem')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td>
    <td class="align-middle p-0 m-1">
        <x-mask-input-currency name="preco_custo">
            <textarea x-ref="preco_custo" x-on:change="$dispatch('preco_custo', $refs.preco_custo.value)" id="preco_custo"
                style="font-size: 12px!important;" rows="1" class="form-control"
                wire:model.defer="form_data.preco_custo" onfocus="this.select();"></textarea>
        </x-mask-input-currency>
        @error('form_data.preco_custo')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td>
    <td class="align-middle p-0 m-1">
        <x-mask-input-currency name="preco_normal">
            <textarea x-ref="preco_normal" x-on:change="$dispatch('preco_normal', $refs.preco_normal.value)" id="preco_normal"
                style="font-size: 12px!important;" rows="1" class="form-control"
                wire:model.defer="form_data.preco_normal" onfocus="this.select();"></textarea>
        </x-mask-input-currency>
        @error('form_data.preco_normal')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td>
    <td class="align-middle p-0 m-1">
        <x-mask-input-currency name="preco_promocional">
            <textarea x-ref="preco_promocional" x-on:change="$dispatch('preco_promocional', $refs.preco_promocional.value)"
                id="preco_promocional" style="font-size: 12px!important;" rows="1" class="form-control"
                wire:model.defer="form_data.preco_promocional" onfocus="this.select();"></textarea>
        </x-mask-input-currency>
        @error('form_data.preco_promocional')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td>


    {{-- <td class="align-middle p-0 m-1"> --}}
    {{-- <x-mask-input-currency name="preco_caixa"> --}}
    {{-- <textarea --}}
    {{-- x-ref="preco_caixa" --}}
    {{-- x-on:change="$dispatch('preco_caixa', $refs.preco_caixa.value)" --}}
    {{-- id="preco_caixa" style="font-size: 12px!important;" rows="1" class="form-control" --}}
    {{-- wire:model.defer="form_data.preco_caixa" --}}
    {{-- onfocus="this.select();"></textarea> --}}
    {{-- </x-mask-input-currency> --}}
    {{-- @error('form_data.preco_caixa') --}}
    {{-- <span class="text-danger"> {{ $message }}</span> --}}
    {{-- @enderror --}}
    {{-- </td> --}}
    <td class="align-middle p-0 m-1">
        <input class="form-check-input mt-0 ms-2" type="checkbox" wire:model.lazy="form_data.tabloide">
        @error('form_data.tabloide')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td>
    {{-- <td class="align-middle p-0 m-1">
        <input class="form-check-input mt-0 ms-2" type="checkbox" wire:model.lazy="form_data.fracionado">
        @error('form_data.fracionado')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td> --}}
    <td class="align-middle p-0 m-1">
        <input class="form-check-input mt-0 ms-2" type="checkbox" wire:model.lazy="form_data.selo">
        @error('form_data.selo')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
        @if (data_get($form_data, 'selo'))
            <button class="btn btn-sm btn-success" title="Editar Selo"
                wire:click="openShow('modal-selo-{{ $model->id }}')"> ...
            </button>
            <div class="modal fade" id="modal-selo-{{ $model->id }}" tabindex="-1" role="dialog">
                @livewire("admin.campanhas.produtos.selo-component", ["model"=>$model], key(uniqid('selo')))
            </div>
        @endif
    </td>
    <td class="align-middle p-0 m-1">
        <input class="form-check-input mt-0 ms-2" type="checkbox" wire:model.lazy="app">
        @error('form_data.app')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
    </td>
    <td class="align-middle p-0 m-1">
        @if ($app)
        <x-mask-input-currency name="preco_app">
            <textarea x-ref="preco_app" x-on:change="$dispatch('preco_app', $refs.preco_app.value)" id="preco_app"
                style="font-size: 12px!important;" rows="1" class="form-control"
                wire:model.defer="form_data.preco_app" onfocus="this.select();"></textarea>
        </x-mask-input-currency>
        @error('form_data.preco_app')
            <span class="text-danger"> {{ $message }}</span>
        @enderror
        @endif
    </td>
    <td class="align-middle p-0 m-1">
        @if ($app)
            <x-mask-input-currency name="preco_desconto">
                <textarea x-ref="preco_desconto" x-on:change="$dispatch('preco_desconto', $refs.preco_desconto.value)"
                    id="preco_desconto" style="font-size: 12px!important;" rows="1" class="form-control"
                    wire:model.defer="form_data.preco_desconto" onfocus="this.select();"></textarea>
            </x-mask-input-currency>
            @error('form_data.preco_desconto')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        @endif
    </td>

    <td class="align-middle p-0 m-1">
        @if ($this->margem)
            {{ $margem }} %
        @endif
    </td>
    <td class="align-middle p-1 m-1">
        @if ($this->created)
            <button class="btn btn-sm btn-primary m" wire:click="saveAndStay" type="button"><i
                    class="fa fa-save"></i></button>
        @endif
    </td>
    <td class="align-middle p-1 m-1">
        @if ($this->created)
            <button class="btn btn-sm btn-danger" wire:click="removeItem" type="button">

                {{-- <i class="fa fa-trash"></i> --}}
                @if ($confirm)
                    {{ __('Confirmar') }}
                @else
                    <i class="fa fa-trash"></i>
                @endif
            </button>
        @endif
    </td>
    <td class="align-middle p-0 mb-1" scope="row">
        @if ($model->codigo_barras)
            <button class="btn btn-sm btn-success" wire:click="openShow('modal-children-{{ $model->id }}')">
                ...
            </button>
            <div class="modal fade" id="modal-children-{{ $model->id }}" tabindex="-1" role="dialog">
                @livewire("admin.campanhas.grupos-produtos.children-component", ["model"=>$model],
                key(uniqid('grupos')))
            </div>
        @endif
    </td>
</tr>
