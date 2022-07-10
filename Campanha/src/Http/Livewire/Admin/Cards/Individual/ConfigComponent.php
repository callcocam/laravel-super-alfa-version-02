<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cards\Individual;

use Campanha\Models\CardIndividual;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;
use App\Models\Loja;

class ConfigComponent extends FormComponent
{

    protected $route = "admin.cards.individual";
    public $currentUser;


    public function mount(CardIndividual $model)
    {
        $this->currentUser = $this->user();
        $this->setFormProperties($model);
    }

    /**
    * @return array
    */
     /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Data de nicio', "data_inicio")->type("date")->rules('required'),
            Field::make('Data de Fim', "data_fim")->type("date")->rules('required'),
            Field::make('Lojas', 'lojas')->checkbox()->model(Loja::query()->orderBy("nome"),'nome'),
        ];
    }

    public function success()
    {
        if(parent::success()){
            if ($this->isField('lojas')) {
                $loja = array_filter($this->form_data['lojas']);
                $this->model->loja()->sync(array_keys($loja));
            }
            return true;
            $this->dispatchBrowserEvent('closeModalForm', "modal-config-{$this->modal->id}");
        }
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function formView()
    {
        return 'admin.cards.individual.config-component';
    }

    public function closeModalForm($modal = 'closedepositActionSheet')
    {
        $this->dispatchBrowserEvent('closeModalForm', "modal-config-{$modal}");
    }

    public function name()
    {
        return "admin.cards.individual.config-component";
    }
}
