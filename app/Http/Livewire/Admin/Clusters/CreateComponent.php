<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Clusters;

use App\Models\Cluster;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class CreateComponent extends FormComponent
{

        protected $route = "admin.clusters";


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
            ];
        }

        public function layout(): string
        {
            return 'layouts.admin';
        }
        public function formView()
        {
            return 'admin.clusters.create-component';
        }
}
