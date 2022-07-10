<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos\Api;

use App\Models\Marketing;
use App\Models\Produto;
use App\Models\Coperat;
use App\Models\User;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class CreateComponent extends FormComponent
{

    public $token;
    public function mount(Produto $model)
    {
        $this->setFormProperties($model);
        if($contents = \Storage::get('simplus/token.json')){
            $contents = json_decode($contents);
            $dtOttawa = \Carbon\Carbon::parse($contents->expirationTime);
            $dtVancouver = \Carbon\Carbon::parse(null, null, null);
            $this->token = $contents->token;
            if($dtOttawa->lessThan($dtVancouver)){
                $response = \App\Services\SimplusService::make()->auth();
                if ($response->successful()) {
                    \Storage::put("simplus/token.json", json_encode([
                        'token'=>$response->object()->token,
                        'expirationTime'=>$response->object()->expirationTime
                    ]));
                    $this->token = $response->object()->token;
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
      
        dd(\App\Services\ProductsService::make()->get(array_filter($this->form_data)));
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
        return 'admin.produtos.api.create-component';
    }
}
