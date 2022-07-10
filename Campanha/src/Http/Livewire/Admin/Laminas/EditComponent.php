<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Laminas;


use App\Models\Arquivo;
use App\Models\Coperat;
use App\Models\Midia;
use Campanha\Models\Campanha;
use Campanha\Models\ProdutosCampanha;
use Illuminate\Support\Facades\Storage;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;

class EditComponent extends FormComponent
{
public $produtos;
public $top;
public $message;
public $midias_config;
protected $listeners = [
    'settop'
];

public $show_menu = false;
public $currentModel;

    protected $route = "admin.campanhas.laminas.produtos";

    public function mount(Campanha $model)
    {
        $this->midias_config  = Midia::query()->first();
//        dd($this->midias_config);
        $this->produtos  = $model->produtos;
        $this->setFormProperties($model);
    }

    public function layout(): string
    {
        return 'layouts.admin';
    }
    /**
     * @return array
     */
    public function fields()
    {
        return [];
    }

    public function formView()
    {
        return 'admin.laminas.edit-component';
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function name()
    {
        return "admin.laminas.edit-component";
    }
    public function getproductImage($barcode){
        if($image = Arquivo::query()->where('name', $barcode)->first() )
        return Storage::url($image->archive);
    }

    public function setMessageToHello( ){
       $this->message = date('H:i:s');
    }

    public function setCurentModel( $currentModel){
       $this->currentModel = ProdutosCampanha::find($currentModel);
    }
    public function settop($valor){
        $this->top = $valor;
    }

}
