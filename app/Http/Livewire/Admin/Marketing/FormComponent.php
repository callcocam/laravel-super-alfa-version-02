<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Marketing;

use App\Models\Arquivo;
use App\Models\Bc;
use App\Models\Coperat;
use App\Models\Medida;
use App\Models\TipoEmbalagem;
use Illuminate\Support\Str;
use SIGA\Form\ArrayField;
use SIGA\Form\Field;
use SIGA\Form\FormComponent as AliasFormComponent;
use Spatie\Image\Image;

class FormComponent extends AliasFormComponent
{
    use ERP;

    protected $numeric_values = [];

    private function descriptions($description)
    {
        //if (empty($this->form_data[$description])) {
        if (!isset($this->form_data['descricao_adiconal'])) {
            $this->form_data['descricao_adiconal'] = "";
        }

        $this->form_data[$description] = $this->form_data['descricao_adiconal'];
//1 – Categoria
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['categoria_produto']) && $this->form_data['produtos']['categoria_produto']) {
            $this->form_data[$description] = $this->form_data[$description] . ' ' . $this->form_data['produtos']['categoria_produto'];
        }
//2 – Subcategoria
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['subcategoria']) && $this->form_data['produtos']['subcategoria']) {
            $this->form_data[$description] = $this->form_data[$description] . ' ' . $this->form_data['produtos']['subcategoria'];
        }
//3 – Marca
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['marca'])) {
            $this->form_data[$description] = $this->form_data[$description] . ' ' . $this->form_data['produtos']['marca'];
        }
//4 – Modelo/Tipo/Referencia
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['modelo'])) {
            $this->form_data[$description] = $this->form_data[$description] . ' ' . $this->form_data['produtos']['modelo'];
        }
//5 – Fragrância
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['fragrancia_sabor'])) {
            $this->form_data[$description] = $this->form_data[$description] . ' ' . $this->form_data['produtos']['fragrancia_sabor'];
        }
//6 – Cor
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['cor'])) {
            $this->form_data[$description] = $this->form_data[$description] . ' ' . $this->form_data['produtos']['cor'];
        }
//7 – Tipo Da embalagem
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['tipo_de_embalagem']) && $this->form_data['produtos']['tipo_de_embalagem']) {
            $tipo_de_embalagem = TipoEmbalagem::find($this->form_data['produtos']['tipo_de_embalagem']);
            if ($tipo_de_embalagem) {
                $this->form_data[$description] = $this->form_data[$description] . ' ' . $tipo_de_embalagem->name;
            }
        }
//8 – Volume da embalagem
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['volume_de_embalagem'])) {
            $this->form_data[$description] = $this->form_data[$description] . ' ' . $this->form_data['produtos']['volume_de_embalagem'];
        }
