<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Produtos;

use Campanha\Models\GrupoProduto;
use App\Models\Compra;
use App\Models\Produto;
use SIGA\Form\Field;
use Campanha\Models\ProdutosCampanha;
use SIGA\Form\FormComponent;

class SeloComponent extends FormComponent
{


    protected $listeners = ['loadSelos'];

    public function mount(ProdutosCampanha $model)
    {
        $this->setFormProperties($model);

    }

    public function getSelosProperty(){

        return \App\Models\Selo::query()->get();
    }


    public function loadSelos(){

        
    }

    public function selectSelo($id = null){
        //$this->form_data["selo_id"] = $id;
        $selos = data_get($this->form_data, 'selo',[]);
        $selos[$id] = $id;
        $this->model->selos()->sync($selos);
        \Arr::set($this->form_data, sprintf('selo.%s', $id), $id);
        flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
        $this->emit('loadSelos');
    }
    
    public function removeSelo($id = null){
        //$this->form_data["selo_id"] = $id;
        \Arr::forget($this->form_data, sprintf('selo.%s', $id));
        $selos = data_get($this->form_data, 'selo',[]);
        $this->model->selos()->sync($selos);
        flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
        $this->emit('loadSelos');
    }

    public function success()
    {
        if(parent::success()){
            $this->closeModalForm($this->model->id);
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
             Field::make('É fracionado', "fracionado"),
            // Field::make('Sub Titulo', "subtitle_selo")->rules('required'),
        ];
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function formView()
    {
        return 'admin.campanhas.produtos.selo-component';
    }

    public function closeModalForm($modal = 'closedepositActionSheet')
    {
        $this->dispatchBrowserEvent('closeModalForm', "modal-selo-{$modal}");
    }

    public function name()
    {
        return "admin.campanhas.produtos.selo-component";
    }

}
