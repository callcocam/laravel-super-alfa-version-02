<select class="form-select" name="coperat" id="coperat" wire:model.lazy="{{ $filter->attribute }}">
    <option value="">--{{ $filter->getText() }}--</option>
    @foreach($filter->options as $key => $option)
        <option value="{{$key}}">{{$option}}</option>
    @endforeach
</select>