<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="d-flex flex-column">
            <div class="modal-header d-flex">
                <span class="d-flex flex-column">
                    <h5 class="modal-title">{{ $model->descricao_comercial }} </h5>
                    <!-- <p class="modal-subtitle">{{ $model->coperat_id }}</p> -->
                </span>
                <a class="btn btn-danger" href="javascript:;"
                    wire:click="closeModalForm('modal-children-{{ $model->id }}')"
                    wire:loading.attr="disabled">{{ __('Fechar') }}</a>

            </div>
            @if (!$model->produtos_familia->count())
                <div class="row mt-2 basic d-flex mx-4">
                    <div class="col-md-8 col-sm-12">
                        <input class="form-control" type="text" wire:model="search"
                            placeholder="Digite uma descrição para o produto">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <input class="form-control" type="text" wire:model="codigo_interno"
                            placeholder="Digite o Cód. Interno" title="Digite o Cód. Interno">
                    </div>
                </div>
            @endif
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
                        @if ($model->produtos_familia->count() && ($produto = $model->produtos_familia))
                            @foreach ($produto as $pr)
                                <li class="list-group-item text-sm d-flex"
                                    title="{{ $pr->produto->descricao_completa }}">
                                    <input disabled id="form-check-input-{{ $pr->produto->id }}"
                                        class="form-check-input me-1" type="checkbox" checked
                                        value="{{ $pr->produto->id }}">
                                    <label for="form-check-input-{{ $pr->produto->id }}"
                                        class="d-flex flex-column justify-content-start">
                                        {{ $pr->produto->compra->codigo_interno }} -
                                        {{ $pr->produto->cod_barras }}
                                        {{ \Illuminate\Support\Str::limit($pr->produto->descricao_completa, 50) }}
                                        - <span class="text-uppercase text-danger"> ( {{ $pr->type }} ) </span>
                                    </label>
                                </li>
                            @endforeach
                        @else
                            @if ($produto = $model->produtos_parceiros)
                                @foreach ($produto as $pr)
                                    <li class="list-group-item text-sm d-flex"
                                        title="{{ $pr->produto->descricao_completa }}">
                                        <input wire:model="form_data.grupos.{{ $pr->produto->id }}"
                                            id="form-check-input-checked-{{ $pr->produto->id }}"
                                            class="form-check-input me-1" type="checkbox">
                                        <label for="form-check-input-checked-{{ $pr->produto->id }}"
                                            class="d-flex flex-column justify-content-start">
                                            {{ $pr->produto->compra->codigo_interno }} -
                                            {{ $pr->produto->cod_barras }}
                                            {{ \Illuminate\Support\Str::limit($pr->produto->descricao_completa, 50) }}
                                            - <span class="text-uppercase text-danger"> ( {{ $pr->type }} ) </span>
                                        </label>
                                    </li>
                                @endforeach
                            @endif
                            <li class="list-group-item text-sm d-flex">
                                <span class="divider"></span>
                            </li>
                            @if ($model->produtos_parceiros->count() < 3 && ($produtos = $this->produtos))
                                @foreach ($produtos as $pr)
                                    <li class="list-group-item text-sm d-flex" title="{{ $pr->descricao_completa }}">
                                        <input wire:model="form_data.grupos.{{ $pr->id }}"
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
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
