<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos\Imports;

use App\Models\Produto;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class MedidasImportComponent extends FormComponent
{

    protected $route = "admin.medidas.import";


    public function layout(): string
    {
        return 'layouts.admin';
    }
    public function mount(Produto $model)
    {
       $this->setFormProperties($model);

    }

    /**
    * @return array
    */
    public function fields()
    {
        return [
            Field::make('Selecione um arquivo', 'arquivo')->file()->placeholder('clique para selecionar '),
        ];
    }

    public function success()
    {

       $file = \Arr::get($this->form_data, 'arquivo');

       $name = $file->storeAs("medidas/imports",$file->getClientOriginalName());
       $collection=(new \App\Imports\MedidasImport)->toCollection($name);

       $collection = $collection[0];

       if($collection){
            foreach($collection as $produto){

                  if($model = Produto::query()->where('cod_barras',data_get($produto, 1))->first()){
//                    dd($model,data_get($produto, 1));
                    $model->update([
                            'peso_bruto_da_und'             => $produto[2],     // 2 => "peso_bruto_da_und"
                            'peso_liquido_da_und'           =>  $produto[3],    // 3 => "peso_liquido_da_und"
                            'altura_da_und'                 =>  $produto[4],    // 4 => "altura_da_und"
                            'largura_da_und'                =>  $produto[5],    // 5 => "largura_da_und"
                            'profundidade_da_und'           =>  $produto[6],    // 6 => "profundidade_da_und"

                    ]);
                    $model->embalagem()->update([
                         'peso_bruto'     =>  $produto[7],    // 7 => "peso_bruto_emb_secundaria"    tem que colocar na tabela separada  	embalagems
                         'peso_liquido'   =>  $produto[8],    // 8 => "peso_liquido_emb_secundaria"      tem que colocar na tabela separada  embalagems
                         'altura'         =>  $produto[9],    // 9 => "altura_emb_secundaria"          tem que colocar na tabela separada  embalagems
                         'largura'        =>  $produto[10],   // 10 => "largura_emb_secundaria"         tem que colocar na tabela separada  embalagems
                         'profundidade'   =>  $produto[11],   // 11 => "profundidade_emb_secundaria"   tem que colocar na tabela separada  embalagems
                    ]);
                  }

            }
       }
       return true;
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.familia-produtos.import-component";
    }

    public function formView()
    {
        return 'admin.familia-produtos.import-component';
    }
}
