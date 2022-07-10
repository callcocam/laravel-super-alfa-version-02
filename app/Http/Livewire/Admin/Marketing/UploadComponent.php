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

class UploadComponent extends FormComponent
{

    protected $route = "admin.marketing.upload";


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
            Field::make('Foto do Produto', 'imagem')->file()
            ->placeholder('clique para selecionar a imagem')->rules('required')
        ];
    }

    public function formView()
    {
        return 'admin.marketing.upload-component';
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }


    public function closedepositActionSheet()
    {
        $this->dispatchBrowserEvent('closeModalForm', "depositActionSheet012");
    }


    public function saveAndGoBackUpload()
    {
        if ($this->file) {
            $this->validate([
             'file' => 'image|max:4096|min:512', // 1MB Max
             //'file' => 'image', // 1MB Max
            ]);
            $nameFile = \Str::beforeLast($this->file->getClientOriginalName(), '.');
            $nameFile = \Str::slug($nameFile);
            $nameFile = sprintf("%s.%s", data_get($this->form_data, 'produtos.cod_barras'),$this->file->getClientOriginalExtension());
          
            $this->model->produto->imagem = $this->file->storeAs('arquivos/fotos',$nameFile);
            $this->model->produto->save();
            $this->emit('refreshPhoto', $this->model->produto->imagem);
            $this->dispatchBrowserEvent('closeModalForm', "depositActionSheet012");
            return true;
        }else{
            $this->validate([
                "file" => 'required'
            ]);
        }
    }
}
