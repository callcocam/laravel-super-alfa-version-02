<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Users;

use App\Models\Coperat;
use App\Models\Role;
use App\Models\User;
use App\Models\Loja;
use App\SIGA\Form\Rule;
use Illuminate\Support\Facades\Hash;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

    protected $route = "admin.users";
    public $search_checkbox = "";

    protected $roles = [];
    public function mount(User $model)
    {
        $model->append('access');
        $model->append('categoria_coperat');
        $this->setFormProperties($model);
        //$this->roles = $this->model->access;
    }

//    public function rules($realtime = false)
//    {
//        return [
//            'name' => ['required', 'string', 'max:255'],
//            // 'phone' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->model->id)],
//            // 'document' => ['required', 'max:255', Rule::unique('users')->ignore($this->model->id)],
//            // 'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
//        ];
//    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Nome do Usuário','name')->rules(['required', 'string', 'max:255']),
            Field::make('Email','email')->type('email')->rules(['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->model->id)]),
            Field::make('CNPJ', 'document'),
            Field::make('Telefone', 'phone'),
            Field::make('Pertence á uma loja', 'loja_id')->select()->options(Loja::query()->pluck('nome','id')->toArray(),true),
            Field::make('Access')->checkbox()->model(Role::query()),
            Field::make('Password')->password(),
            Field::make('Categorias Coperat','categoria_coperat')->checkbox()->model(Coperat::query()),
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
            if ($this->isField('categoria_coperat')) {
                $coperat = array_filter($this->form_data['categoria_coperat']);
                $this->model->coperat()->sync(array_keys($coperat));
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
        return 'admin.users.edit-component';
    }
}
