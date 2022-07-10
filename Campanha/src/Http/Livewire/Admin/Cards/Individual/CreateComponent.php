<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cards\Individual;

use Campanha\Models\CardIndividual;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class CreateComponent extends FormComponent
{

    protected $route = "admin.cards.individual";


    public function mount(CardIndividual $model)
    {
        if($data = $model->create(
            [
                'order'=>CardIndividual::query()->count(),
            ]
        )) {
            return redirect()->route('admin.cards.individual',[
                'model' => $data,
            ]);
        }
    }

    /**
    * @return array
    */
    public function fields()
    {
            return [];
    }
        
    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.cards.individual.create-component";
    }

    public function formView()
    {
        return 'admin.cards.individual.create-component';
    }
}
