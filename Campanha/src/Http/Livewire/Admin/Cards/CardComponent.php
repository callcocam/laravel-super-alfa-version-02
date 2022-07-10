<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cards;

use Livewire\Component;

class CardComponent extends Component
{

    public $model;
    public $produto;

    public function mount($model,$produto)
    {
      $this->model = $model;
      $this->produto = $produto;
    }

    public function render()
    {
        return view("campanha::admin.cards.card-component");
    }


    public function name()
    {
        return "admin.cards.card-component";
    }

}
