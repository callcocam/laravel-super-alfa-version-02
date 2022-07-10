<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos\Imagens;

use App\Models\Produto;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;
use App\Models\Arquivo;
use Spatie\Image\Image;

class ListComponent extends TableComponent
{

    public $confirm;

    public $status_options = [
        "cadastro"=>"Cadastro",
        "compras-concluido"=>"Concluido",
        "recusado"=>"Recusado",
    ];

    public function mount()
    {
       // $this->status = "cadastro";
    }
    public function query(): Builder
    {
      return Produto::query()
      ->where('status', '<>', 'importadoerp');
    }

    public function columns(): array
    {
        return [
                Column::make('Cod. Barras', 'cod_barras')->searchable(),
                Column::make("Imagem Produto",'imagem')->view('cover'),
                Column::make('Imagem Arquivo', 'image.archive')->view('cover'),
                Column::make('Status', 'status')->view('status'),
                Column::make('Ações')->view('imagens-editar')
        ];
    }

    protected function actions_columns()
    {
        $columns = $this->columns();

        return $columns;
    }

    /**
     * @return string
     */
    public function getTitleProperty()
    {
        return "Lista de produtos";
    }
    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.produtos.status";
    }


    public function view()
    {
       return 'admin.produtos.status.list-component';
    }

    public function getCreatedProperty()
    {
        return false;
    }

    public function updateImage($id)
    {
        if($this->confirm){
            $this->copiarParaArquivos(Produto::find($id));
            $this->confirm = null;            
        }
        else{
            $this->confirm = $id;
        }
    }

    public function copiarParaArquivos($model)
    {
        $imagem = explode("/", $model->imagem);
        $new = last($imagem);
        if(\Str::contains($new , $model->cod_barras)){
            $form_data['archive'] = $model->imagem;
            $form_data['type'] = 'fotos';
            $form_data['name'] = $model->cod_barras;
            $form_data['produto_id'] = $model->id;
            $form_data['atualizado'] = rand(2,50000);

        }
        else{
            $name = \Str::replaceLast(\Str::beforeLast($new, '.'), $model->cod_barras, $model->imagem);
            Image::load(storage_path('app/public/' . $model->imagem))->save(storage_path('app/public/' . $name));
            $form_data['archive'] = $name;
            $form_data['type'] = 'fotos';
            $form_data['name'] = $model->cod_barras;
            $form_data['produto_id'] = $model->id;
            $form_data['atualizado'] = rand(2,50000);
        }
        if ($file = Arquivo::query()->where('produto_id', $model->id)->first()) {
            $file->update($form_data);
        } else {
            Arquivo::query()->create($form_data);
        }

    }
}
