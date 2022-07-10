<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Grupos;


use Campanha\Models\GrupoProduto;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

    protected $route = "admin.grupos.produtos";

    public function mount(GrupoProduto $model)
    {
        $this->setFormProperties($model);
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Nome', "name"),
            Field::make('Código', "codigo")
        ];
    }

    public function formView()
    {
        return 'admin.campanhas.grupos-produtos.edit-component';
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.campanhas.grupos-produtos.edit-component";
    }
}
