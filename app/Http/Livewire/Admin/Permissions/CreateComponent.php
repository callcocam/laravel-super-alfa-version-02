<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

    protected $route = "admin.permissions";


    public function mount(Permission $model)
    {
        $this->setFormProperties($model);
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('name')->rules('required')
        ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }


    public function formView()
    {
        return 'admin.permissions.create-component';
    }


}
