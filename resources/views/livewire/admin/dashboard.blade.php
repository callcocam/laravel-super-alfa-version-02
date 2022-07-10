<x-slot name="header">
    Painel Administrativo
</x-slot>

@if (auth()->user()->hasAnyRole('lojas','lojas-campanha'))

    <style>
        .page-content{
            display: none;
        }
    </style>

@endif
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-6">
            @if ($options)
                <x-label fo="category">Por categoria:</x-label>
                <div class="form-group">
                    <select wire:model.lazy="filter.category" class="form-select">
                        <option value="">=={{ __('Selecione') }}==</option>

                        @foreach ($options as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <x-date-picker :date="$date_picker" :inline="false" classAttr="w-full"
                    :theme="$theme->filterDatePicker()" />
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                @if (auth()->user()->isAdmin())
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldChart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total de Concluídos</h6>
                                        <h6 class="font-extrabold mb-0">
                                            {{ str_pad($this->quantity(['concluido']), 5, '0', STR_PAD_LEFT) }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-6 col-lg-4 col-md-6">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body px-3 py-4-5">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="stats-icon blue">--}}
{{--                                            <i class="iconly-boldChart"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <h6 class="text-muted font-semibold">Criados</h6>--}}
{{--                                        <h6 class="font-extrabold mb-0">--}}
{{--                                            {{ str_pad($this->quantity(['criado']), 5, '0', STR_PAD_LEFT) }}</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldChart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total de Recusados</h6>
                                        <h6 class="font-extrabold mb-0">
                                            {{ str_pad($this->quantity(['recusado']), 5, '0', STR_PAD_LEFT) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($this->status() as $status)
                        @if ($recusado = $this->recusado([$status]))
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldChart"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold"> Recusado
                                                    pelo {{ Str::title($status) }}</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    {{ str_pad($recusado, 5, '0', STR_PAD_LEFT) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    @foreach ($this->status() as $status)
                        @if (in_array($status, ['compras', 'marketing']))
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldChart"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold"> {{ Str::title($status) }}</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    {{ str_pad($this->quantity([$status]), 5, '0', STR_PAD_LEFT) }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldChart"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold"> Recusado</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    {{ str_pad($this->recusado([$status]), 5, '0', STR_PAD_LEFT) }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            @if ($pieChartModel && $pieChartModel->data->count())
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Movimentação</h4>
                            </div>
                            <div class="card-body">
                                <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                                    <livewire:livewire-pie-chart key="{{ $pieChartModel->reactiveKey() }}"
                                        :pie-chart-model="$pieChartModel" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

</div>
{{-- <script src="{{ asset('assets/admin/vendors/apexcharts/apexcharts.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/admin/js/pages/dashboard.js') }}"></script> --}}
