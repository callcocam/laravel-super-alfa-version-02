<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Bcs;

use App\Models\Bc;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

        protected $route = "admin.bcs";

        public function mount(Bc $model)
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
                Field::make('Id Bc',"id_bc"),
                Field::make('Nivel',"nivel") ->select()->options(['1'=>"1",'2'=>'2','3'=>'3','4'=>'4'], true),
            ];
        }

        public function formView()
        {
            return 'admin.bcs.edit-component';
        }
}
