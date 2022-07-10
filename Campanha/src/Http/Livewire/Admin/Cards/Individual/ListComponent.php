<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cards\Individual;

use Campanha\Models\CardIndividual;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public $show_menu = false;

    protected $listeners = ['refreshItems'];

    public function refreshItems($data = null)
    {
        # code...
    }
    public function query(): Builder
    {
      return CardIndividual::query()->orderBy('order','desc');
    }

  
    public function columns(): array
    {
       return [ ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.cards.individual";
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.cards.individual.list-component";
    }

    public function view()
    {
        return 'admin.cards.individual.list-component';
    }

      
    public function routeCreate()
    {

        return 'admin.cards.individual.create';
    }
    

    public function routeEdit()
    {
        return 'admin.cards.individual.edit';

    }
}
