<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos\Arquivados;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public $confirm = false;
    // public $status_options = [
    //     "criado"=>"Criado",
    //     "compras"=>"Compras",
    //     "marketing"=>"Marketing",
    //     "cadastro"=>"Cadastro",
    //     "arquivar"=>"Arquivado",
    //     "compras-concluido"=>"Concluido",
    //     "recusado"=>"Recusado",
    // ];

    public function query(): Builder
    {
      return Produto::query()->where('status', 'arquivar');
    }


    protected function actions_columns()
    {
        $columns = $this->columns();

        return $columns;
    }

    public function columns(): array
    {
        return [
            Column::make("Imagem",'imagem')->view('cover'),
            Column::make('Cod. Barras', 'cod_barras')->searchable(),
            Column::make('Descrição do Fornecedor', 'descricao_completa')->searchable(),
            Column::make('Código Interno', 'compra.codigo_interno')->format(function (Produto $model){
                return $model->compra->codigo_interno;
            })->searchable(),
            Column::make('Descrição Comercial', 'marketing.descricao_comercial')->format(function (Produto $model){
                return $model->marketing->descricao_comercial;
            })->searchable(),
            Column::make('Status','status')->view('status')->searchable()->sortable(),
            Column::make('Ações','status')->view('status-update')->colspan('3'),
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
       return 'admin.produtos.arquivados.list-component';
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


    public function updateStatus($id)
    {
        if($this->confirm === $id){
            if($model = Produto::find($id)){
                $model->update([
                    'status' => 'compras'
                ]);
                $model->compra()->update([
                    'status' => 'compras'
                ]);
                $model->marketing()->update([
                    'status' => 'compras'
                ]);
            }
        }
        $this->confirm = $id;
    }
}
