<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Arquivos;

use App\Models\Arquivo;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;
use Spatie\Image\Image;

class CreateComponent extends FormComponent
{

    protected $route = "admin.arquivos";


    public function mount(Arquivo $model)
    {
        $this->setFormProperties($model);
    }

    public function uploadPhoto()
    {
        $this->file = $this->form_data['archive'];
        $this->validate([
            'form_data.archive' => 'required|max:10240', // 1MB Max
        ]);
        $this->form_data['archive'] = $this->file->store('arquivos');
        $this->form_data['type'] = 'arquivos';
        return parent::uploadPhoto();
    }

    public function updatedFormDataCodigo($value)
    {
       if($compra = \App\Models\Compra::query()->where('codigo_interno', $value)->first()){
        dd($compra->produto);
       }
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'produto_name' => Field::make('Produto', 'produto_name')->readonly(),
            'codigo' => Field::make('Código interno', 'codigo'),
            'produto_id' => Field::make('Produto', 'produto_id'),
            'name' => Field::make('Nome do arquivo', 'name'),
            'archive' => Field::make('Enviar arquivo', 'archive')->file(),

        ];
    }

    public function formView()
    {
        return 'admin.arquivos.create-component';
    }
}
