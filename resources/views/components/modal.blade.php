@props(['id'=>md5($attributes->wire('model')), 'maxWidth'])
<div
    x-data="{
        open: @entangle($attributes->wire('model')).defer
    }"
    x-on:close.stop="open = false"
    x-on:keydown.escape.window="open = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="open"
    id="{{ $id }}"
    class="w-100"
>
    {{ $slot }}
</div>
