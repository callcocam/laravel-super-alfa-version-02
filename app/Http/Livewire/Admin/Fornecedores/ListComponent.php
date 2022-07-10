<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Fornecedores;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return User::query()->where('type','app');
    }

    public function columns(): array
    {
       return [
         Column::make('Name')->sortable()->searchable(),
         Column::make('Email')->searchable()->colspan(3),

       ];
    }

    public function route()
    {
        return "admin.fornecedores";
    }

    public function getCreatedProperty()
    {

        return auth()->user()->hasAnyRole('super-admin','add-fornecedor');
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }


    public function view()
    {
       return 'admin.fornecedores.list-component';
    }
}
