<section class="section">
    <x-loader />
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __($this->title) }}</h4>
                    <div class="card-subtitle">
                        <div class="row">
                            <div class="col-md-12 float-end mb-3">
                                <div class="float-end">
                                    @if (count($checkbox_values))
                                        <button wire:loading.attr="disabled" type="button" class="btn btn-info"
                                            wire:click="enableSelected">{{ __('Habilitar Marcados') }}</button>

                                        <button wire:loading.attr="disabled" type="button" class="btn btn-danger"
                                            wire:click="disableSected">{{ __('Desabiltar Marcados') }}</button>
                                    @else
                                        @isset($status_btn)
                                            <button wire:loading.attr="disabled" type="button" class="btn btn-warning"
                                                wire:click="export()">{{ __('Exportar csv') }}</button>

                                            <button wire:loading.attr="disabled" type="button" class="btn btn-success"
                                                wire:click="export('xlsx')">{{ __('Exportar exel') }}</button>

                                            <button wire:loading.attr="disabled" type="button" class="btn btn-info"
                                                wire:click="enableAll">{{ __('Habilitar Todos') }}</button>

                                            <button wire:loading.attr="disabled" type="button" class="btn btn-danger"
                                                wire:click="disableAll">{{ __('Desabiltar Todos') }}</button>
                                        @endisset
                                        @isset($status_btn_actions)
                                            <button wire:loading.attr="disabled" type="button" class="btn btn-info"
                                                wire:click="enableAll">{{ __('Habilitar Todos') }}</button>

                                            <button wire:loading.attr="disabled" type="button" class="btn btn-danger"
                                                wire:click="disableAll">{{ __('Desabiltar Todos') }}</button>
                                        @endisset
                                    @endif
                                    @isset($export_btn)
                                        <button wire:loading.attr="disabled" type="button" class="btn btn-warning"
                                            wire:click="export()">{{ __('Exportar csv') }}</button>

                                        <button wire:loading.attr="disabled" type="button" class="btn btn-success"
                                            wire:click="export('xlsx')">{{ __('Exportar exel') }}</button>
                                    @endisset
                                    @if (\Route::has($this->routeCreate()))
                                        @if ($this->created)
                                            <a href="{{ route($this->routeCreate()) }}"
                                                class="btn btn-primary">{{ __('Cadastrar') }}</a>
                                        @endif
                                    @else
                                        @if ($this->created)
                                            <button wire:loading.attr="disabled" type="button" class="btn btn-primary"
                                                wire:click="openCreate">{{ __('Cadastrar') }}</button>
                                        @endif

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            @if ($filters)
                                @foreach ($filters as $filter)
                                    <div class="col flex flex-row">
                                        @include($filter->getView(), compact('filter'))
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            @if ($idDate)
                                <div class="col flex flex-row">
                                    <div class="form-group position-relative has-icon-right">
                                        <x-date-picker :date="$date_picker" :inline="true" classAttr="w-full"
                                            :theme="$datePickerTheme->filterDatePicker()" />
                                    </div>
                                </div>
                            @endif
                            @if ($status_options)
                                <div class="col flex flex-row">
                                    <div class="form-group position-relative has-icon-right">

                                        <select class="form-select" name="status" id="status" wire:model="status">
                                            <option value="">==Selecione==</option>
                                            @foreach ($status_options as $value => $status_option)
                                                <option value="{{ $value }}">{{ $status_option }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            @endif
                            @if ($isSearch)
                                <div class="col flex flex-row">
                                    <div class="form-group position-relative has-icon-right">
                                        <x-input wire:model.debounce.500ms="search" type="text"
                                            placeholder="{{ __('Buscar') }}" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-search"></i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table uppercase text-sm-start"
                                style="text-transform: uppercase; font-size: 12px;">
                                <thead>
                                    <tr>
                                        @if ($checkbox && $checkbox_side == 'left')
                                            @include(view_table_include('checkbox-all'))
                                        @endif
                                        @include(view_table_include('_thead'))
                                        @if ($checkbox && $checkbox_side == 'right')
                                            @include(view_table_include('checkbox-all'))
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @include(view_table_include('_tbody'))
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                {{ $models->links() }}
                            </div>
                            @isset($footer_view)
                                <div class="col-md-auto">
                                    @include($footer_view)
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('laravel-livewire-tables::modal')
</section>
