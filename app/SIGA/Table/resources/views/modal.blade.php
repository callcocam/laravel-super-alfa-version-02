@if($currentUpdated)
    <x-modalbox id="openPanelRightUpdate">
        @livewire(sprintf("%s.edit-component", $this->route()),
        [
            "model"=>$currentUpdated,
            "key"=>$currentUpdated->id
        ])
    </x-modalbox>
@endif
@if($currentShow)
    <x-modalbox id="openPanelRightShow">
        @livewire(sprintf("%s.show-component", $this->route()),
        [
            "model"=>$currentShow,
            "key"=>$currentShow->id
        ])
    </x-modalbox>
@endif
@if($currentCreate)
    <x-modalbox id="openPanelRightCreate">
        @livewire(sprintf("%s.create-component", $this->route()))
    </x-modalbox>
@endif

@if($currentLog)
    <x-modalbox id="openPanelRightLog">
        @livewire(sprintf("%s.log-component", $this->route()),
        [
            "model"=>$currentLog,
            "key"=>sprintf("log-%s",$currentLog->id)
        ]))
    </x-modalbox>
@endif

@if($currentDelete)
    <x-delete-modal id="openPanelRightDelete">
        {{ $currentDelete->name }}
    </x-delete-modal>
@endif
