<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Produtos;


use Campanha\Models\ProdutosCampanha;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

    protected $route = "admin.campanhas";

    public function mount(ProdutosCampanha $model)
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
        ];
    }

    public function prefix()
    {
        return "campanha::"; // TODO: Change the autogenerated stub
    }

    public function formView()
    {
        return 'admin.campanhas.produtos.edit-component';
    }


    public function name(){
        return "admin.campanhas.produtos.edit-component";
    }
}
