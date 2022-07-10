<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Arquivos;

use App\Models\Arquivo;
use Illuminate\Support\Facades\Storage;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public $status_btn = true;
    public function query(): Builder
    {
        return Arquivo::query()->where('type','arquivos');
    }

    public function columns(): array
    {
        return [
            Column::make('Nome do arquivo', 'name'),
            Column::make('Link', 'archive')->format(function ($model) {
                return view('includes.arquivos.link', compact('model'));
            })->colspan(3),
        ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.arquivos";
    }


    public function isUpdated($model = null)
    {
        return false;
    }

    public function view()
    {
        return 'admin.arquivos.list-component';
    }

    public function deleteModel()
    {
        if (Storage::exists($this->currentDelete->archive)) {
            Storage::delete($this->currentDelete->archive);
        }
        return parent::deleteModel();
    }
}
