<section class="section">
    <x-loader />
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Stories individuais</h4>
                    <div class="card-subtitle">
                        <div class="row">
                            @if ($idDate)
                                <div class="col flex flex-row">
                                    <div class="form-group position-relative has-icon-right">
                                        <x-date-picker :date="$date_picker" :inline="true" classAttr="w-full"
                                            :theme="$datePickerTheme->filterDatePicker()" />
                                    </div>
                                </div>
                            @endif
                            @if ($isSearch)
                                {{-- <div class="col flex flex-row">
                                    <div class="form-group position-relative has-icon-right">
                                        <x-input wire:model.debounce.500ms="search" type="text"
                                            placeholder="{{ __('Buscar') }}" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-search"></i>
                                        </div>
                                    </div>
                                </div> --}}
                            @endif
                            <div class="col flex flex-row">
                                @if (\Route::has($this->routeCreate()))
                                    @if ($this->created)
                                        <a href="{{ route($this->routeCreate()) }}"
                                            class="btn btn-primary">{{ __('Cadastrar novo Storie') }}</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive  ">
                            <table class="table uppercase text-sm-start "
                                style="text-transform: uppercase; font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th style="width: 140px;" class="align-middle p-0" cope="col">Cód
                                            Interno/Cód. barras
                                        </th>
                                        {{-- <th class="align-middle" scope="col">Cód. barras</th> --}}
                                        <th style="width: 100px;" class="align-middle" scope="col">
                                            Desc. Encarte/Cartaz
                                        </th>
                                        <th style="width: 100px;" class="align-middle p-0 text-center" scope="col">
                                            Obs.
                                        </th>
{{--                                        <th class="align-middle p-0 text-center" scope="col">Qtd por caixa</th>--}}
                                        <th class="align-middle p-0 text-center" scope="col">Parcelas</th>
                                        <th class="align-middle p-0 text-center" scope="col">Formato de Venda
                                        </th>
                                        <th class="align-middle p-0 text-center" scope="col">Preço Normal</th>
                                        <th class="align-middle p-0 text-center" scope="col">Preço Promo.</th>
                                        {{-- <th class="align-middle p-0 text-center" scope="col">P. da caixa</th> --}}
{{--                                        <th class="align-middle p-0 text-center" scope="col">É tabloide?</th>--}}
                                        {{-- <th class="align-middle p-0 text-center" scope="col">É fracionado?</th> --}}
                                        <th class="align-middle p-0 text-center" scope="col">Possui Selo ?</th>
                                        <th class="align-middle p-0 text-center" scope="col">É App?</th>
                                        <th class="align-middle p-0 text-center" scope="col">Preço App</th>
                                        <th class="align-middle p-0 text-center" scope="col">Preço +
                                            desconto
                                        </th>
                                        <th colspan="4" class="flex align-middle p-0 text-center" scope="col">
                                            Ação
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $model)
                                        @livewire('admin.cards.individual.edit-component', compact('model'), key(uniqid($model->id)))
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
