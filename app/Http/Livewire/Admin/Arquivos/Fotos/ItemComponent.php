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

class ItemComponent extends FormComponent
{

     public $file;

    public function mount($file)
    {
        if($file){          
            $name = $file->getClientOriginalName();
            $filename = Str::beforeLast($name,'.');
            $ext = Str::afterLast($name,'.');
            $filename =preg_replace("/\D+/", "", $filename);
            
        if($produto = \App\Models\Produto::query()->where('cod_barras', $filename)->first()){
            data_set($this->form_data, 'produto_name',$produto->descricao_completa);
            data_set($this->form_data, 'produto_id',$produto->id);
            data_set($this->form_data, 'codigo_interno',$produto->compra->codigo_interno);
            data_set($this->form_data, 'codigo',$produto->compra->codigo_interno);
            data_set($this->form_data, 'cod_barras',$produto->cod_barras);
        }
        else{
            if($compra = \App\Models\Compra::query()->where('codigo_interno', $filename)->first()){
                data_set($this->form_data, 'produto_name',$compra->produto->descricao_completa);
                data_set($this->form_data, 'produto_id',$compra->produto->id);
                data_set($this->form_data, 'codigo_interno',$compra->codigo_interno);
                data_set($this->form_data, 'codigo',$compra->codigo_interno);
                data_set($this->form_data, 'cod_barras',$compra->produto->cod_barras);
            }
        }
    }
        $this->file = $file;
        $this->form_data['transparent'] = "0";
    }

    public function saveAndGoBack()
    {
        $this->success();
    }
    public function success(){
       
        $this->validate($this->rules());

        $this->validate([
            'file' => 'required|image', // 1MB Max
        ],[
            'image'=> 'Oops, você selecionou algo que não parece ser uma imagem, por favor selecione somente imagens!'
        ]);       
        if($file = $this->file){          
            $name = $file->getClientOriginalName();
            $filename = Str::beforeLast($name,'.');
            $ext = Str::afterLast($name,'.');
            $filename =preg_replace("/\D+/", "", $filename);
            if (empty($filename)){
                $this->addError('form_data.archive', 'O nome do arquivo é invalido, por favor renomeie o arquivo usando números');
                return false;
            }
            $this->form_data['type'] = 'fotos';
            $this->form_data['produto_id'] =  data_get($this->form_data, 'produto_id');
            $this->form_data['atualizado'] =  rand(2,50000);

            if($model = Arquivo::query()->where('name',$filename)->first()){
                if($produto = $model->produto){
                    if($produto->cod_barras){
                        $filename = $produto->cod_barras;
                    }
                    else{
                        if($compra = $produto->compra){
                            if($codigo_interno = $compra->codigo_interno){
                                $filename = $codigo_interno;
                            }
                        }
                        else{
                            $filename = data_get($this->form_data, 'codigo');
                        }
                    }
                }
                $this->form_data['archive'] = $file->storeAs('arquivos/fotos',$filename.'.'.$ext);
                $this->form_data['name'] = $filename;
                $model->update($this->form_data);
                flash('Operação realizada com sucesso, atualização :)', 'success')->dismissable()->livewire($this);
            }
            else{
                if($model = \App\Models\Produto::query()->where('cod_barras',$filename)->first()){
                    if($produto = $model->produto){
                        if($produto->cod_barras){
                            $filename = $produto->cod_barras;
                        }
                        else{
                            $filename = data_get($this->form_data, 'codigo');
                        }
                    }
                }                
                $this->form_data['archive'] = $file->storeAs('arquivos/fotos',$filename.'.'.$ext);
                $this->form_data['name'] = $filename;
                $model = Arquivo::create($this->form_data);
                flash('Operação realizada com sucesso, cadastro :)', 'success')->dismissable()->livewire($this);
            }
         }
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
            data_set($this->form_data, 'codigo_interno',$compra->codigo_interno);
            data_set($this->form_data, 'cod_barras',$compra->produto->cod_barras);
           }
           else{
            data_set($this->form_data, 'cod_barras',"");
            data_set($this->form_data, 'codigo_interno',"");
            data_set($this->form_data, 'produto_name',"");
            data_set($this->form_data, 'produto_id',"");
           }
    }

    public function formView()
    {
        return 'admin.arquivos.fotos.item-component';
    }
}
