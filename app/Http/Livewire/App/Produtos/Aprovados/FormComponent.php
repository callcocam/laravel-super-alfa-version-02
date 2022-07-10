<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Produtos\Aprovados;

use App\Models\Coperat;
use SIGA\Form\ArrayField;
use SIGA\Form\Field;
use SIGA\Form\FormComponent as AliasFormComponent;
use Spatie\Image\Image;

class FormComponent extends AliasFormComponent
{
    protected $numeric_values = ['altura_da_und', 'preco_custo_un', 'altura_da_und', 'largura_da_und', 'profundidade_da_und', 'qde_por_cx'];

    public $status;

    public function uploadPhoto()
    {
        if ($this->file) {
            $this->validate([
                'file' => 'image|max:6048', // 1MB Max
            ]);
            $this->form_data['imagem'] = $this->file->store('arquivos/fotos');
            //$this->form_data['thumb'] = $this->file->store('produtos/thumb');
//            Image::load(storage_path('app/public/' . $this->form_data['thumb']))
//                ->width(250)
//                ->height(250)
//                ->save();
        }
        parent::uploadPhoto();
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
            Field::make('Foto do Produto', 'imagem')->file()
                //->rules('image|max:1024')
                ->help("Upload de Imagem, minimo de 2 megabite"),
            Field::make('Descrição Completa', 'descricao_completa')->rules('required'),
            Field::make('Cod. Prod. do Fornecedor', 'cod_prod_fornecedor')->rules('required|integer'),
            Field::make('Modelo', 'modelo'),
            Field::make('Cor', 'cor'),
            Field::make('Categoria Produto', 'categoria_produto'),
            Field::make('SubCategoria', 'subcategoria'),
            Field::make('Categoria coperate', 'coperat_id')->select()->options(Coperat::query()->pluck('name','id')->toArray(), true)->rules('required'),
            Field::make('Segmento', 'segmento'),
            Field::make('Subsegmento', 'subsegmento'),
            Field::make('Marca', 'marca')->rules('required'),
            Field::make('Fragrância', 'fragrancia'),
            Field::make('Sabor', 'sabor'),
            Field::make('Outras especificações', 'outras_especificacoes'),
            Field::make('Tamanho', 'tamanho'),
            Field::make('% MVA Interno', 'mva_interno'),
            Field::make('% MVA Ajustado', 'mva_ajustado'),
            Field::make('Tipo de Frete (FOB/CIF)', 'tipo_de_frete'),

            Field::make('Classif. Fiscal NCM', 'classif_fiscal_ncm')->rules('required'),
            Field::make('Cód. Barras EAN-13', 'cod_barras')->rules('required'),
            Field::make('Prazo de Validade', 'prazo_de_validade')->rules('required|integer')->tooltip("(em dias)"),
            Field::make('Peso Bruto da UND', 'peso_bruto_da_und')->rules('required|numeric')->tooltip("(em Grama)"),
            Field::make('Peso Líquido da UND', 'peso_liquido_da_und')->rules('required|numeric')->tooltip("(em Grama)"),
            Field::make('Preço Custo UN', 'preco_custo_un')->rules('nullable|numeric'),
            Field::make('Altura da UND', 'altura_da_und')->tooltip("(em cm)")->rules('nullable|numeric'),
            Field::make('Largura da UND', 'largura_da_und')->tooltip("(em cm)")->rules('nullable|numeric'),
            Field::make('Profundidade da UND', 'profundidade_da_und')->tooltip("(em cm)")->rules('nullable|numeric'),
            Field::make('Qde por Cx/Fdo/etc', 'qde_por_cx')->rules('required')->rules('required|numeric'),
            Field::make('embalagens')->array([
                // Field::make('tem_embalagem_secundaria')->span(2),
                ArrayField::make('dun_14')
                    ->label("DUN 14")->rules('required')->span(6)->tooltip("(ou EAN quando Embalagem em CX/FDO/Display)"),

                ArrayField::make('qde_na_emb_secundaria')
                    ->label("Qde na emb")->rules('required|numeric')->span(2)->tooltip("Secundária (cx/fdo/display)"),

                ArrayField::make('peso_bruto')
                    ->label("Peso Bruto")->rules('required|numeric')->span(2)->tooltip("cx/fdo (em grama)"),

                ArrayField::make('peso_liquido')
                    ->label("Peso Liquido")->rules('required|numeric')->span(2)->tooltip("cx/fdo (em grama)"),

                ArrayField::make('altura')
                    ->label("Altura")->rules('required|numeric')->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('largura')
                    ->label("largura")->rules('required|numeric')->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('profundidade')
                    ->label("Profundidade")->rules('required|numeric')->span(2)->tooltip("cx/fdo (em cm)"),

                ArrayField::make('qde_por_camada')
                    ->label("Qde por Camada")->rules('required|numeric')->span(2)->tooltip("(em cx/fdo,etc)"),

                ArrayField::make('empilhamento')
                    ->label("Empilhamento")->rules('required|numeric')->span(2)->tooltip("(em cx/fdo,etc)"),

                ArrayField::make('qde_no_palete')
                    ->label("Qde no palete")->rules('required|numeric')->span(2)->tooltip("(em cx/fdo,etc)"),

            ])
        ];
    }

    public function formView()
    {
        return 'app.produtos.edit-component';
    }
}
