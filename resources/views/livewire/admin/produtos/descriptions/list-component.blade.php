<section class="section">
    <x-loader/>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __($this->title) }}</h4>
                    <div class="card-subtitle">
                        <div class="row">
                            <div class="col-md-4 float-end">
                                <input wire:model.debounce.500ms="search" type="search" class="form-control" placeholder="Digite o termo de busca...">
                            </div>
                            <div class="col-md-4 float-end">
                                <input wire:model.lazy="cod_barras" type="text" class="form-control" placeholder="Digite o código de barras">
                            </div>
                            <div class="col-md-4 float-end">
                                <input wire:model.lazy="codigo_interno" type="text" class="form-control" placeholder="Digite o código Interno">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table uppercase text-sm-start  table-sm table-striped"
                                   style="text-transform: uppercase; font-size: 12px;">
                                <thead>
                                <tr>
                                    <th style="width: 300px">
                                        Produto
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($models as $model)
                                    {{--                                    @dd($model)--}}
                                    <tr>
                                        <td class="m-0 ps-3 p-0">
                                            <span class="badge bg-info text-dark">{{ $model->status }}</span><br>

                                            <b>Nome: </b>{{ $model->descricao_completa }}<br>
{{--                                            <b>Desc. Com. </b>{{ $model->marketing->descricao_comercial }}<br>--}}
                                            <b>Cod. interno </b>@if($model->compra){{ $model->compra->codigo_interno }}@endif<br>
                                            <b>Cod. Barras </b>{{ $model->cod_barras }}</b><br>

                                            @if ($model->ultima_atualizacao)
                                            <b class="text-primary">Desc Atualizada em: {{ date_carbom_format($model->ultima_atualizacao)->format('d/m/Y H:i:s') }}</b><br>
                                            @endif
                                            @if ($model->familia_produtos->count())
                                            <b class="text-warning font-bold">ESSE PRODDUTO PERTENÇE A UMA FAMÍLIA</b><br>
                                            @endif
                                           <span style="text-transform: lowercase"> {{ $model->id }}</span>
                                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('super-admin'))
                                            <button  type="button" wire:click="delete('{{ $model->id }}')" class="btn btn-danger">Delete</button>
                                            @endif

                                        </td>
                                        <td class="m-0 p-0">@if($model->marketing)@livewire("admin.produtos.description.edit-component", ['model'=>$model->marketing], key($model->id))@endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                {{ $models->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
