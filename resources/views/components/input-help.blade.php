@props(['message','link'])
@if($message)
  <small {{ $attributes->merge(['class' => 'text-muted md-0']) }}>{{$message}}
            @isset($link)
                @if($link)
                    <a class="text-danger" target="_blank" href="{{ \Illuminate\Support\Facades\Storage::url($link) }}">{{ __('Click aqui para visualizar') }}</a>
                @endif
            @endisset
        </small>

@else
    @isset($link)

            <small {{ $attributes->merge(['class' => 'text-muted']) }}>

                @if($link)
                    <a class="text-danger" target="_blank" href="{{ \Illuminate\Support\Facades\Storage::url($link) }}">{{ __('Click aqui para visualizar') }}</a>
                @endif
            </small>

    @endisset
@endif
