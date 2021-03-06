<section>
    @foreach ($messages as $index => $message)
        @if ($message['overlay'])
            <livewire:overlay :message="$message" :key="'lwfo_' . $index" />
        @else
            <livewire:message :message="$message" :key="'lwfm_' . $index" />
        @endif
    @endforeach
</section>
<script>
    window.addEventListener('clearFlash', function (e) {
       setTimeout(()=>{
           window.livewire.emit('dismiss',null);
       }, 5000)
    })
</script>
