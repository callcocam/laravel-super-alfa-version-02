<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Familias;

use App\Models\Loja;
use Campanha\Models\FamiliaProduto;
use Maatwebsite\Excel\HeadingRowImport;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class ImportComponent extends FormComponent
{

        protected $route = "admin.familia-produtos.import";


        public function layout(): string
        {
            return 'layouts.admin';
        }
        public function mount(FamiliaProduto $model)
        {
           $this->setFormProperties($model);

        }

        /**
        * @return array
        */
        public function fields()
        {
            return [
                Field::make('Selecione um arquivo', 'arquivo')->file()->placeholder('clique para selecionar a imagem'),
            ];
        }

        public function success()
        {

           $file = \Arr::get($this->form_data, 'arquivo');
           $name = $file->storeAs("lojas/imports",$file->getClientOriginalName());
           $collection=(new \App\Imports\FamiliasImport)->toCollection($name);

           $collection = $collection[0];
//            dd($collection->toArray());

           if($collection){
                foreach($collection as $loja){

                    if ($novaloja= Loja::create([
                        'nome'=>$loja[2],
                        'codigo'=>$loja[3],
                        'cnpj'=>$loja[4],
                        'status'=>'published',
                    ]));
//                    dd($novaloja);
                }
           }
           return true;
        }
    public function success2()
    {
//            dd($this->form_data);

        $file = \Arr::get($this->form_data, 'arquivo');
        $name = $file->storeAs("familias/imports",$file->getClientOriginalName());
        $collection=(new \App\Imports\FamiliasImport)->toCollection($name);
        $collection = $collection[0];
        unset($collection[0]);
        $grouped = $collection->groupBy(0);
        $parents = $grouped->toArray();
        if($parents){
            foreach($parents as $parent => $childrens){
                $cods= [];
                if($compra = \App\Models\Compra::query()->where('codigo_interno', $parent)->first()){
                    foreach($childrens as $children){
                        $cods[] = isset($children[1])?$children[1]:null;
                    }
                    $cods[] = $parent;
                    $produtosId = \App\Models\Compra::query()->whereIn('codigo_interno', array_filter($cods))->pluck('produto_id','produto_id')->toArray();
                    if($produtosId){
                        if ($model = FamiliaProduto::create([
                            'name'=>$compra->produto->descricao_completa,
                            'parent'=>$compra->id,
                            'produto_id'=>$compra->produto->id,
                        ])) {
                            if ($produtosId) {
                                $model->produtos()->sync( $produtosId );
                            }
                        }
                    }
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
