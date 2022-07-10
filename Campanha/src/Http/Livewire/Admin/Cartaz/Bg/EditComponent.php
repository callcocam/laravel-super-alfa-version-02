<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Cartaz\Bg;


use Campanha\Models\BgCartaz;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;
use Ramsey\Uuid\Uuid;

class EditComponent extends FormComponent
{

    protected $route = "admin.cartaz.bg";
    public $search_checkbox = "";

    public function mount(BgCartaz $model)
    {
        $this->setFormProperties($model);
    }

    public function uploadPhoto()
    {
//        dd($this->file);
        if ($this->file) {
            foreach($this->file as $key => $file){

             $this->validate([
                 'file.'.$key => 'image', // 1MB Max
             ]);
             $this->form_data[$key] = $file->store('campanhas/bg',"public" );
            }
             parent::uploadPhoto();
             return true;
         }
         return true;
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('App vertical', 'app_vertical')->span(3)->file("file-review"),
            Field::make('App Horizontal', 'app_horizontal')->span(3)->file("file-review"),
            Field::make('Promo Vertical', 'promo_vertical')->span(3)->file("file-review"),
            Field::make('Promo Horizontal', 'promo_horizontal')->span(3)->file("file-review"),
        ];
    }


    public function prefix()
    {
        return "campanha::";
    }

    public function formView()
    {
        return 'admin.cartaz.bg.edit-component';
    }

    public function name()
    {
        return "admin.cartaz.bg.edit-component";
    }

}
