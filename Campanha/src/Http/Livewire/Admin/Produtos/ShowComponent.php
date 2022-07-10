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
use Campanha\Models\ProdutosCampanha;
use SIGA\Form\FormComponent;

class ShowComponent extends FormComponent
{

    protected $route = "admin.campanhas.produtos";

    public $confirm = false;
    public $search;
    public $app = false;
    public $currentUser;
    public $codigo_interno = "";

    public function mount(ProdutosCampanha $model)
    {

        $this->currentUser = $this->user();
        $this->setFormProperties($model);

    }

    public function success()
    {

    }

    public function selectItem($value, $familia=null)
    {

        if ($compra = Compra::query()->where('codigo_interno',$value)->first()) {
            if($familia){
                $this->model->descricao_comercial = $compra->produto->marketing->descricao_para_encarte;
                $this->model->tipo_descricao = 'encartecartaz';
            }elseif($compra->produto->familia_produtos->count() >= 1){
                $this->model->descricao_comercial = $compra->produto->marketing->descricao_comercial;
                $this->model->tipo_descricao = 'comercial';
              }else {
                $this->model->descricao_comercial = $compra->produto->marketing->descricao_para_encarte;
                $this->model->tipo_descricao = 'encartecartaz';
            }

            $this->model->codigo_interno = $compra->codigo_interno;
            $this->model->produto_id = $compra->produto->id;
            //$this->model->qde_por_cx = $compra->produto->qde_por_cx;
            $this->model->codigo_barras = $compra->produto->cod_barras;
            $this->model->tipo_embalagem = $compra->produto->medida_name;
            $this->model->card_images_propriates = null;
            $this->model->encarte_image_propriates = null;
            $this->model->lamina_images_propriates = null;
            $this->model->storie_image_proprietes = null;
            $this->model->update();
            GrupoProduto::query()->where([
                "campanha_id"=>$this->model->campanha_id,
                "produtos_campanha_id"=>$this->model->id,
                "type"=>"familia",
            ])->forceDelete();
            if($familia){
                 $this->addFamilia($compra->produto->familia_produtos()->where('id', $familia)->first());
            }
            $this->dispatchBrowserEvent('closeModalForm', "modal-{$this->model->id}");
            $this->emit('loadProducts', $this->model);
        }

    }


    public function addFamilia($grupos)
    {

        if (!$this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras', 'lojas-campanha')){
            $this->addError("error-add-group", 'Você não pode realizar essa operação');
            return;
        }

        if($grupos->produtos_familia){
            foreach ($grupos->produtos_familia as $key => $produto) {
                GrupoProduto::query()->firstOrCreate([
                    "campanha_id"=>$this->model->campanha_id,
                    "produto_id"=>$produto->getOriginal('pivot_produto_id'),
                    "produtos_campanha_id"=>$this->model->id,
                    "status"=>"published",
                    "type"=>"familia",
                ]);
            }
            return;
        }
        $this->addError("error-add-group", 'Não existe nenhum produto relacionado');
        return;
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [

        ];
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function formView()
    {
        return 'admin.campanhas.produtos.show-component';
    }

    public function closeModalForm($modal = 'closedepositActionSheet')
    {
        $this->dispatchBrowserEvent('closeModalForm', "modal-{$modal}");
    }

    public function saveAndGoBack()
    {
        $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightCreateCampanhaItem');
    }

    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras');
    }

    public function name()
    {
        return "admin.campanhas.produtos.show-component";
    }

    public function getProdutosProperty()
    {

        if ($search =$this->search){
            $this->codigo_interno= "";
            return Produto::query()
                ->limit(20)
                ->whereIn('status',['concluido','compras-concluido','importadoerp'])
                ->where('search','LIKE',"%{$search}%")
                //->where('coperat_id', $this->model->coperat_id)
                ->get();
        }
        else{
            if ($codigo_interno = $this->codigo_interno){
                if ($compra = Compra::query()->where('codigo_interno',$codigo_interno)->first()) {
                    return $compra->produto()
                    ->whereIn('status',['concluido','compras-concluido','importadoerp'])->get();
                }
            }

        }
        return [];

    }

}
