<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Produtos;

use App\Models\Produto;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Spatie\Image\Image;
use Illuminate\Http\UploadedFile;

class CreateComponent extends FormComponent
{

        protected $route = "app.produtos";

        public $status = "criado";
        public $produtoApiLink;
        protected $listeners = ['fileUpdate', 'input','refreshPhoto','loadProdutoApi','loadProdutoApiLink'];
        public function mount(Produto $produto)
        {
            $this->setFormProperties($produto);
            $this->form_data['type'] = "new";
        }

        public function success()
        {

            if(isset($this->form_data['medida_embalagem_secundaria_id'])){
                if(!$this->form_data['medida_embalagem_secundaria_id']){
                    $this->form_data['medida_embalagem_secundaria_id'] = null;
                }
            }

            if(\Arr::get($this->form_data, 'type') == "new"){
                $this->validate([
                    'form_data.cod_barras'=>[
                        Rule::unique('produtos','cod_barras')
                    ]
                ]);
            }            

            foreach ($this->form_data as $name => $form_datum) {
                if(in_array($name, $this->numeric_values) && empty($form_datum)){
                    $this->form_data[$name] = 0;
                }
            }
            if (!$this->validationCodBarrasUpdated()) {
               return false;
            }
            $this->form_data['medida_id'] = $this->form_data['unidade_medida'];
            if($medida =  \App\Models\Medida::find( $this->form_data['medida_id']))
            {
                $this->form_data['medida_name'] = $medida->name;
            }
            if( $this->status)
                $this->form_data['status'] = $this->status;
            if (parent::success()) {
                $this->form_data['embalagens']['updated_at'] = now();
                $this->model->embalagem()->create($this->form_data['embalagens']);
                $this->model->marketing()->create([
                    'status'=>$this->status
                ]);
                $this->model->compra()->create([
                    'status'=>$this->status
                ]);
                $this->logCreated(sprintf("Cadastrou o  produto %s", $this->model->descricao_completa),$this->model->status);
                return redirect()->route('app.produtos.editar', ['model'=>$this->model]);
            }
            return false;
        }

        public function openModalSimplusAction()
        {
            $this->dispatchBrowserEvent('openModalForm', 'depositActionSheet012');
        }

        public function updatedFormDataCodBarras($value)
        {
            $this->validationCodBarrasUpdated();

            if(\Arr::get($this->form_data, 'type') == "new"){
                $this->validate([
                    'form_data.cod_barras'=>[
                        Rule::unique('produtos','cod_barras')
                    ]
                ]);
            }

        }

        public function formView()
        {
            return 'app.produtos.create-component';
        }

        public function loadProdutoApiLink($url){
            $this->produtoApiLink = $url;
        }
        public function loadProdutoApi($data)
        {

            //DESCOMENTAR O (dd) PARA VER A LISTA COMPLETA
            //dd($data);
            $name =  data_get($data,'gtin');
            data_set($this->form_data,'cor', data_get($data,'cor-predominante',""));
            data_set($this->form_data,'segmento', data_get($data,'categoriaProduto.nome',""));
            data_set($this->form_data,'volume_de_embalagem', data_get($data,'medidas.pesoLiquido',""));
            data_set($this->form_data,'profundidade_da_und', data_get($data,'medidas.profundidade',""));
            $composicoesLogisticas = data_get($data,'composicoesLogisticas',[]);
            foreach($composicoesLogisticas as $composicoesLogistica){
                $niveis = data_get($composicoesLogistica,'niveis',[]);
                foreach($niveis as $key => $nivel){
                    if(!$key){
                        data_set($this->form_data,'tipo_de_embalagem_secundaria', data_get($nivel,'unidadeEmbalagem'));
                        data_set($this->form_data,'volume_de_embalagem_secundaria', data_get($nivel,'volume'));
                        data_set($this->form_data,'embalagens.qde_na_emb_secundaria', data_get($nivel,'quantidadeTotal'));
                        data_set($this->form_data,'embalagens.peso_bruto', data_get($nivel,'pesoBruto'));
                        data_set($this->form_data,'embalagens.peso_bruto', data_get($nivel,'pesoLiquido'));
                        data_set($this->form_data,'embalagens.altura', data_get($nivel,'altura'));
                        data_set($this->form_data,'embalagens.largura', data_get($nivel,'largura'));
                        data_set($this->form_data,'embalagens.profundidade', data_get($nivel,'profundidade'));
                        data_set($this->form_data,'embalagens.dun_14', data_get($nivel,'gtin'));
                        $paletizacoes = data_get($nivel,'paletizacoes');
                        if($paletizacoes){
                            $paletizacao= $paletizacoes[0];
                            data_set($this->form_data,'embalagens.qde_por_camada', data_get($paletizacao,'caixasCamada'));
                            data_set($this->form_data,'embalagens.empilhamento', data_get($paletizacao,'quantidadeCamadasPallet'));
                            data_set($this->form_data,'embalagens.qde_no_palete', data_get($paletizacao,'quantidadeCaixasPallet'));
                        }
                    }                    
                }
            }
            $name = sprintf('arquivos/fotos/%s-%s.png' ,date("Y_m_d_H_i_s"), $name);
            //storage\app\public\arquivos\fotos
            $url = data_get($data,'imagemPrincipal.url');
            $info = pathinfo($url);
            $url = sprintf("%s/%s",$info['dirname'],\Str::beforeLast($info['basename'],'?'));
            Image::load($url)->save(storage_path(sprintf('app/public/%s' , $name)));  
            data_set($this->form_data,'cod_barras', data_get($data,'gtin'));
            data_set($this->form_data,'descricao_completa', data_get($data,'descricaoLonga'));
            data_set($this->form_data,'imagem', $name);
            data_set($this->form_data,'categoria_produto', data_get($data,'categoriaPai.nome'));
            data_set($this->form_data,'subcategoria', data_get($data,'categoriaProduto.nome'));
            data_set($this->form_data,'unidade_medida', data_get($data,'medidas.volumeUm.abrev'));
            data_set($this->form_data,'marca', data_get($data,'marca.nome'));
            data_set($this->form_data,'classif_fiscal_ncm', data_get($data,'classificacaoFiscal.ncm'));
            data_set($this->form_data,'largura_da_und', data_get($data,'medidas.largura'));
            data_set($this->form_data,'profundidade_da_und', data_get($data,'medidas.profundidade'));
            data_set($this->form_data,'altura_da_und', data_get($data,'medidas.altura'));
            data_set($this->form_data,'peso_bruto_da_und', data_get($data,'medidas.pesoBruto'));
            data_set($this->form_data,'peso_liquido_da_und', data_get($data,'medidas.pesoLiquido'));
            data_set($this->form_data,'prazo_de_validade', data_get($data,'medidas.validade'));
            
        
            $this->gerarPreview( $data );
           
        }

