<x-slot name="header">
    Painel do fornecedor
</x-slot>
<div class="page-content">
    @if(!auth()->user()->document || !auth()->user()->phone || !auth()->user()->fantasy)
        <div class="alert alert-danger">
            <h4 class="alert-heading">Atenção</h4>
            <p>Seus dado estão incompletos <a class="bth btn-sm btn-secondary" href="{{ route('app.profile.show') }}">atualize
                    seus dados</a> para poder realizar cadastros de produtos :)</p>
        </div>
    @endif
    @if(1===2)
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldChart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Aprovados</h6>
                                        <h6 class="font-extrabold mb-0">{{ str_pad($this->quantity(['concluido','finalizado']), 5,'0', STR_PAD_LEFT) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldChart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Criados</h6>
                                        <h6 class="font-extrabold mb-0">{{ str_pad($this->quantity(['criado']), 5,'0', STR_PAD_LEFT) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldChart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Recusado</h6>
                                        <h6 class="font-extrabold mb-0">{{ str_pad($this->quantity(['recusado']), 5,'0', STR_PAD_LEFT) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($pieChartModel && $pieChartModel->data->count())
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Movimentação</h4>
                                </div>
                                <div class="card-body">
                                    <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                                        <livewire:livewire-pie-chart
                                            key="{{ $pieChartModel->reactiveKey() }}"
                                            :pie-chart-model="$pieChartModel"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
</div>
