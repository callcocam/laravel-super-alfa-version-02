<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return Role::query();
    }

    public function columns(): array
    {
       return [
           Column::make('name')->searchable()->colspan(3)
       ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.roles";
    }


    public function view()
    {
       return 'admin.roles.list-component';
    }
}
