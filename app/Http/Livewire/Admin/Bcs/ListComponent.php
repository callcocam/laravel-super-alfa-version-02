<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Bcs;

use App\Models\Bc;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;
use App\Exports\BcsExport;
use Maatwebsite\Excel\Facades\Excel;

class ListComponent extends TableComponent
{
    public $export_btn= true;
    public function query(): Builder
    {
      return Bc::query()->orderBy('nivel', 'asc');
    }

    public function columns(): array
    {
       return [
           Column::make('name')->searchable(),
           Column::make('nivel')->searchable()->sortable(),
           Column::make('id_bc')->searchable()->sortable(),
           Column::make('status')->colspan(3)->searchable(),
       ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.bcs";
    }


    public function view()
    {
       return 'admin.bcs.list-component';
    }


    public function export($type = "csv")
    {
        return Excel::download(new BcsExport(), sprintf('bcs.%s', $type));
    }

}
