@if(data_get($model, $column->getAttribute()) == "finalizado")
   <span class="badge bg-primary"> {{ \Illuminate\Support\Str::title(data_get($model, $column->getAttribute())) }}</span>
@elseif(data_get($model, $column->getAttribute()) == "compras")
   <span class="badge bg-info"> {{ \Illuminate\Support\Str::title(data_get($model, $column->getAttribute())) }}</span>
@elseif(data_get($model, $column->getAttribute()) == "marketings")
    <span class="badge bg-dark"> {{ \Illuminate\Support\Str::title(data_get($model, $column->getAttribute())) }}</span>
@elseif(data_get($model, $column->getAttribute()) == "cadastro")
    <span class="badge bg-success"> {{ \Illuminate\Support\Str::title(data_get($model, $column->getAttribute())) }}</span>
@elseif(data_get($model, $column->getAttribute()) == "arquivar")
    <span class="badge bg-warning"> {{ \Illuminate\Support\Str::title(data_get($model, $column->getAttribute())) }}</span>
@elseif(data_get($model, $column->getAttribute()) == "compras-concluido")
    <span class="badge" style="background: #6c1d19"> {{ \Illuminate\Support\Str::title(data_get($model, $column->getAttribute())) }}</span>
@elseif(data_get($model, $column->getAttribute()) == "concluido")
    <span class="badge" style="background: #01e5de"> {{ \Illuminate\Support\Str::title(data_get($model, $column->getAttribute())) }}</span>
@else
    <span class="badge bg-danger"> {{ \Illuminate\Support\Str::title(data_get($model, $column->getAttribute())) }}</span>
@endif
