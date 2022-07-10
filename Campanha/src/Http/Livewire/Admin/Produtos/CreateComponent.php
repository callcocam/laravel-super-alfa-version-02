<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Produtos;

use App\Models\Compra;
use App\Models\Produto;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Support\Str;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

    protected $route = "admin.campanhas.produtos";

    public $confirm = false;
    public $app = false;
    public $currentUser;
    public $margem = null;
    public $medidas = [];

    protected $listeners = ['loadProducts','calcular_desconto'];
    public function mount(ProdutosCampanha $model,$medidas)
    {

        $this->currentUser = $this->user();
        $this->setFormProperties($model);
//        if($produto = $model->produto){
//            $this->form_data['descricao_comercial'] = $produto->marketing->descricao_para_encarte;
//            $this->model->descricao_comercial = $this->form_data['descricao_comercial'];
//        }
        if ($model->app == "sim") {
            $this->app = true;
        }
//        dd( $this->form_data);
        $this->calcular_desconto();
    }

    public function success()
    {

        $this->form_data['app'] = "nao";
        if ($this->app) {
            $this->form_data['app'] = "sim";
        }
//        $this->form_data['preco_app'] = preg_replace("/\D+/", "",$this->form_data['preco_app']);
//        $this->form_data['preco_normal'] = preg_replace("/\D+/", "",$this->form_data['preco_normal']);
//        $this->form_data['preco_custo'] = preg_replace("/\D+/", "",$this->form_data['preco_custo']);
//        $this->form_data['preco_promocional'] = preg_replace("/\D+/", "",$this->form_data['preco_promocional']);
//        $this->form_data['preco_desconto'] = preg_replace("/\D+/", "",$this->form_data['preco_desconto']);
//        $this->form_data['preco_caixa'] = preg_replace("/\D+/", "",$this->form_data['preco_caixa']);
//
            $valorminimo = [
                form_w($this->form_data['preco_normal']),
                form_w($this->form_data['preco_promocional']),
                form_w($this->form_data['preco_desconto']),
                form_w($this->form_data['preco_app'])
            ];

            $valorminimo = collect($valorminimo )->filter(function($item){
                return $item > 0;
            })->toArray();

            $quantidade_parcelas = $this->form_data['quantidade_parcelas'];
            if($valorminimo && $quantidade_parcelas >1){
                $valorminimo = min($valorminimo);
                $valorminimo = form_read($valorminimo);
                $valor_parcela =  Calcular($valorminimo, $quantidade_parcelas, '/');
                if(form_w($valor_parcela) < form_w(50)){
                    $this->addError("form_data.quantidade_parcelas", sprintf('O valor da parcela deve ser maior que 50,00, ajuste a quantidade de parcelas'));
                    return;
                }

            }

        $this->form_data['status'] = "published";
          if(data_get($this->form_data, 'selo')){
              $this->form_data['selo'] = 1;
          }else{
              $this->form_data['selo'] = 0;
          }
        if ($this->model->exists) {
            try {
                $this->model->update($this->form_data);
                $this->dispatchBrowserEvent('autosize');
                flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
                //atualizar o componente aqui
                $this->calcular_desconto();
                return true;
            } catch (\PDOException $PDOException) {
                $this->dispatchBrowserEvent('autosize');
                flash($PDOException->getMessage(), 'danger')->dismissable()->livewire($this);
                return false;
            }
        } else {
            try {
                $this->model = $this->model->create($this->form_data);
                flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
                $this->dispatchBrowserEvent('autosize');
                return true;
            } catch (\PDOException $PDOException) {
                $this->dispatchBrowserEvent('autosize');
                flash($PDOException->getMessage(), 'danger')->dismissable()->livewire($this);
                return false;
            }
        }
    }

    public function updatedFormDataDescricaoComercial($value)
    {

            $this->model->descricao_comercial = $value;
            $this->model->update();

//        if($produto = Produto::find($this->model->produto_id)){
//            $produto->ultima_atualizacao = now()->format('Y-m-d H:i:s');
//            $produto->marketing->descricao_para_encarte = $value;
//            $produto->update();
//            $produto->marketing->update();
//            $this->model->descricao_comercial = $value;
//            $this->model->update();
//        }
        $this->dispatchBrowserEvent('autosize');
    }


    public function updatedFormDataPrecoCusto($value)
    {

        $this->calcular_desconto();
        $this->dispatchBrowserEvent('autosize');
    }

    public function updatedFormDataPrecoDesconto($value)
    {
        $this->calcular_desconto();
        $this->dispatchBrowserEvent('autosize');
    }

    public function calcular_desconto(){
        $this->form_data['preco_desconto'] = form_read($this->form_data['preco_desconto']);
        $valorminimo = [
            form_w($this->form_data['preco_normal']),
            form_w($this->form_data['preco_promocional']),
            form_w($this->form_data['preco_desconto']),
            form_w($this->form_data['preco_app'])
        ];

        $valorminimo = array_filter($valorminimo);
       if($valorminimo){
           $valorminimo = min($valorminimo);
           $valorminimo = form_read($valorminimo);
           $precocusto = $this->form_data['preco_custo'];
           $margem = Calcular($valorminimo, $precocusto, '-');
           $margem =  Calcular($margem, $valorminimo, '/');
          // dd($precocusto,$valorminimo,$margem);
           $this->margem =  Calcular($margem, '100,0', '*');
       }
    }
    public function updatedFormDataCodigoInterno($value)
    {

//        dd($value);
        if ($compra = Compra::query()->where('codigo_interno', Str::beforeLast($value,'-'))->first()) {
            $this->form_data['descricao_comercial'] = $compra->produto->marketing->descricao_para_encarte;
            $this->form_data['produto_id'] = $compra->produto->id;
            $this->form_data['qde_por_cx'] = $compra->produto->qde_por_cx;
            $this->form_data['codigo_barras'] = $compra->produto->cod_barras;
           // $this->form_data['tipo_embalagem'] = $compra->produto->medida_name;
        } else {
            $this->form_data['produto_id'] = "";
            $this->form_data['codigo_barras'] = "";
            $this->form_data['descricao_comercial'] = "";
            $this->form_data['tipo_embalagem'] = "";
            $this->addError("codigo_interno", "Produto não encontrado");
        }

        $this->dispatchBrowserEvent('autosize');
    }

    public function updatedFormDataSelo($value)
    {

        if(data_get($this->form_data, 'selo')){
            $this->model->update([
                "selo"=>1
            ]);
        }else{
            $this->model->update([
                "selo"=>0
            ]);
        }
        $this->dispatchBrowserEvent('autosize');
    }

    public function loadProducts(ProdutosCampanha $model)
    {
        if ($model->id == $this->model->id){
            $this->setFormProperties($model);
        }
        $this->dispatchBrowserEvent('autosize');
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('codigo_interno')->rules('required'),
            Field::make('descricao_comercial'),
            Field::make('slug')->rules('required'),
            Field::make('codigo_barras')->rules('required'),
            Field::make('produto_id')->rules('required'),
            Field::make('coperat_id')->rules('required'),
            Field::make('descricao_auxiliar'),
            Field::make('quantidade_parcelas')->rules('required|numeric|gt:0|max:10'),
            Field::make('tipo_embalagem')->rules('required'),
            Field::make('preco_custo')->rules('required'),
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
            Field::make('campanha_id'),
        ];
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function formView()
    {
        return 'admin.campanhas.produtos.create-component';
    }

    public function closeModalForm($modal = 'openPanelRightCreateCampanhaItem')
    {
        $this->dispatchBrowserEvent('closeModalForm', $modal);
    }

    public function openShow($model)
    {

        $this->dispatchBrowserEvent('openModalForm', $model);

    }
    public function saveAndGoBack()
    {
        $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightCreateCampanhaItem');
    }
    public function saveAndStay()
    {
        parent::saveAndStay(); // TODO: Change the autogenerated stub

    }

    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras', 'lojas-campanha');
    }


    public function getEditDescricaoProperty()
    {

        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'marketing');
    }

    public function removeItem()
    {
        if ($this->confirm) {
            $this->model->grupos()->forceDelete();
            $this->model->forceDelete();
            $this->emit("refreshItems", $this->model->coperat_id);
            $this->confirm = false;
            return;
        }
        $this->confirm = true;

    }

    public function name()
    {
        return "admin.campanhas.produtos.create-component";
    }

    public function getProdutosProperty()
    {
        return Produto::query()->where('coperat_id', $this->model->coperat_id)->get();
    }

}
