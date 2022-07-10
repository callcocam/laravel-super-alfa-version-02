<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos\Description;

use App\Models\Marketing;
use App\Models\Medida;
use Campanha\Models\ProdutosCampanha;
use Livewire\Component;

class EditComponent extends Component
{

    public $model;
    public $descricao_comercial;
    public $descricao_para_encarte;
    public $unidade_medida;
    public $unidade_medida_name = "Selecione";

    public function mount(Marketing $model)
    {
        $this->model = $model;
        if ($unidade_medida = $model->produto->unidade_medida_name):
            $this->unidade_medida = $unidade_medida->id;
            $this->unidade_medida_name = $unidade_medida->name;
        endif;
        $this->descricao_comercial = $model->descricao_comercial;
        $this->descricao_para_encarte = $model->descricao_para_encarte;
    }

    public function setUnidadeMedida($um, $name)
    {
        $this->unidade_medida_name = $name;
        $this->unidade_medida = $um;
        $this->save();
    }

    public function saveAndGoBack()
    {
        $this->save();
    }

    protected function save()
    {
        try {
            if ($this->unidade_medida) {
                $this->model->produto->update([
                    "unidade_medida" => $this->unidade_medida
                ]);
            }
            $description=[];
            $description[] =  $this->model->produto->cod_barras;
            $description[] =  $this->model->produto->descricao_completa;
            $description[] =  $this->model->descricao_comercial;
            $description[] =  $this->model->descricao_para_erp;
            $description[] =  $this->model->descricao_para_encarte;
            $description[] =  $this->model->produto->compra->codigo_interno;
            
            if($card_individual = $this->model->produto->card_individual){
                $card_individual->update([
                    "descricao_comercial" => $this->descricao_comercial
    
                ]);
            }

            $this->model->produto->update([
                "search" => trim(implode(" ", $description)),
                "ultima_atualizacao" => now()->format('Y-m-d H:i:s')

            ]);

            $this->model->update([
                "descricao_para_encarte" => $this->descricao_para_encarte,
                "descricao_comercial" => $this->descricao_comercial,
            ]);

            flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
            return true;
        } catch (\PDOException $PDOException) {
            flash($PDOException->getMessage(), 'danger')->dismissable()->livewire($this);
            return false;
        }
    }

    public function updatedDescricaoParaEncarte($value)
    {

        $produtocampanha = ProdutosCampanha::query()->where('produto_id', $this->model->produto_id)->where('tipo_descricao','encartecartaz')->get();

        if($produtocampanha){
            foreach ($produtocampanha as $produto){
                $produto->descricao_comercial = $value;
                $produto->update();
            }
        }

        $this->descricao_para_encarte = $value;
        $this->save();
    }
    public function updatedDescricaoComercial($value)
    {

        $produtocampanha = ProdutosCampanha::query()->where('produto_id', $this->model->produto_id)->where('tipo_descricao','comercial')->get();
        if($produtocampanha){
            foreach ($produtocampanha as $produto){
                $produto->descricao_comercial = $value;
                $produto->update();
            }
        }

        $this->descricao_comercial = $value;
        $this->save();
    }
    public function getUmProperty()
    {
        return Medida::query()->pluck('name', 'id')->toArray();
    }

    public function render()
    {
        return view('livewire.admin.produtos.descriptions.edit-component');
    }

}
