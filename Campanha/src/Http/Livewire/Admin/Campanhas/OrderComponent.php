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

class OrderComponent extends FormComponent
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
        //$this->medidas = \App\Models\Medida::query()->get()->toArray();
        if ($quantity = $this->model->countcoperats->count())
            $this->quantidada_por_categoria = (int)Calcular($model->quantidade_estimada, $quantity, "/");


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
        return 'admin.campanhas.order-component';
    }

    public function name()
    {
        return "admin.campanhas.order-component";
    }

    public function layout(): string
    {
        return 'layouts.admin';
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
}