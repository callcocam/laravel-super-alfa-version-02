<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Providers;

use App\Models\Provider;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

        protected $route = "app.providers";


        public function mount(Provider $provider)
        {
           $this->setFormProperties($provider);
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
            return 'app.providers.create-component';
        }
}
