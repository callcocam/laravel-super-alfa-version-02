<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Arquivos;

use App\Models\Arquivo;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "admin.arquivos";

        public function mount(Arquivo $model)
        {
           $this->setFormProperties($model);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [];
        }

        public function formView()
        {
            return 'admin.arquivos.edit-component';
        }
}
