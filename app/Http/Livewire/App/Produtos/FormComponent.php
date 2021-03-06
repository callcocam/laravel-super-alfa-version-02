<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Produtos;

use App\Models\Coperat;
use App\Models\Medida;
use App\Models\Produto;
use App\Models\TipoEmbalagem;
use Illuminate\Support\Arr;
use SIGA\Form\ArrayField;
use SIGA\Form\Field;
use Illuminate\Http\File;
use Illuminate\Validation\Rule;
use SIGA\Form\FormComponent as AliasFormComponent;

class FormComponent extends AliasFormComponent
{
    protected $numeric_values = ['altura_da_und', 'preco_custo_un', 'altura_da_und', 'largura_da_und', 'profundidade_da_und', 'qde_por_cx'];

    public $status;

    public function uploadPhoto()
    {
        if ($this->file) {
            $this->validate([
                'file' => 'image|max:4096|min:512', // 1MB Max
//             'file' => 'image', // 1MB Max
            ]);
            $nameFile = \Str::beforeLast($this->file->getClientOriginalName(), '.');
            $nameFile = \Str::slug($nameFile);
            $nameFile = sprintf("%s.%s", $nameFile,$this->file->getClientOriginalExtension());
            //$nameFile = sprintf("%s.%s", $this->form_data['cod_barras'],$this->file->getClientOriginalExtension());
            $this->form_data['imagem'] = $this->file->store('arquivos/fotos');
            // $this->form_data['imagem'] = $this->file->storeAs('arquivos/fotos',$nameFile);
            parent::uploadPhoto();
            return true;
        }else{
            $this->validate(array_merge($this->rules(), [
                "form_data.imagem" => 'required'
            ]));
            // if(\Storage::exists(data_get($this->form_data,'imagem'))){
            //     $file = data_get($this->form_data,'imagem');
            //     $fileNewName = \Str::afterLast($file,"/");
            //     $fileNewName = \Str::beforeLast($fileNewName,".");
            //     $fileNewName = \Str::replaceLast($fileNewName,$this->form_data['cod_barras'],$file);
            //     $this->form_data['imagem'] = \Storage::putFileAs('/', new File(storage_path(sprintf("app/public/%s",data_get($this->form_data,'imagem')))), $fileNewName );
            //     parent::uploadPhoto();
            //     return true;
            // }
        }

        return true;
    }

    protected function validationCodBarrasUpdated(){
        if (Arr::get($this->form_data, 'type') == "edit") {
            if ($codBarras = Arr::get($this->form_data, 'cod_barras')) {
                if ($product = Produto::query()->whereIn("status", ['compras-concluido','importadoerp'])
                    ->where("cod_barras", $codBarras)->first()) {
                    $this->form_data['update_id'] = $product->id;
                    return true;
                }
                else{
                    $this->form_data['update_id'] = null;
                    $this->addError("form_data.cod_barras", "Produto com o c??digo de barras [ {$codBarras} ] n??o foi encontrado na lista de produto aprovados");
                    return false;
                }
            }
        }
        return true;
    }
    public function updatedFormDataType($value)
    {
        $this->validationCodBarrasUpdated();



    }

    public function updatedFormDataCodBarras($value)
    {
        $this->validationCodBarrasUpdated();
    }

    public function saveAndStatus()
    {
        $this->status = "compras";
//        if($this->model->recusado){
//            $this->status = $this->model->recusado;
//        }

        return parent::submit();
    }

