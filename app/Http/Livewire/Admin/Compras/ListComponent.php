<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Compras;

use App\Models\Compra;
use App\Models\User;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public $view_edit = "show";

    public function query(): Builder
    {
        
        if($this->user->hasAnyRole('super-admin', 'administrador-do-sistema'))
        {   $prdutos = \App\Models\Produto::query()->where('status','compras')->pluck('id')->toArray();
            return Compra::query()
            ->whereIn('produto_id',$prdutos);
        }

        $coperats = $this->user()->coperat;
        $ids_produtos = [];
        foreach ($coperats as $coperat){
            $ids_produtos = array_merge($ids_produtos,$coperat->produtos->pluck('id')->toArray());
        }

        $prdutos = \App\Models\Produto::query() ->whereIn('id',$ids_produtos)->where('status','compras')->pluck('id')->toArray();
        //             dd($ids_produtos);
        return Compra::query()
            ->whereIn('produto_id',$prdutos);
    }

    /**
     * @return string
     */
    public function getTitleProperty()
    {
        return "Lista de produtos";
    }

    public function getCreatedProperty()
    {
        return false;
    }

    public function columns(): array
    {
        return [
            Column::make("Imagem",'imagem')->format(function ($model, $column){
                return view(view_table_include('cover'),compact('column'))->with('model',$model->produto);
            }),
            Column::make('Fornecedor','user.name')->format(function ($model){
                return $model->user->name;
            })->searchable(),
            Column::make('Produto','produto.descricao_completa')->format(function ($model){
                return $model->produto->descricao_completa;
            })->searchable()->colspan(3)
        ];
    }

    public function route()
    {
        return "admin.compras";
    }

    public function isDeleted($model = null)
    {
        return false;
    }

    public function view()
    {
        return 'admin.compras.list-component';
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function deleteModel()
    {
        $this->currentDelete->compra()->delete();
        $this->currentDelete->marketing()->delete();
        return parent::deleteModel();
    }
}
