<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Coperats;

use App\Models\Coperat;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return Coperat::query();
    }

    public function columns(): array
    {
       return [
           Column::make('Name', 'name')->sortable()->searchable(),
           Column::make('Código','codigo')->sortable()->searchable(),
           Column::make('ID', 'id')->sortable()->searchable(),

       ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.coperats";
    }


    public function view()
    {
       return 'admin.coperats.list-component';
    }
}
