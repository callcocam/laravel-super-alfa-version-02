<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Compras;

use App\Models\Compra;
use App\Models\Role;
use App\Models\TipoEmbalagem;
use App\Notifications\MarketingNotification;

class EditComponent extends FormComponent
{

    protected $route = "admin.compras";

    public $aquivar = false;

    public function mount(Compra $model)
    {

        $model->produtos = $model->produto;
        $model->embalagens = $model->produto->embalagem;
        $this->setFormProperties($model);
    }

    public function title()
    {
        return sprintf('Editar %s - %s', $this->model->user->name, $this->model->produto->descricao_completa);
    }


    public function success()
    {

//        foreach ($this->form_data as $name => $form_datum) {
//            if (in_array($name, $this->numeric_values) && empty($form_datum)) {
//                $this->form_data[$name] = 0;
//            }
//        }

        if (isset($this->form_data['produtos'])) {

            if(data_get($this->form_data, 'ecommerce') === 'SIM'){
              $loja = \App\Models\Produto::find($this->model->produto->id)->loja;

                if(!$loja->count()){
                    $this->addError("lojas", 'Por favor selecionar as lojas');
                    return;
                }
            }

            if(\Str::upper(data_get($this->form_data, 'produtos.ecommerce')) === 'SIM') {
                if(!data_get($this->form_data, 'produtos.quantidade_fixa_de_estoque') && !data_get($this->form_data, 'produtos.percentual_sobre_estoque')){
                    $this->addError("error-add-group", 'Preencha um desses campos');
                    return;
                }
            }
            if(data_get($this->form_data, 'produtos.quantidade_fixa_de_estoque')){
                if(!data_get($this->form_data, 'produtos.integrar_estoque_com_quantidade_fixa')){
                    $this->addError("form_data.produtos.integrar_estoque_com_quantidade_fixa", 'Selecione este campo');
                    return;
                }
            }


            if (isset($this->form_data['produtos']['coperat_id'])) {
                $this->model->produto->update([
                    "coperat_id"=>$this->form_data['produtos']['coperat_id']
                ]);
            }
            if (isset($this->form_data['produtos']['cluster_id'])) {
                $this->model->produto->update([
                    "cluster_id"=>$this->form_data['produtos']['cluster_id']
                ]);
            }

            if (isset($this->form_data['produtos']['tipo_de_embalagem_secundaria'])) {
                $this->model->produto->update([
                    "tipo_de_embalagem_secundaria"=>$this->form_data['produtos']['tipo_de_embalagem_secundaria']
                ]);
            }

            if (isset($this->form_data['produtos']['volume_de_embalagem_secundaria'])) {
                $this->model->produto->update([
                    "volume_de_embalagem_secundaria"=>$this->form_data['produtos']['volume_de_embalagem_secundaria']
                ]);
            }

            if (isset($this->form_data['produtos']['medida_embalagem_secundaria_id'])) {
                $this->model->produto->update([
                    "medida_embalagem_secundaria_id"=>$this->form_data['produtos']['medida_embalagem_secundaria_id']
                ]);
            }
            $this->model->produto->update([
                "quantidade_minima_para_compra"=>data_get($this->form_data,'produtos.quantidade_minima_para_compra'),
                "quantidade_fixa_de_estoque"=>data_get($this->form_data,'produtos.quantidade_fixa_de_estoque'),
                "fracao_da_unidade_de_venda"=>data_get($this->form_data,'produtos.fracao_da_unidade_de_venda'),
                "percentual_sobre_estoque"=>data_get($this->form_data,'produtos.percentual_sobre_estoque'),
                "estoque_mínimo_para_loja_fisica"=>data_get($this->form_data,'produtos.estoque_mínimo_para_loja_fisica'),
                "integrar_estoque_com_quantidade_fixa"=>data_get($this->form_data,'produtos.integrar_estoque_com_quantidade_fixa'),
                "maximo_de_unidade_por_compra"=>data_get($this->form_data,'produtos.maximo_de_unidade_por_compra'),
            ]);

        }
        if(parent::success()){
            $description=[];
            $description[] =  $this->model->produto->cod_barras;
            $description[] =  $this->model->produto->descricao_completa;
            $description[] =  $this->model->produto->marketing->descricao_comercial;
            $description[] =  $this->model->produto->marketing->descricao_para_erp;
            $description[] =  $this->model->produto->marketing->descricao_para_encarte;
            $description[] =  $this->model->codigo_interno;
            $this->model->produto->search = implode(" ", $description);
            $this->model->produto->update();
            $this->logAtualizar(sprintf("Atualizou o %s", $this->model->produto->descricao_completa),$this->model->status);
            return true;
        }
        return false;
    }

