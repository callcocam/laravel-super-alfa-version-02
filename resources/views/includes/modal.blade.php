@if($currentUpdated)
    <x-panelbox-right id="openPanelRightUpdate">
        @livewire(sprintf("%s.edit-component", $this->route()),
        [
            "model"=>$currentUpdated,
            "key"=>$currentUpdated->id
        ])
    </x-panelbox-right>
@endif

@if($currentCreate)
    <x-panelbox-right id="openPanelRightCreate">
        @livewire(sprintf("%s.create-component", $this->route()))
    </x-panelbox-right>
@endif
@if($currentDelete)
    <x-delete-modal id="openPanelRightDelete">
        {{ $currentDelete->name }}
    </x-delete-modal>
@endif
