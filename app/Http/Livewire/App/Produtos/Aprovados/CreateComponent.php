<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Produtos\Aprovados;

use App\Models\Produto;

class CreateComponent extends FormComponent
{

        protected $route = "app.produtos";


        public function mount(Produto $produto)
        {
           $this->setFormProperties($produto);
        }

        public function success()
        {
            foreach ($this->form_data as $name => $form_datum) {
                if(in_array($name, $this->numeric_values) && empty($form_datum)){
                    $this->form_data[$name] = 0;
                }
            }
            if( $this->status)
                $this->form_data['status'] = $this->status;
            if (parent::success()) {
                $this->form_data['embalagens']['updated_at'] = now();
                $this->model->embalagem()->create($this->form_data['embalagens']);
                $this->model->marketing()->create([
                    'status'=>$this->status
                ]);
                $this->model->compra()->create([
                    'status'=>$this->status
                ]);
                $this->logCreated(sprintf("Cadastrou o  produto %s", $this->model->descricao_completa),'fornecedor');
                return true;
            }
            return false;
        }



    public function formView()
        {
            return 'app.produtos.create-component';
        }

}
