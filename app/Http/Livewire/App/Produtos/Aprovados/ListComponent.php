<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Produtos\Aprovados;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
        return Produto::query()->whereIn('status',['cadastro','finalizado','concluido'])->user();
    }

    public function columns(): array
    {
        return [
            Column::make("Imagem",'imagem')->view('cover'),
            Column::make('Produto', 'descricao_completa')->searchable(),
            Column::make('Status', 'status')->colspan('3')->searchable(),
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

    public function deleteModel()
    {

//        try {
//            $this->currentDelete->embalagem()->delete();
//            $this->currentDelete->compra()->delete();
//            $this->currentDelete->marketing()->delete();
//        }catch (\PDOException $exception){
//            flash("Ouve um erro, não foi possivel realizar a operação, é provavel que exista registros relacionados", 'success')->dismissable()->livewire($this);
//
//        }
//
//        return parent::deleteModel();
    }

    /**
     * @return string
     */
    public function getTitleProperty()
    {
        return "Lista de produtos aprovados";
    }

    public function layout(): string
    {
        return 'layouts.app';
    }

    public function route()
    {
        return "app.produtos.aprovados";
    }


    public function view()
    {
        return 'app.produtos.aprovados.list-component';
    }

    public function getCreatedProperty()
    {
        return false;
    }
}
