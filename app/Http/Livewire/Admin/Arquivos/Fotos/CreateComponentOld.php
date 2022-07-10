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

class CreateComponentOld extends FormComponent
{

    protected $route = "admin.arquivos.fotos";

    public $files;

    public function mount(Arquivo $model)
    {
        $this->setFormProperties($model);
        $this->form_data['transparent'] = "0";
    }

    public function updatedFormDataArchive($value)
    {
        $this->file = $value;
    }



    public function success(){
        $this->validate([
            'files.*' => 'required|image', // 1MB Max
        ],[
            'image'=> 'Oops, você selecionou algo que não parece ser uma imagem, por favor selecione somente imagens!'
        ]);
        if($files = $this->files){
            foreach($files as $file){
             $name = $file->getClientOriginalName();
             $filename = Str::beforeLast($name,'.');
             $ext = Str::afterLast($name,'.');
             $filename =preg_replace("/\D+/", "", $filename);

             if (empty($filename)){
                 $this->addError('form_data.archive', 'O nome do arquivo é invalido, por favor renomeie o arquivo usando números');
                 return false;
             }
             $this->form_data['archive'] = $file->storeAs('arquivos/fotos',$filename.'.'.$ext);
             $this->form_data['type'] = 'fotos';
             $this->form_data['name'] = $filename;
             $this->form_data['produto_id'] =  data_get($this->form_data, 'produto_id');
             $this->form_data['atualizado'] =  rand(2,50000);
             if($model = Arquivo::query()->where('name',$filename)->first()){
                $this->setFormProperties($model);
             }
             if(parent::success()){
                $this->setFormProperties(new Arquivo);
             }
            }
         }
         $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightCreate');
          return true;
    }
    /**
     * @return array
     */
    public function fields()
    {
        return [
            'produto_name' => Field::make('Produto', 'produto_name')->rules('required')->readonly(),
            'codigo' => Field::make('Código interno', 'codigo')->rules('required')->wire("lazy"),
            'produto_id' => Field::make('Produto', 'produto_id')->type('hidden'),
            'archive' => Field::make('Enviar arquivo', 'archive')->file(),
            'transparent' => Field::make('O Arquivo esta Finalizado?', 'transparent')->default('0')->select()->options([
                '0'=>"NÃO",
                "1"=>"SIM"
            ],true),
        ];
    }


    public function updatedFormDataCodigo($value)
    {
        if($compra = \App\Models\Compra::query()->where('codigo_interno', $value)->first()){
            data_set($this->form_data, 'produto_name',$compra->produto->descricao_completa);
            data_set($this->form_data, 'produto_id',$compra->produto->id);
           }
           else{
            data_set($this->form_data, 'produto_name',"");
            data_set($this->form_data, 'produto_id',"");
           }
    }

    public function formView()
    {
        return 'admin.arquivos.fotos.create-component';
    }
}
