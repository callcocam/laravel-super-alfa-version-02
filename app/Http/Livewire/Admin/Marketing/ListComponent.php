<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Marketing;

use App\Models\Coperat;
use App\Models\Marketing;
use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;
use SIGA\Table\Views\Filter;

class ListComponent extends TableComponent
{

    public $view_edit = "show";

    public function query(): Builder
    {
        if(\Arr::get($this->array_filters,'coperat')){
            return Marketing::query();
        }
        else{
            $prdutos = \App\Models\Produto::query()->where('status','marketing')->pluck('id')->toArray();
            return Marketing::query()->whereIn('produto_id', $prdutos);
        }
    }

    public function appendGuery($builder)
    {
        if($coperat = \Arr::get($this->array_filters,'coperat')){
            $coperats = Coperat::query()->where('slug', $coperat)->first();
            $produtos = Produto::query()->where('status','marketing')->where('coperat_id', $coperats->id)->pluck('id')->toArray();
            $builder->whereIn('produto_id', $produtos);
        }
        return $builder;
    }

    public function filters()
    {
        return [
            Filter::make('Categorias','coperat')->view('select')->options(Coperat::query()->pluck("name", "slug")->toArray(),true),
        ];
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

    public function isDeleted($model = null)
    {
        return false;
    }

    public function columns(): array
    {
        return [
            Column::make("Imagem", 'imagem')->format(function ($model, $column) {
                return view(view_table_include('cover'), compact('column'))->with('model', $model->produto);
            }),
            Column::make('Status'),
            Column::make('Fornecedor', 'user.name')->format(function ($model) {
                return $model->user->name;
            })->searchable(),
            Column::make('Produto', 'produto.search')->format(function ($model) {
                return $model->produto->descricao_completa;
            })->searchable()->colspan(3)
        ];
    }

    public function route()
    {
        return "admin.marketing";
    }


    public function view()
    {
        return 'admin.marketing.list-component';
    }


    public function layout(): string
    {
        return 'layouts.admin';
    }
}
