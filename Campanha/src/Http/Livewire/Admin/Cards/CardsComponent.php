<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cards;


use App\Models\Coperat;
use Campanha\Models\Campanha;
use Livewire\Component;
use SIGA\Table\Views\Column;

class CardsComponent extends Component
{

    public $model;

    public function mount($model)
    {
      $this->model = $model;
    }

    public function render()
    {
        return view("campanha::admin.cards.cards-component");
    }
 
    public function name()
    {
        return "admin.cards.cards-component";
    }

}
