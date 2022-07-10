<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Logs;


use SIGA\Form\Field;
use SIGA\Form\FormComponent;
use SIGA\Models\Log;

class EditComponent extends FormComponent
{

    protected $route = "admin.segmentos";

    public function mount(Log $model)
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
            Field::make('Usuário', "user"),
            Field::make('Ação', "name")->select()->options([
                "Criado"=>"Criado",
                "Atualizado"=>"Atualizado",
                "Apagado"=>"Apagar",
            ]),
            Field::make('Descrição', "description"),
            Field::make('Craidao', "created_id"),
            Field::make('Atualiazado', "updated_at"),
        ];
    }

    public function formView()
    {
        return 'admin.logs.edit-component';
    }
}
