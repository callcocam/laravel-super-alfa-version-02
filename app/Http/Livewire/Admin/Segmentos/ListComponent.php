<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Segmentos;

use App\Models\TipoEmbalagem;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return TipoEmbalagem::query();
    }

    public function columns(): array
    {
       return [
           Column::make('Nome','name')->colspan(3)->searchable(),
       ];
    }


    public function layout(): string
    {
        return 'layouts.admin';
    }


    public function route()
    {
        return "admin.segmentos";
    }


    public function view()
    {
       return 'admin.segmentos.list-component';
    }
}
