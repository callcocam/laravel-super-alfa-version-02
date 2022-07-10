<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Segmentos;

use App\Models\TipoEmbalagem;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

    protected $route = "admin.segmentos";


    public function mount(TipoEmbalagem $model)
    {
        $this->setFormProperties($model);
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Nome', "name"),
         ];
    }

    public function formView()
    {
        return 'admin.segmentos.create-component';
    }
}
