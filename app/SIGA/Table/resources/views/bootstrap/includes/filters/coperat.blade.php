<div class="col flex flex-row">
    <select class="form-select" name="coperat" id="coperat" wire:model="coperat">
        <option value="">--CATTEGORIA ALFA--</option>
        @foreach($options as $key => $option)
            <option value="{{$key}}">{{$option}}</option>
        @endforeach
    </select>
</div>
