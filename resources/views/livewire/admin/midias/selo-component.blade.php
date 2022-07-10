<div>

    @if ($currentDelete)
        <x-delete-modal id="openPanelRightDelete">
            {{ $currentDelete->name }}
        </x-delete-modal>
    @endif
    <form wire:submit.prevent="saveAndGoBack">
        <div class="card-header">
            <h5 class="card-title">{{ __('CADASTRO DE SELOS') }}</h5>
        </div>
        <div class="card-body p-md-5">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @if ($model->get()->count())
                    @foreach ($model->get() as $item)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ \Storage::url($item->cover) }}" class="card-img-top"
                                    alt="{{ $item->name }}">
                                <div class="card-footer">
                                    <div class="gap-2 d-flex justify-between">
                                        <button  class="btn btn-primary btn-sm" type="button" wire:click="currentUpdated('{{ $item->id }}')"><i
                                                class="fa fa-edit"></i></button>

                                        <button class="btn btn-warning btn-sm" type="button"
                                            wire:click="openDelete('{{ $item->id }}')"><i
                                                class="fa fa-trash"></i></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card-footer  bg-white">
            <div class="row">
                @foreach ($fields as $field)
                    <div class="col-sm-12 col-md-{{ $field->span }}">
                        @include('laravel-livewire-forms::fields.' . $field->view)
                    </div>
                @endforeach
            </div>
            <div>
                <x-button type="submit" wire:loading.attr="disabled">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('Salvar') }}</span>
                </x-button>
            </div>
        </div>
    </form>
</div>
