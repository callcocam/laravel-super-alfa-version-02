<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Familias;

use Campanha\Models\FamiliaProduto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return FamiliaProduto::query();
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
        return "admin.familia-produtos";
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.familia-produtos.list-component";
    }

    public function view()
    {
        return 'admin.familia-produtos.list-component';
    }
}
