<div>
    <x-table-section>
        <x-slot name="title">
            {{ __($this->title) }}
        </x-slot>
        <table class="table table-lg">
            <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>
                    <button type="button" class="btn btn-primary" wire:click="openCreate">{{ __('Create') }}</button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)
                <tr>
                    <td class="text-bold-500">{{ $model->name }}</td>
                    <td>{{ $model->slug }}</td>
                    <td>
                        <x-button-edit :model="$model">
                            <div class="form-control-icon">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </x-button-edit>
                        <x-button-delete :model="$model">
                            <div class="form-control-icon">
                                <i class="bi bi-trash-fill"></i>
                            </div>
                        </x-button-delete>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-table-section>
    @if($currentUpdated)
        <x-panelbox-right id="openPanelRightUpdate">
            <livewire:admin.providers.edit-component :permission="$currentUpdated" :key="$currentUpdated->id"/>
        </x-panelbox-right>
    @endif

    @if($currentCreate)
        <x-panelbox-right id="openPanelRightCreate">
            <livewire:admin.providers.create-component/>
        </x-panelbox-right>
    @endif

    @if($currentDelete)
        <x-delete-modal id="openPanelRightDelete">
            {{ $currentDelete->name }}
        </x-delete-modal>
    @endif
</div>
