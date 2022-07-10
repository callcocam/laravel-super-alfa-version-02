<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Campanha\Http\Livewire\Admin\Cards\Individual\Produtos;

use App\Models\Compra;
use App\Models\Produto;
use Campanha\Models\GrupoProduto;
use Campanha\Models\CardIndividual;
use Illuminate\Support\Arr;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class ChildrenComponent extends FormComponent
{

    protected $route = "admin.cards.individual.produtos.children";

    public $open = "";
    public $search = "";
    public $codigo_interno = "";

    public $currentUser;
    protected $listeners = ['loadChildren'];

    public function loadChildren(){
       // $this->codigo_interno = "";
    }
    public function mount(CardIndividual $model)
    {

        $this->currentUser = $this->user();
        $this->setFormProperties($model);
    }

    public function updatedFormData($value)
    {

        if (!$this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras','campanhas','cartaz-individual', 'lojas-campanha')){
            $this->addError("error-add-group", 'Você não pode realizar essa operação');
            return;
        }
        if($grupos = Arr::get($this->form_data, 'grupos')){
             foreach ($grupos as $key => $produto) {
                if (is_string($produto)){

                    $this->model->produtos_parceiros()->firstOrCreate([
                        "produto_id"=>$key,
                        "status"=>"published",
                        "type"=>"parceiros",
                    ]);

                }
               else{
                $this->model->produtos_parceiros()->where([
                       "produto_id"=>$key,
                       "type"=>"parceiros",
                   ])->forceDelete();

               }
               $this->emit('loadChildren','loadChildren');
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
        if ($search = $this->search) {
            $produtos = Produto::query();
            $produtos->where('search','LIKE',"%{$search}%");
            return $produtos->whereIn('status', ['concluido','compras-concluido','importadoerp','cadastro'])->limit(15)->get();
        }
        else{
            if ($codigo_interno = $this->codigo_interno){
                if ($compra = Compra::query()->where('codigo_interno',$codigo_interno)->first()) {
                    return $compra->produto()->whereIn('status', ['concluido','compras-concluido','importadoerp','cadastro'])->get();
                }
            }
        }
        return [];
    }

    public function formView()
    {
        return 'admin.cards.individual.produtos.children-component';
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.cards.individual.produtos.children-component";
    }


    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras');
    }
}
