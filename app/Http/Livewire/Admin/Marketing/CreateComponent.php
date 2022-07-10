<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Marketing;

use App\Models\Marketing;
use App\Notifications\RecusaNotification;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

    protected $route = "admin.marketing";


    public function mount(Marketing $model)
    {
        $this->setFormProperties($model);
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Informações adicionais','content')->attribute('type', null)
        ];
    }

    public function formView()
    {
        return 'admin.marketing.create-component';
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }


    public function closedepositActionSheet()
    {
        $this->dispatchBrowserEvent('closeModalForm', "depositActionSheet011");
    }


    public function saveAndGoBackRecusa()
    {

        $this->model->produto->update([
            'status' => 'recusado',
            'recusado' => 'marketing',
            'recusado_motivo' => $this->form_data['content'],
        ]);
        $this->model->produto->compra()->update([
            'status' => 'recusado'
        ]);
        $this->form_data['status'] = 'recusado';
        if($this->success()){
            $this->logAtualizar(sprintf("Recusou o produto %s", $this->model->produto->descricao_completa),'recusado');
            $this->closedepositActionSheet();
            \Illuminate\Support\Facades\Notification::send($this->model->user, new RecusaNotification($this->form_data));
            return true;
        }
    }
}
