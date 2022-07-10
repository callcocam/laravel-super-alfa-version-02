<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos;

use App\Models\Coperat;
use App\Models\Produto;
use Illuminate\Support\Arr;
use SIGA\Form\ArrayField;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{

    protected $route = "admin.produtos";

    public function mount(Produto $model)
    {
        $model->embalagens = $model->embalagem;
        $model->compras = $model->compra;
        $model->marketing = $model->marketing;
        $this->setFormProperties($model);
    }

    /**
     * @return array
     */
    public function fields()
    {
        $coperat = Coperat::find($this->model->coperat_id);
        if ($coperat)
            $this->form_data['coperat'] = $coperat->name;
        else
            $this->form_data['coperat'] = null;

//        if ($this->model->subsegmento_name)
//            $this->form_data['subsegmento'] = $this->model->subsegmento_name->name;

        if ($this->model->segmento_name)
            $this->form_data['tipo_de_embalaagem'] = $this->model->segmento_name->name;

        if ($this->model->unidade_medida_name)
            $this->form_data['unidade_medida'] = $this->model->unidade_medida_name->name;

        if ($this->model->marketing) {
            if ($contaNivel01Name = $this->model->marketing->contaNivel01Name) {
                if (isset($contaNivel01Name->name))
                    $this->form_data['marketing']['contaNivel01Name'] = $contaNivel01Name->name;
            }
            if ($contaNivel02Name = $this->model->marketing->contaNivel02Name) {
                if (isset($contaNivel02Name->name))
                    $this->form_data['marketing']['contaNivel02Name'] = $contaNivel02Name->name;
            }
            if ($contaNivel03Name = $this->model->marketing->contaNivel03Name) {
                if (isset($contaNivel03Name->name))
                    $this->form_data['marketing']['contaNivel03Name'] = $contaNivel03Name->name;
            }
            if ($contaNivel04Name = $this->model->marketing->contaNivel04Name) {
                if (isset($contaNivel04Name->name))
                    $this->form_data['marketing']['contaNivel04Name'] = $contaNivel04Name->name;
            }
        }


        return [
            'imagem' => Field::make('Enviar arquivo digital', 'imagem')->readonly(),
            'descricao_completa' => Field::make('Descrição Completa', 'descricao_completa')
                ->help('Descreva o nome do produto com todas as especifícações')->readonly(),
            'cod_prod_fornecedor' => Field::make('Cod. Prod. do Fornecedor', 'cod_prod_fornecedor')
                ->help('Descreva o código do produto na nota fiscal')
                ->readonly(),
            'recusado_motivo' => Field::make('Motivo da resusa', 'recusado_motivo')
                ->help('Motivo da resusa')
                ->readonly(),
            'codigo_interno'=>Field::make('codigo_interno')->readonly()
                ->label("Código Interno Alfa"),
            'modelo' => Field::make('Modelo', 'modelo')
                ->help('Modelo do Produto')->readonly(),
            'cor' => Field::make('Cor', 'cor')->help('Cor do Produto')->readonly(),
            'categoria_produto' => Field::make('Categoria Produto', 'categoria_produto')
                ->help('Categoria que o produto pertence sob ótica do fornecedor')->readonly(),
            'subcategoria' => Field::make('SubCategoria', 'subcategoria')
                ->help('Subcategoria que o produto pertence sob ótica do fornecedor')
                ->readonly(),
            'coperat' => Field::make('Categoria ALFA', 'coperat')
                ->help('Categorias da Cooperalfa')->readonly(),
            'tipo_de_embalagem' => Field::make('Tipo de embalagem', 'tipo_de_embalagem')
                ->help('Tipo de embalagam primaria do produto, por exemplo: Sache, Garrafa, Pote...')
                ->readonly(),
            'volume_de_embalagem' => Field::make('Volume de embalagem', 'volume_de_embalagem')
                ->help('Volume de produto dentro da embalagem primária')->readonly(),
            'unidade_medida' => Field::make('Unidade de medida', 'unidade_medida')
                ->help('Forma de venda do prodto, por exemplo, em Quilo, Litro, Gramas, Toneladas...')
                ->readonly(),
            'marca' => Field::make('Marca', 'marca')
                ->help('Marca do Produto')->readonly(),
            'fragrancia_sabor' => Field::make('Fragrância/Sabor', 'fragrancia_sabor')->readonly(),
            'segmento' => Field::make('Segmento', 'segmento')
                ->help('Qual é o segmento do produto')
                ->readonly(),
            'subsegmento' => Field::make('Subsegmento', 'subsegmento')
                ->help('Qual é o subsegmento')->readonly(),
            'outras_especificacoes' => Field::make('Outras especificações', 'outras_especificacoes')
                ->help('Descreva outras caracteristicas do produto não mencionadas acima')->readonly(),
            'tamanho' => Field::make('Tamanho', 'tamanho')->help('Descreva qual é o volume de produto dentro da embalagem primária')->readonly(),
            'mva_interno' => Field::make('% MVA Interno', 'mva_interno')
                ->help('Indice percentual de ST (Susbtituição tributária) - interno ')->readonly(),
            'mva_ajustado' => Field::make('% MVA Ajustado', 'mva_ajustado')
                ->help('Indice percentual de ST (Susbtituição tributária) - ajustado')->readonly(),
            'tipo_de_frete' => Field::make('Tipo de Frete (FOB/CIF)', 'tipo_de_frete')
                ->help('Qual é o tipo de frete?  Se for CIF é pago pelo fornecedor, se for FOB é a pagar pela Cooperalfa')
                ->readonly(),
            'classif_fiscal_ncm' => Field::make('Classif. Fiscal NCM', 'classif_fiscal_ncm')
                ->help('Nomenclatura Comum do Mercosul')->readonly(),
            'cod_barras' => Field::make('Cód. Barras EAN-13', 'cod_barras')->help('Código de Barras do Produto (EAN ou Gtin)')->readonly(),
            'prazo_de_validade' => Field::make('Prazo de Validade', 'prazo_de_validade')->help('Dias de vida útil do Produto')->readonly()->tooltip("(em dias)"),
            'peso_bruto_da_und' => Field::make('Peso Bruto da UND', 'peso_bruto_da_und')->help('Peso total da embalagem primária')->readonly()->tooltip("(em Grama)"),
            'peso_liquido_da_und' => Field::make('Peso Líquido da UND', 'peso_liquido_da_und')->help('Peso liquido da embalagem primária')->readonly()->tooltip("(em Grama)"),
            'preco_custo_un' => Field::make('Preço Custo UN', 'preco_custo_un')->help('Preço unitário do produto')->readonly(),
            'altura_da_und' => Field::make('Altura da UND', 'altura_da_und')->help('Centimetros da altura da embalagem primaria do produto')->tooltip("(em cm)")->readonly(),
            'largura_da_und' => Field::make('Largura da UND', 'largura_da_und')->help('Centimetros da largura da embalagem primaria do produto')->tooltip("(em cm)")->readonly(),
            'profundidade_da_und' => Field::make('Profundidade da UND', 'profundidade_da_und')->help('Centimetros da profundidade da embalagem primaria do produto')->tooltip("(em cm)")->readonly(),
            'qde_por_cx' => Field::make('Qde por Cx/Fdo/etc', 'qde_por_cx')
                ->help('Quantas unidades contém dentro da embalagem secundária')->readonly(),
            Field::make('embalagens')->array([
                // Field::make('tem_embalagem_secundaria')->span(2),
                ArrayField::make('dun_14')
                    ->label("DUN 14")->help('Código de barras da embalagem secundária, por exemplo, Caixa , Fardo, etc...')->readonly()->span(6)->tooltip("(ou EAN quando Embalagem em CX/FDO/Display)"),

                ArrayField::make('qde_na_emb_secundaria')
                    ->help('Quantidade de unidades constantes na embalagem secundária ')
                    ->label("Qde na emb")->readonly()->span(2)->tooltip("Secundária (cx/fdo/display)"),

                ArrayField::make('peso_bruto')
                    ->help('Peso total da embalagem secundaria')
                    ->label("Peso Bruto")->readonly()->span(2)->tooltip("cx/fdo (em grama)"),

                ArrayField::make('peso_liquido')
                    ->help('Peso liquido da embalagem secundaria')
                    ->label("Peso Liquido")->readonly()->span(2)->tooltip("cx/fdo (em grama)"),

                ArrayField::make('altura')
                    ->help('Centimetros da altura da embalagem secundaria')
                    ->label("Altura")->readonly()->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('largura')
                    ->help('Centimetros da largura da embalagem secundaria')
                    ->label("largura")->readonly()->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('profundidade')
                    ->help('Centimetros da profundidade da embalagem secundaria')
                    ->label("Profundidade")->readonly()->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('qde_por_camada')
                    ->help('Quantidade de embalagens secundaria em cada nivel do palete')
                    ->label("Qde por Camada")->readonly()->span(2)->tooltip("(em cx/fdo,etc)"),

                ArrayField::make('empilhamento')
                    ->help('Quantos niveis de empilhamento o palete possui')
                    ->label("Empilhamento")->readonly()->span(2)->tooltip("(em cx/fdo,etc)"),

                ArrayField::make('qde_no_palete')
                    ->help('Quantidade total de embalagens primarias no palete')
                    ->label("Qde no palete")->readonly()->span(2)->tooltip("(em cx/fdo,etc)"),
            ]),
            Field::make('compras')->array([
                'codigo_interno'=>ArrayField::make('codigo_interno')->rules('required')
                    ->label("Código Interno Alfa"),
//                    ArrayField::make('conta_de_estoque_cooperate')
//                        ->readonly()->span(3)
//                        ->label("Conta de estoque Cooperate"),
                'margem_do_produto'=>ArrayField::make('margem_do_produto')
                    ->readonly()
                    ->label("Margem do Produto"),
                'quantidade_minima_de_tranf'=>ArrayField::make('quantidade_minima_de_tranf')
                    ->readonly()
                    ->label("Quantidade Mínima de Tranf."),
                'n_do_deposito_cd'=>ArrayField::make('n_do_deposito_cd')
                    ->readonly()
                    ->label("Nº do Depósito do CD"),
                'entrega_cd_ou_na_filial'=>ArrayField::make('entrega_cd_ou_na_filial')
                    ->readonly()
                    ->label("Entrega CD ou na Filial"),
                'item_e_c_d'=>ArrayField::make('item_e_c_d')
                    ->readonly()
                    ->label("Item é c D?"),
                'inclusao_na_linha_ou_substituicao_de_produto'=>ArrayField::make('inclusao_na_linha_ou_substituicao_de_produto')
                    ->readonly()
                    ->label("Inclusão na Linha ou Substituição de Produto"),
            ]),
            Field::make('marketing')->array([
                ArrayField::make('descricao_comercial')
                    ->readonly()->span(6)->label("Descrição comercial"),
                ArrayField::make('descricao_para_erp')
                    ->span(6)->readonly()->label("Descrição para  ERP"),
                ArrayField::make('contaNivel01Name')
                    ->readonly()->span(3)->label("Conta Nivel 1"),
                ArrayField::make('contaNivel02Name')
                    ->readonly()->span(3)->label("Conta Nivel 2"),
                ArrayField::make('contaNivel03Name')
                    ->readonly()->span(3)->label("Conta Nivel 3"),
                ArrayField::make('contaNivel04Name')
                    ->readonly()->span(3)->label("Conta Nivel 4"),
                ArrayField::make('atributo01')
                    ->readonly()->span(3)->label("Atributo 1"),
                ArrayField::make('atributo02')
                    ->readonly()->span(3)->label("Atributo 2"),
                ArrayField::make('atributo03')
                    ->readonly()->span(3)->label("Atributo 3"),
                ArrayField::make('atributo04')
                    ->readonly()->span(3)->label("Atributo 4"),
            ])
        ];
    }

    public function submit()
    {
        $pdf = \PDF::loadHTML('<h1>Test</h1>');
        $pdf->download();
    }

//    public function estoqueStatus()
//    {
//        if ($this->rules())
//            $this->validate($this->rules());
//
//        $this->model->update([
//            'status' => 'estoque'
//        ]);
//        $this->form_data['status'] = 'estoque';
//        $this->form_data['updated_at'] = now();
//        $this->model->compra()->update([
//            'status' => 'estoque',
//            'codigo_interno' => Arr::get($this->form_data,'compras.codigo_interno')
//        ]);
//        $this->model->marketing()->update([
//            'status' => 'estoque'
//        ]);
//        if($this->success()){
//            $this->logAtualizar(sprintf("Alterou o status do produto %s, para estoque", $this->model->descricao_completa),'produtos');
//            return true;
//        }
//        return false;
//    }

    public function formView()
    {
        return 'admin.produtos.edit-component';
    }
}
