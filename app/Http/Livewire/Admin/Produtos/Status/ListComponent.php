<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos\Status;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{
    public $perPage = 100;

    public $confirm;
    public $status_options = [
        "criado"=>"Criado",
        "compras"=>"Compras",
        "marketing"=>"Marketing",
        "cadastro"=>"Cadastro",
        "arquivar"=>"Arquivado",
        "compras-concluido"=>"Compras Concluido",
        "concluido"=>"Concluido",
        "recusado"=>"Recusado",
    ];

    public function query(): Builder
    {
      return Produto::query()->where('status', '<>', 'importadoerp');
    }

    public function columns(): array
    {
        return [
            Column::make('Cod. Barras', 'cod_barras')->searchable(),
            Column::make('Código Interno', 'compra.codigo_interno')->format(function (Produto $model){
                return $model->compra->codigo_interno;
            })->searchable(),
            Column::make('Status Produto','status')->view('status')->searchable()->sortable(),
            Column::make('Status compra', 'compra.status')->view('status'),
            Column::make('Status marketing', 'marketing.status')->view('status'),
            Column::make('Ações')->view('status-editar')
        ];
    }

    protected function actions_columns()
    {
        $columns = $this->columns();

        return $columns;
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
        return "admin.produtos.status";
    }


    public function view()
    {
       return 'admin.produtos.status.list-component';
    }

    public function getCreatedProperty()
    {
        return false;
    }

    public function updateStatus($id)
    {
        $prod = Produto::find($id);
            if($this->confirm){
                $prod->status = $prod->status;
                $prod->save();

                $prod->compra->status = $prod->status;
                $prod->compra->save();

                $prod->marketing->status = $prod->status;
                $prod->marketing->save();
                $prod->confirm = null;
            }
            else{
                $this->confirm = $id;
            }


    }
}
