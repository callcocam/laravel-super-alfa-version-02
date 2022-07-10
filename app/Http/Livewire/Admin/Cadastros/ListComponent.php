<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Cadastros;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public $view_edit = "show";


    public function query(): Builder
    {
        return Produto::query()->whereIn('status', ['cadastro']);
    }

    public function columns(): array
    {
        return [
            Column::make("Imagem",'imagem')->view('cover'),
            Column::make('Fornecedor', 'user.name')->searchable()->format(function ($model) {
                return $model->user->name;
            }),
            Column::make('Produto', 'descricao_completa')->searchable()->colspan(3)
        ];
    }

    public function isDeleted($model = null)
    {
        return false;
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.cadastros";
    }

    public function view()
    {
        return 'admin.cadastros.list-component';
    }

    public function getCreatedProperty()
    {
        return false;
    }

    public function deleteModel()
    {
        $this->currentDelete->compra()->delete();
        $this->currentDelete->marketing()->delete();
        return parent::deleteModel();
    }
}