    /**
     * @return array
     */
    public function fields()
    {

        return [
            Field::make('Tipo de produto', 'type')
                ->options([
                    "new" => "Novo Produto",
                    "edit" => "Atualiza????o de  Produto",
                ], true)
                ->default("new")
                ->help('Use essa op????o para informar que ?? uma altera????o de produto')
                ->rules('required'),
            Field::make('Foto do Produto', 'imagem')->file()
                ->placeholder('clique para selecionar a imagem')
//                  ->rules('required')
                ->help("Favor anexar uma foto frontal do produto com o tamanho m??nimo de 512 KB e m??ximo 4MB, no formato PNG ou JPG. A imagem ser?? utilizada para tabloide de ofertas, site, e-commerce e APP."),
            Field::make('Descri????o Completa', 'descricao_completa')
                ->help('Descreva o nome do produto com todas as especif??ca????es')
                ->rules('required'),
            Field::make('Cod. Prod. do Fornecedor', 'cod_prod_fornecedor')
                ->help('Descreva o c??digo do produto na nota fiscal')->rules('required'),
            Field::make('Modelo/Tipo/Refer??ncia', 'modelo')
                ->help('Descreva o Modelo/Tipo/Refer??ncia do Produto'),
            Field::make('Cor', 'cor')
                ->help('Descreva a cor do Produto'),
            Field::make('Categoria Produto', 'categoria_produto')->rules('required')
                ->help('Descreva a categoria que o produto pertence sob ??tica do fornecedor'),
            Field::make('SubCategoria', 'subcategoria')->rules('required')
                ->help('Descreva a subcategoria que o produto pertence sob ??tica do fornecedor'),
            Field::make('Categoria ALFA', 'coperat_id')->rules('required')
                ->help('Selecione o cadastro de Categorias da Cooperalfa')
                ->select()->options(Coperat::query()->orderBy('name')->where('access', '!=', '1')->where('access','<>','1')->pluck('name', 'id')->toArray(), true)->rules('required'),
            Field::make('Fragr??ncia/Sabor', 'fragrancia_sabor')
                ->help('Fragr??ncia ou Sabor'),
            Field::make('Tipo de embalagem', 'tipo_de_embalagem')->rules('required')
                ->help('Selecione o tipo de embalagam primaria do produto, por exemplo: Sache, Garrafa, Pote...')->select()->options(TipoEmbalagem::query()->pluck('name', 'id')->toArray(), true),

            Field::make('Segmento', 'segmento')
                ->help('Qual ?? o segmento'),

            Field::make('Subsegmento', 'subsegmento')
                ->help('Qual ?? o subsegmento'),

            Field::make('Volume de embalagem', 'volume_de_embalagem')->rules('required')
                ->help('Informe qual ?? o volume de produto dentro da embalagem prim??ria'),
            Field::make('Unidade de medida', 'unidade_medida')->rules('required')
                ->help('Selecione forma de venda do produto, por exemplo, em Quilo, Litro, Gramas, Toneladas...')->select()->options(Medida::query()->pluck('name', 'id')->toArray(), true),
            Field::make('Marca', 'marca')
                ->help('Descreva a marca do Produto')->rules('required'),
            Field::make('Fragr??ncia', 'fragrancia')
                ->help('Descreva a fragrancia do Produto'),
            Field::make('Sabor', 'sabor')
                ->help('Descreva o sabor do Produto'),
            Field::make('Outras especifica????es', 'outras_especificacoes')
                ->help('Descreva outras caracteristicas do produto n??o mencionadas acima'),
            Field::make('Tamanho', 'tamanho')->help('Descreva qual ?? o volume de produto dentro da embalagem prim??ria'),

            Field::make('% MVA Interno', 'mva_interno')->help('Descreva o ??ndice percentual de ST (Susbtitui????o tribut??ria) - interno '),
            Field::make('% MVA Ajustado', 'mva_ajustado')->help('Descreva o ??ndice percentual de ST (Susbtitui????o tribut??ria) - ajustado'),

            Field::make('Tipo de Frete (FOB/CIF)', 'tipo_de_frete')
                ->rules('required')
                ->help('Descreva qual ?? o tipo de frete?  Se for CIF ?? pago pelo fornecedor, se for FOB ?? a pagar pela Cooperalfa'),

            Field::make('Classif. Fiscal NCM', 'classif_fiscal_ncm')
                ->help('Descreva a nomenclatura Comum do Mercosul')
                ->rules('required'),
            Field::make('C??d. Barras EAN-13', 'cod_barras')
                ->help('Descreva o c??digo de Barras do Produto (EAN ou Gtin)')
                ->wire('lazy')
                ->rules('required|numeric|digits:13'),
            Field::make('Prazo de Validade', 'prazo_de_validade')->help('Descreva em dias a vida ??til do Produto')
                ->rules('required')->tooltip("(em dias)"),
            Field::make('Peso Bruto da UND', 'peso_bruto_da_und')
                ->help('Descreva o peso total da embalagem prim??ria ex: 1.000,00 equivale a 1 KG ou 130,00 equivale a 130 G')
                ->rules('required')->tooltip("(em Grama)"),
            Field::make('Peso L??quido da UND', 'peso_liquido_da_und')
                ->help('Descreva o peso liquido da embalagem prim??ria ex: 1.000,00 equivale a 1 KG ou 130,00 equivale a 130 G')
                ->rules('required')->tooltip("(em Grama)"),
            Field::make('Pre??o de custo final UN', 'preco_custo_un')
                ->help('Descreva o pre??o final unit??rio do produto (incluir impostos, por exemplo: IPI/ST)')
                ->rules('required'),
            Field::make('Altura da UND', 'altura_da_und')
                ->help('Descreva em centimetros a altura da embalagem primaria do produto  ex: 30,0 equivale a 30 centimetros')
                ->tooltip("(em cm)")->rules('required'),
            Field::make('Largura da UND', 'largura_da_und')
                ->help('Descreva em centimetros a largura da embalagem primaria do produto  ex: 30,0 equivale a 30 centimetros')
                ->tooltip("(em cm)")->rules('required'),
            Field::make('Profundidade da UND', 'profundidade_da_und')->rules('required')
                ->help('Descreva em centimetros a profundidade da embalagem primaria do produto  ex: 30,0 equivale a 30 centimetros')
                ->tooltip("(em cm)"),
            Field::make('Qde por Cx/Fdo/etc', 'qde_por_cx')->rules('required|integer')
                // ->rules(function ($data){
                //     if (data_get($data,'qde_por_cx')){
                //         return Rule::notIn(['1']);
                //     }
                // },$this->form_data)
                ->help('Descreva quantas unidades cont??m dentro da embalagem secund??ria'),
           //NOVOS CAMPOS NO FORMULARIO DE COMPRAS
           'tipo_de_embalagem_secundaria' => Field::make('Tipo de embalagem secund??ria ', 'tipo_de_embalagem_secundaria')->rules('required'),
           'volume_de_embalagem_secundaria' => Field::make('Volume da embalagem secund??ria', 'volume_de_embalagem_secundaria')->rules('required'),
           'medida_embalagem_secundaria_id' => Field::make('Unidade de medida da embalagem secundaria', 'medida_embalagem_secundaria_id')->rules('required')
           ->select()->options(Medida::query()->pluck('name', 'id')->toArray(), true),
           //FIM DOS NOVOS CAMPOS
                Field::make('embalagens')->array([
                // Field::make('tem_embalagem_secundaria')->span(2),
                ArrayField::make('dun_14')
                    ->label("DUN 14")->rules('required')->span(6)->help('Descreva o c??digo de barras da embalagem secund??ria, por exemplo, Caixa , Fardo, etc...')->tooltip("(ou EAN quando Embalagem em CX/FDO/Display)"),

                ArrayField::make('qde_na_emb_secundaria')
                   ->view('medidas')
                    ->help('Descreva a quantidade de unidades constantes na embalagem secund??ria ')
                    ->label("Qde na emb")->rules('required')->span(2)->tooltip("Secund??ria (cx/fdo/display)"),

                ArrayField::make('peso_bruto')
                ->view('medidas')
                    ->help('Descreva o peso total da embalagem secundaria  ex: 1.000,00 equivale a 1 KG ou 130,00 equivale a 130 G')
                    ->label("Peso Bruto")->rules('required')->span(2)->tooltip("cx/fdo (em grama)"),

                ArrayField::make('peso_liquido')
                    ->view('medidas')
                    ->help('Descreva o peso liquido da embalagem secundaria  ex: 1.000,00 equivale a 1 KG ou 130,00 equivale a 130 G')
                    ->label("Peso Liquido")->rules('required')->span(2)->tooltip("cx/fdo (em grama)"),

                ArrayField::make('altura')
                    ->view('centimetros')
                    ->help('Descreva em centimetros a altura da embalagem secundaria  ex: 30,0 equivale a 30 centimetros')
                    ->label("Altura")->rules('required')->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('largura')
                    ->view('centimetros')
                    ->help('Descreva em centimetros a largura da embalagem secundaria  ex: 30,0 equivale a 30 centimetros')
                    ->label("largura")->rules('required')->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('profundidade')
                ->view('centimetros')
                    ->help('Descreva em centimetros a profundidade da embalagem secundaria ex: 30,0 equivale a 30 centimetros')
                    ->label("Profundidade")->rules('required')->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('qde_por_camada')
                    ->help('Descreva a quantidade de embalagens secundaria em cada nivel do palete')
                    ->label("Qde por Camada")->rules('required')->span(2)->tooltip("(em cx/fdo,etc)"),

                ArrayField::make('empilhamento')
                    ->help('Descreva quantos niveis de empilhamento o palete possui')
                    ->label("Empilhamento")->rules('required')->span(2)->tooltip("(em cx/fdo,etc)"),

                ArrayField::make('qde_no_palete')
                    ->help('Descreva a quantidade total de embalagens primarias no palete')
                    ->label("Qde no palete")->rules('required')->span(2)->tooltip("(em cx/fdo,etc)"),

            ])
        ];
    }

    public function formView()
    {
        return 'app.produtos.edit-component';
    }
}
