<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Medidas;

use App\Models\Medida;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return Medida::query();
    }

    public function columns(): array
    {
       return [
           Column::make('Nome','name')->searchable()->colspan(3),
       ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.medidas";
    }


    public function view()
    {
       return 'admin.medidas.list-component';
    }
}
