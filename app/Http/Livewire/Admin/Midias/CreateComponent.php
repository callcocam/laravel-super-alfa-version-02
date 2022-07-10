<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Midias;

use App\Models\Midia;
use SIGA\Form\FormComponent;
use SIGA\Form\Field;

class CreateComponent extends FormComponent
{

        protected $route = "admin.midias";


        public function mount(Midia $model)
        {
            if(Midia::first()){
                $this->setFormProperties(Midia::first());
            }
           else{
                $this->setFormProperties($model);
           }
        }


        /**
        * @return array
        */
        public function fields()
        {
            return [

                Field::blank('CADASTRO DE BG DOS ENCARTES')->diveder(),
                Field::make('Bg Encarte', 'bg_encarte')->file_preview(2),

                Field::blank('CADASTRO DE BG DAS LAMINAS')->diveder(),
                Field::make('Fim de semana', 'bg_lamina_fim_de_semana')->file_preview(2)->view('file-review'),
                Field::make('Segunda e terça', 'bg_lamina_terca')->file_preview(2),
                Field::make('Terça do sabor', 'bg_lamina_terca_do_sabor')->file_preview(2),
                Field::make('Hortifrúti', 'bg_lamina_hortifruiti')->file_preview(2),
                Field::make('Ofertas arrasadoras', 'bg_lamina_ofertas_arrasadoras')->file_preview(2),
                Field::make('Lamina Extra', 'bg_lamina_extra')->file_preview(2),
                Field::make('Eletro', 'bg_lamina_eletro')->file_preview(2),

                Field::blank('CADASTRO DE BG DOS CARDS PROMOS')->diveder(),
                Field::make('Fim de Semana', 'bg_card_promo')->file_preview(2),
                Field::make('Segunda e terça', 'bg_card_promo_segunda_terca')->file_preview(2),//novo
                Field::make('Hortifrúti', 'bg_card_promo_hortifruti')->file_preview(2),//novo
                Field::make('Ofertas arrasadoras', 'bg_card_promo_ofertas_arrasadoras')->file_preview(2),//novo
                Field::make('Lamina Extra', 'bg_card_promo_lamina_extra')->file_preview(2),//novo
                Field::make('Eletro', 'bg_card_promo_eletro')->file_preview(2),//novo

                Field::blank('CADASTRO DE BG DOS CARDS APP')->diveder(),
                Field::make('Fim de semana', 'bg_card_app')->file_preview(2),
                Field::make('Segunda e terça', 'bg_card_app_segunda_terca')->file_preview(2),//novo
                Field::make('Hortifrúti', 'bg_card_app_hortifruti')->file_preview(2),//novo
                Field::make('Ofertas arrasadoras', 'bg_card_app_ofertas_arrasadoras')->file_preview(2),//nono
                Field::make('Lamina Extra', 'bg_card_app_lamina_extra')->file_preview(2),//nono
                Field::make('Eletro', 'bg_card_app_eletro')->file_preview(2),//nono

                Field::blank('CADASTRO DE BG DOS STORIES PROMOS')->diveder(),

                Field::make('Promo fim de Semana', 'bg_stories_promo')->file_preview(2),
                Field::make('Ofertas arrasadoras', 'bg_stories_promo_ofertas_arrasadoras')->file_preview(2),
                Field::make('Hortifrúti', 'bg_stories_promo_hortifruti')->file_preview(2),
                Field::make('Segunda e terça', 'bg_stories_promo_segunda_terca')->file_preview(2),
                Field::make('Lamina Extra', 'bg_stories_promo_lamina_extra')->file_preview(2),
                Field::make('Eletro', 'bg_stories_promo_eletro')->file_preview(2),

                Field::blank('CADASTRO DE BG DOS STORIES APP')->diveder(),
                Field::make('Fim de Semana', 'bg_stories_app')->file_preview(2),
                Field::make('Ofertas arrasadoras', 'bg_stories_app_ofertas_arrasadoras')->file_preview(2),
                Field::make('Hortifrúti', 'bg_stories_app_hortifruti')->file_preview(2),
                Field::make('Segunda e terça', 'bg_stories_app_segunda_terca')->file_preview(2),
                Field::make('Lamina Extra', 'bg_stories_app_lamina_extra')->file_preview(2),
                Field::make('Eletro', 'bg_stories_app_eletro')->file_preview(2),

                Field::blank('CADASTRO DAS CORES')->diveder(),

                Field::make('Fim de Semana', 'cor_fim_de_semana')->color()->span(3),
                Field::make('Segunda e terça', 'cor_segunda_e_terca')->color()->span(3),
                Field::make('Terça do sabor', 'cor_terca_do_sabor')->color()->span(2),
                Field::make('Hortifrúti', 'cor_hortifruti')->color()->span(2),
                Field::make('Arrasadoras', 'cor_ofertas_arrasadoras')->color()->span(2),
                Field::make('Lamina Extra', 'cor_lamina_extra')->color()->span(2),
                Field::make('Cor APP', 'cor_app')->color()->span(2),
                Field::make('Cor Eletro', 'cor_eletro')->color()->span(2),
                Field::make('Cor Encarte', 'cor_encarte')->color()->span(2),



                Field::blank('CADASTRO DOS SELOS')->diveder(),

                Field::make('Mais Desconto', 'selo_mais_desconto')->file_preview(2),
                Field::make('Terça do Sabor', 'bg_selo_terca_do_sabor')->file_preview(2),

                Field::make('Co Selo Terça do sabor', 'cor_selo_terca_sabor')->color()->span(2),//novo


//                Field::make('Hortifrúti:', 'bg_selo_horti')->file_preview(2),
//                Field::make('Ofertas arrasadoras', 'bg_selo_ofertas_arrasadoras')->file_preview(2),//novo
//                Field::make('Segunda e terça', 'bg_selo_segunda_e_terca')->file_preview(2),

//                Field::make('Fim de semana', 'bg_selo_fim_de_semana')->file_preview(1),
//                Field::make('Lamina Extra', 'bg_selo_lamina_extra')->file_preview(1),


//                Field::blank('CADASTRO DAS CORES DOS SELOS')->diveder(),
//
//                Field::make('Fim de Semana', 'cor_selo_fim_de_semana')->color()->span(2),//novo
                //                Field::make('Terça do Sabor', 'bg_selo_terca_do_sabor')->file_preview(2),

//                Field::make('Hortifrúti', 'cor_selo_hortifruti')->color()->span(2),//novo
//                Field::make('Ofertas arrasadoras', 'cor_selo_ofertas_arrasadoras')->color()->span(2),//novo
//                Field::make('Lamina Extra', 'cor_selo_lamina_extra')->color()->span(2),//novo

            ];
        }
        public function uploadPhoto()
        {
            if ($this->file) {
                foreach($this->file as $key => $file){

                 $this->validate([
                     'file.'.$key => 'image', // 1MB Max
                 ]);
                 $this->form_data[$key] = $file->store('midias/bg',"public" );
                }
                 return true;
             }
             return true;
        }

        public function formView()
        {
            return 'admin.midias.create-component';
        }

        public function layout(): string
        {
            return 'layouts.admin';
        }
}
