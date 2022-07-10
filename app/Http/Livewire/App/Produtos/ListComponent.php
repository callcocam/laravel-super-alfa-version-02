<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Produtos;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
        return Produto::query()->whereIn('status',["criado","compras",'recusado','marketing'])->user();
    }

    public function columns(): array
    {
        return [
            Column::make("Imagem",'imagem')->view('cover'),
            Column::make('Produto', 'descricao_completa')->searchable(),
//            Column::make('Cod. Barras', 'cod_barras')->searchable(),
            Column::make('Status', 'status')->colspan('3')->searchable(),
        ];
    }

    public function isUpdated($model = null)
    {
        if ($model) {
            return in_array($model->status, ["criado",'recusado']);
        }
        return parent::isUpdated($model);
    }

    public function isDeleted($model = null)
    {
        if ($model) {
            return !in_array($model->status, ["compras",'recusado','marketing']);
        }
        return parent::isDeleted($model);
    }

    public function deleteModel()
    {

        try {
            $this->currentDelete->embalagem()->delete();
            $this->currentDelete->compra()->delete();
            $this->currentDelete->marketing()->delete();
        }catch (\PDOException $exception){
            flash("Ouve um erro, não foi possivel realizar a operação, é provavel que exista registros relacionados", 'success')->dismissable()->livewire($this);

        }

        return parent::deleteModel();
    }

    /**
     * @return string
     */
    public function getTitleProperty()
    {
        return "Lista de produtos em processo";
    }

    public function layout(): string
    {
        return 'layouts.app';
    }

    public function route()
    {
        return "app.produtos";
    }


    public function view()
    {
        return 'app.produtos.list-component';
    }

    public function getCreatedProperty()
    {
        return $this->query()->whereIn('status',["criado",'recusado'])->count()<=50;
    }

    public function routeCreate()
    {

        return 'app.produtos.cadastrar';
    }


    public function routeEdit()
    {
        return 'app.produtos.editar';

    }
}
