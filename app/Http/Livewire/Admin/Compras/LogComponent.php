<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Compras;

use App\Models\Compra;
use App\Notifications\RecusaNotification;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class LogComponent extends FormComponent
{

    protected $route = "admin.compras";

    public function mount(Compra $model)
    {
        $this->setFormProperties($model);
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Informações adicionais', 'content')->attribute('type', null)
        ];
    }

    public function formView()
    {
        return 'admin.compras.log-component';
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }


    public function closedepositActionSheet()
    {
        $this->dispatchBrowserEvent('closeModalForm', "openPanelRightLog");
    }


    public function success()
    {

//        foreach ($this->form_data as $name => $form_datum) {
//            if(in_array($name, $this->numeric_values) && empty($form_datum)){
//                $this->form_data[$name] = 0;
//            }
//        }

        return parent::success(); // TODO: Change the autogenerated stub
    }

    public function saveAndGoBackRecusa()
    {

        $this->model->produto->update([
            'recusado_motivo' => $this->form_data['content'],
            'status' => 'recusado',
            'recusado' => 'compras',
        ]);
        $this->model->produto->marketing()->update([
            'status' => 'recusado'
        ]);
        $this->form_data['status'] = 'recusado';
        if ($this->success()) {
            $this->logAtualizar(sprintf("Recusou o produdo %s", $this->model->produto->descricao_completa),'compras');
            $this->closedepositActionSheet();
            \Illuminate\Support\Facades\Notification::send($this->model->user, new RecusaNotification($this->form_data));
            return true;
        }
    }
}
