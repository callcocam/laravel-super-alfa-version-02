<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Cookie;
use SIGA\HTTP\AbstractServices;
class ProductsService extends AbstractServices
{
    private $path = "product";

    protected function services()
    {
        return $this->path;
    }
   
    protected function data($data=[]){

        //$data['ultimaAtualizacao']= now()->subDays(30)->format("YmdHis");
        $data['ordemServico']=true;
        $data['noAgreement']=true;
        $data['origin']=false;
        //$data['mostrarUltAtualImg']=true;
        $data['portal']=true;
       // $data['noAgreement']=true;
       
        return $data;
    }

    
    /**
     * @return string
     */
    protected function getBaseUri()
    {
        return sprintf("%s%s",$this->baseUri,$this->services());
    }
}
