<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cartaz;

use App\Models\Compra;
use App\Models\Produto;
use Campanha\Models\GrupoProduto;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Support\Arr;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class ChildrenComponent extends FormComponent
{

    protected $route = "admin.cartaz.children.produtos";

    public $open = "";
    public $codigo_interno = "";
    public $produtos;
    public $modal;
    public $selecionados;
    public $countItems =0 ;

    public $currentUser;
    public function mount($form_data, $modal)
    {
    
        $this->modal = $modal;
        $this->form_data = $form_data;
        $this->currentUser = $this->user();
    }

    public function updatedCodigoInterno($value)
    {
        if ($search = $this->codigo_interno) {
            $produtos = Produto::query();
            $produtos->where('search','LIKE',"%{$search}%");
            if($grupos = Arr::get($this->form_data, sprintf("grupos.%s",$this->modal))){
             $produtos->whereNotIn('id',$grupos);
            }
            $this->produtos = $produtos->whereIn('status', ['concluido','compras-concluido','importadoerp'])->limit(15)->get();
        }
    }
    public function updatedFormData($value)
    {
        if (!$this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras')){
            $this->addError("error-add-group", 'Você não pode realizar essa operação');
            return;
        }
        if($grupos = Arr::get($this->form_data,sprintf("grupos.%s",$this->modal))){
            data_set( $this->form_data,sprintf("grupos.%s",$this->modal), array_filter($grupos));
            $this->selecionados = Produto::query()->whereIn('id', array_filter($grupos))->get();
            $this->countItems = count(array_filter(data_get($this->form_data, sprintf("grupos.%s",$this->modal))));
            //$this->emit(sprintf("%s-chidren",$this->modal),$grupos);
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


    public function formView()
    {
        return 'admin.cartaz.children-component';
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.cartaz.children-component";
    }


    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras');
    }

    public function closeModalForm($modal = 'openPanelRightUpdate')
    {
        if($grupos = Arr::get($this->form_data, sprintf("grupos.%s",$this->modal))){
         $this->emit(sprintf("%s-chidren",$this->modal),$grupos);
        }
        $this->emit('refreshUpdated');

        $this->dispatchBrowserEvent('closeModalForm', $modal);

        //$this->reset('form_data');

        $this->resetErrorBag();

    }
}
