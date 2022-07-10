<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Familias;

use App\Models\Compra;
use App\Models\Produto;
use Campanha\Models\FamiliaProduto;
use SIGA\Form\FormComponent;

class ShowComponent extends FormComponent
{

    protected $route = "admin.familia-produtos.show";


    public function mount(FamiliaProduto $model)
    {

        $this->currentUser = $this->user();
        $this->setFormProperties($model);

    }


    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function success()
    {

    }

    /**
     * @return array
     */
    public function fields()
    {
        return [

        ];
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function formView()
    {
        return 'admin.familia-produtos.show-component';
    }

    public function name()
    {
        return "admin.familia-produtos.show-component";
    }

}
