<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Coperats;

use App\Models\Coperat;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "admin.coperats";

        public function mount(Coperat $model)
        {
           $this->setFormProperties($model);
        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Field::make('Nome',"name"),
                Field::make('Código',"codigo"),
                Field::make('Econder para fornecedores','access')->radio()->options(['0'=>'Não','1'=>'Sim'],true),
            ];
        }


        public function formView()
        {
            return 'admin.coperats.edit-component';
        }
}
