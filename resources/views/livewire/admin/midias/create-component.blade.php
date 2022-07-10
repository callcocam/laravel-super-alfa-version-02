<div>
    <div class="card">
        <!-- loader -->
        <div id="loader" wire:loading wire:target="saveAndGoBack">
            <img src="{{ asset('assets/admin/images/loader.gif') }}" alt="icon" class="loading-icon">
        </div>
        <!-- * loader -->
        <form wire:submit.prevent="saveAndGoBack">
            <div class="card-header">
                <h5 class="card-title">{{ __('FICHA CADASTRO DE MIDÍAS') }}</h5>

            </div>
            <div class="card-body p-md-5">
                <div class="row">
                    @foreach ($fields as $field)
                        <div class="col-sm-12 col-md-{{ $field->span }}">
                            @include(
                                'laravel-livewire-forms::fields.' . $field->view
                            )
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer  bg-white">
                <div>
                    <x-button type="submit" wire:loading.attr="disabled">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
                    </x-button>
                </div>
            </div>
        </form>
    </div>

    <div class="card">
        @livewire('admin.midias.selo-component')
    </div>
</div>
