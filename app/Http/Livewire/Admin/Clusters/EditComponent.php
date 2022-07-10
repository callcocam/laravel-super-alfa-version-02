<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Clusters;

use App\Models\Cluster;
use App\Models\Loja;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class EditComponent extends FormComponent
{

        protected $route = "admin.clusters";
        public $search_checkbox = "";

        public function mount(Cluster $model)
        {
           $this->setFormProperties($model);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Field::make('Nome',"nome"),
                Field::make('Descrição',"description")->view('textarea'),
                Field::make('Lojas', 'lojas')->checkbox()->model(Loja::query()->orderBy("nome"),'nome'),
            ];
        }

        public function success()
        {
            if (parent::success()) {
                if ($this->isField('lojas')) {
                    $loja = array_filter($this->form_data['lojas']);
                    $this->model->loja()->sync(array_keys($loja));
                }
                return true;
            }
            return false;
        }
        public function formView()
        {
            return 'admin.clusters.edit-component';
        }
}
