<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cartaz\Bg;


use Campanha\Models\BgCartaz;
use SIGA\Table\TableComponent;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public $isSearch = false;

    public function query()
    {
        return BgCartaz::query();
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function view()
    {
        return "admin.cartaz.bg.list-component";
    }

    public function columns(): array
    {
        return [
            Column::make("Status")->format(function ($model){
                $status = ['draft'=>'Bloqueada','published'=>"Em Andamento", 'finished'=>"Concluida"];
                if (isset($status[$model->status])){
                    return $status[$model->status];
                }
                return $model->status;
            }),
            Column::make('Data de cadastro', "created_at")->format(function ($model) {
                return date_carbom_format($model->data_inicio)->format("d/m/Y");
            })
        ];
    }
    protected function actions_columns()
    {
    
        $columns = $this->columns();
    
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

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.cartaz.bg";
    }

    public function name()
    {
        return "admin.cartaz.bg.list-component";
    }

}
