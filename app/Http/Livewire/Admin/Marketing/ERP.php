<?php


namespace App\Http\Livewire\Admin\Marketing;


use App\Models\Medida;
use App\Models\TipoEmbalagem;

trait ERP
{

    public $description_ERP = "";
    public $description_Com = "";

    public function copyERP()
    {
        $this->form_data['descricao_para_erp'] = $this->description_ERP;
    }

    public function copyEncart()
    {
        $this->form_data['descricao_para_encarte'] = $this->description_ERP;
    }
    public function copyCom()
    {
        $this->form_data['descricao_comercial'] = $this->description_Com;
    }

    protected function createERP_description()
    {

        $descriptionERP = "";
        //
        //1 – Categoria – Completo
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['categoria_produto']) && $this->form_data['produtos']['categoria_produto']) {
            $descriptionERP = $descriptionERP . ' ' . $this->form_data['produtos']['categoria_produto'];
        }
        //dd(substr($this->form_data['produtos']['subcategoria'],0,4));
        //2 – Subcategoria – 03 Dígitos
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['subcategoria']) && $this->form_data['produtos']['subcategoria']) {
            $res = substr(utf8_decode($this->form_data['produtos']['subcategoria']), 0, 3);
            $descriptionERP = $descriptionERP . ' ' . utf8_encode($res);
        }
        //3 – Marca - Completo
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['marca']) && $this->form_data['produtos']['marca']) {
            $descriptionERP = $descriptionERP . ' ' . $this->form_data['produtos']['marca'];
        }
        //4 – Modelo/Tipo/Referencia – 03 Dígitos
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['modelo']) && $this->form_data['produtos']['modelo']) {
            $res = substr(utf8_decode($this->form_data['produtos']['modelo']), 0, 3);
            $descriptionERP = $descriptionERP . ' ' . utf8_encode($res);
        }
        //5 – Fragrância – 03 Dígitos
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['fragrancia_sabor'])) {
            $res = substr(utf8_decode($this->form_data['produtos']['fragrancia_sabor']), 0, 3);
            $descriptionERP = $descriptionERP . ' ' . utf8_encode($res);
        }
        //6 – Cor – 03 Dígitos
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['cor'])) {
            $res = substr(utf8_decode($this->form_data['produtos']['cor']), 0, 3);
            $descriptionERP = $descriptionERP . ' ' . utf8_encode($res);
        }
        //7 – Tipo Da embalagem: -
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['tipo_de_embalagem']) && $this->form_data['produtos']['tipo_de_embalagem']) {
            $tipo_de_embalagem = TipoEmbalagem::find($this->form_data['produtos']['tipo_de_embalagem']);
            if ($tipo_de_embalagem) {
                switch (strtoupper($tipo_de_embalagem->name)):
                    case 'PET':
                        //PET
                        //PET
                        $descriptionERP = $descriptionERP . ' PET';
                        break;
                    case 'SACHE':
                        //SACHE
                        //SH
                        $descriptionERP = $descriptionERP . ' SH';
                        break;
                    case 'CAIXA':
                        //CAIXA
                        //CX
                        $descriptionERP = $descriptionERP . ' CX';
                        break;
                    case 'LATA':
                        //LATA
                        //LT
                        $descriptionERP = $descriptionERP . ' LT';
                        break;
                    case 'LITRO':
                        //LITRO
                        //L
                        $descriptionERP = $descriptionERP . ' L';
                        break;
                    case 'PACOTE':
                        //PACOTE
                        //PCT
                        $descriptionERP = $descriptionERP . ' PCT';
                        break;
                    case 'DOYP':
                        //DOYP
                        //DP
                        $descriptionERP = $descriptionERP . ' DP';
                        break;
                    case 'SQUESE':
                        //SQUESE
                        //SQ
                        $descriptionERP = $descriptionERP . ' SQ';
                        break;
                    case 'APARELHO':
                        //APARELHO
                        //APAR
                        $descriptionERP = $descriptionERP . ' APAR';
                        break;
                    case 'REFIL':
                        //REFIL
                        //RF
                        $descriptionERP = $descriptionERP . ' RF';
                        break;
                    case 'POTE':
                        //POTE
                        //PT
                        $descriptionERP = $descriptionERP . ' PT';
                        break;
                    case 'ALMOFADA':
                        //ALMOFADA
                        //ALM
                        $descriptionERP = $descriptionERP . ' ALM';
                        break;
                    case 'CAPSULAS':
                        //CAPSULAS
                        //CAPS
                        $descriptionERP = $descriptionERP . ' CAPS';
                        break;
                    case 'PAGBOURD':
                        //PAGBOURD
                        //PAGB
                        $descriptionERP = $descriptionERP . ' PAGB';
                        break;
                    case 'VIDRO':
                        //VIDRO
                        //VD
                        $descriptionERP = $descriptionERP . ' VD';
                        break;
                    case 'LONG NECK':
                        //LONG NECK
                        //LN
                        $descriptionERP = $descriptionERP . ' LN';
                        break;
                    case 'GARRAFA':
                        //GARRAFA
                        //GAR
                        $descriptionERP = $descriptionERP . ' GAR';
                        break;
                    case 'BARRIL':
                        //BARRIL
                        //BAR
                        $descriptionERP = $descriptionERP . ' BAR';
                        break;
                    case 'SPRAY':
                        //SPRAY
                        //SPR
                        $descriptionERP = $descriptionERP . ' SPR';
                        break;
                    case 'STICK':
                        //STICK
                        //STICK
                        $descriptionERP = $descriptionERP . ' STICK';
                        break;
                    case 'VÁCUO':
                        //VÁCUO
                        //VÁC
                        $descriptionERP = $descriptionERP . ' VÁC';
                        break;
                    case 'MONODOSE':
                        //MONODOSE
                        //MONO
                        $descriptionERP = $descriptionERP . ' MONO';
                        break;
                    case 'POUCH':
                        //POUCH
                        //PH
                        $descriptionERP = $descriptionERP . ' PH';
                        break;
                    case 'TP':
                        //TP
                        //PT acredito que deve ser TP
                        $descriptionERP = $descriptionERP . ' TP';
                        break;
                    case 'UHT':
                        //UHT
                        //UHT
                        $descriptionERP = $descriptionERP . ' UHT';
                        break;
                    case 'FRASCO':
                        //FRASCO
                        //FRAS
                        $descriptionERP = $descriptionERP . ' FRAS';
                        break;
                    case 'GALÃO':
                        //GALÃO
                        //GAL
                        $descriptionERP = $descriptionERP . ' GAL';
                        break;
                endswitch;

            }
        }

        //8 – Tamanho da embalagem – completo
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['volume_de_embalagem']) && $this->form_data['produtos']['volume_de_embalagem']) {
            $descriptionERP = $descriptionERP . ' ' . $this->form_data['produtos']['volume_de_embalagem'];
        }
        //9 – Unidade de medida - Completo
        if (isset($this->form_data['produtos']) && isset($this->form_data['produtos']['unidade_medida']) && $this->form_data['produtos']['unidade_medida']) {
            $unidade_medida = Medida::find($this->form_data['produtos']['unidade_medida']);
            if ($unidade_medida) {
                $descriptionERP = $descriptionERP . ' ' . $unidade_medida->name;
            }
        }
        $this->description_ERP = $descriptionERP;

    }

}
