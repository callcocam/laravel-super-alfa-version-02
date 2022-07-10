<?php

namespace Database\Seeders;

use App\Models\Coperat;
use Illuminate\Database\Seeder;

class CoperatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["name" => "MATERIAL ELETRICO", "codigo" => "0630738"],
            ["name" => "FERRAGENS/FERRAMENTAS/UTIL AGRICOLAS", "codigo" => "0631660"],
            ["name" => "FERRAGENS E UTILITARIOS DOMESTICOS", "codigo" => "0631661"],
            ["name" => "EQUIPAMENTOS AGRICOLAS", "codigo" => "0632662"],
            ["name" => "ACESSORIOS AGRICOLAS", "codigo" => "0632663"],
            ["name" => "ACESSORIOS APICULTURA", "codigo" => "0632664"],
            ["name" => "ACESSORIOS P/ORDENHADEIRAS", "codigo" => "0632665"],
            ["name" => "MERCEARIA ALTO GIRO", "codigo" => "0733665"],
            ["name" => "TEMPERO CONDIMENTOS EXTRATOS E MOLHOS", "codigo" => "0733666"],
            ["name" => "DOCES E SOBREMESAS", "codigo" => "0733671"],
            ["name" => "MATINAIS ACHOCOLATADOS", "codigo" => "0733669"],
            ["name" => "MERCEARIA DOCE", "codigo" => "0733672"],
            ["name" => "BEBIDAS ALCOOLICAS", "codigo" => "0733674"],
            ["name" => "BEBIDAS NAO ALCOOLICAS", "codigo" => "0733870"],
            ["name" => "FRIOS E LATICINIOS (CD)", "codigo" => "0733877"],
            ["name" => "CONGELADOS (CD)", "codigo" => "0733878"],
            ["name" => "FIAMBRERIA (CD)", "codigo" => "0733879"],
            ["name" => "CARNES RESFRIADAS (CD)", "codigo" => "0733880"],
            ["name" => "DEFUMADOS (CD)", "codigo" => "0733881"],
            ["name" => "CONSERVAS VEGETAIS/ANIMAIS", "codigo" => "0733667"],
            ["name" => "MATINAIS E DOCES", "codigo" => "0733670"],
            ["name" => "MARGARINAS", "codigo" => "0733668"],
            ["name" => "SOPAS E MASSAS", "codigo" => "0733673"],
            ["name" => "BISCOITOS E SALGADINHOS", "codigo" => "0733871"],
            ["name" => "HORTIFRUTI EMBALADOS (CD)", "codigo" => "0733882"],
            ["name" => "TERCEIRIZADOS PADARIA (CD)", "codigo" => "0733883"],
            ["name" => "EMBALAGENS", "codigo" => "6565853"],
            ["name" => "HORTIFRUTIGRANJEIROS", "codigo" => "0735714"],
            ["name" => "PADARIA", "codigo" => "0735722"],
            ["name" => "CONFEITARIA", "codigo" => "0735740"],
            ["name" => "CARNES RESFRIADAS AÇOUGUE", "codigo" => "0735734"],
            ["name" => "CIGARROS E FUMOS", "codigo" => "0735716"],
            ["name" => "CONDUTORES ELETRICOS", "codigo" => "0734688"],
            ["name" => "JARDINAGEM", "codigo" => "0734689"],
            ["name" => "PET SHOP", "codigo" => "0734696"],
            ["name" => "ARTIGOS PARA FESTAS", "codigo" => "0734677"],
            ["name" => "MATERIAL ESCOLAR", "codigo" => "0734678"],
            ["name" => "AVIAMENTOS", "codigo" => "0734680"],
            ["name" => "TEXTIL,", "codigo" => "0734681"],
            ["name" => "SANDALIAS", "codigo" => "0734690"],
            ["name" => "CONFECCOES", "codigo" => "0734875"],
            ["name" => "LIVROS E REVISTA", "codigo" => "0734876"],
            ["name" => "BRINQUEDOS E JOGOS", "codigo" => "0734702"],
            ["name" => "PRODS MERCS DE BRINDES OU PROMOCAO VDAS", "codigo" => "0734702"],
            ["name" => "PRODS LIMPEZA E CONSERVACAO", "codigo" => "0734684"],
            ["name" => "HIGIENE SAUDE E BELEZA", "codigo" => "0734682"],
            ["name" => "BRINQUEDOS E JOGOS", "codigo" => "0734679"],
            ["name" => "LINHA INFANTIL", "codigo" => "0734683"],
            ["name" => "LOUCAS", "codigo" => "0734685"],
            ["name" => "UTILIDADES DOMESTICAS/PLASTICOS/ALUMINIO", "codigo" => "0734686"],
            ["name" => "ELETROPORTATEIS", "codigo" => "0734687"],
            ["name" => "BAZAR", "codigo" => "0734872"],
        ];

        foreach ($categories as $category) {
            Coperat::factory(1)->create($category);
        }
    }
}
