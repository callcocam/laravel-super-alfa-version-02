<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Compras;

use App\Models\Medida;
use App\Models\Coperat;
use App\Models\Cluster;
use SIGA\Form\ArrayField;
use SIGA\Form\Field;
use SIGA\Form\FormComponent as AliasFormComponent;

class FormComponent extends AliasFormComponent
{


    protected $numeric_values = ['margem_do_produto', 'quantidade_minima_de_tranf', 'n_do_deposito_cd'];

    /**
     * @return array
     */
    public function fields()
    {
        $produtoYype = "";
        if ($this->model->produto->type == 'edit'){
            $produtoYype = "required";
        }
//        if ($this->model->produto->subsegmento_name)
//            $this->form_data['produtos']['subsegmento'] = $this->model->produto->subsegmento_name->name;
        if ($this->model->produto->segmento_name)
            $this->form_data['produtos']['tipo_de_embalagem'] = $this->model->produto->segmento_name->name;
        if ($this->model->produto->unidade_medida_name)
            $this->form_data['produtos']['unidade_medida'] = $this->model->produto->unidade_medida_name->name;

        if(data_get($this->form_data, 'produtos.percentual_sobre_estoque') ){
            data_set($this->form_data, 'produtos.quantidade_fixa_de_estoque',null);
            data_set($this->form_data, 'produtos.integrar_estoque_com_quantidade_fixa',false);
        }elseif(data_get($this->form_data, 'produtos.quantidade_fixa_de_estoque') ){
            data_set($this->form_data, 'produtos.percentual_sobre_estoque',null);
            data_set($this->form_data, 'produtos.integrar_estoque_com_quantidade_fixa',true);
        }
        elseif(!data_get($this->form_data, 'produtos.quantidade_fixa_de_estoque') ){
            data_set($this->form_data, 'produtos.integrar_estoque_com_quantidade_fixa',false);
        }


        return [
            Field::make('produtos')->array([
                'imagem' => Field::make('Enviar arquivo digital', 'imagem')->readonly(),
                'descricao_completa' => Field::make('Descri????o Completa', 'descricao_completa')
                    ->help('Nome do produto com todas as especif??ca????es')
                    ->readonly(),
                'cod_prod_fornecedor' => Field::make('Cod. Prod. do Fornecedor', 'cod_prod_fornecedor')
                    ->help('C??digo do produto na nota fiscal')->readonly(),
                // //NOVOS CAMPOS NO FORMULARIO DE COMPRAS
                // 'tipo_de_embalagem_secundaria' => Field::make('Tipo de embalagem secund??ria ', 'tipo_de_embalagem_secundaria')->readonly(),
                // 'volume_de_embalagem_secundaria' => Field::make('Volume da embalagem secund??ria', 'volume_de_embalagem_secundaria')->readonly(),
                // 'medida_embalagem_secundaria_id' => Field::make('Unidade de medida da embalagem secundaria', 'medida_embalagem_secundaria_id')
                // ->select()->options(Medida::query()->pluck('name', 'id')->toArray(), true),
                // //FIM DOS NOVOS CAMPOS

                'modelo' => Field::make('Modelo/Tipo/Refer??ncia', 'modelo')
                    ->help('Modelo/Tipo/Refer??ncia do Produto')->readonly(),
                'cor' => Field::make('Cor', 'cor')->help('Cor do Produto')->readonly(),
                'categoria_produto' => Field::make('Categoria Produto', 'categoria_produto')
                    ->help('Categoria que o produto pertence sob ??tica do fornecedor')->readonly(),
                'subcategoria' => Field::make('SubCategoria', 'subcategoria')
                    ->help('Subcategoria que o produto pertence sob ??tica do fornecedor')->readonly(),
                'coperat_id' => Field::make('Categoria ALFA', 'coperat_id')
                    ->help('Categorias da Cooperalfa')->select()->options(Coperat::query()->orderBy('name')->pluck('name', 'id')->toArray(), true),
                'cluster_id' => Field::make('Cluster', 'cluster_id')->select()->options(Cluster::query()->orderBy('nome')->pluck('nome', 'id')->toArray(), true),

                'tipo_de_embalagem' => Field::make('Tipo de embalagem', 'tipo_de_embalagem')
                    ->help('Tipo de embalagam primaria do produto, por exemplo: Sache, Garrafa, Pote...')->readonly(),
                'volume_de_embalagem' => Field::make('Volume de embalagem', 'volume_de_embalagem')
                    ->help('Volume de produto dentro da embalagem prim??ria')->readonly(),

                'unidade_medida'=>Field::make('Unidade de medida','unidade_medida')
                    ->help('Forma de venda do prodto, por exemplo, em Quilo, Litro, Gramas, Toneladas...')->readonly(),
                'marca' => Field::make('Marca', 'marca')
                    ->help('Marca do Produto')->readonly(),

                'fragrancia_sabor' => Field::make('Fragr??ncia/Sabor', 'fragrancia_sabor')
                    ->help('Fragr??ncia ou Sabor')->readonly(),

                'segmento' => Field::make('Segmento', 'sabor')
                    ->help('Qual ?? o segmento')->readonly(),
                'subsegmento' => Field::make('Subsegmento', 'subsegmento')
                    ->help('Qual ?? o subsegmento')->readonly(),

                'outras_especificacoes' => Field::make('Outras especifica????es', 'outras_especificacoes')
                    ->help('Outras caracteristicas do produto n??o mencionadas acima')->readonly(),

                'tamanho' => Field::make('Tamanho', 'tamanho')
                    ->help('Qual ?? o volume de produto dentro da embalagem prim??ria')->readonly(),

                'mva_interno' => Field::make('% MVA Interno', 'mva_interno')
                    ->help('Indice percentual de ST (Susbtitui????o tribut??ria) - interno ')->readonly(),
                'mva_ajustado' => Field::make('% MVA Ajustado', 'mva_ajustado')
                    ->help('Indice percentual de ST (Susbtitui????o tribut??ria) - ajustado')->readonly(),
                'tipo_de_frete' => Field::make('Tipo de Frete (FOB/CIF)', 'tipo_de_frete')
                    ->help('Tipo de frete?  Se for CIF ?? pago pelo fornecedor, se for FOB ?? a pagar pela Cooperalfa')->readonly(),
                'classif_fiscal_ncm' => Field::make('Classif. Fiscal NCM', 'classif_fiscal_ncm')
                    ->help('Nomenclatura Comum do Mercosul')->readonly(),
                'cod_barras' => Field::make('C??d. Barras EAN-13', 'cod_barras')->help('C??digo de Barras do Produto (EAN ou Gtin)')->readonly(),
                'prazo_de_validade' => Field::make('Prazo de Validade', 'prazo_de_validade')
                    ->help('Dias de vida ??til do Produto')->readonly()->tooltip("(em dias)"),
                'peso_bruto_da_und' => Field::make('Peso Bruto da UND', 'peso_bruto_da_und')
                    ->help('Peso total da embalagem prim??ria')->readonly()->tooltip("(em Grama)"),
                'peso_liquido_da_und' => Field::make('Peso L??quido da UND', 'peso_liquido_da_und')
                    ->help('Peso liquido da embalagem prim??ria')->readonly()->tooltip("(em Grama)"),
                'preco_custo_un' => Field::make('Pre??o Custo UN', 'preco_custo_un')
                    ->help('Pre??o unit??rio do produto')->readonly(),
                'altura_da_und' => Field::make('Altura da UND', 'altura_da_und')
                    ->tooltip("(em cm)")
                    ->help('Centimetros da altura da embalagem primaria do produto')->readonly(),
                'largura_da_und' => Field::make('Largura da UND', 'largura_da_und')
                    ->tooltip("(em cm)")->help('Centimetros da largura da embalagem primaria do produto')->readonly(),
                'profundidade_da_und' => Field::make('Profundidade da UND', 'profundidade_da_und')
                    ->help('Centimetros da profundidade da embalagem primaria do produto')->tooltip("(em cm)")->readonly(),
                'qde_por_cx' => Field::make('Qde por Cx/Fdo/etc', 'qde_por_cx')
                    ->help('Quantas unidades cont??m dentro da embalagem secund??ria')->readonly(),

                //CAMPO NOVO PARA ECOMMERCE
                    'maximo_de_unidade_por_compra' =>Field::make("M??ximo de unidade por compra", 'maximo_de_unidade_por_compra')
                ->help('M??ximo de unidade por compra')->rules('required'),
                'quantidade_minima_para_compra' =>Field::make("Quantidade m??nima para compra", 'quantidade_minima_para_compra')
                ->help('Quantidade m??nima para compra')->rules(function ($data) {
                        if (\Str::upper(data_get($data, 'produtos.unidade_medida')) === 'KG') {
                            return 'required';
                        }
                  }, $this->form_data),
                'fracao_da_unidade_de_venda' =>Field::make("Fra????o da unidade de venda", 'fracao_da_unidade_de_venda')
                ->help('Fra????o da unidade de venda')->rules(function ($data) {
                    if (\Str::upper(data_get($data, 'produtos.unidade_medida')) === 'KG') {
                        return 'required';
                    }
              }, $this->form_data),
                'quantidade_fixa_de_estoque' =>Field::make("Quantidade fixa de estoque", 'quantidade_fixa_de_estoque')
                ->help('Quantidade fixa de estoque')->wire('lazy'),
                'percentual_sobre_estoque' =>Field::make("Percentual sobre estoque", 'percentual_sobre_estoque')
                ->help('Percentual sobre estoque')->wire('lazy'),
                'estoque_m??nimo_para_loja_fisica' =>Field::make("Estoque m??nimo para loja f??sica", 'estoque_m??nimo_para_loja_fisica')
                ->help('Estoque m??nimo para loja f??sica')->rules(function ($data) {
                    if (\Str::upper(data_get($data, 'produtos.ecommerce')) === 'SIM') {
                            if (\Str::upper(data_get($data, 'produtos.unidade_medida')) != 'KG') {
                                return 'required';
                            }
                        }
              }, $this->form_data),
                'integrar_estoque_com_quantidade_fixa' =>Field::make("Integrar Estoque com quantidade fixa", 'integrar_estoque_com_quantidade_fixa')
                ->checkbox()->help('Integrar Estoque com quantidade fixa'),
            ]),
            Field::make('embalagens')->array([
                // Field::make('tem_embalagem_secundaria')->span(2),
                ArrayField::make('dun_14')
                    ->label("DUN 14")->readonly()->help('Descreva o c??digo de barras da embalagem secund??ria, por exemplo, Caixa , Fardo, etc...')->span(6)->tooltip("(ou EAN quando Embalagem em CX/FDO/Display)"),

                ArrayField::make('qde_na_emb_secundaria')
                    ->help('Descreva a quantidade de unidades constantes na embalagem secund??ria ')
                    ->label("Qde na emb")->readonly()->span(2)->tooltip("Secund??ria (cx/fdo/display)"),

                ArrayField::make('peso_bruto')
                    ->help('Descreva o peso total da embalagem secundaria')
                    ->label("Peso Bruto")->readonly()->span(2)->tooltip("cx/fdo (em grama)"),

                ArrayField::make('peso_liquido')
                    ->help('Descreva o peso liquido da embalagem secundaria')
                    ->label("Peso Liquido")->readonly()->span(2)->tooltip("cx/fdo (em grama)"),

                ArrayField::make('altura')
                    ->help('Descreva em centimetros a altura da embalagem secundaria')
                    ->label("Altura")->readonly()->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('largura')
                    ->help('Descreva em centimetros a largura da embalagem secundaria')
                    ->label("largura")->readonly()->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('profundidade')
                    ->help('Descreva em centimetros a profundidade da embalagem secundaria')
                    ->label("Profundidade")->readonly()->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('qde_por_camada')
                    ->help('Descreva a quantidade de embalagens secundaria em cada nivel do palete')
                    ->label("Qde por Camada")->readonly()->span(2)->tooltip("(em cx/fdo,etc)"),

                ArrayField::make('empilhamento')
                    ->help('Descreva quantos niveis de empilhamento o palete possui')
                    ->label("Empilhamento")->readonly()->span(2)->tooltip("(em cx/fdo,etc)"),

                ArrayField::make('qde_no_palete')
                    ->help('Descreva a quantidade total de embalagens primarias no palete')
                    ->label("Qde no palete")->readonly()->span(2)->tooltip("(em cx/fdo,etc)"),
            ]),
            Field::make("C??digo Interno Alfa", 'codigo_interno')->rules($produtoYype),
            Field::make("Conta de estoque Cooperate", 'conta_de_estoque_cooperate'),
            Field::make("Margem do Produto", 'margem_do_produto')->rules('numeric|nullable'),
            Field::make("Quantidade M??nima de Tranf.", 'quantidade_minima_de_tranf')->rules('numeric|nullable'),
            Field::make("N?? do Dep??sito do CD", 'n_do_deposito_cd')->rules('nullable'),
            Field::make("Entrega CD ou na Filial", 'entrega_cd_ou_na_filial'),
            Field::make("Item ??  D", 'item_e_c_d')->select()->options([
                'N??o'=>"N??O",
                'SIM'=>"SIM",
            ]),
            Field::make("O item ?? para inclus??o ou substitui????o?", 'inclusao_na_linha_ou_substituicao_de_produto')
                ->select()->options([
                    '0' => 'Inclus??o ',
                    '1' => 'Substitui????o'
                ], true),
            Field::make("App", 'app')
                ->select()->options([
                    'N??O' => 'N??O',
                    'SIM' => 'SIM'
                ], true),
            Field::make("Eccomerce", 'ecommerce')
                ->select()->options([
                    'N??O' => 'N??O',
                    'SIM' => 'SIM'
                ], true)->wire('lazy'),
            Field::make("C??digo do produto a ser substitu??do", 'codigo_do_produto_a_ser_substitu??do')
            ->placeholder("C??digo do produto a ser substitu??do"),
        ];
    }

    public function formView()
    {
        return 'app.produtos.edit-component';
    }
}
