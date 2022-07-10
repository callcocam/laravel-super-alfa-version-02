<div class="flex flex-column">
    <div> {{$model->name}}</div>
    @if($roles = $model->roles)
        <p class="text-sm text-lowercase p-0 m-0 text-capitalize">
            @foreach($roles as $key => $role)
                @if($key)
                    ,
                @endif
                {{ \Illuminate\Support\Str::title($role->name) }}
            @endforeach
        </p>
    @endif
</div>
