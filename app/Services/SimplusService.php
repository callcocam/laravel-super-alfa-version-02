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
class SimplusService extends AbstractServices
{
    private $path = "jwt-login";
    protected function services()
    {
        return $this->path;
    }
    public function auth()
    {
         $response = $this->request()->withHeaders([
            'Accept'=>'application/json',
            'Content-Type'=>'application/json',
        ])->post(sprintf("%s%s", $this->baseUri,$this->path), [
            'email' => config('services.simplus.username', 'api.simplus@cooperalfa.com.br'),
            'password' => config('services.simplus.password', 'gzzQjACfSNPcMFOfeJem2e3'),
        ]);
        if ($response->successful()) {
            \Storage::put("simplus/token.json", json_encode([
                'token'=>$response->object()->token,
                'expirationTime'=>$response->object()->expirationTime
            ]));
        }
        return redirect()->back();
    }
}
