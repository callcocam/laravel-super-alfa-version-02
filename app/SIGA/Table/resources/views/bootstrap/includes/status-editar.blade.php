<div class="d-flex justify-center items-center text-center">
    <button wire:click="updateStatus('{{ $model->id }}')" title="Atualizar para {{ data_get($status_options, $status, 'compras')}}" class="btn {{ $confirm == $model->id? 'btn-success':'btn-danger' }} btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
          </svg>
    </button>
</div>
