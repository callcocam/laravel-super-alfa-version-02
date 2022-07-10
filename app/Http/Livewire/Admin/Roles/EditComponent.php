<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Permission;
use App\Models\Role;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

    protected $route = "admin.roles";

    public function mount(Role $model)
    {

        $model->append('access');
        $this->setFormProperties($model);
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('name'),
            Field::make('slug'),
            Field::make('special')->select()->options([
                'all-access'=>"Acesso total",
                'no-access'=>"Nenhum acesso",
                'no-defined'=>"Não definido",
            ], true),
            Field::make('Permissions','access')->checkbox()->model(Permission::query()),
        ];
    }

    public function success()
    {

        if (parent::success()) {
            if ($this->isField('access')) {
                $permissions = array_filter($this->form_data['access']);
                $this->model->permissions()->sync(array_keys($permissions));
            }
            return true;
        }
        return false;
    }
    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function formView()
    {
        return 'admin.roles.edit-component';
    }


}
