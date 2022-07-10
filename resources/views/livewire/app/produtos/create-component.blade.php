<div>
    <!-- loader -->
    <div id="loader" wire:loading wire:target="saveAndGoBack">
        <img src="{{ asset('assets/admin/images/loader.gif') }}" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->
    <form wire:submit.prevent="saveAndGoBack">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('FICHA CADASTRO DE PRODUTOS') }}</h5>
            {{-- @if (auth()->user()->email == 'fornecedor@web.superalfa.coop.br') --}}
            {{-- @if (auth()->user()->email == 'dionatanwork@hotmail.com') --}}
                <button type="button" class="btn btn-secondary" wire:click="openModalSimplusAction"
                    wire:loading.attr="disabled">
                    <span class="d-none d-sm-block">{{ __('Buscar na Simplus') }}</span>
                </button>
            {{-- @endif --}}
            @if ($produtoApiLink)
              <a target="_blank" class="btn btn-warning" href="{{ $produtoApiLink }}">{{ __('Visualizar resultado') }}</a>
             @endif
            @if ($this->routeCreate())
                <a class="btn btn-danger" href="{{ route('app.produtos') }}">{{ __('VOLTAR') }}</a>
            @else
                <a class="btn btn-danger" href="javascript:;"
                    wire:click="closeModalForm('openPanelRightCreate')">{{ __('Fechar') }}</a>
            @endif

        </div>
        <div class="modal-body p-md-5">
            @include('livewire.app.produtos.form-component')
            @if ($errors->any())
                <div class="row">
                    {{ __('Opa, algum erro ocorreu.') }}
                    <br />
                    {{-- @dd($errors->all()) --}}
                    @foreach ($errors->all() as $key => $error)
                        <span style="padding: 10px 20px ; color:  red">{{ $error }} - {{ $key }}</span>
                    @endforeach

                </div>
            @endif
        </div>
        <div class="modal-footer  bg-white">
            @if ($this->routeCreate())
                <a class="btn btn-danger" href="{{ route('app.produtos') }}">{{ __('VOLTAR') }}</a>
            @else
                <button type="button" class="btn btn-light-secondary"
                    wire:click="closeModalForm('openPanelRightCreate')" wire:loading.attr="disabled">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
                </button>
            @endif


            <div>
                <x-warning-button type="button" wire:click.prevent="saveAndStatus" wire:loading.attr="disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Salvar & Enviar') }}</span>
                </x-warning-button>
                <x-button type="submit" wire:loading.attr="disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
                </x-button>
            </div>
        </div>
    </form>
    <!-- Deposit Action Sheet -->
    <div class="modal fade" id="depositActionSheet012" tabindex="-1" role="dialog">
        <livewire:app.produtos.simplus-component :model="$model" />
    </div>
</div>
