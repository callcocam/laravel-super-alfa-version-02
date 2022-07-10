<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public $btn_log = true;
    public $status_options = [
        "criado"=>"Criado",
        "compras"=>"Compras",
        "marketing"=>"Marketing",
        "cadastro"=>"Cadastro",
        "arquivar"=>"Arquivado",
        "compras-concluido"=>"Concluido",
        "recusado"=>"Recusado",
    ];

    public function query(): Builder
    {
      return Produto::query()->where('status', '<>', 'importadoerp');
    }

    public function columns(): array
    {
        return [
            Column::make("Imagem",'imagem')->view('cover'),
            Column::make('Cod. Barras', 'cod_barras')->searchable(),
            Column::make('Código Interno', 'compra.codigo_interno')->format(function (Produto $model){
                return $model->compra->codigo_interno;
            })->searchable(),
            Column::make('Descrição Comercial', 'marketing.descricao_comercial')->format(function (Produto $model){
                return $model->marketing->descricao_comercial;
            })->searchable(),
            Column::make('Descrição Forncedor','descricao_completa')->searchable()->sortable(),
            Column::make('Criado em','created_at')->searchable()->sortable(),
            Column::make('Status','status')->view('status')->colspan('3')->searchable()->sortable(),
            Column::make('Ações')->view('logs')->hideIf(auth()->user()->hasAllRoles('compras'))
        ];
    }

    /**
     * @return string
     */
    public function getTitleProperty()
    {
        return "Lista de produtos";
    }
    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.produtos";
    }


    public function view()
    {
       return 'admin.produtos.list-component';
    }
    public function deleteModel()
    {
        $this->currentDelete->compra()->delete();
        $this->currentDelete->marketing()->delete();
        return parent::deleteModel();
    }


    public function getCreatedProperty()
    {
        return false;
    }
    public function isUpdated($model = null)
    {
        if(auth()->user()->hasAllRoles('compras')){
            return false;
        }
        return true;
    }

    /**
     * @param null $model
     * @return bool
     */
    public function isDeleted($model = null)
    {
        if(auth()->user()->hasAllRoles('compras')){
            return false;
        }
        return true;
    }
}
