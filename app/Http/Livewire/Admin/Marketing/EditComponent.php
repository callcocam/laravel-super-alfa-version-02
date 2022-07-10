<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Marketing;

use App\Models\Marketing;

class EditComponent extends FormComponent
{

    public $aquivar = false;

    protected $route = "admin.marketing";

    public function mount(Marketing $model)
    {

        $model->produtos = $model->produto;
        $model->embalagens = $model->produto->embalagem;
        $model->compras = $model->produto->compra;
        $this->setFormProperties($model);
        //$this->form_data['descricao_para_erp'] = "";
    }


    public function title()
    {
        return sprintf('Editar %s - %s', $this->model->user->name, $this->model->produto->descricao_completa);
    }

    public function saveAndGoBack()
    {
        $description=[];
        $description[] =  $this->model->produto->cod_barras;
        $description[] =  $this->model->produto->descricao_completa;
        $description[] =  $this->model->descricao_comercial;
        $description[] =  $this->model->descricao_para_erp;
        $description[] =  $this->model->descricao_para_encarte;
        $description[] =  $this->model->produto->compra->codigo_interno;

        $medida_name = "";
        if($medida =  \App\Models\Medida::find( $this->form_data['produtos']['unidade_medida']))
        {
            $medida_name = $medida->name;
        }

        $this->model->produto->update([
            'marca' => $this->form_data['produtos']['marca'],
            'coperat_id' => $this->form_data['produtos']['coperat_id'],
            'categoria_produto' => $this->form_data['produtos']['categoria_produto'],
            'subcategoria' => $this->form_data['produtos']['subcategoria'],
            'fragrancia_sabor' => $this->form_data['produtos']['fragrancia_sabor'],
            'tipo_de_embalagem' => $this->form_data['produtos']['tipo_de_embalagem'],
            'volume_de_embalagem' => $this->form_data['produtos']['volume_de_embalagem'],
            'cor' => $this->form_data['produtos']['cor'],
            'sabor' => $this->form_data['produtos']['sabor'],
            'modelo' => $this->form_data['produtos']['modelo'],
            'segmento' => $this->form_data['produtos']['segmento'],
            'subsegmento' => $this->form_data['produtos']['subsegmento'],
            'unidade_medida' => $this->form_data['produtos']['unidade_medida'],
            'medida_id' => $this->form_data['produtos']['unidade_medida'],
            'medida_name' => $medida_name,
            'search' =>  trim(implode(" ", $description)),
        ]);
        $this->logAtualizar(sprintf("Atualizou o produto %s", $this->model->produto->descricao_completa), 'marketing');
        return parent::saveAndGoBack();
    }

    public function cadastroStatus()
    {

        $this->validate(array_merge($this->rules(), [
            "form_data.descricao_comercial" => 'required',
            "form_data.descricao_para_erp" => 'required|max:35',
            "form_data.conta_nivel01" => 'required',
            "form_data.conta_nivel02" => 'required',
            "form_data.conta_nivel03" => 'required',
            "form_data.conta_nivel04" => 'required'
        ]));

        $description=[];
        $description[] =  $this->model->produto->cod_barras;
        $description[] =  $this->model->produto->descricao_completa;
        $description[] =  $this->model->descricao_comercial;
        $description[] =  $this->model->descricao_para_erp;
        $description[] =  $this->model->descricao_para_encarte;
        $description[] =  $this->model->produto->compra->codigo_interno;
        $medida_name = "";
        if($medida =  \App\Models\Medida::find( $this->form_data['produtos']['unidade_medida']))
        {
            $medida_name = $medida->name;
        }
        $this->model->produto->update([
            'marca' => $this->form_data['produtos']['marca'],
            'coperat_id' => $this->form_data['produtos']['coperat_id'],
            'categoria_produto' => $this->form_data['produtos']['categoria_produto'],
            'subcategoria' => $this->form_data['produtos']['subcategoria'],
            'fragrancia_sabor' => $this->form_data['produtos']['fragrancia_sabor'],
            'tipo_de_embalagem' => $this->form_data['produtos']['tipo_de_embalagem'],
            'volume_de_embalagem' => $this->form_data['produtos']['volume_de_embalagem'],
            'cor' => $this->form_data['produtos']['cor'],
            'sabor' => $this->form_data['produtos']['sabor'],
            'modelo' => $this->form_data['produtos']['modelo'],
            'segmento' => $this->form_data['produtos']['segmento'],
            'subsegmento' => $this->form_data['produtos']['subsegmento'],
            'unidade_medida' => $this->form_data['produtos']['unidade_medida'],
            'medida_id' => $this->form_data['produtos']['unidade_medida'],
            'medida_name' => $medida_name,
            'status' => 'cadastro',
            'search' => trim(implode(" ", $description)),
        ]);
        $this->form_data['status'] = 'cadastro';
        $this->form_data['updated_at'] = now();

        $this->model->produto->compra()->update([
            'status' => 'cadastro'
        ]);
        if (isset($this->form_data['produtos'])) {
            if (isset($this->form_data['produtos']['coperat_id'])) {
                $this->model->produto->coperat_id = $this->form_data['produtos']['coperat_id'];
                $this->model->produto->save();
            }
        }
        if ($this->success()) {

            // foi desmarcado a cagada em 18/05/2022
            $this->copiarParaArquivos();
            $this->logAtualizar(sprintf("Atualizou o status do produto %s, para cadastro", $this->model->produto->descricao_completa), 'marketing');
            return true;
        }
        return false;
    }


    public function arquivarStatus()
    {
        $this->model->produto->update([
            'status' => 'arquivar'
        ]);
        $this->model->produto->marketing()->update([
            'status' => 'arquivar'
        ]);
        $this->form_data['status'] = 'arquivar';

        if ($this->success()) {
            $this->logAtualizar(sprintf("Arquivou o produto %s", $$this->model->produto->descricao_completa), 'marketing');
            return true;
        }
        return false;
    }

    public function formView()
    {
        return 'admin.marketing.edit-component';
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function openModalRecusaAction()
    {
        $this->dispatchBrowserEvent('openModalForm', 'depositActionSheet011');
    }

    public function openModalOploadAction()
    {
        $this->dispatchBrowserEvent('openModalForm', 'depositActionSheet012');
    }

}
