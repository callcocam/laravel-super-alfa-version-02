<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

    protected $route = "admin.roles";


    public function mount(Role $model)
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
            Field::make('name')
        ];
    }

    public function formView()
    {
        return 'admin.roles.create-component';
    }

}
