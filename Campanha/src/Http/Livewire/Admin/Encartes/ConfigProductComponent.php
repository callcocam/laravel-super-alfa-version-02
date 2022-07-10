<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Encartes;

use App\Models\Compra;
use App\Models\Produto;
use Campanha\Models\Campanha;
use Campanha\Models\GrupoProduto;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Support\Arr;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;
use Illuminate\Http\UploadedFile;

class ConfigProductComponent extends FormComponent
{

    protected $route = "admin.encartes.produto.config";

    public $currentUser;

    public function mount(ProdutosCampanha $model)
    {
        $this->currentUser = $this->user();
        $this->setFormProperties($model);

    }
    public function success()
    {

       unset($this->form_data['descricao_comercial']);
        parent::success();

        return redirect(request()->header('Referer'));

    }
    public function uploadPhoto()
    {
//        dd($this->file, $this->form_data);
        if ($this->file) {

            foreach($this->file as $key => $file){

             $this->validate([
                 'file.'.$key => 'image', // 1MB Max
             ]);
             $this->form_data[$key] = $file->store('produto_campanhas/bg',"public" );
            }
         }
         parent::uploadPhoto();
         return true;
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Template',"template")->options(['cima'=>'Topo','lado'=>'Lado'], true),
            Field::make('Descrição comercial',"descricao_comercial"),
            Field::make('Altura',"altura"),
            Field::make('Largura',"largura"),
            Field::make('Imagem de Fundo',"fundo")->file(),
            Field::make('Borda',"borda_produto_lamina")->options(['não'=>'Não','sim'=>'Sim'], true),
            Field::make('Arredondamento',"arredondamento_produto_lamina"),
            Field::make('Cor de Fundo',"cor_fundo_produto_lamina"),
            Field::make('Cor da borda',"cor_borda_produto_lamina"),
            Field::make('Palavra para concatenar prodtuos parceros (e/ou)',"concatenacao_produto"),
        ];
    }

    public function formView()
    {
        return 'admin.encartes.produtoconfig-component';
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.encartes.produtoconfig-component";
    }


    public function getCreatedProperty()
    {
        return false;
    }
    public function ressetImageBg()
    {

        $this->model->fundo = null;
        $this->model->save();
        return redirect(request()->header('Referer'));
    }




}
