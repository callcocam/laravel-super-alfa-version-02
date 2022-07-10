<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Familias;

use Campanha\Models\FamiliaProduto;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class EditComponent extends FormComponent
{

        protected $route = "admin.familia-produtos";
        public $search_checkbox = "";
        public $search_extras = [
            "field"=>"codigo_interno",
            "placeholder"=>"Digite o Código interno"
        ];

        public function mount(FamiliaProduto $model)
        {
           $this->setFormProperties($model);
        }

        /**
        * @return array
        */
        public function fields()
        {
            $options = [];
            $selecionados = [];
            if($produtosSelecionados = $this->model->produtos){
                $selecionados = array_keys($produtosSelecionados->toArray());
            }

            if($search = \Arr::get($this->search_checkbox, 'produtos')){
                $marketings =  \App\Models\Marketing::query()
                ->leftJoin('familia_produto_produto', function ($join) {
                    $join->on('marketings.produto_id', '=', 'familia_produto_produto.produto_id');
                })
                // ->leftJoin('compras', function ($join) {
                //     $join->on('marketings.produto_id', '=', 'compras.produto_id');
                // })
                ->select('marketings.*')
                //->select('compras.codigo_interno')
                ->orderBy('familia_produto_produto.order')
                //->where("compras.codigo_interno", 'LIKE', "%{$search}%")
                ->where("marketings.descricao_comercial", 'LIKE', "%{$search}%")
                ->whereNotNull('marketings.descricao_comercial')
                ->pluck('marketings.produto_id','marketings.produto_id')->toArray();

                $query = \App\Models\Produto::query()->limit('20')
                ->whereNotIn('id',$selecionados)
                ->whereIn('id',$marketings)
                ->whereIn('status',['concluido','importadoerp'])
                ->limit('20')
                ->orderBy("id");

                $query->where("search", 'LIKE', "%{$search}%")
                    ->orWhere("cod_barras", 'LIKE', "%{$search}%");

                $produtos = $query->get();

                if($produtos->count()){
                    foreach($produtos as $produto){
                        if(!$produto->familia_produtos->count()){
                            $options[$produto->id] = sprintf("%s - %s - %s", $produto->compra->codigo_interno, $produto->cod_barras, $produto->marketing->descricao_comercial);
                        }
                    }
                }
            }
            elseif ($search = \Arr::get($this->search_checkbox, $this->search_extras['field'])){
                $compras =  \App\Models\Compra::query()
                ->leftJoin('familia_produto_produto', function ($join) {
                    $join->on('compras.produto_id', '=', 'familia_produto_produto.produto_id');
                })
                ->select('compras.produto_id')
                ->orderBy('familia_produto_produto.order')
                ->where("compras.codigo_interno", 'LIKE', "%{$search}%")
                ->pluck('compras.produto_id','compras.produto_id')->toArray();

                $query = \App\Models\Produto::query()->limit('20')
                ->whereNotIn('id',$selecionados)
                ->whereIn('id',$compras)
                ->whereIn('status',['concluido','importadoerp'])
                ->limit('20')
                ->orderBy("id");

                $produtos = $query->get();

                if($produtos->count()){
                    foreach($produtos as $produto){
                        if(!$produto->familia_produtos->count()){
                            $options[$produto->id] = sprintf("%s - %s - %s", $produto->compra->codigo_interno, $produto->cod_barras, $produto->marketing->descricao_comercial);
                        }
                    }
                }
            }
            else{
              $query = \App\Models\Produto::query()
              ->whereIn('produtos.status',['concluido','importadoerp'])->whereIn('id',$selecionados)              
              ->leftJoin('familia_produto_produto', function ($join) {
                $join->on('produtos.id', '=', 'familia_produto_produto.produto_id');
            })
            ->select('produtos.*')->orderBy('familia_produto_produto.order')
              ->orderBy("id");
              $produtos = $query->get();
              if($produtos->count()){
                foreach($produtos as $produto){
                    $options[$produto->id] = sprintf("%s - %s - %s", $produto->compra->codigo_interno, $produto->cod_barras, $produto->marketing->descricao_comercial);
                }
            }
            }

            return [
                Field::make('Nome',"name"),
                Field::make('Status',"status")->options(["draft"=>"Rascunho ","published"=>'Publicado '],true)->radio(),
                Field::make('Produtos', 'produtos')->checkbox()->sort()->options($options,true),
            ];
        }

        
        public function updateOrder($data){
            $relations = [];
            if($data){
             foreach($data as $key=>$val){
                $relations[] = [
                    'order'=>$val['order'],
                    'produto_id'=>$val['value'],
                ];
             }
            }
            $this->model->produtos()->sync($relations);
        }

        public function success()
        {
            if (parent::success()) {
                if ($this->isField('produtos')) {
                    $coperat = array_filter($this->form_data['produtos']);
                    $this->model->produtos()->sync(array_keys($coperat));
                }
                return true;
            }
            return false;
        }

        public function prefix()
        {
            return "campanha::";
        }

        public function name()
        {
            return "admin.familia-produtos.edit-component";
        }

        public function formView()
        {
            return 'admin.familia-produtos.edit-component';
        }
}
