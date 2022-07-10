<x-form-section wire:submit.prevent="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informação do Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Atualize as informações de perfil e endereço de e-mail de sua conta.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="row">
                <div class="col-9 col-md-2 col-sm-6 mx-auto">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="d-none"
                           wire:model="photo"
                           x-ref="photo"
                           x-on:change="
                       photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
"/>
                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                             class="avatar img-thumbnail">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                        <img class="avatar img-thumbnail" :src="photoPreview" alt="{{ $this->user->name }}"/>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Selecione uma nova foto') }}
                    </x-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remover foto') }}
                        </x-secondary-button>
                    @endif

                    <x-input-error for="photo" class="mt-2"/>
                </div>
            </div>
    @endif
        <!-- Name -->
        <div class="col-12">
            <div class="form-group">
                <x-label for="name" value="{{ __('Nome') }}"/>
                <x-input id="name" type="text" class="mt-1 block w-full form-control-xl" wire:model.defer="state.name"/>
                <x-input-error for="name" class="mt-2"/>
            </div>
        </div>
        <!-- Name -->
        <div class="col-12">
            <div class="form-group">
                <x-label for="fantasy" value="{{ __('Nome Fantasia') }}"/>
                <x-input id="fantasy" type="text" class="mt-1 block w-full form-control-xl" wire:model.defer="state.fantasy"/>
                <x-input-error for="fantasy" class="mt-2"/>
            </div>
        </div>
        <!-- Email -->
        <div class="col-12">
            <div class="form-group">
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" type="email" class="mt-1 block w-full form-control-xl" wire:model.defer="state.email"/>
                <x-jet-input-error for="email" class="mt-2"/>
            </div>
        </div>
        <!-- Document -->
        <div class="col-12">
            <div class="form-group">
                <x-label for="document" value="{{ __('Documento') }}"/>
                <x-input id="document" type="text" class="mt-1 block w-full form-control-xl" wire:model.defer="state.document"/>
                <x-jet-input-error for="document" class="mt-2"/>
            </div>
        </div>
        <!-- Telefone -->
        <div class="col-12">
            <div class="form-group">
                <x-label for="phone" value="{{ __('Telefone') }}"/>
                <x-input id="phone" type="text" class="mt-1 block w-full form-control-xl" wire:model.defer="state.phone"/>
                <x-jet-input-error for="phone" class="mt-2"/>
            </div>
        </div>
    </x-slot>
    <x-slot name="actions">
        <x-action-message class="mr-3 text-success" on="saved">
            {{ __('Salvou.') }}
        </x-action-message>
        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salve') }}
        </x-button>
    </x-slot>
</x-form-section>
