<div>
    <div>
        <div class="modal-header">
            <h5 class="modal-title">{{ __('FOTOS ADICIONAR') }}</h5>
            <a class="btn btn-light-secondary" href="javascript:;" wire:click="closeModalForm('openPanelRightCreate')"
                wire:loading.attr="disabled">{{ __('Fechar') }}</a>
        </div>
        <div class="modal-body position-relative p-md-5" style="max-height: calc(100vh - 150px);">
            <x-loader />
            <x-jet-validation-errors class="mb-4 text-danger" />

            @if ($files)
                @foreach ($files as $key => $file)
                    @livewire('admin.arquivos.fotos.item-component', ['file' => $file], key(uniqid($key)))
                @endforeach
            @else
                <div class="row">
                    <div class="col-md-4 mb-2">
                        Selecione um ou mais arquivos
                    </div>
                </div>
            @endif

            <div class="row">
                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!-- File Input -->
                    <div class="col-12 col-md-9 mb-2">
                        @include(
                            'laravel-livewire-forms::fields.file-multiple-fotos',
                            ['field' => $archive]
                        )

                    </div>

                    <!-- Progress Bar -->
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>

                {{-- <div class="col-12 col-md-3 mb-2"> --}}
                {{-- @if ($file) --}}
                {{-- <img class="img-thumbnail" src="{{$file->temporaryUrl()}}" alt="Capa"> --}}
                {{-- @endif --}}
                {{-- </div> --}}
            </div>
        </div>
        <div class="modal-footer fixed-bottom bg-white justify-content-between">
            <button type="button" class="btn btn-light-secondary" wire:click="closeModalForm('openPanelRightCreate')">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ __('Cancelar') }}</span>
            </button>
        </div>
    </div>
</div>
