<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Concluidos;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{
    public function query(): Builder
    {

        return Produto::query()
            ->whereIn('status',['concluido','compras-concluido']);
    }

    public function columns(): array
    {
        return [
            Column::make("Imagem",'imagem')->view('cover'),
            Column::make('Cod. Barras', 'cod_barras')->searchable(),
            Column::make('Código Interno Alfa', 'compra.codigo_interno')->format(function (Produto $model){
                return $model->compra->codigo_interno;
            })->searchable(),
            Column::make('Descrição Comercial', 'marketing.descricao_comercial')->format(function (Produto $model){
                return $model->marketing->descricao_comercial;
            })->searchable(),
            Column::make('Descrição Para ERP', 'marketing.descricao_para_erp')->format(function (Produto $model){
                return $model->marketing->descricao_para_erp;
            })->searchable(),

            Column::make('Ações')->view('actions')
        ];
    }

    public function isUpdated($model = null)
    {
        return false;
    }

    public function isDeleted($model = null)
    {
        return false;
    }


    /**
     * @return string
     */
    public function getTitleProperty()
    {
        return "Lista de produtos concluidos";
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.compras.concluidos";
    }


    public function view()
    {
        return 'admin.concluidos.list-component';
    }

    public function getCreatedProperty()
    {
        return false;
    }
}
