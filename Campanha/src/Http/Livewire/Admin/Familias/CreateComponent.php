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

class CreateComponent extends FormComponent
{

        protected $route = "admin.familia-produtos";
        public $search_checkbox = "";


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

            if($search = \Arr::get($this->search_checkbox, 'produtos')){
                $marketings =  \App\Models\Marketing::query()->orderBy("produto_id")->limit('20')->where("descricao_comercial", 'LIKE', "%{$search}%")->whereNotNull('descricao_comercial')->pluck('produto_id','produto_id')->toArray();
                $query = \App\Models\Produto::query()->limit('20')
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
                            $options[$produto->id] = sprintf("%s-%s-%s", $produto->compra->codigo_interno, $produto->cod_barras, $produto->marketing->descricao_comercial);
                        }
                    }
                }
            }
            else{
            //    $query = \App\Models\Produto::query()->where('id',null)->orderBy("descricao_completa");
            }


            return [
                Field::make('Nome',"name"),
                Field::make('Status',"status")->options(["draft"=>"Rascunho","published"=>'Publicado'],true)->radio(),
                Field::make('Produtos', 'produtos')->checkbox()->options($options,true),
            ];
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
            return "admin.familia-produtos.create-component";
        }

        public function formView()
        {
            return 'admin.familia-produtos.create-component';
        }
}
