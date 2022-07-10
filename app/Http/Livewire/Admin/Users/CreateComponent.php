<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Users;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use App\SIGA\Form\Rule;
use Illuminate\Support\Facades\Hash;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{
    use PasswordValidationRules;

    protected $route = "admin.users";


    public function mount(User $model)
    {
        $this->setFormProperties($model);
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Nome Do Usuário','name')->rules(['required', 'string', 'max:255']),
            Field::make('Email','email')->type('email')->rules(['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->model->id)]),
            Field::make('Password')->password()->rules($this->passwordRules()),
            Field::make('password_confirmation')->password(),
        ];
    }

    public function success()
    {
        $this->form_data['password'] = Hash::make($this->form_data['password']);
        $this->form_data['type'] = 'admin';
        return parent::success();
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function formView()
    {
        return 'admin.users.create-component';
    }

}
