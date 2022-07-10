<x-form-section wire:submit.prevent="updatePassword">
    <x-slot name="title">
        {{ __('Atualizar senha') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Certifique-se de que sua conta esteja usando uma senha longa e aleatória para permanecer segura.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-12">
            <div class="form-group">
                <x-label for="current_password" value="{{ __('Senha atual') }}"/>
                <x-input id="current_password" type="password" class="mt-1 block w-full form-control-xl"
                         wire:model.defer="state.current_password" autocomplete="current-password"/>
                <x-input-error for="current_password" class="mt-2"/>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <x-label for="password" value="{{ __('Nova Senha') }}"/>
                <x-input id="password" type="password" class="mt-1 block w-full form-control-xl" wire:model.defer="state.password"
                         autocomplete="new-password"/>
                <x-input-error for="password" class="mt-2"/>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <x-label for="password_confirmation" value="{{ __('Confirme a Senha') }}"/>
                <x-input id="password_confirmation" type="password" class="mt-1 block w-full form-control-xl"
                         wire:model.defer="state.password_confirmation" autocomplete="new-password"/>
                <x-input-error for="password_confirmation" class="mt-2"/>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Salvou.') }}
        </x-action-message>

        <x-button>
            {{ __('Salve') }}
        </x-button>
    </x-slot>
</x-form-section>
