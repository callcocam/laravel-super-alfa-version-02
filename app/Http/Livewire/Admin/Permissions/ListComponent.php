<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use SIGA\Acl\Helpers\LoadRouterHelper;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
        LoadRouterHelper::save();

        return Permission::query();
    }

    public function columns(): array
    {
        return [
            Column::make('name')->colspan(2)
        ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.permissions";
    }


    public function view()
    {
        return 'admin.permissions.list-component';
    }

}
