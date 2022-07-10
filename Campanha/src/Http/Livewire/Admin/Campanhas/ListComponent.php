<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Campanhas;


use App\Models\Coperat;
use Campanha\Models\Campanha;
use Campanha\Models\GrupoProduto;
use SIGA\Table\TableComponent;
use SIGA\Table\Views\Column;
use SIGA\Table\Views\Filter;

class ListComponent extends TableComponent
{

    public $data_field = "data_inicio";
    public $array_filters = ["status"=>'published'];
    public function query()
    {
        $query = Campanha::query();
        if (auth()->user()->hasAnyRole('lojas-campanha')) {
            if($loja = auth()->user()->loja) {
                $query->whereIn('id',$loja->campanhas()->pluck('id','id')->toArray());
            }
        }
        if($status = \Arr::get($this->array_filters,'status')){
            $query->where('status',$status);
        }else{
            $query->where('status','published');
        }
        if($type = \Arr::get($this->array_filters,'type')){
            $query->where('type',$type);
        }
        if($lojas = \Arr::get($this->array_filters,'lojas')){
           if($loja = \App\Models\Loja::find($lojas)){
               $query->whereIn('id',$loja->campanhas()->pluck('id','id')->toArray());
           }
        }
        return $query;
    }



    public function filters()
    {

        $options = [];
        $lojas= \App\Models\Loja::query()->get();
       if($lojas){
            $lojas = $lojas->sortBy('codigo');
            foreach($lojas as $loja){
                $options[$loja->id] =sprintf("%s - %s",  $loja->codigo,  $loja->nome);
            }
       }

        return [
            Filter::make('Lojas','lojas')->view('select')->options($options, true),
            Filter::make('Tipo','type')->view('select')->options([
                'lamina_fim_semana'=>"Lâmina fim de Semana",
                'lamina_segunda_terca'=>"Lâmina Segunda e Terça",
                'lamina_terca_sabor'=>"Lâmina terça do Sabor",
                'lamina_hortifruti'=>"Lâmina hortifruti",
                'lamina_ofertas_arrasadoras'=>"Lâmina ofertas arrasadoras",
                'lamina_extra'=>"Lâmina Extra",
                'card'=>"Card",
                 'lamina'=>"Lâmina",
                'tabloide'=>'Tabloide',
                'eletro'=>'Eletro',

            ],true),
            Filter::make('Situação','status')->view('select')->options(['draft'=>'Bloqueada','published'=>"Em Andamento", 'finished'=>"Concluida"],true),
            // Filter::make('Situação','status')->view('select')->options(['draft'=>'Bloqueada','published'=>"Em Andamento", 'finished'=>"Concluida"],true),
        ];
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function view()
    {
        return "admin.campanhas.list-component";
    }

    public function columns(): array
    {
        return [
            Column::make("nome")->searchable(),
            Column::make("Status")->format(function ($model){
                $status = ['draft'=>'Bloqueada','published'=>"Em Andamento", 'finished'=>"Concluida"];
                if (isset($status[$model->status])){
                    return $status[$model->status];
                }
                return $model->status;
            })->sortable(),
            Column::make('Data de nicio', "data_inicio")->format(function ($model) {
                return date_carbom_format($model->data_inicio)->format("d/m/Y");
            })->sortable(),
            Column::make('Data de Fim', "data_fim")->format(function ($model) {
                return date_carbom_format($model->data_fim)->format("d/m/Y");
            })->sortable(),
        ];
    }
    protected function actions_columns()
    {

        $columns = $this->columns();
        
        // $columns[] = Column::make('order')->view("order")
        //     ->hidden_head()->width(150)->hideIf(function ($model) {
        //         return $this->isUpdated($model);
        //     });
        $columns[] = Column::make('show')->view("show-extra")
            ->hidden_head()->width(150)->hideIf(function ($model) {
                if ($model) {
                    if (auth()->user()->hasAnyRole('lojas-campanha')) {
                        return $model->loja()->where(function($query){
                            $query->where('id',auth()->user()->loja_id);
                        })->count();
                    }
                }
                return auth()->user()->hasAnyRole('super-admin', 'administrador-do-sistema', 'marketing', 'compras', 'campanhas');
            });
        $columns[] = Column::make('edit')->view($this->view_edit)
            ->hidden_head()->width(150)->hideIf(function ($model) {
                return $this->isUpdated($model);
            });
        $columns[] = Column::make('delete')->view($this->view_delete)
            ->hidden_head()->width(150)->hideIf(function ($model) {
                return $this->isDeleted($model);
            });

        return $columns;
    }

    public function isDeleted($model = null)
    {
        return auth()->user()->hasAnyRole('super-admin', 'administrador-do-sistema');
    }

    public function isUpdated($model = null)
    {

        return auth()->user()->hasAnyRole('super-admin', 'administrador-do-sistema', 'marketing');
    }

    public function getCreatedProperty()
    {
        return auth()->user()->hasAnyRole('super-admin', 'administrador-do-sistema', 'marketing');
    }

    public function visible($model)
    {

        if (auth()->user()->hasAnyRole('super-admin', 'administrador-do-sistema', 'marketing')) {
            return true;
        }
        if (auth()->user()->hasAnyRole('compras','super-admin', 'administrador-do-sistema', 'campanhas')) {
            return $model->coperat->count();
        } elseif (auth()->user()->hasAnyRole('lojas-campanhas')) {
            return auth()->user()->loja->count();
        } else {
            return true;
        }
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.campanhas";
    }

    public function name()
    {
        return "admin.campanhas.list-component";
    }


    public function deleteChildren($model)
    {
        $model->produtos->map(function($produto){
            $produto->grupo->map(function(GrupoProduto $grupo) {
                $grupo->delete();
            });
            $produto->delete();
        });
        $model->coperat()->detach();
        $model->loja()->detach();
        return true;
    }
    public function kill($id)
    {
        try {
            $model = $this->query()->find($id);
            $model->forceDelete();
            $this->confirming = null;
            return;
        } catch (\PDOException $exception) {
            dd($exception->getMessage());
            $this->confirming = null;
        }
    }

    
    public function routeOrder()
    {
        return 'app.produtos.editar';

    }
    
    public function routeOrderCategory()
    {
        return 'app.produtos.editar';

    }
}
