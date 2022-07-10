<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cartaz;

use App\Models\Compra;
use App\Models\Medida;
use App\Models\Produto;
use Campanha\Models\GrupoProduto;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Support\Arr;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

    protected $route = "admin.cartaz";

    public $generate= false;
    public $codigo_interno = "";

    public $show_menu = false;
    public $currentUser;
    public $currentProduto;
    protected $listeners = ["loadProductsCartaz", "loadChildren", "loadAppItem"];
    public $exibirapp = [];

    public function mount(ProdutosCampanha $model)
    {
        $this->currentUser = $this->user();

        $this->setFormProperties($model);

    }

   public function saveAndGoBack()
   {

    $this->emit('validateForms',$this->generate);


     return true;
   }

   public function cancel()
   {
     $this->generate = [];


       return true;
   }

    public function updatedFormData($value)
    {
        $this->generate = [];

    }

    /**
     * @return array
     */
    public function fields()
    {
        return [];
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
        return 'admin.cartaz.create-component';
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.cartaz.create-component";
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras');
    }

    public function loadProductsCartaz($validate){
       $this->generate[$validate] = $validate;
    }


    public function loadChildren($modal,$grupos){
        data_set($this->form_data,$modal, $grupos);
    }
    public function loadAppItem($key , $value, $modal ){

        $this->generate = [];
//        dd($this->generate);
            data_set($this->exibirapp,$key, $value);
    }
}
