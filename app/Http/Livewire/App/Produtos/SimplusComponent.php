<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Produtos;

use App\Models\Marketing;
use App\Models\Produto;
use App\Models\Coperat;
use App\Models\User;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class SimplusComponent extends FormComponent
{

    public $token;
    public function mount(Produto $model)
    {

        $this->setFormProperties($model);
        if(\Storage::has('simplus/token.json')){
            if($contents = \Storage::get('simplus/token.json')){
                $contents = json_decode($contents);
                $dtOttawa = \Carbon\Carbon::parse($contents->expirationTime);
                $dtVancouver = \Carbon\Carbon::parse(null, null, null);
                $this->token = $contents->token;
                if($dtOttawa->lessThan($dtVancouver)){
                    $response = \App\Services\SimplusService::make();
                    $response->auth();
                    if ($response->isSuccess()) {
                        \Storage::put("simplus/token.json", json_encode([
                            'token'=>$response->object()->token,
                            'expirationTime'=>$response->object()->expirationTime
                        ]));
                        $this->token = $response->object()->token;
                    }
                }
            }
        }
        $this->form_data['ordemServico']='0';
        $this->form_data['noAgreement']='0';
        $this->form_data['origin']='0';
        $this->form_data['portal']='0';
    }

    public function success()
    {
        $api = \App\Services\ProductsService::make();
        $api->get(array_filter($this->form_data));
        $data = [];
        if($api->isSuccess()){
            foreach($api->getJson('produtos') as $produto){
                $data = $produto;
            }
        }
        if(count($data)){            
            $this->emit('loadProdutoApi', $data );
          //  \Storage::disk('public')->put('simplus/priview.json', json_encode($data));
           // $this->emit('loadProdutoApiLink', \Storage::url('simplus/priview.json') );
            $this->dispatchBrowserEvent('closeModalForm', "depositActionSheet012");
        }else{
            $codBarras = data_get($this->form_data,'gtin');
            $this->addError("form_data.gtin", "Produto com o código de barras [ {$codBarras} ] não foi encontrado na lista de produtos");
        }
    }

    public function gerarToken()
    {
        \App\Services\SimplusService::make()->auth();
        if($contents = \Storage::get('simplus/token.json')){
            $contents = json_decode($contents);
            $this->token = $contents->token;
        }
    }


    /**
    * @return array
    */
    public function fields()
    {
        return [
            Field::make('Código barras',"gtin")->rules('required'),
            Field::make('Campo opcional que permite obter dados de um produto do portal do varejo.',"portal")->options(['1'=>"SIM", '0'=>'NÂO'],true)->rules('required'),
            Field::make('Inclui no JSON de retorno a Orderm de Serviço relacionada ao produto',"ordemServico")->options(['1'=>"SIM", '0'=>'NÂO'],true)->rules('required'),
            Field::make('Campo opcional Permite a busca de produtos de fornecedores sem contrato.',"noAgreement")->options(['1'=>"SIM", '0'=>'NÂO'],true)->rules('required'),
        ];
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function formView()
    {
        return 'app.produtos.simplus-component';
    }

    public function closedepositActionSheet()
    {
        $this->reset(['form_data']);
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('closeModalForm', "depositActionSheet012");
    }

}
