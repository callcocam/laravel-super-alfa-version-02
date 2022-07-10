<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="d-flex flex-column">
            <div class="modal-header d-flex">
                <span class="d-flex flex-column">
                    @if ($model)
                        <h5 class="modal-title">{{ $model->descricao_completa }} </h5>
                    @endif
                </span>
                <a class="btn btn-danger" href="javascript:;" wire:click="closeModalForm('{{ $modal }}-chidren')"
                    wire:loading.attr="disabled">{{ __('Fechar') }}</a>

            </div>
            <div class="form-group basic mx-4 mt-2">
                @if ($countItems < 3)
                    <input class="form-control" type="text" wire:model="codigo_interno"
                        placeholder="Digite uma descrição para o produto">
                @endif
            </div>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <ul class="list-group">
                        @error('error-add-group')
                            <li class="list-group-item text-sm d-flex" title="{{ $message }}">
                                <span class="text-danger"> {{ $message }}</span>
                            </li>
                        @enderror
                        @if ($selecionados)
                            @foreach ($selecionados as $pr)
                                <li class="list-group-item text-sm d-flex" title="{{ $pr->descricao_completa }}">
                                    <input wire:model="form_data.grupos.{{$modal}}.{{ $pr->id }}"
                                        id="form-check-input-{{ $pr->id }}" class="form-check-input me-1"
                                        type="checkbox" value="{{ $pr->id }}">
                                    <label for="form-check-input-{{ $pr->id }}"
                                        class="d-flex flex-column justify-content-start">
                                        {{ $pr->compra->codigo_interno }} -
                                        {{ \Illuminate\Support\Str::limit($pr->descricao_completa, 50) }}
                                    </label>
                                </li>
                            @endforeach
                        @endif
                        <li class="list-group-item text-sm d-flex">
                            <span class="divider"> </span>
                        </li>
                        @if ($countItems < 3)
                            @if ($produtos)
                                @foreach ($produtos as $pr)
                                    <li class="list-group-item text-sm d-flex" title="{{ $pr->descricao_completa }}">
                                        <input wire:model="form_data.grupos.{{$modal}}.{{ $pr->id }}"
                                            id="form-check-input-{{ $pr->id }}" class="form-check-input me-1"
                                            type="checkbox" value="{{ $pr->id }}">
                                        <label for="form-check-input-{{ $pr->id }}"
                                            class="d-flex flex-column justify-content-start">
                                            {{ $pr->compra->codigo_interno }} -
                                            {{ \Illuminate\Support\Str::limit($pr->descricao_completa, 50) }}
                                        </label>
                                    </li>
                                @endforeach
                            @endif
                        @else
                            <li class="list-group-item text-sm d-flex">
                              Limite de 3 Itens Parceiros
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
