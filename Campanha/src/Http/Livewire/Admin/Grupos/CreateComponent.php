<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Grupos;

use App\Models\Compra;
use App\Models\Produto;
use Campanha\Models\GrupoProduto;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Support\Arr;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

    protected $route = "admin.grupos.produtos";

    public $open = "";
    public $codigo_interno = "";

    public $currentUser;
    public function mount(ProdutosCampanha $model)
    {
        $this->currentUser = $this->user();
        $this->setFormProperties($model);

    }

    public function updatedFormData($value)
    {

        if (!$this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras')){
            $this->addError("error-add-group", 'Você não pode realizar essa operação');
            return;
        }
        if($grupos = Arr::get($this->form_data, 'grupos')){
            foreach ($grupos as $key => $produto) {
                if ($produto){
                    GrupoProduto::query()->firstOrCreate([
                        "campanha_id"=>$this->model->campanha_id,
                        "produto_id"=>$produto,
                        "produtos_campanha_id"=>$this->model->id,
                        "status"=>"published"
                    ]);
                }
               else{
                   GrupoProduto::query()->where([
                       "campanha_id"=>$this->model->campanha_id,
                       "produto_id"=>$key,
                       "produtos_campanha_id"=>$this->model->id,
                   ])->forceDelete();
               }
            }
        }
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Nome',"name"),
            Field::make('Código',"codigo"),
        ];
    }

    public function getProdutosProperty()
    {
        $produtos = Produto::query();
        if ($this->codigo_interno) {
            $coperat = Compra::query()->where('codigo_interno','LIKE', "%{$this->codigo_interno}%");
            $produtos->whereIn('id',$coperat->pluck("produto_id"));

        }
        return $produtos->where('coperat_id', $this->model->coperat_id)->get();
    }
    public function formView()
    {
        return 'admin.campanhas.grupos-produtos.create-component';
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.campanhas.grupos-produtos.create-component";
    }


    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras');
    }
}
