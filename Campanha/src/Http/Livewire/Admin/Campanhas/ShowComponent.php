<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Campanhas;


use App\Exports\ArquivosExport;
use App\Exports\ProdutosCampanhasExport;
use App\Models\Coperat;
use Campanha\Models\Campanha;
use Maatwebsite\Excel\Facades\Excel;
use SIGA\Form\FormComponent;

class ShowComponent extends FormComponent
{

    public $cetegories;
    public $quantidada_por_categoria = 0;

    public $active;
    public $currentUser;
    public $medidas=[];
    public $is_app;
    public $show_menu = false;
    protected $route = "admin.campanhas";

    protected $listeners = ['refreshItems','app'];

    public function mount(Campanha $model)
    {
        $produtos = \App\Models\Produto::query()->whereNull('search')->get();
        $this->currentUser = $this->user();
        $this->setFormProperties($model);
        $this->cetegories = $this->model->coperat;
        $this->medidas = \App\Models\Medida::query()->get()->toArray();
        if ($quantity = $this->model->countcoperats->count())
            $this->quantidada_por_categoria = (int)Calcular($model->quantidade_estimada, $quantity, "/");
//        dd($this->quantidada_por_categoria);

    }

    public function getCountItemsProperty()
    {
        return $this->model->coperat->produtos_campanha->count();
    }

    public function refreshItems($value)
    {
        $this->active = $value;


    }
    public function app($value)
    {
        $this->is_app = $value;
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [];
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function formView()
    {
        return 'admin.campanhas.show-component';
    }

    public function name()
    {
        return "admin.campanhas.show-component";
    }

    public function getQuantidadeProperty()
    {
        return $this;
    }

    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras','lojas-campanha');
    }

    public function getHasLojaProperty()
    {
        return !$this->currentUser->hasAnyRole('lojas-campanha');
    }

    public function getHasLojasProperty()
    {
        return !$this->currentUser->hasAnyRole('lojas');
    }


    public function getPrintProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'marketing');
    }


    public function addProduto($coperat_id)
    {
        if ($coperat = Coperat::find($coperat_id)) {
            $coperat->produtos_campanha()->create([
                'created_at' => now()->format("Y-m-d H:i:s"),
                'campanha_id' => $this->model->id,
                'status' => "draft"
            ]);
            $this->active = $coperat_id;
            $this->emit('refreshItems', $coperat_id);
            $this->dispatchBrowserEvent('autosize');
        }
    }

    public function updateTaskOrder($produtos)
    {
        if($produtos){
            foreach($produtos as $produto){
              if($model = \Campanha\Models\ProdutosCampanha::find(data_get($produto, 'value'))){
                  $model->order = data_get($produto, 'order');
                  $model->update();
              }
            }
        }
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }
    public function exportar($type = "xlsx")
    {
        return Excel::download(new ProdutosCampanhasExport($this->model->id), sprintf('produtos.%s', $type));
    }
}