<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Compras\Aprovados;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public $btn_concluir =true;

    public $concluir;
    public function query(): Builder
    {
        if($this->user->hasAnyRole('super-admin', 'administrador-do-sistema'))
        {         
            return Produto::query()->whereIn('status',['compras-concluido']);
        }
        $coperats = $this->user()->coperat;
        $ids_produtos = [];
        foreach ($coperats as $coperat){

            $ids_produtos = array_merge($ids_produtos,$coperat->produtos->pluck('id')->toArray());
        }

        return Produto::query()
            ->whereIn('id',$ids_produtos)
            ->whereIn('status',['compras-concluido']);
    }

    public function columns(): array
    {
        return [
            Column::make("Imagem",'imagem')->view('cover'),
            Column::make('Produto', 'descricao_completa')->searchable(),
            Column::make('Código Interno Alfa', 'compra.codigo_interno')->format(function (Produto $model){
                return $model->compra->codigo_interno;
            })->searchable(),
            Column::make('Ações')->view('actions')
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


    /**
     * @return string
     */
    public function getTitleProperty()
    {
        return "Lista de produtos com cadastro concluídos";
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.compras.aprovados";
    }


    public function view()
    {
        return 'admin.compras.aprovados.list-component';
    }

    public function getCreatedProperty()
    {
        return false;
    }

    public function concluirUpdate($id){

        if ($this->concluir){
            $model = Produto::find($id);

            $model->compra()->update([
                'status'=>'concluido'
            ]);

            $model->marketing()->update([
                'status'=>'concluido'
            ]);

            $model->update([
                'status'=>'concluido'
            ]);
            $this->concluir = null;
        }
        else{
            $this->concluir = $id;
        }
    }
}
