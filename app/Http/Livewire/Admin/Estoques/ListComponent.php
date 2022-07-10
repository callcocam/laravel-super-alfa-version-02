<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Estoques;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return Produto::query()->whereIn('status',['concluido','compras-concluido']);;
    }

    public function isDeleted($model = null)
    {
        return false;
    }

    public function isUpdated($model = null)
    {
        return false;
    }

    public function columns(): array
    {
       return [
           Column::make("Imagem",'imagem')->view('cover'),
           Column::make('Fornecedor','user.name')->format(function ($model){
               return $model->user->name;
           })->searchable(),
           Column::make('Produto','descricao_completa')->searchable(),
           Column::make('Ações')->view('actions')
       ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.estoques";
    }

    public function finishUpdate($id){

        $model = Produto::find($id);

        $model->compra()->update([
            'status'=>'finalizado'
        ]);

        $model->marketing()->update([
            'status'=>'finalizado'
        ]);

        $model->update([
            'status'=>'finalizado'
        ]);

    }

    public function getCreatedProperty()
    {
        return false;
    }

    public function view()
    {
       return 'admin.estoques.list-component';
    }
}
