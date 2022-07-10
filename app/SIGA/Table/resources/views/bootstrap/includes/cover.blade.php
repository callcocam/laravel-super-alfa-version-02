@if (\Illuminate\Support\Facades\Storage::exists(data_get($model, $column->getAttribute())))
<a href="{{ \Illuminate\Support\Facades\Storage::url(data_get($model, $column->getAttribute())) }}" target="_blank">
    <img width="50" height="50"
    alt="{{ data_get($model, $column->getAttribute()) }}"
         src="{{ \Illuminate\Support\Facades\Storage::url(data_get($model, $column->getAttribute())) }}"
         class="rounded-circle" style="background: rgba(0,255,128,0.32)">
</a>
@else
<a href="https://fakeimg.pl/350x200/?text=Not Found" target="_blank">
    <img width="50" height="50"
    alt="Not found"
         src="https://fakeimg.pl/150x150/?text=Not Found"
         class="rounded-circle" style="background: rgba(170, 35, 35, 0.32)">
</a>
@endif
