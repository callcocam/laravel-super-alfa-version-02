<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cartaz;

use App\Models\Compra;
use App\Models\Medida;
use App\Models\Produto;
use Campanha\Models\GrupoProduto;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use SIGA\Form\Field;
use SIGA\Form\ArrayField;
use SIGA\Form\FormComponent;

class ItemComponent extends FormComponent
{

    protected $route = "admin.cartaz";

    public $codigo_interno = "";

    public $show_menu = false;
    public $currentUser;
    public $modal;
    public $currentProduto;
    public $exibirapp = false;

    public function mount($modal="cartaz-modal")
    {
        $this->currentUser = $this->user();
        $this->modal = $modal;
        $this->setFormProperties(null);

    }

    protected function getListeners()
    {
        $list[$this->modal] = 'loadProductsCartaz';
        $list[sprintf("%s-chidren",$this->modal)] = 'loadChildren';
        $list['validateForms'] = 'saveAndGoBack';
        return $list;
    }
   public function success()
   {

       data_set($this->form_data,sprintf('%s.validado', $this->modal), 1);
       $valorminimo = [
           form_w(data_get($this->form_data,sprintf('%s.preco_normal', $this->modal))),
           form_w(data_get($this->form_data,sprintf('%s.preco_promocional', $this->modal))),
           form_w(data_get($this->form_data,sprintf('%s.preco_app', $this->modal)))
       ];

       $valorminimo = collect($valorminimo )->filter(function($item){
           return $item > 0;
       })->toArray();

       $quantidade_parcelas = data_get($this->form_data,sprintf('%s.quantidade_parcelas', $this->modal));
       if($valorminimo && $quantidade_parcelas >1){
           $valorminimo = min($valorminimo);
           $valorminimo = form_read($valorminimo);
           $valor_parcela =  Calcular($valorminimo, $quantidade_parcelas, '/');
           if(form_w($valor_parcela) < form_w(50)){
               $this->addError(sprintf('form_data.%s.quantidade_parcelas', $this->modal), sprintf('O valor da parcela deve ser maior que 50,00, ajuste a quantidade de parcelas'));
               return;
           }
       }

     $this->emit('loadProductsCartaz', $this->modal);

     return true;
   }

   public  function updatedFormData($value , $key){

        if(Str::contains($key, '.app')){

           if (data_get($this->form_data,sprintf('%s.app', $this->modal)) =='sim'){
               $this->emit('loadAppItem', sprintf('%s.app', $this->modal), true, $this->modal);
           }else{
               $this->emit('loadAppItem', sprintf('%s.app', $this->modal), false , $this->modal);
           }

        }
   }

    /**
     * @return array
     */


    public function fields()
    {
        $app = false;
        $this->exibirapp = false;
        if (data_get($this->form_data,sprintf('%s.app', $this->modal)) =='sim'){
            $app = true;
            $this->exibirapp = true;
        }
        return [
            Field::make($this->modal)->array([
                "produto_id"=>Field::blank("produto_id")->type('hidden'),
                "validado"=>Field::blank("validado")->type('hidden'),
                "qde_por_cx"=>Field::make("Caixas","qde_por_cx")->wire("lazy")->rules(function ($data){
                    if (data_get($this->form_data,sprintf('%s.qde_por_cx', $this->modal))){
                        return 'integer';
                    }
                },$this->form_data),
               "codigo_barras"=> Field::make("Código De Barras","codigo_barras")->readonly(),
                "codigo_interno"=>Field::make('Selecione um produto',"codigo_interno")->readonly()->rules('required'),
                "descricao_comercial"=>Field::make('Descrição Comercial',"descricao_comercial")->readonly()->wire("lazy")->rules('required'),
                "observacoes"=>Field::make('Observações',"observacoes")->wire("lazy"),
                "quantidade_parcelas"=>Field::make('Parcelas',"quantidade_parcelas")->wire("lazy")->rules('int|max:10'),
                "embalagens"=>Field::make('Selecione',"embalagens")->wire("lazy")->rules('required')->options(
                Medida::query()->pluck('name', 'name')->toArray()
                ),
                "preco_normal"=>Field::make('Preço Normal',"preco_normal")->rules('required'),
                "preco_promocional"=>Field::make('Preço Promocional',"preco_promocional")->rules(function ($data) {
                    if ($data) {
                        return 'required';
                    }
                }, !$app),
                "app"=>Field::make('App',"app")->wire("lazy")->radio()->options(["sim"=>'Sim','não'=>'Não'],true),
                "preco_app"=>Field::make('Preço App',"preco_app")->rules(function ($data) {
                    if ($data) {
                        return 'required';
                    }
                }, $app)
            ]),

        ];
    }

    public function getProdutosProperty()
    {
        $produtos = Produto::query();
        if ($this->codigo_interno) {
            $coperat = Compra::query()->where('codigo_interno','LIKE', "%{$this->codigo_interno}%");
            $produtos->whereIn('id',$coperat->pluck("produto_id"));
        }
        return $produtos->where('coperat_id', $this->model->coperat_id)->get();
    }
    public function formView()
    {
        return 'admin.cartaz.item-component';
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.cartaz.item-component";
    }

    public function getCreatedProperty()
    {
        return $this->currentUser->hasAnyRole('super-admin', 'administrador-do-sistema', 'compras');
    }

    public function loadProductsCartaz(Compra $compra, $familia = null){

        if ($compra) {

            if($familia){
                data_set($this->form_data,sprintf('%s.descricao_comercial',$this->modal), $compra->produto->marketing->descricao_para_encarte);
            }elseif($compra->produto->familia_produtos->count() >= 1){
                data_set($this->form_data,sprintf('%s.descricao_comercial',$this->modal), $compra->produto->marketing->descricao_comercial);
            }else {
                data_set($this->form_data,sprintf('%s.descricao_comercial',$this->modal), $compra->produto->marketing->descricao_para_encarte);
            }

            data_set($this->form_data,sprintf('%s.codigo_interno',$this->modal), $compra->codigo_interno);
            data_set($this->form_data,sprintf('%s.produto_id',$this->modal), $compra->produto->id);
            data_set($this->form_data,sprintf('%s.qde_por_cx',$this->modal), $compra->produto->qde_por_cx);
            data_set($this->form_data,sprintf('%s.codigo_barras',$this->modal), $compra->produto->cod_barras);
            $this->currentProduto = $compra->produto->cod_barras;
        } else {
            data_set($this->form_data,sprintf('%s.descricao_comercial',$this->modal), "");
            data_set($this->form_data,sprintf('%s.codigo_interno',$this->modal), "");
            data_set($this->form_data,sprintf('%s.produto_id',$this->modal), "");
            data_set($this->form_data,sprintf('%s.qde_por_cx',$this->modal), "");
            data_set($this->form_data,sprintf('%s.codigo_barras',$this->modal), "");
            $this->addError("codigo_interno", "Produto não encontrado");
        }
    }


    public function loadChildren($grupos){
       data_set( $this->form_data,sprintf("grupos.%s",$this->modal), $grupos);
       $this->emit('loadChildren',sprintf("grupos.%s",$this->modal), $grupos);
    }

    public function openShow($modal= "modal-cartaz")
    {
        $this->dispatchBrowserEvent('openModalForm',$modal);
    }
}
