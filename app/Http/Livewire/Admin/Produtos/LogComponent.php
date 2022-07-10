<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos;

use App\Models\Produto;
use Livewire\Component;
use SIGA\Models\Log;

class LogComponent extends Component
{

    protected $route = "admin.compras";

    public $model;

    public function mount(Produto $model)
    {
        $this->model = $model;

    }

    public function query()
    {
        $data = [
            $this->model->id,
            $this->model->compra->id,
            $this->model->marketing->id,

        ];

        return Log::query()->whereIn('logable_id',$data)->orderByDesc("created_at");
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function closeModalForm($modal = 'openPanelRightDelete')
    {

        $this->dispatchBrowserEvent('closeModalForm', $modal);
        $this->emit('refreshLog', $modal);

    }


    public function view()
    {
        return 'admin.produtos.log-component';
    }


    public function render()
    {

        return view(sprintf('livewire.%s', $this->view()))
            ->with('models', $this->models())
            ->layout($this->layout());
    }
    public function models()
    {
        $builder = $this->query();
        return $builder->get();
    }
}
