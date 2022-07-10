<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cartaz;

use App\Models\Compra;
use App\Models\Produto;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Support\Str;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class ProdutoComponent extends FormComponent
{

    protected $route = "admin.cartaz.produtos";

    public $confirm = false;
    public $search;
    public $codigo_interno = "";
    public $app = false;
    public $currentUser;
    public $modal;

    public function mount($modal="modal-cartaz")
    {
        $this->currentUser = $this->user();

    }

    public function success()
    {

    }

    public function selectItem($value, $familia = null)
    {

        if ($compra = Compra::query()->where('codigo_interno',$value)->first()) {
            $this->dispatchBrowserEvent('closeModalForm', $this->modal);
            $this->emit($this->modal, $compra, $familia);
        }

    }

    /**
     * @return array
     */
    public function fields()
    {
        return [

        ];
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function formView()
    {
        return 'admin.cartaz.produtos-component';
    }

    public function closeModalForm($modal = 'closedepositActionSheet')
    {
        $this->dispatchBrowserEvent('closeModalForm', $modal);
    }

    public function saveAndGoBack()
    {
        $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightCreateCampanhaItem');
    }

    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras');
    }

    public function name()
    {
        return "admin.cartaz.produtos-component";
    }

    public function getProdutosProperty()
    {
        if ($search =$this->search){
//            dd($search);
            $this->codigo_interno= "";
            return Produto::query()
                ->limit(20)
                ->whereIn('status',['concluido','compras-concluido','importadoerp'])
                ->where('search','LIKE',"%{$search}%")
                ->get();
        }
        else{
            if ($codigo_interno = $this->codigo_interno){
                if ($compra = Compra::query()->where('codigo_interno',$codigo_interno)->first()) {
                    return $compra->produto()
                    ->whereIn('status',['concluido','compras-concluido','importadoerp'])->get();
                }
            }
           
        }
        return [];
    }

}
