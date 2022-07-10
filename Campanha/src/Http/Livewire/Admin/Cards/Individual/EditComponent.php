<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cards\Individual;

use Campanha\Models\CardGroup;
use Campanha\Models\CardIndividual;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class EditComponent extends FormComponent
{

        protected $route = "admin.cards.individual.edit";

        public $currentUser;

        public $confirm = false;
        public $app = false;


        public function mount(CardIndividual $model)
        {
            $this->setFormProperties($model);

            $this->currentUser = $this->user();
//        dd($this->form_data['app']);
            if($this->form_data['app'] == 'sim'){
                $this->app = true;
            }

        }


    public function getMedidasProperty()
    {
        return  \App\Models\Medida::query()->get()->toArray();
    }

    public function removeItem()
    {
        if ($this->confirm) {
            $this->model->produtos_familia()->forceDelete();
            $this->model->produtos_parceiros()->forceDelete();
            $this->model->forceDelete();
            $this->emit("refreshItems",[]);
            $this->confirm = false;
            return;
        }
        $this->confirm = true;

    }

        /**
         * @return array
         */
        public function fields()
        {
        return [
            Field::make('codigo_interno')->rules('required'),
            Field::make('descricao_comercial'),
            Field::make('codigo_barras')->rules('required'),
            Field::make('produto_id')->rules('required'),
            Field::make('descricao_auxiliar'),
            Field::make('quantidade_parcelas')->rules('required|numeric|gt:0|max:10'),
            Field::make('tipo_embalagem')->rules('required'),
            Field::make('preco_normal')->rules('required'),
            Field::make('preco_promocional')->rules(function ($data) {
            if (!$data) {
                return 'required';
            }
                  }, $this->app),

            Field::make('preco_desconto'),
            Field::make('tabloide'),
            Field::make('fracionado'),
            Field::make('selo'),
            Field::make('qde_por_cx'),
            Field::make('preco_caixa'),
            Field::make('preco_app')->rules(function ($data) {
                if ($data) {
                    return 'required';
                }
            }, $this->app),
            Field::make('app'),
            Field::make('status'),
            Field::make('user_id'),
            Field::make('selo_id'),
        ];
        }

        public function success()
        {
           
            $valorminimo = [
                form_w($this->form_data['preco_normal']),
                form_w($this->form_data['preco_promocional']),
                form_w($this->form_data['preco_desconto']),
                form_w($this->form_data['preco_app'])
            ];

            $valorminimo = collect($valorminimo )->filter(function($item){
                return $item > 0;
            })->toArray();
            $quantidade_parcelas = data_get($this->form_data, 'quantidade_parcelas');
            if($valorminimo && $quantidade_parcelas >1){
                $valorminimo = min($valorminimo);
                $valorminimo = form_read($valorminimo);
                $valor_parcela =  Calcular($valorminimo, $quantidade_parcelas, '/');
                if(form_w($valor_parcela) < form_w(50)){
                    $this->addError("form_data.quantidade_parcelas", sprintf('O valor da parcela deve ser maior que 50,00, ajuste a quantidade de parcelas'));
                    return;
                }

            }

            if (is_array(data_get($this->form_data, 'selo'))) {
                if (data_get($this->form_data, 'selo')) {
                    $this->form_data['selo'] = count(data_get($this->form_data, 'selo'), []);
                }else{
                    $this->form_data['selo'] = false;
                }
            }
            
            $this->form_data['app'] = "nao";
            if ($this->app) {
                $this->form_data['app'] = "sim";

            }
           $this->form_data['status'] = 'published';
           if($descricao_comercial = data_get($this->form_data,'descricao_comercial')){
            $this->form_data['slug'] = \Str::slug($descricao_comercial);
           }
           else{
            $this->form_data['slug'] = \Str::slug(data_get($this->form_data,'descricao_auxiliar'));
           }

            return parent::success();
        }

    public function openShow($model)
    {

        $this->dispatchBrowserEvent('openModalForm', $model);

    }

    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras','lojas-campanha');
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

        public function prefix()
        {
            return "campanha::";
        }

        public function name()
        {
            return "admin.cards.individual.edit-component";
        }

        public function formView()
        {
            return 'admin.cards.individual.edit-component';
        }
}
