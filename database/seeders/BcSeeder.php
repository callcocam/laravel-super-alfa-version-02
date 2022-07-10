<?php

namespace Database\Seeders;

use App\Models\Bc;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class BcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bc::query()->delete();
        foreach ($this->level01() as $key => $value) {
            Bc::factory(1)->create([
                'name' => $value,
                'nivel' => '1',
                'status' => 'published'
            ])->each(function ($bc01) {
                foreach ($this->level02() as $level02) {
                    $bc02 = $bc01->bc01()->create([
                        "user_id" => User::all()->random()->id,
                        'name' => $level02,
                        'nivel' => '2',
                        'status' => 'published'
                    ]);
                    if ($levels = Arr::get($this->level03(), $level02)) {

                        foreach ($levels as $level03) {

                            $bc03 = $bc02->bc02()->create([
                                "user_id" => User::all()->random()->id,
                                'name' => $level03,
                                'nivel' => '3',
                                'status' => 'published'
                            ]);
                            if ($levels = Arr::get($this->level04(), $level03)) {
                                foreach ($levels as $level04) {
                                    $bc03->bc03()->create([
                                        "user_id" => User::all()->random()->id,
                                        'name' => $level04,
                                        'nivel' => '4',
                                        'status' => 'published'
                                    ]);
                                }
                            }
                        }
                    }

                }
            });


        }
    }

    private function level01()
    {
        return [
            'SUPERMERCADO'
        ];
    }

    private function level02()
    {
        return [
            'ATACADO',
            'BAZAR',
            'BEBIDAS',
            'DESCARTAVEIS',
            'HIGIENE SAUDE E BELEZA',
            'LIMPEZA',
            'MATINAIS',
            'MERCEARIA ALTO GIRO',
            'MERCEARIA DOCE',
            'PERECIVEIS',
            'PROD / MERC CONJUNTOS / ASSOCIADOS'
        ];
    }

    private function level03()
    {
        return [
            'ATACADO' => [
                'PRODUTOS PARA ATACADO'
            ],
            'BAZAR' => [
                'AUTOMOTIVOS',
                'BRINQUEDOS',
                'CALCADOS',
                'CAMPING',
                'CLIMATIZACAO',
                'ELETRODOMESTICOS',
                'ELETRONICOS',
                'ELETROPORTATEIS',
                'ENCARTELADOS',
                'JARDINAGEM',
                'MATERIAL ESCOLAR',
                'PET',
                'UTILIDADES DOMESTICAS'
            ],
            'BEBIDAS' => [
                'BEBIDAS ALCOOLICAS',
                'BEBIDAS NAO ALCOOLICAS'
            ],
            'DESCARTAVEIS' => [
                'EMBALAGENS',
                'FESTA'
            ],
            'HIGIENE SAUDE E BELEZA' => [
                'CUIDADO INFANTIL',
                'CUIDADOS COM O CABELOS',
                'CUIDADOS COM O CORPO',
                'CUIDADOS COM O ROSTO',
                'HIGIENE CORPORAL'
            ],
            'LIMPEZA' => [
                'CUIDADOS COM A CASA',
                'CUIDADOS COM BANHEIROS',
                'CUIDADOS COM ROUPA',
                'INSETICIDAS',
                'UTENSILHOS PARA LIMPEZA'
            ],
            'MATINAIS' => [
                'ACHOCOLATADOS',
                'ADOCANTE',
                'ALIMENTOS INFANTIL',
                'CAFES',
                'CEREAIS GRAOS E FARINHAS',
                'CEREAIS MATINAIS',
                'DOCES',
                'ERVA MATE',
                'LEITES/COMPLEMENTOS'
            ],
            'MERCEARIA ALTO GIRO' => [
                'ACUCARES',
                'ARROZ',
                'ATOMATADOS',
                'CONSERVAS',
                'ENLATADOS',
                'FARINACEOS',
                'GRAOS',
                'MACARRAO',
                'MOLHOS',
                'SOPAS',
                'TEMPEROS'
            ],
            'MERCEARIA DOCE' => [
                'BISCOITOS',
                'BOMBONIER',
                'SALGADINHOS',
                'SALGADINHOS',
                'SAZONAIS',
                'SOBREMESAS',
            ],
            'PERECIVEIS' => [
                'ACOUGUE',
                'CONGELADOS',
                'HORTIFRUTI',
                'LACTEOS',
                'PADARIA',
                'RESFRIADOS',
            ],
            'PROD/MERC CONJUNTOS/ASSOCIADOS' => [
                'PROD/MERC CONJUNTOS/ASSOCIADOS'
            ],
        ];
    }

    private function level04()
    {
        return [
            'PRODUTOS PARA ATACADO' => ['MERCADORIAS PARA ATACADO'],
            'AUTOMOTIVOS' => [
                'CERA AUTOMOTIVA/POLIDORES',
                'LIMPADORES AUTOMOTIVOS',
                'ODORIZADOR AUTOMOTIVO'
            ],
            'BRINQUEDOS' => [
                'BOLAS',
                'BONECAS',
                'BRINQUEDOS DIVERSOS',
                'CARRRINHOS',
                'JOGOS INFANTIS'
            ],
            'CALCADOS' => [
                'PANTUFAS',
                'SANDALIAS'
            ],
            'CAMPING' => [
                'BARRACAS/PISCINAS',
                'CADEIRAS/MESAS',
                'CARVAO',
                'CHURRASQUEIRAS/GRELAS/ESPETOS',
                'COLCHOES/INFLAVEIS',
                'TERMICOS'
            ],
            'CLIMATIZACAO' => [
                'AQUECEDORES',
                'AR CONDICIONADO',
                'VENTILADORES'
            ],
            'ELETRODOMESTICOS' => [
                'DEPURADORES',
                'FOGOES COOKTOP',
                'FOGOES DE PISO',
                'FORNOS',
                'FREEZER',
                'FRIGOBARES',
                'LAVA E SECA',
                'LAVADORAS DE ROUPAS',
                'MICRO-ONDAS',
                'REFRIGERADORES',
                'SECADORAS'
            ],
            'ELETRONICOS' => [
                'ASSESSORIOS ELETRONICOS',
                'CELULAR',
                'INFORMATICA',
                'TV E AUDIO'
            ],
            'ELETROPORTATEIS' => [
                'ASPIRADORES',
                'BATEDEIRAS',
                'BEBEDOUROS E PURIFICADORES',
                'CAFETEIRAS ELETRICAS',
                'CHALEIRAS ELETRICAS',
                'CHURRASQUEIRAS ELETRICAS',
                'ELETRO CUIDADOS PESSOAIS',
                'ESPREMEDORES',
                'FRITADEIRAS ELETRICAS',
                'GRILL E SANDUICHEIRAS',
                'LIQUIDIFICADORES',
                'PANELAS ELETRICAS',
                'PASSADORES DE ROUPAS',
                'PROCESSADORES'
            ],
            'ENCARTELADOS' => [
                'ACESSORIOS',
                'FERRAMENTAS',
                'LAMPADAS',
                'PILHAS/BATERIAS',
                'PLUGS'
            ],
            'JARDINAGEM' => [
                'FLORES ARTIFICIAIS',
                'FLORES NATURAIS',
                'MANGUEIRAS E ACESSORIOS',
                'TERRA/ADUBOS',
                'VASOS'
            ],
            'MATERIAL ESCOLAR' => [
                'ACESSORIOS ESCOLARES',
                'CADERNOS',
                'CANETAS/PINCEIS/MARCADORES',
                'COLAS',
                'LAPIS/CANETINHAS',
                'LIVROS/REVISTAS',
                'MOCHILAS/ESTOJOS/PASTAS',
                'PAPEIS'
            ],
            'PET' => [
                'ACESSORIOS PEQUENOS ANIMAIS',
                'ALIMENTO PARA CAES',
                'ALIMENTO PARA GATOS',
                'ALIMENTO PARA PASSAROS',
                ' HIGIENE ANIMAL'
            ],
            'UTILIDADES DOMESTICAS' => [
                'ACESSORIOS PARA CHIMARRAO/TERERE',
                'ALUMINIOS/PANELAS/INOX/CONJUNTOS',
                'CAMA/MESA/BANHO/COZINHA',
                'CUTELARIA',
                'GUARDA CHUVAS',
                'LOUCAS',
                'PLASTICOS',
                'PRESENTES',
                'TEXTIL'
            ],
            'BEBIDAS ALCOOLICAS' => [
                'AGUARDENTE',
                'CERVEJA PILSEN',
                'CERVEJAS ESPECIAIS',
                'DESTILADOS',
                'ESPUMANTES',
                'ICE',
                'VINHOS'
            ],
            'BEBIDAS NAO ALCOOLICAS' => [
                'AGUA DE COCO',
                'AGUA MINERAL',
                'BEBIDA A BASE DE SOJA',
                'BEBIDA ESPORTIVA - ISOTONICA',
                'CHA PRONTO PARA BEBER',
                'ENERGETICOS',
                'REFRESCO EM PO',
                'REFRIGERANTES',
                'SUCOS CONCENTRADOS',
                'SUCOS PRONTOS'
            ],
            'EMBALAGENS' => [
                'CANUDOS',
                'COPOS DESCARTAVEIS',
                'EMBALAGEM DE PAPEL',
                'EMBALAGENS PLASTICAS',
                'FILME PLASTICO',
                'FORMAS DESCARTAVEIS',
                'GUARDANAPOS',
                'PALITOS',
                'PAPEL ALUMINIO',
                'PAPEL TOALHA',
                'PRATO DESCARTAVEL',
                'TALHERES DESCARTAVEIS'
            ],
            'FESTA' => [
                'ACESSORIOS FESTA',
                'BALOES',
                'CHAPEUS',
                'CIGARRO/FUMO',
                'CONVITES',
                'COPO DESCARTAVEL INFANTIL',
                'FORMINHAS DESCARTAVEIS',
                'PRATO DESCARTAVEL INFANTIL',
                'VELAS PARA ANIVERSARIO'
            ],
            'CUIDADO INFANTIL' => [
                'BANHEIRAS / ACESSORIOS INFANTIS',
                'CHUPETAS/MORDEDORES',
                'CONDICIONADORES INFANTIL',
                'CREME DENTAL INFANTIL',
                'CREME PARA PENTEAR INFANTIL',
                'CREME TRATAMENTO INFANTIL',
                'ESCOVA DE CABELO INFANTIL',
                'ESCOVA DENTAL INFANTIL',
                'FRALDAS',
                'GEL FIXADOR INFANTIL',
                'HASTES FLEXIVEIS',
                'LENCO DE PAPEL',
                'LENCOS UMIDECIDOS',
                'LOCOES INFANTIL',
                'MAMADEIRAS',
                'POMADAS',
                'SABONETE INFANTIL',
                'SABONETE LIQUIDO INFANTIL',
                'SHAMPOO INFANTIL',
                'TALCOS INFANTIS',
            ],
            'CUIDADOS COM O CABELOS' => [
                'CONDICIONADORES',
                'CREME PARA PENTEAR',
                'CREMES DE TRATAMENTOS',
                'ESCOVAS PARA CABELO/ACESSORIOS',
                'FINALIZADORES',
                'FIXADOR',
                'GEL PARA CABELOS',
                'KITS',
                'MASCARAS',
                'SHAMPOO',
                'TINTURA',
            ],
            'CUIDADOS COM O CORPO' => [
                'ACESSORIOS PARA MANICURES',
                'CREME CORPORAL HIDRATANTE',
                'DEPILATORIOS',
                'ESMALTES',
                'LOCAO CORPORAL HIDRATANTE',
                'OLEO CORPORAL HIDRATANTE',
                'REPELENTES',
            ],
            'CUIDADOS COM O ROSTO' => [
                'BRONZEADORES',
                'CREME FACIAL HIDRATANTE',
                'LOCAO FACIAL HIDRATANTE',
                'LOCAO POS BARBA',
                'MAQUIAGENS',
                'OLEO FACIAL HIDRATANTE',
                'PROTETOR SOLAR',
                'TOUCADORES',
            ],
            'HIGIENE CORPORAL' => [
                'ABSORVENTES HIGIENICO',
                'ALGODAO',
                'ANTISSEPTICO BUCAL',
                'CREME DENTAL',
                'CUIDADOS COM O ROSTO',
                'CURATIVOS',
                'DESODORANTES',
                'ESCOVAS DENTAL',
                'ESPONJA/ESCOVA P/BANHO',
                'FITA E FIO DENTAL',
                'FRALDAS ADULTO',
                'GEL DENTAL',
                'GEL LUBRIFICANTE',
                'LAMINAS/RECARGAS',
                'PAPEL HIGIENICO',
                'PRESERVATIVOS',
                'SABONETE BARRA',
                'SABONETE INTIMO',
                'SABONETE LIQUIDO',
                'TALCO /ANTISEPTICO',
            ],
            'CUIDADOS COM A CASA' => [
                'ALCOOL',
                'CERAS',
                'DESENGORDURANTES',
                'DESENTUPIDORES',
                'DETERGENTE P/LOUCAS',
                'LIMPA PISO',
                'LIMPA VIDROS',
                'LIMPADORES COM BRILHO / PERFUMADOS',
                'LIMPADORES ESPECIALIZADOS',
                'LIMPEZA PESADA',
                'LIXAS PARA FOGAO',
                'LUSTRA MOVEIS/POLIDORES',
                'MULTI USO',
                'PRODUTOS PARA PISCINAS',
                'REMOVEDORES',
                'SAPONACEOS',
                'VELAS E FOSFOROS',
            ],
            'CUIDADOS COM BANHEIROS' => [
                'ANTIMOFO/ANTIUMIDADE',
                'AROMATIZANTE DE AMBIENTE',
                'CONCENTRADOS/TIRA LIMO',
                'DESINFETANTE',
                'DESODORIZADOR SANITARIO',
            ],
            'CUIDADOS COM ROUPA' => [
                'AGUA SANITARIA',
                'ALVEJANTES',
                'AMACIANTE',
                'DETERGENTE LIQUIDO PARA ROUPAS',
                'DETERGENTE PO P/ROUPAS',
                'SABAO BARRA',
            ],
            'INSETICIDAS' => [
                'AEROSOL',
                'ELETRICOS',
                'LIQUIDOS/PO/GEL',
            ],
            'UTENSILHOS PARA LIMPEZA' => [
                'BALDES',
                'ESCOVAS',
                'ESPONJAS SINTETICAS',
                'LA DE ACO',
                'LIMPA CALCADOS',
                'LUVAS',
                'PA/MOP',
                'PANOS MULTI USOS',
                'PRENDEDORES DE ROUPAS',
                'RODOS',
                'ROLO ADESIVO',
                'SACO PARA LIXO',
                'VARAIS/TABUAS DE PASSAR',
                'VASSOURAS',
            ],
            'ACHOCOLATADOS' => [
                'ACHOCOLATADO EM PO',
                'ACHOCOLATADO LIQUIDO',
                'ACHOCOLATADO ORGANICO'
            ],
            'ADOCANTE' => [
                'LIQUIDO',
                'PO'
            ],
            'ALIMENTOS INFANTIL' => [
                'COMPLEMENTO ALIMENTAR',
                'FARINHA LACTEA',
                'MINGAU',
                'PAPINHAS'
            ],
            'CAFES' => [
                'CAFE ESPECIAIS',
                'CAFE SOLUVEL',
                'CAFE TORRADO E MOIDO',
                'CAPSULAS',
                'CAPUCCINO',
                'COM LEITE',
                'FILTROS E PASSADORES DE CAFE',
                'ORGANICOS',
            ],
            'CEREAIS GRAOS E FARINHAS' => [
                'AVEIAS',
                'FIBRA DE TRIGO',
                'GERGELIM',
                'GRANOLA',
                'LINHACAS',
                'PROTEINAS E EXTRATOS DE SOJA',
                'SEMENTES',
                'SUPLEMENTOS',
                'TAPIOCAS',
            ],
            'CEREAIS MATINAIS' => [
                'CEREAL MEL',
                'CHOCOLATE',
                'FIBRA',
                'MULTI INGREDIENTE',
                'NATURAL'
            ],
            'CHAS' => [
                'CHA CAIXINHAS',
                'CHA PACOTE'
            ],
            'DOCES' => [
                'COCADA',
                'DOCE DE FRUTA',
                'DOCE DE LEITE/AVELA',
                'GELEIAS',
                'GOIABADAS',
                'MEL',
                'MELADOS',
                'PROPOLIS'
            ],
            'ERVA MATE' => [
                'ERVA MATE',
                'ERVA TERERE'
            ],
            'LEITES/COMPLEMENTOS' => [
                'COMPLEMENTO ALIMENTAR',
                'FORMULAS INFANTIS',
                'LEITE EM PO',
                'LEITE LONGA VIDA',
            ],
            'ACUCARES' => [
                'CRISTAL',
                'MASCAVO',
                'ORGANICO',
                'REFINADO',
            ],
            'ARROZ' => [
                'BRANCO',
                'ESPECIAIS',
                'INTEGRAL',
                'PARBOLIZADO'
            ],
            'ATOMATADOS' => [
                'EXTRATO DE TOMATE',
                'MOLHO DE TOMATE',
                'POLPA DE TOMATE',
                'TOMATE SECO',
            ],
            'CONSERVAS' => [
                'ALCAPARRAS',
                'ASPARGOS',
                'ATUM',
                'AZEITONAS',
                'COGUMELOS',
                'OVOS DE CODORNA',
                'PALMITO',
                'PEPINOS',
                'SARDINHA',
                'VEGETAIS',
            ],
            'ENLATADOS' => [
                'DUETO',
                'ERVILHA',
                'FEIJAO',
                'GRAO DE BICO',
                'MILHO',
                'SALSICHA',
                'SELETA'
            ],
            'FARINACEOS' => [
                'FARINHA DE BIJU',
                'FARINHA DE MANDIOCA',
                'FARINHA DE TRIGO',
                'FARINHA DE TRIGO INTEGRAL',
                'FAROFA PRONTA',
                'FUBA',
                'MISTURA PRONTA',
                'OUTRAS FARINHAS',
            ],
            'GRAOS' => [
                'AMENDOIN',
                'CANJICA',
                'FEIJAO',
                'GRAO DE BICO',
                'LENTILHA',
                'PIPOCA'
            ],
            'MACARRAO' => [
                'ARROZ/MILHO',
                'CASEIRA',
                'COM OVOS',
                'GRANO DURO',
                'INSTANTANEO',
                'INTEGRAL',
                'MASSA PARA LASANHA',
                'SEMOLA',
            ],
            'MOLHOS' => [
                'KETCHUP',
                'MAIONESE',
                'MOLHOS PRONTOS',
                'MOLHOS PRONTOS P/ SALADA',
                'MOSTARDA'
            ],
            'SOPAS' => [
                'CREMES',
                'SOPAS'
            ],
            'TEMPEROS' => [
                'ACETO BALSAMICO',
                'AMACIANTES PARA CARNES',
                'AZEITE DE OLIVA',
                'CALDOS PO',
                'CALDOS TABLET',
                'COLORIFICOS',
                'CONDIMENTOS',
                'OLEO DE SOJA',
                'OLEOS ESPECIAIS',
                'SAL',
                'TEMPEROS PRONTOS',
                'VINAGRE',
            ],
            'BISCOITOS' => [
                'BOLOS PRONTOS',
                'DOCES SECOS',
                'RECHEADOS',
                'SALGADOS SECOS',
                'TORRADAS',
                'WAFFER',
            ],
            'BOMBONIER' => [
                'BALAS',
                'CEREAL EM BARRA',
                'CHOCOLATES',
                'DOCES E COLONIAIS',
                'DROPS',
                'GOMAS',
                'GOMAS DE MASCAR',
                'PASTILHAS',
                'PIRULITOS',
            ],
            'SALGADINHOS' => [
                'BATATA PALHA',
                'SNACKS',
                'TRADICIONAIS'
            ],
            'SAZONAIS' => [
                'OVO DE PASCOA',
                'PANETTONES'
            ],
            'SOBREMESAS' => [
                'ACUCAR BAUNILHA',
                'ACUCAR CONFEITEIRO',
                'AMIDOS',
                'CACAU PO',
                'CHANTILI',
                'CHOCOLATE GRANULADO',
                'CHOCOLATE PO',
                'COBERTURAS',
                'COCO RALADO',
                'CONDIMENTOS',
                'CORANTE PARA BOLO',
                'CREME DE LEITE',
                'ESSENCIAS',
                'FERMENTO QUIMICO',
                'FRUTAS EM CALDAS',
                'FRUTAS SECAS',
                'GELATINA EM PO',
                'LEITE CONDENSADO',
                'LEITE DE COCO',
                'MARIA MOLE',
                'MELHORADORES',
                'MISTURA PARA BOLOS',
                'PO P/ SORVETE',
                'PO PARA FLA',
                'PO PARA MOUSSE',
                'POLVILHOS',
                'PUDIM',
                'SAGU',
                'SALAMONIACO',
                'SOBREMESAS FESTA',
            ],
            'ACOUGUE' => [
                'CARNES BOVINAS',
                'CARNES DE AVES',
                'CARNES OVINAS / CAPRINAS',
                'CARNES SUINAS',
                'LINGUICAS'
            ],
            'CONGELADOS' => [
                'AGNHOLINE',
                'ALMONDEGAS',
                'BATATA CONGELADA',
                'CARNES BOVINAS',
                'CARNES DE AVES',
                'CARNES DE PEIXES',
                'CARNES OVINAS/CAPRINAS',
                'CARNES SUINAS',
                'CORTES DE SUINO CONGELADO',
                'COXINHA DE FRANGO CONGELADO',
                'CREME ACAI',
                'EMPANADOS DE FRANGO CONGELADOS',
                'ESCONDIDINHO',
                'GELOS',
                'HAMBURGUER CONGELADO',
                'KIBE',
                'LANCHE',
                'LASANHA',
                'LINGUICAS',
                'MANDIOCA',
                'MASSAS',
                'MONDONGO',
                'PAMONHA',
                'PANQUECA',
                'PAO DE QUEIJO CONGELADO',
                'PASTEL',
                'PICOLES',
                'PIZZA PRONTA CONGELADA',
                'POLENTA',
                'POLPA DE FRUTA CONGELADA',
                'PRATO PRONTO CONGELADO',
                'QUITUTE',
                'RISOLIS',
                'SORVETES',
                'STROGONOFF',
                'TORTEI',
                'VEGETAIS CONGELADOS',
                'YAKISOBA',
            ],
            'HORTIFRUTI' => [
                'EMBALADOS / PROCESSADOS',
                'FRUTAS',
                'GRANJEIROS',
                'LEGUMES',
                'ORGANICOS',
                'VERDURAS'
            ],
            'LACTEOS' => [
                'BEBIDA LACTEA',
                'CREME DE LEITE RESFRIADOS',
                'IOGURTE',
                'LEITE FERMENTADO',
                'MANTEIGA',
                'QUEIJO RALADO',
                'QUEIJOS',
                'QUEIJOS ESPECIAIS',
                'REQUEIJAO',
                'RICOTAS',
                'SOBREMESA LACTEA',
            ],
            'PADARIA' => [
                'CAFES/ACHOCOLATADOS/SUCOS',
                'CONFEITARIA',
                'MATERIA PRIMA PARA PADARIA',
                'PADARIA',
                'PRODUTOS FRANQUIA',
                'REFEICOES',
                'ROTISSERIA',
                'SALGADOS',
                'TERCEIRIZADOS PADARIA',
                'TERCEIRIZADOS PADARIA TRANSFORMADOS'
            ],
            'RESFRIADOS' => [
                'BANHA',
                'CARNES BOVINAS',
                'CARNES DE AVES',
                'CARNES OVINAS/CAPRINAS',
                'CARNES SUINAS',
                'DEFUMADOS RESFRIADOS',
                'EMBUTIDOS RESFRIADOS',
                'FERMENTO BIOLOGICO RESFRIADO',
                'LINGUICAS',
                'MARGARINAS',
                'MASSA P/ PASTEL',
                'MASSAS RESFRIADAS',
                'PAO DE QUEIJO RESFRIADO',
                'PIZZA PRONTA RESFRIADA',
            ],
            'PROD/MERC CONJUNTOS/ASSOCIADOS' => 'PROD/MERC CONJUNTOS/ASSOCIADOS'
        ];
    }
}
