<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Clusters;

use App\Models\Cluster;
use SIGA\Table\Views\Column;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return Cluster::query();
    }

    public function columns(): array
    {
       return [
        Column::make('Nome','nome')->colspan(3)->searchable(),
    ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.clusters";
    }

    public function view()
    {
       return 'admin.clusters.list-component';
    }
}
