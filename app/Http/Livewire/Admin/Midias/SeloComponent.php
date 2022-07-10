<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Midias;

use App\Models\Selo;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class SeloComponent extends FormComponent
{

    public $currentDelete;
    public function mount(Selo $model)
    {
        $this->setFormProperties($model);
    
    }

    public function query(){
        return $this->model->query();
    }

    public function success()
    {
        $delete = null;
        if($this->model->exists){
            if (\Storage::exists($this->model->cover)) {
                $delete = $this->model->cover;
            }
        }
       $file = data_get($this->form_data, 'cover');     
       $nameFile = \Str::beforeLast($file->getClientOriginalName(), '.');
       $nameFile = \Str::slug($nameFile);
       $nameFile = sprintf("%s.%s", $nameFile,$file->getClientOriginalExtension());     
       $this->form_data['cover'] = $file->storeAs('arquivos/selos',$nameFile);
       $this->form_data['name'] = $nameFile;
      
       if(parent::success())
       {
        if ( $delete) {
            \Storage::delete($delete);
        }

        $this->reset(['form_data','file','files']);

        $this->setFormProperties(new Selo);
       }     
    }


    /**
    * @return array
    */
    public function fields()
    {
        return [
            Field::make('Selecione uma imagem',"cover")->file()->view('file-selo')->rules('required|image')
        ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function formView()
    {
        return 'admin.midias.selo-component';
    }

    public function  currentUpdated($id){
        $this->setFormProperties($this->model->find($id));
    }

    public function openDelete($model)
    {

        $this->currentDelete = $this->query()->find($model);

        $this->dispatchBrowserEvent('openModalForm', 'openPanelRightDelete');

    }
    public function deleteModel(){

        try {
            $delete = null;
            if (\Storage::exists($this->currentDelete->cover)) {
                $delete = $this->currentDelete->cover;
            }
           if($this->currentDelete->delete()){
                if ( $delete) {
                    \Storage::delete($delete);
                }
                $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightDelete');
                flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);            
                return ;
           }           
           $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightDelete');
           flash("Ouve um erro, não foi possivel realizar a operação, é provavel que exista registros relacionados", 'danger')->dismissable()->livewire($this);
        }catch (\PDOException $exception){
                $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightDelete');
            if($this->user()->isAdmin()){
                flash($exception->getMessage(), 'success')->dismissable()->livewire($this);
            }
            else{
                flash("Ouve um erro, não foi possivel realizar a operação, é provavel que exista registros relacionados", 'success')->dismissable()->livewire($this);
            }
        }

    }
}
