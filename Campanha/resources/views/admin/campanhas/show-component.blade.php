<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ $model->nome }}</h5>
    </div>
    @if ($cetegories->count())
        <x-loader />
{{--        @include('campanha::admin.campanhas.buttons-orders')--}}
        <div class="container-fluid">
{{--                @if ($this->print)--}}
                    @include('campanha::admin.campanhas.buttons')
{{--                @endif--}}
        </div>
        <div class="container-fluid">
            <div class="campanha-topo py-3 bg-light">
                <div class="row d-flex justify-content-around">
                    {{-- <div class="col-md-3 text-center">Pod. Estimados: <b>{{ $model->quantidade_estimada }}</b></div> --}}
                    <div class="col-md-3 text-center">Prod. Estimados:
                        <b>{{ $cetegories->count() * $model->quantidade_estimada }}</b>
                    </div>
                    <div class="col-md-3 text-center">Prod. Cadastrados: <b>{{ $model->produtos->count() }}</b></div>
                    <div class="col-md-3 text-center">Prod. Por Categoria:<b> {{ $model->quantidade_estimada }}</b>
                    </div>
                    <div class="col-md-3 text-center">
                        <b>{{ date_carbom_format($model->data_inicio)->format('d/m/Y') }}</b> a
                        <b>{{ date_carbom_format($model->data_fim)->format('d/m/Y') }}</b>
                    </div>

                </div>
            </div>
            @if ($cetegories)
                <div class="campanha-conteudo text-sm">
                    <ul class="nav nav-tabs  my-2" id="myTab" role="tablist">
                        @foreach ($cetegories as $categoria)
                            <li class="nav-item me-2" role="presentation">
                                <button
                                    class="nav-link
                                    @if ($active == $categoria->id) active
@else
                            @if (!$active && !$loop->index) active @endif
                            @endif"
                                    id="home-tab" data-bs-toggle="tab" data-bs-target="#{{ $categoria->slug }}"
                                    type="button" role="tab" aria-controls="{{ $categoria->slug }}"
                                    aria-selected="true">{{ $categoria->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content mb-5" id="myTabContent" style="z-index: -1">
                        @foreach ($cetegories as $categoria)
                            <div class="tab-pane fade
                                @if ($active == $categoria->id) show   active @else    @if (!$active && !$loop->index) show  active @endif    @endif"
                                id="{{ $categoria->slug }}" role="tabpanel" aria-labelledby="home-tab" >
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm"
                                        style="font-size: 12px; min-width: 1300px">
                                        <tr>
                                            <th colspan="19"  style="margin: 0; padding: 5px">
                                                @if ($this->created)
                                                    @if ($categoria->produtos_campanha()->where('campanha_id', $model->id)->count() < $model->quantidade_estimada)
                                                        <button wire:click="addProduto('{{ $categoria->id }}')"
                                                                class="btn btn-success btn-sm ms-auto "
                                                                type="button">{{ __('ADICIONAR LINHA') }}
                                                        </button>
                                                    @endif
                                                @endif
                                                <span>{{ $categoria->produtos_campanha()->where('campanha_id', $model->id)->count() }}
                                                    de {{ $model->quantidade_estimada }}
                                                    Produtos Adicionados</span>
                                            </th>
{{--                                            <th colspan="5" style=" margin: 0; padding: 0; text-align: right">--}}

{{--                                            </th>--}}
                                            @include(
                                                'campanha::admin.campanhas.thead'
                                            )
                                        </tr>
                                        <tbody wire:sortable="updateTaskOrder">
                                            @if ($produtos_campanha = $categoria->produtos_campanha()->where('campanha_id', $model->id)->get())
                                                @foreach ($produtos_campanha as $produto)
                                                    @livewire("admin.campanhas.produtos.create-component",
                                                    ["model"=>$produto,"medidas"=>$medidas], key(uniqid($produto->id)))
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @else
        <div class="alert alert-info"> Nenhuma categoria disponivel para adicionar produto</div>
    @endif
</div>
