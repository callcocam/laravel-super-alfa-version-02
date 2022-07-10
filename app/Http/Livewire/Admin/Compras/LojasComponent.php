<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Compras;

use App\Models\Compra;
use App\Notifications\RecusaNotification;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;
use App\Models\Loja;

class LojasComponent extends FormComponent
{

    protected $route = "admin.compras.lojas";

    public function mount(Compra $model)
    {
        
        $this->setFormProperties($model);
        $this->form_data['lojas'] = $model->produto->_lojas();
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            "lojas" => Field::make('Lojas', 'lojas')->checkbox()->model(Loja::query()->orderBy("nome"),'nome'),
        ];
    }

    public function formView()
    {
        return 'admin.compras.lojas-component';
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }


    public function closedepositActionSheetLoja()
    {
        $this->dispatchBrowserEvent('closeModalForm', "depositActionSheet0Loja12");
    }


    public function openModalLojasAction()
    {
        $this->dispatchBrowserEvent('openModalForm', "depositActionSheet0Loja12");
    }


    public function saveAndGoBackLoja()
    {
        $lojas = data_get($this->form_data, 'lojas', []);
        if($produto = $this->model->produto){
            $produto->loja()->sync(array_keys(array_filter($lojas)));
        }

        $this->closedepositActionSheetLoja();
    }

}
