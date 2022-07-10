<section class="section">
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                    <div class="card-subtitle">
                        <div class="form-group position-relative has-icon-right">
                            <x-input wire:model="search" type="text" placeholder="{{ __('Buscar') }}"/>
                            <div class="form-control-icon">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
