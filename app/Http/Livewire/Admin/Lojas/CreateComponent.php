<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Lojas;

use App\Models\Loja;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class CreateComponent extends FormComponent
{

        protected $route = "admin.lojas";


        public function mount(Loja $model)
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
                Field::make('Código',"codigo"),
                Field::make('CNPJ',"cnpj"),
            ];
        }

        public function formView()
        {
            return 'admin.lojas.create-component';
        }
}