//9 – Unidade medida
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['unidade_medida'])) {
            $unidade_medida = Medida::find($this->form_data['produtos']['unidade_medida']);
            if ($unidade_medida) {
                $this->form_data[$description] = $this->form_data[$description] . ' ' . $unidade_medida->name;
            }
        }


        $this->form_data[$description] = trim(str_replace("  ", " ", $this->form_data[$description]));
        $this->description_Com = trim(str_replace("  ", " ", $this->form_data[$description]));
        $this->createERP_description();
        //}
    }

    /**
     * @return array
     */
    public function fields()
    {


        $imagem = null;
        if ($this->model->produto) {
            $imagem = $this->model->produto->imagem;
        } else {
            if (isset($this->form_data['produtos']['imagem'])) {
                $imagem = $this->form_data['produtos']['imagem'];
            }
        }

//        if ($this->model->produto->unidade_medida_name)
//            $this->form_data['produtos']['unidade_medida'] = $this->model->produto->unidade_medida_name->name;

//        1 - Categoria Produto
//        2 - SubCategoria
//        3 - Marca
//        4 - Modelo
//        5 - Fragrância
//        6 - Sabor
//        7 - Tipo de embalagem
//        8 - Tamanho de embalagem
//        9 - Unidade de medida


        if (!isset($this->form_data['descricao_comercial'])) {
            $this->form_data['descricao_comercial'] = "";
        }

        $this->descriptions('descricao_com');

//        if (!isset($this->form_data['descricao_para_erp'])) {
//            $this->form_data['descricao_para_erp'] = "";
//        }
        // $this->descriptions('descricao_para_erp');



            $conta_nivels = Bc::query()->orderBy('nivel')
            ->where('nivel', '4')->get();

               foreach ($conta_nivels as $value){
                   $conta_nivels4[$value['id']] = $value['name'];
               }

//                 dd($conta_nivels4);

            $this->form_data['conta_nivel01'] = null;
            $this->form_data['conta_nivel02'] = null;
            $this->form_data['conta_nivel03'] = null;
            $conta_nivels2=[];
            $conta_nivels1=[];

            $level3 = Bc::query()->where('id', data_get($this->form_data,'conta_nivel04'))
                ->where('nivel', '4')->first();

             $conta_nivels3 = Bc::query()->orderBy('nivel')
            ->where('id', data_get($level3,'bc_id'))
            ->where('nivel', '3')->pluck('name', 'bc_id')->toArray();

            if (count($conta_nivels3)) {
                foreach($conta_nivels3 as $key => $value)
                {
                    $this->form_data['conta_nivel03'] =$key;
                }

                $conta_nivels2 = Bc::query()->orderBy('nivel')
                ->where('id', data_get($this->form_data,'conta_nivel03'))
                ->where('nivel', '2')->pluck('name', 'bc_id')->toArray();

                if (count($conta_nivels2)) {
                    foreach($conta_nivels2 as $key => $value){
                        $this->form_data['conta_nivel02'] =$key;
                    }
                   //dd($this->form_data['conta_nivel02']);
                    $conta_nivels1 = Bc::query()->orderBy('nivel')
                    ->where('id', data_get($this->form_data,'conta_nivel02'))
                    ->where('nivel', '1')->pluck('name', 'id')->toArray();
                    if (count($conta_nivels1)) {

                        foreach($conta_nivels1 as $key => $value){
                            $this->form_data['conta_nivel01'] =$key;
                        }
                      //dd($this->form_data['conta_nivel01']);
                    }
                }
            }


        // if (!count($conta_nivels1)) {
        //     $this->form_data['conta_nivel02'] = null;
        //     $this->form_data['conta_nivel03'] = null;
        //     $this->form_data['conta_nivel04'] = null;
        // }

        // if (!isset($this->form_data['conta_nivel01'])) {
        //     $this->form_data['conta_nivel01'] = null;
        //     $this->form_data['conta_nivel02'] = null;
        //     $this->form_data['conta_nivel03'] = null;
        //     $this->form_data['conta_nivel04'] = null;
        // }
        // $conta_nivels2 = Bc::query()->orderBy('nivel')
        //     ->where('bc_id', $this->form_data['conta_nivel01'])
        //     ->where('nivel', '2')->pluck('name', 'id')->toArray();

        // if (!count($conta_nivels2)) {
        //     $this->form_data['conta_nivel02'] = null;
        //     $this->form_data['conta_nivel03'] = null;
        //     $this->form_data['conta_nivel04'] = null;
        // }
        // $conta_nivels3 = Bc::query()->orderBy('nivel')
        //     ->where('bc_id', $this->form_data['conta_nivel02'])
        //     ->where('nivel', '3')->pluck('name', 'id')->toArray();

        // if (!count($conta_nivels3)) {
        //     $this->form_data['conta_nivel03'] = null;
        //     $this->form_data['conta_nivel04'] = null;
        // }

        // $conta_nivels4 = Bc::query()->orderBy('nivel')
        //     //->where('bc_id', $this->form_data['conta_nivel03'])
        //     ->where('nivel', '4')->pluck('name', 'bc_id')->toArray();
        $descricao_para_erp_len = 0;


        if (isset($this->form_data['descricao_para_erp'])) {
            $descricao_para_erp_len = strlen($this->form_data['descricao_para_erp']);
        }
        return [
            Field::make('produtos')->array([
                'imagem' => Field::make('Arquivo digital', 'imagem')->readonly()
                    ->link($imagem)
                    ->help("Favor anexar uma foto frontal do produto com o tamanho mínimo de 512 KB e máximo 4MB, no formato PNG ou JPG.  A imagem será utilizada para tabloide de ofertas, site, e-commerce e APP."),
                'descricao_completa' => Field::make('Descrição Completa', 'descricao_completa')
                    ->help('Descreva o nome do produto com todas as especifícações')->readonly(),
                'cod_prod_fornecedor' => Field::make('Cod. Prod. do Fornecedor', 'cod_prod_fornecedor')
                    ->help('Descreva o código do produto na nota fiscal')->readonly(),
                'modelo' => Field::make('Modelo/Tipo/Referência', 'modelo')->wire("lazy")
                    ->help('Descreva o Modelo/Tipo/Referência do Produto'),
                'cor' => Field::make('Cor', 'cor')->help('Descreva a cor do Produto')->wire("lazy"),
                'categoria_produto' => Field::make('Categoria Produto', 'categoria_produto')->wire("lazy")
                    ->help('Descreva a categoria que o produto pertence sob ótica do fornecedor'),
                'subcategoria' => Field::make('SubCategoria', 'subcategoria')->wire("lazy")
                    ->help('Descreva a subcategoria que o produto pertence sob ótica do fornecedor'),

//                'coperat' => Field::make('Categoria ALFA', 'coperat')
//                    ->help('Categorias da Cooperalfa')->readonly(),

                'coperat_id' => Field::make('Categoria ALFA', 'coperat_id')
                    ->help('Selecione o cadastro de Categorias da Cooperalfa')->wire("lazy")->select()->options(Coperat::query()->orderBy('name')->pluck('name', 'id')->toArray(), true),
                'tipo_de_embalagem' => Field::make('Tipo de embalagem', 'tipo_de_embalagem')->rules('required')->wire("lazy")
                    ->help('Selecione o tipo de embalagam primaria do produto, por exemplo: Sache, Garrafa, Pote...')->select()->options(TipoEmbalagem::query()->pluck('name', 'id')->toArray(), true),
                'volume_de_embalagem' => Field::make('Volume da embalagem', 'volume_de_embalagem')
                    ->help('Informe qual é o volume de produto dentro da embalagem primária')->wire("lazy"),
                'unidade_medida' => Field::make('Unidade de medida', 'unidade_medida')->wire("lazy")->rules('required')
                    ->help('Selecione forma de venda do prodto, por exemplo, em Quilo, Litro, Gramas, Toneladas...')->select()->options(Medida::query()->pluck('name', 'id')->toArray(), true),
                'marca' => Field::make('Marca', 'marca')->wire("lazy")
                    ->help('Descreva a marca do Produto'),
                'fragrancia_sabor' => Field::make('Fragrância/Sabor', 'fragrancia_sabor')->wire("lazy"),
                'segmento' => Field::make('Segmento', 'sabor')->help('Descreva o seguimento')->wire("lazy"),
                'subsegmento' => Field::make('Subsegmento', 'subsegmento')->wire("lazy")
                    ->help('Descreva qual é o subsegmento'),
                'outras_especificacoes' => Field::make('Outras especificações', 'outras_especificacoes')
                    ->help('Descreva outras caracteristicas do produto não mencionadas acima')->readonly(),
                'mva_interno' => Field::make('% MVA Interno', 'mva_interno')
                    ->help('Descreva o índice percentual de ST (Susbtituição tributária) - interno ')->readonly(),
                'mva_ajustado' => Field::make('% MVA Ajustado', 'mva_ajustado')
                    ->help('Descreva o índice percentual de ST (Susbtituição tributária) - ajustado')->readonly(),
                'tipo_de_frete' => Field::make('Tipo de Frete (FOB/CIF)', 'tipo_de_frete')
                    ->help('Descreva qual é o tipo de frete?  Se for CIF é pago pelo fornecedor, se for FOB é a pagar pela Cooperalfa')->readonly(),
                'classif_fiscal_ncm' => Field::make('Classif. Fiscal NCM', 'classif_fiscal_ncm')
                    ->help('Descreva a nomenclatura Comum do Mercosul')->readonly(),
                'cod_barras' => Field::make('Cód. Barras EAN-13', 'cod_barras')->help('Descreva o código de Barras do Produto (EAN ou Gtin)')->readonly(),
                'prazo_de_validade' => Field::make('Prazo de Validade', 'prazo_de_validade')->help('Descreva em dias a vida útil do Produto')->readonly()->tooltip("(em dias)"),
                'peso_bruto_da_und' => Field::make('Peso Bruto da UND', 'peso_bruto_da_und')->help('Descreva o peso total da embalagem primária')->readonly()->tooltip("(em Grama)"),
                'peso_liquido_da_und' => Field::make('Peso Líquido da UND', 'peso_liquido_da_und')->help('Descreva o peso liquido da embalagem primária')->readonly()->tooltip("(em Grama)"),
                'preco_custo_un' => Field::make('Preço Custo UN', 'preco_custo_un')->help('Descreva o preço unitário do produto')->readonly(),
                'altura_da_und' => Field::make('Altura da UND', 'altura_da_und')->help('Descreva em centimetros a altura da embalagem primaria do produto')->tooltip("(em cm)")->readonly(),
                'largura_da_und' => Field::make('Largura da UND', 'largura_da_und')->help('Descreva em centimetros a largura da embalagem primaria do produto')->tooltip("(em cm)")->readonly(),
                'profundidade_da_und' => Field::make('Profundidade da UND', 'profundidade_da_und')->help('Descreva em centimetros a profundidade da embalagem primaria do produto')->tooltip("(em cm)")->readonly(),
                'qde_por_cx' => Field::make('Qde por Cx/Fdo/etc', 'qde_por_cx')
                    ->help('Descreva quantas unidades contém dentro da embalagem secundária')->readonly(),
            ]),
            Field::make('embalagens')->array([
                // Field::make('tem_embalagem_secundaria')->span(2),
                ArrayField::make('dun_14')
                    ->label("DUN 14")->readonly()->help('Descreva o código de barras da embalagem secundária, por exemplo, Caixa , Fardo, etc...')->span(6)->tooltip("(ou EAN quando Embalagem em CX/FDO/Display)"),

                ArrayField::make('qde_na_emb_secundaria')
                    ->help('Descreva a quantidade de unidades constantes na embalagem secundária ')
                    ->label("Qde na emb")->readonly()->span(2)->tooltip("Secundária (cx/fdo/display)"),

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
            Field::make('compras')->array([
                Field::make("Código Interno Alfa", 'codigo_interno')->readonly()->span(4),
                //Field::make("Conta de estoque Cooperate", 'conta_de_estoque_cooperate')->readonly()->span(2),
                Field::make("Margem do Produto", 'margem_do_produto')->readonly()->span(2),
                Field::make("Quantidade Mínima de Tranf.", 'quantidade_minima_de_tranf')->readonly()->span(2),
                Field::make("Nº do Depósito do CD", 'n_do_deposito_cd')->readonly()->span(4),
                Field::make("Entrega CD ou na Filial", 'entrega_cd_ou_na_filial')->readonly()->span(2),
                Field::make("Item é c/\"\"D\"\"", 'item_e_c_d')->readonly()->span(2),
                Field::make("Inclusão na Linha ou Substituição de Produto", 'inclusao_na_linha_ou_substituicao_de_produto')->readonly()->span(8),
                Field::make("App", 'app')->readonly()->span(6),
                Field::make("IEccomerce", 'eccomerce')->readonly()->span(6),

            ]),
            Field::make("Descrição comercial", 'descricao_comercial'),
            Field::make("Descrição para  ERP", 'descricao_para_erp')
                ->help(sprintf("Quantidade de caracteres %s/35", $descricao_para_erp_len))
                ->view('textarea-erp'),
            Field::make("Descrição para o encarte", 'descricao_para_encarte')
                ->view('textarea-encart'),
                Field::make("Conta Nivel 4", 'conta_nivel04')->select()->options($conta_nivels4, true)->wire('lazy'),
                Field::make("Conta Nivel 3", 'conta_nivel03')->select()->options($conta_nivels3, true)->wire('lazy'),
                Field::make("Conta Nivel 2", 'conta_nivel02')->select()->options($conta_nivels2, true)->wire('lazy'),
                Field::make("Conta Nivel 1", 'conta_nivel01')->select()->options($conta_nivels1, true)->wire('lazy'),
            Field::make("Atributo 1", 'atributo01'),
            Field::make("Atributo 2", 'atributo02'),
            Field::make("Atributo 3", 'atributo03'),
            Field::make("Atributo 4", 'atributo04'),
        ];
    }

    public function copiarParaArquivos()
    {
        $imagem = explode("/", $this->model->produto->imagem);
        $new = last($imagem);
        if(\Str::contains($new , $this->model->produto->cod_barras)){
            $form_data['archive'] = $this->model->produto->imagem;
            $form_data['type'] = 'fotos';
            $form_data['name'] = $this->model->produto->cod_barras;
            $form_data['produto_id'] = $this->model->produto->id;
            $form_data['atualizado'] = rand(2,50000);

        }
        else{
            $name = Str::replaceLast(Str::beforeLast($new, '.'), $this->model->produto->cod_barras, $this->model->produto->imagem);
            Image::load(storage_path('app/public/' . $this->model->produto->imagem))->save(storage_path('app/public/' . $name));
            $form_data['archive'] = $name;
            $form_data['type'] = 'fotos';
            $form_data['name'] = $this->model->produto->cod_barras;
            $form_data['produto_id'] = $this->model->produto->id;
            $form_data['atualizado'] = rand(2,50000);
        }
        if ($file = Arquivo::query()->where('produto_id', $this->model->produto->id)->first()) {
            $file->update($form_data);
        } else {
            Arquivo::query()->create($form_data);
        }

    }

    public function formView()
    {
        return 'app.produtos.edit-component';
    }
}
