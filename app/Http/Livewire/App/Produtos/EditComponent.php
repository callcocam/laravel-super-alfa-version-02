<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Produtos;

use App\Models\Produto;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class EditComponent extends FormComponent
{

    protected $route = "app.produtos";

    public function mount(Produto $model)
    {

        $model->embalagens = $model->embalagem;
        $this->setFormProperties($model);

    }

    public function formView()
    {
        return 'app.produtos.edit-component';
    }

    public function success()
    {

        if(isset($this->form_data['medida_embalagem_secundaria_id'])){
            if(!$this->form_data['medida_embalagem_secundaria_id']){
                $this->form_data['medida_embalagem_secundaria_id'] = null;
            }
        }
        $this->validate([
            'form_data.cod_barras'=>[
                Rule::unique('produtos','cod_barras')->ignore($this->model->id)
            ]
        ]);

//        foreach ($this->form_data as $name => $form_datum) {
//            if(in_array($name, $this->numeric_values) && empty($form_datum)){
//                $this->form_data[$name] = 0;
//            }
//        }
        $this->form_data['medida_id'] = $this->form_data['unidade_medida'];
        if($medida =  \App\Models\Medida::find( $this->form_data['medida_id']))
        {
            $this->form_data['medida_name'] = $medida->name;
        }
        if( $this->status)
            $this->form_data['status'] = $this->status;

        if (!$this->validationCodBarrasUpdated()) {
            return false;
        }

        if (parent::success()) {
            $this->form_data['embalagens']['updated_at'] = now();
            $this->model->embalagem()->update($this->form_data['embalagens']);
            $this->model->marketing()->update([
                'status'=>$this->status
            ]);
            $this->model->compra()->update([
                'status'=>$this->status
            ]);
            $this->model->search = $this->model->descricao_completa;
//            dd($this->model);
            $this->model->update();
//            $this->logAtualizar(sprintf("Alterou o  produto %s", $this->model->descricao_completa),$this->model->status);
            return true;
        }
        return false;
    }

    public function updatedFormDataCodBarras($value)
    {
        $this->validationCodBarrasUpdated();

        $this->validate([
            'form_data.cod_barras'=>[
                Rule::unique('produtos','cod_barras')->ignore($this->model->id)
            ]
        ]);

    }
}