    public function marketingStatus()
    {

        if ($this->rules())
            $this->validate(array_merge($this->rules(), [
                "form_data.app" => 'required',
                "form_data.ecommerce" => 'required',
                "form_data.margem_do_produto" => 'required',
                "form_data.quantidade_minima_de_tranf" => 'required',
                "form_data.n_do_deposito_cd" => 'required',
                "form_data.entrega_cd_ou_na_filial" => 'required',
                "form_data.item_e_c_d" => 'required',
                //"form_data.codigo_interno" => 'required|numeric',
            ]));
        $description=[];
        $description[] =  $this->model->produto->cod_barras;
        $description[] =  $this->model->produto->descricao_completa;
        $description[] =  $this->model->produto->marketing->descricao_comercial;
        $description[] =  $this->model->produto->marketing->descricao_para_erp;
        $description[] =  $this->model->produto->marketing->descricao_para_encarte;
        $description[] =  $this->model->codigo_interno;
        $this->model->produto->update([
            'status' => 'marketing',
            'search' => implode(" ", $description),
        ]);
        $this->model->produto->marketing()->update([
            'status' => 'marketing'
        ]);
        $this->form_data['status'] = 'marketing';

        if ($this->success()) {
            //DANIELA.SANTOS@COOPERALFA.COOP.BR
            //ANDERSSON.LAZZARETI@COOPERALFA.COOP.BR
            //GABI.LAZAROTTO@COOPERALFA.COOP.BR
            $this->logAtualizar(sprintf("Alterou o status do produto %s, para marketing", $this->model->produto->descricao_completa),'compras');

//            $user = \App\Models\User::query()->where('email','daniela.santos@cooperalfa.coop.br')->first();
//            if($user){
//                \Illuminate\Support\Facades\Notification::send($user, new MarketingNotification($this->form_data['produtos']));
//            }
//            $user = \App\Models\User::query()->where('email','andersson.lazzareti@cooperalfa.coop.br')->first();
//            if($user){
//                \Illuminate\Support\Facades\Notification::send($user, new MarketingNotification($this->form_data['produtos']));
//            }
//            $user = \App\Models\User::query()->where('email','gabi.lazzareti@cooperalfa.coop.br')->first();
//            if($user){
//                \Illuminate\Support\Facades\Notification::send($user, new MarketingNotification($this->form_data['produtos']));
//            }

            // $roles = Role::query()->where('slug', 'marketing')->with('users')->get();
            // foreach ($roles as $role) {
            //     if ($role->users) {
            //         foreach ($role->users as $user) {
            //             if($user->email != 'anderson.siqueira@cooperalfa.coop.br'){
            //                 \Illuminate\Support\Facades\Notification::send($user, new MarketingNotification($this->form_data['produtos']));
            //             }

            //         }
            //     }
            // }
        }

    }

    public function arquivarStatus()
    {
        $this->model->produto->update([
            'status' => 'arquivar',
        ]);
        $this->model->produto->marketing()->update([
            'status' => 'arquivar'
        ]);
        $this->form_data['status'] = 'arquivar';

        if($this->success()){
            $this->logAtualizar(sprintf("Arquivou o %s", $this->model->produto->descricao_completa),'compras');
            return true;
        }
        return false;
    }


    public function formView()
    {
        return 'admin.compras.edit-component';
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }


    public function openModalRecusaAction()
    {
        $this->dispatchBrowserEvent('openModalForm', 'depositActionSheet011');
    }

    public function openModalLojaAction()
    {
        $this->dispatchBrowserEvent('openModalForm', 'depositActionSheet0Loja12');
    }
}
