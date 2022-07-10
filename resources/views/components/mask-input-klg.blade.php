@props(['name','ref'=>null])
@php
    if(is_null($ref)){
        $ref = $name;
    }
@endphp
<div x-data="{}"
     x-init="Inputmask('currency', {
            numericInput: true,
            rightAlign: false,
            autoUnmask: true,
            groupSeparator: ',',
            radixPoint: '.',
            digits: 3,
            onBeforeMask: function (value, opts) {
                if(null === value){ // fix charAt on null errors
                    value= '0.00'
                }
{{--                Livewire.emit('calcular_desconto')--}}
                return value;
            }
        }).mask($refs.{{$ref}});"
>
    {{ $slot }}
</div>
