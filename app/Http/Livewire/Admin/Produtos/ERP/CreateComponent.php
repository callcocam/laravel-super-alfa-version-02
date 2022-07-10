<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos\ERP;

use App\Models\Marketing;
use App\Models\Produto;
use App\Models\Coperat;
use App\Models\User;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class CreateComponent extends FormComponent
{

    public function mount(Produto $model)
    {
       $this->setFormProperties($model);
    }

    public function success()
    {
        try {
            // if($this->validationFormDataCoperatId(data_get($this->form_data, 'codigo'))){
            //   return false;
            // }
            $codigo_interno = preg_replace('/[^0-9]/', '',data_get($this->form_data, 'codigo_interno'));
            $codigo_interno = trim($codigo_interno);
            $cod_barras = preg_replace('/[^0-9]/', '',data_get($this->form_data, 'cod_barras'));
            $cod_barras = trim($cod_barras);
            $this->model = Produto::create([
                "user_id"=>data_get($this->form_data, 'user_id'),
                "cod_barras"=>$cod_barras,
                "cod_prod_fornecedor"=>$cod_barras,
                "coperat_id"=>data_get($this->form_data, 'coperat_id'),
                "coperat_name"=>data_get($this->form_data, 'coperat_name'),
                "descricao_completa"=>data_get($this->form_data, 'descricao_completa'),
                "search" => $codigo_interno.' '.$cod_barras.' '.data_get($this->form_data, 'descricao_completa'),
                "status" =>"importadoerp"

            ]);
            $this->model->marketing()->create([
                "descricao_para_erp" => data_get($this->form_data, 'descricao_completa'),
                "descricao_para_encarte" => data_get($this->form_data, 'descricao_para_encarte'),
                "descricao_comercial" => data_get($this->form_data, 'descricao_completa'),
                "status" =>"importadoerp"
            ]);
            $this->model->compra()->create([
                "codigo_interno" => $codigo_interno,
                "status" =>"importadoerp"
            ]);

            flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
            $this->reset(['form_data']);
            return true;
        } catch (\PDOException $PDOException) {
            flash($PDOException->getMessage(), 'danger')->dismissable()->livewire($this);
            return false;
        }
    }


    /**
    * @return array
    */
    public function fields()
    {
        return [
            Field::make('Código Interno',"codigo_interno")->rules('required|unique:compras,codigo_interno')
            ->wire('lazy'),
            Field::make('Código Barras',"cod_barras")
            ->help('Descreva o código de Barras do Produto (EAN ou Gtin)')
            ->wire('lazy')
            ->rules('required|numeric|unique:produtos,cod_barras'),
            Field::make('Conta Cooperat',"codigo")->select()->model(Coperat::query()->orderBy('name'))->rules('required')
            ->help('Selecione o cadastro de Categorias da Cooperalfa')->rules('required'),
            Field::make('Descrição',"descricao_completa")->rules('required'),
            Field::make('Descrição para encarte',"descricao_para_encarte"),
            Field::make('Fornecedor',"user_id")->select()->model(User::query()->orderBy('name')->where('type','app'))->rules('required'),
        ];
    }

    // public function updatedFormDataCoperatId($value)
    // {
    //    $this->validationFormDataCoperatId($value);
    // }


    // protected function validationFormDataCoperatId($value){
    //     if($coperat = Coperat::query()->where('codigo', preg_replace('/[^0-9]/', '', $value))->first()){
    //         $this->form_data['coperat_id'] = $coperat->id;
    //         $this->form_data['coperat_name'] = $coperat->name;
    //         return false;
    //     }
    //      $this->addError("form_data.codigo", "Conta Cooperat [ {$value} ] não foi encontrado");
    //       return true;
    // }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function formView()
    {
        return 'admin.produtos.erp.create-component';
    }
}
