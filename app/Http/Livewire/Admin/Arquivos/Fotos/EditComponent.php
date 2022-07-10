<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Arquivos\Fotos;

use App\Models\Arquivo;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

    protected $route = "admin.arquivos.fotos";

    public function mount(Arquivo $model)
    {

        $this->setFormProperties($model);
        if($produto = $model->produto)
            data_set($this->form_data, 'produto_name',$produto->descricao_completa);
        if($compra = $model->produto->compra)
            data_set($this->form_data, 'codigo',$compra->codigo_interno);
    }

    public function uploadPhoto()
    {
        if ($this->form_data['archive'] instanceof TemporaryUploadedFile)
        {
            $this->file = $this->form_data['archive'];
            $this->validate([
                'form_data.archive' => 'required|image|max:10240', // 1MB Max
            ]);
            $name = $this->model->name;
            if( empty($name)){
                $name = $this->file->getClientOriginalName();
                $filename = Str::beforeLast($name, '.');
                $ext = Str::afterLast($name, '.');
                $filename = preg_replace("/\D+/", "", $filename);
            }
             else{
                $originalName = $this->file->getClientOriginalName();
                $ext = Str::afterLast($originalName, '.');
                $filename = preg_replace("/\D+/", "", $name);
             }
            if (empty($filename)) {
                $this->addError('form_data.archive', 'O nome do arquivo é invalido, por favor renomeie o arquivo usando números');
                return false;
            }
            $this->form_data['archive'] = $this->file->storeAs('arquivos/fotos', $filename . '.' . $ext);
            $this->form_data['type'] = 'fotos';
            $this->form_data['name'] = $filename;
            $this->form_data['atualizado'] =  rand(2,50000);
            if($produto_id = data_get($this->form_data, 'produto_id', null)){
                $this->form_data['produto_id'] =  $produto_id;
            }
        }

        return parent::uploadPhoto();
    }

    public function updatedFormDataArchive($value)
    {
        $this->file = $value;
    }
    /**
     * @return array
     */
    public function fields()
    {
        return [
            'produto_name' => Field::make('Produto', 'produto_name')->readonly(),
            'codigo' => Field::make('Código interno', 'codigo')->wire("lazy"),
            'produto_id' => Field::make('Produto', 'produto_id')->type('hidden'),
            'archive' => Field::make('Enviar arquivo', 'archive')->file(),
            'transparent' => Field::make('O arquivo está Finalizado?', 'transparent')->select()->options([
                '0' => "NÃO",
                "1" => "SIM"
            ], true),
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
        return 'admin.arquivos.fotos.edit-component';
    }
}
