<div class="btn-group mb-1" x-data="{open:false}" @click.away="open = false">
    <button type="button" class="btn
        @if($model->grupos->count())
        btn-success
@else
        btn-warning
@endif btn-sm dropdown-toggle" x-on:click="open = !open">
        @if($model->grupos->count())
            {{ __("Edit") }}
        @else
            {{ __('+') }}
        @endif
    </button>
    <div class="dropdown-menu show" x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90">
        <form class="px-2 py-0">
            <div class="form-group">
                <input wire:model="codigo_interno" type="search" class="form-control form-control-sm"
                       placeholder="Search...">
            </div>
        </form>
        <div class="dropdown-divider"></div>
        <ul class="list-group">
            @if($produto_coperats = $this->produtos)
                @error('error-add-group')
                <li class="list-group-item text-sm d-flex" title="{{$message}}">
                    <span class="text-danger"> {{ $message }}</span>
                </li>
                @enderror
                @foreach($produto_coperats as $pr)
                    <li class="list-group-item text-sm d-flex" title="{{$pr->descricao_completa}}">
                        <input {{ $this->created ? '':'disabled' }} wire:model="form_data.grupos.{{ $pr->id }}" id="form-check-input-{{ $pr->id }}"
                               class="form-check-input me-1" type="checkbox" value="{{$pr->id}}" aria-label="...">
                        <label for="form-check-input-{{ $pr->id }}"
                               class="d-flex flex-column justify-content-start"><span> {{$pr->compra->codigo_interno}}</span>
                            <small>
                                {{ \Illuminate\Support\Str::limit($pr->descricao_completa,15) }}
                            </small></label>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

</div>

