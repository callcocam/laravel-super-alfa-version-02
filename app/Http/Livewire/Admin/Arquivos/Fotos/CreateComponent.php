<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Arquivos\Fotos;

use App\Models\Arquivo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class CreateComponent extends FormComponent
{

    protected $route = "admin.arquivos.fotos";

    public $files;
    protected $listeners = ['clearModel'];
    public function mount(Arquivo $model)
    {
        $this->setFormProperties($model);
        $this->form_data['transparent'] = "0";
    }

    public function saveAndGoBack(){       

        $this->emit('saveFiles',1);
       // $this->form_data = [];
       // $this->files = [];

        //$this->dispatchBrowserEvent('closeModalForm', 'openPanelRightCreate');
        return true;
    }

    public function closeModalForm($modal = 'openPanelRightUpdate')
    {
        $this->form_data = [];
        $this->files = [];
        parent::closeModalForm($modal);
    }

    
    public function clearModel()
    {
        $this->form_data = [];
        $this->files = [];
        $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightCreate');
    }
     /**
     * @return array
     */
    public function fields()
    {
        return [
           'archive' => Field::make('Enviar arquivo', 'archive')->file(),
        ];
    }

    public function formView()
    {
        return 'admin.arquivos.fotos.create-component';
    }
}
