<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Campanhas;

use Campanha\Models\Campanha;
use SIGA\Form\Field;
use SIGA\Form\FormComponent;
use App\Models\Coperat;
use App\Models\Loja;

class CreateComponent extends FormComponent
{

    protected $route = "admin.campanhas";
    public $search_checkbox = "";


    public function uploadPhoto()
    {
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

    public function mount(Campanha $model)
    {
        $this->setFormProperties($model);
        $this->form_data['status'] = 'published';
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            Field::make('Nome', "nome")->rules('required'),
            Field::make('Data de nicio', "data_inicio")->type("date")->rules('required'),
            Field::make('Data de Fim', "data_fim")->type("date")->rules('required'),
            Field::make('Quantidade Estimada', "quantidade_estimada")->type("number")->rules('required'),
            Field::make('Situação da campanha', 'status')
                ->radio()->options(['draft'=>'Bloqueada','published'=>"Em Andamento", 'finished'=>"Concluida"],true),
            Field::make('Tipo da campanha', 'type')->select()->options([
                'lamina_fim_semana'=>"Lâmina fim de Semana",
                'lamina_segunda_terca'=>"Lâmina Segunda e Terça",
                'lamina_terca_sabor'=>"Lâmina terça do Sabor",
                'lamina_hortifruti'=>"Lâmina hortifruti",
                'lamina_ofertas_arrasadoras'=>"Lâmina ofertas arrasadoras",
                'lamina_extra'=>"Lâmina Extra",
                'card'=>"Card",
                'lamina'=>"Lâmina",
                'tabloide'=>'Tabloide',
                'eletro'=>'Eletro',
            ],true),            
            Field::make('Categorias', 'coperats')->checkbox()->model(Coperat::query()->orderBy("name")),
            Field::make('Lojas', 'lojas')->checkbox()->model(Loja::query()->orderBy("nome"),'nome'),
            Field::make('Descrição', "descricao"),
            Field::make('BG Lamina', 'bg_lamina')->file(),
            Field::make('BG Card', 'bg_card')->file(),
            Field::make('BG Stories', 'bg_stories')->file(),
            Field::make('BG Encarte', 'bg_encarte')->file(),
        ];
    }

    public function success()
    {
        //dd($this->form_data);
        if (parent::success()) {
            if ($this->isField('coperats')) {
                $coperat = array_filter($this->form_data['coperats']);
                $this->model->coperat()->sync(array_keys($coperat));
            }
            if ($this->isField('lojas')) {
                $loja = array_filter($this->form_data['lojas']);
                $this->model->loja()->sync(array_keys($loja));
            }
            return true;
        }
        return false;
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function formView()
    {
        return 'admin.campanhas.create-component';
    }

    public function name()
    {
        return "admin.campanhas.create-component";
    }
}