        public function gerarPreview($data)
        {
            $name =  data_get($data,'gtin');
            data_set($preview,'cor', data_get($data,'cor-predominante',""));
            data_set($preview,'segmento', data_get($data,'categoriaProduto.nome',""));
            data_set($preview,'volume_de_embalagem', data_get($data,'medidas.pesoLiquido',""));
            data_set($preview,'profundidade_da_und', data_get($data,'medidas.profundidade',""));
            $composicoesLogisticas = data_get($data,'composicoesLogisticas',[]);
            foreach($composicoesLogisticas as $composicoesLogistica){
                $niveis = data_get($composicoesLogistica,'niveis',[]);
                foreach($niveis as $key => $nivel){
                    if(!$key){
                        data_set($preview,'tipo_de_embalagem_secundaria', data_get($nivel,'unidadeEmbalagem'));
                        data_set($preview,'volume_de_embalagem_secundaria', data_get($nivel,'volume'));
                        data_set($preview,'embalagens.qde_na_emb_secundaria', data_get($nivel,'quantidadeTotal'));
                        data_set($preview,'embalagens.peso_bruto', data_get($nivel,'pesoBruto'));
                        data_set($preview,'embalagens.peso_bruto', data_get($nivel,'pesoLiquido'));
                        data_set($preview,'embalagens.altura', data_get($nivel,'altura'));
                        data_set($preview,'embalagens.largura', data_get($nivel,'largura'));
                        data_set($preview,'embalagens.profundidade', data_get($nivel,'profundidade'));
                        data_set($preview,'embalagens.dun_14', data_get($nivel,'gtin'));
                        $paletizacoes = data_get($nivel,'paletizacoes');
                        if($paletizacoes){
                            $paletizacao= $paletizacoes[0];
                            data_set($preview,'embalagens.qde_por_camada', data_get($paletizacao,'caixasCamada'));
                            data_set($preview,'embalagens.empilhamento', data_get($paletizacao,'quantidadeCamadasPallet'));
                            data_set($preview,'embalagens.qde_no_palete', data_get($paletizacao,'quantidadeCaixasPallet'));
                        }
                    }                    
                }
            }
            $name = sprintf('arquivos/fotos/%s-%s.png' ,date("Y_m_d_H_i_s"), $name);
            //storage\app\public\arquivos\fotos
            $url = data_get($data,'imagemPrincipal.url');
            $info = pathinfo($url);
            $url = sprintf("%s/%s",$info['dirname'],\Str::beforeLast($info['basename'],'?'));
            Image::load($url)->save(storage_path(sprintf('app/public/%s' , $name)));  
            data_set($preview,'cod_barras', data_get($data,'gtin'));
            data_set($preview,'descricao_completa', data_get($data,'descricaoLonga'));
            data_set($preview,'imagem', $name);
            data_set($preview,'categoria_produto', data_get($data,'categoriaPai.nome'));
            data_set($preview,'subcategoria', data_get($data,'categoriaProduto.nome'));
            data_set($preview,'unidade_medida', data_get($data,'medidas.volumeUm.abrev'));
            data_set($preview,'marca', data_get($data,'marca.nome'));
            data_set($preview,'classif_fiscal_ncm', data_get($data,'classificacaoFiscal.ncm'));
            data_set($preview,'largura_da_und', data_get($data,'medidas.largura'));
            data_set($preview,'profundidade_da_und', data_get($data,'medidas.profundidade'));
            data_set($preview,'altura_da_und', data_get($data,'medidas.altura'));
            data_set($preview,'peso_bruto_da_und', data_get($data,'medidas.pesoBruto'));
            data_set($preview,'peso_liquido_da_und', data_get($data,'medidas.pesoLiquido'));
            data_set($preview,'prazo_de_validade', data_get($data,'medidas.validade'));
            
            \Storage::disk('public')->put('simplus/priview.json', json_encode($preview));
            $this->loadProdutoApiLink( \Storage::url('simplus/priview.json') );
        }
}
