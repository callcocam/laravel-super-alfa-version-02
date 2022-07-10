<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ $model->nome }}</h5>
    </div>
    @if ($cetegories->count())
        <x-loader />
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="campanha-topo py-3 bg-light">
                    <div class="row d-flex justify-content-around">
                        {{-- <div class="col-md-3 text-center">Pod. Estimados: <b>{{ $model->quantidade_estimada }}</b></div> --}}
                        <div class="col-md-3 text-center">Prod. Estimados:
                            <b>{{ $cetegories->count() * $model->quantidade_estimada }}</b>
                        </div>
                        <div class="col-md-3 text-center">Prod. Cadastrados: <b>{{ $model->produtos->count() }}</b>
                        </div>
                        <div class="col-md-3 text-center">Prod. Por Categoria:<b> {{ $model->quantidade_estimada }}</b>
                        </div>
                        <div class="col-md-3 text-center">
                            <b>{{ date_carbom_format($model->data_inicio)->format('d/m/Y') }}</b> a
                            <b>{{ date_carbom_format($model->data_fim)->format('d/m/Y') }}</b>
                        </div>

                    </div>
                </div>
            </div>
            @if ($cetegories)
                <div class="campanha-conteudo text-sm">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" style="font-size: 12px; min-width: 1300px">
                            <thead>
                                <tr class="p-0">
                                    <th class="align-middle p-0" cope="col">
                                        #
                                    </th>
                                    <th class="align-middle p-0" cope="col">
                                        Cód Interno/Cód. barras
                                    </th>
                                    <th class="align-middle" scope="col">
                                        Desc. Encarte/Cartaz
                                    </th>
                                    <th class="flex align-middle p-0 text-center" scope="col">
                                        Ação
                                    </th>

                                </tr>
                            </thead>
                            <tbody wire:sortable="updateTaskOrder">
                                @if ($produtos_campanha = $model->produtos()->orderBy('order')->get())
                                    @foreach ($produtos_campanha as $produto)
                                        <tr style="cursor: move" class="py-2 bg-gray-500 pointer"
                                            wire:sortable.item="{{ $produto->id }}"
                                            wire:key="task-{{ $produto->id }}" wire:sortable.handle>
                                            <td>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" width="20">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                                </svg>
                                            </td>
                                            <td>
                                                {{ $produto->codigo_interno }}
                                                {{ $produto->codigo_barras }}
                                            </td>
                                            <td>
                                                {{ $produto->descricao_comercial }}
                                            </td>
                                            <td>
                                                {{ $produto->order }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
            @endif
        </div>
    @endif
</div>
