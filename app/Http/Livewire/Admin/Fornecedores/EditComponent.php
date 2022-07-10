<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Fornecedores;

use App\Models\Role;
use App\Models\User;
use App\SIGA\Form\Rule;
use Illuminate\Support\Facades\Hash;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

    protected $route = "admin.fornecedores";

    protected $roles = [];
    public function mount(User $model)
    {
        $model->append('access');
        $this->setFormProperties($model);
        //$this->roles = $this->model->access;
    }


    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Nome Fantasia','fantasy')->rules(['required', 'string', 'max:255']),
            Field::make('Razão Social','name')->rules(['required', 'string', 'max:255']),
            Field::make('Email','email')->type('email')->rules(['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->model->id)]),
            Field::make('CNPJ', 'document'),
            Field::make('Telefone', 'phone'),
            Field::make('Access')->checkbox()->model(Role::query()->where('slug','fornecedor')),
            Field::make('Password')->password(),
        ];
    }

    public function success()
    {

        if (isset($this->form_data['password']) && $this->form_data['password']) {
            $this->form_data['password'] = Hash::make($this->form_data['password']);
        } else {
            unset($this->form_data['password']);
        }
        if (parent::success()) {
            if ($this->isField('access')) {
                $roles = array_filter($this->form_data['access']);
                $this->model->roles()->sync(array_keys($roles));
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
        return 'admin.fornecedores.edit-component';
    }
}
